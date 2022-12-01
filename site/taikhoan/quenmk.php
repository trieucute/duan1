<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);

$VIEW_NAME="taikhoan/quenmk-form.php";

if(exist_param("btn_forgot")){
    $user = khach_hang_select_by_id($email);

   




    if($user){
        if($user['email'] != $email){
            $thongbao= "Sai địa chỉ email!";
        }
        else{
               // Mã hoá Mat khau
               $key = 'qkwjdiw239&&jdafwe^%$ggdnawhd4njshjw3123123^&*^#!@#uuO';
               function encryptthis($mat_khau, $key)
               {
                   $encryption_key = base64_decode($key);
                   $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                   $encrypted = openssl_encrypt($mat_khau, 'aes-256-cbc', $encryption_key, 0, $iv);
                   return base64_encode($encrypted . '::' . $iv);
               }
               // khach_hang_insert_ho_ten($ho_ten);
         function decryptthis($mat_khau, $key)
         {
             $encryption_key = base64_decode($key);
             list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($mat_khau), 2), 2, null);
             return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
         }
            //    $mat_khau_moi = $_POST['mat_khau'];
            $mat_khau_moi= substr((rand (0,999999)),0,10);
               $mat_khau_moi = trim(encryptthis($mat_khau_moi, $key));
      
            $sql= "update user set mat_khau = '$mat_khau_moi' where email='$email'";
            pdo_execute($sql);
            $mat_khau_moi = trim(decryptthis($mat_khau_moi, $key));
             $kq= gui_email($email,$mat_khau_moi);
             if($kq==true){
                $thongbao= "Đã gửi email thành công
                <p> Chuyển đến trang  <a href='../taikhoan/dangnhap.php''>đăng nhập</a></p>";
       
             }
            // $VIEW_NAME="tai-khoan/dangnhap-form.php"; 
         
            // global $email, $mat_khau;
        }
    }
    else{
        $thongbao= "Sai địa chỉ email!<p>  <a href='../taikhoan/dangky.php''>Đăng ký</a> nếu bạn chưa có tài khoản </p>";
    }
}

require '../layout.php';

function gui_email($email,$mat_khau_moi){
    
    require "PHPMailer/src/PHPMailer.php"; 
    require "PHPMailer/src/SMTP.php"; 
    require 'PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'f6fashionz@gmail.com'; // SMTP username
        $mail->Password = 'hgqyhgggloskxodt';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
       
        $mail->setFrom('f6fashionz@gmail.com', 'F6 FashionZ');
        $mail->addAddress($email);     
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Quên Mật Khẩu';
        $noidungthu =   "<strong>Hello  {$email} </strong> <p> Mật khẩu mới của bạn là <strong style='color:red;'> {$mat_khau_moi}</strong>. Hãy đăng nhập và đổi mật khẩu để tiện sắm đồ ngon cho mình nhé </p> "; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
       
    } catch (Exception $e) {
        return false;
        $mail->ErrorInfo;
    }
   

}
?>