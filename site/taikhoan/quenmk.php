<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);


    $VIEW_NAME="taikhoan/quenmk-form.php";

if(exist_param("btn_forgot")){

    $user = khach_hang_select_by_id($email);
   
    $VIEW_NAME="taikhoan/quenmk-form.php";




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
            // $mat_khau_moi= $user['mat_khau'];
               $mat_khau_1l= substr(md5(rand(0,999999)),0,8);
      
            $sql= "update user set mk_1l = '$mat_khau_1l' where email='$email'";
            pdo_execute($sql);
            // $mat_khau_moi = trim(decryptthis($mat_khau_moi, $key));
             $kq= gui_email($email,$mat_khau_1l);
             if($kq==true){
                
                // header("Location: ../taikhoan/quenmk.php?ma_xac_nhan");
                $thongbao= "Đã gửi email thành công
                <p> Chuyển đến trang  <a href='../taikhoan/quenmk.php?ma_xac_nhan'>Xác nhận đổi mật khẩu</a></p>";
             }
            // $VIEW_NAME="tai-khoan/dangnhap-form.php"; 
         
            // global $email, $mat_khau;
            
        }
    }
    else{
        $thongbao= "Sai địa chỉ email!<p>  <a href='../taikhoan/dangky.php''>Đăng ký</a> nếu bạn chưa có tài khoản </p>";
    }
}else if(exist_param("ma_xac_nhan")){
    // $user = khach_hang_select_by_ma($ma_user);
    if(exist_param("btn_acp")){
        
        if (empty($_POST['email'])){
            $error['email'] = 'Bạn chưa nhập email';
        }
         if (empty($_POST['mk_1l'])){
            $error['mk_1l'] = 'Bạn chưa nhập mã xác nhận';
        }
        if(  $email!= "" && $mk_1l!= "" ){
            $user = khach_hang_select_by_id($email);

        if($user){
            $email=$_POST['email'];
            if($user['email'] != $email){

                $thongbao= "Sai địa chỉ email!";
            }else{
                //  $mk_1l= $_POST['mk_1l'];
                 if($user['mk_1l'] == $mk_1l){
                    $_SESSION["user"] = $user;
            
                    if(isset($_SESSION['request_uri'])){
                        header("location: " . $_SESSION['request_uri']);
                    }
                    header("Location: ../taikhoan/quenmk.php?doi_mk");
                 
            }else{
                    $thongbao= "Sai mã xác nhận";
        
                }
        }
    
      
        // }else{
        //     $thongbao= "Sai mã xác nhận";

        // }
            
        
     }else{
            $thongbao= "Sai địa chỉ email!";

        }
}
    }
 $VIEW_NAME="taikhoan/ma_doi_mk.php";

}
else if(exist_param("doi_mk")){
    check_login();


    // if(isset($_SESSION['user']['email'])){
        $user = khach_hang_select_by_ma($_SESSION['user']['ma_user']);
        // $_SESSION['user']=$user;
    // }
    // print_r($user);
   
    if(exist_param("btn_change")){
        if (empty($_POST['mat_khau2'])){
            $error['mat_khau2'] = 'Bạn chưa nhập mật khẩu mới';
        }
         if (empty($_POST['mat_khau3'])){
            $error['mat_khau3'] = 'Bạn chưa nhập xác nhận mật khẩu';
        }
        if(  $mat_khau2 != "" && $mat_khau3!= "" ){
        if($mat_khau2 != $mat_khau3){
            $thongbao= "Xác nhận mật khẩu mới không đúng!";
        }
        else{

            // if($user){
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
                   //  $mat_khau = trim(decryptthis($mat_khau, $key));
              function decryptthis($mat_khau, $key)
              {
                  $encryption_key = base64_decode($key);
                  list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($mat_khau), 2), 2, null);
                  return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
              }
       
               if($user['email'] == $_SESSION['user']['email']) {
                
                    
                    try {
                    $mat_khau2 = $_POST['mat_khau2'];
                  $mat_khau2 = trim(encryptthis($mat_khau2, $key));
    
                        khach_hang_change_password($ma_user, $mat_khau2);
                        $thongbao= "Đổi mật khẩu thành công!";
                        // header("Location: ../taikhoan/dangnhap.php");
                    } 
                    catch (Exception $exc) {
                        $thongbao= "Đổi mật khẩu thất bại !";
                        
                    }
                
                
                // else{
                //     // var_dump($user);
                //     $thongbao= "Sai mật khẩu!";
                // }
            }
            else{
                // $thongbao= "Sai địa chỉ email!";
            }        
        }  
         
    }
}
 $VIEW_NAME="taikhoan/quenmk-doi.php";
    

// }else{
//     $VIEW_NAME="taikhoan/quenmk-form.php";
}
require '../layout.php';

function gui_email($email, $mat_khau_1l){
    
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
        $noidungthu =   "<strong>Hello  {$email} </strong> <p> Mã xác nhận quên mật khẩu của bạn là <strong style='color:red;'> {$mat_khau_1l}</strong>. Hãy nhập mã và đổi mật khẩu để tiện sắm đồ ngon cho mình nhé </p> "; 
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