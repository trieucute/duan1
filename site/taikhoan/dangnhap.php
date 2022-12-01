<?php
require '../../global.php';
require '../../dao/khach-hang.php';

extract($_REQUEST);


if(exist_param("dang-nhap")){

    $user = khach_hang_select_by_id($email);
   
    if($user){
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
           //   $mat_khau = $_POST['mat_khau'];
            //  $mat_khau = trim(decryptthis($mat_khau, $key));
       function decryptthis($mat_khau, $key)
       {
           $encryption_key = base64_decode($key);
           list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($mat_khau), 2), 2, null);
           return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
       }

        if (decryptthis($user['mat_khau'], $key) == $mat_khau) {
         
    // if (decryptthis($user['mat_khau'], $key) != $mat_khau) {
    //     $errors['account_password'] = 'Sai mật khẩu';
    // } else {
        
    //     echo "Đang nhập thành công";
    // }
            $thongbao= "Đăng nhập thành công!";
            header('Location:../trangchinh');
            if(exist_param("ghi_nho")){
                add_cookie("email", $email, 30);
                add_cookie("mat_khau", $mat_khau, 30);
            }
            else{
                delete_cookie("email");
                delete_cookie("mat_khau");
            }
            $_SESSION["user"] = $user;
            
            if(isset($_SESSION['request_uri'])){
                header("location: " . $_SESSION['request_uri']);
            }
         
        }
        else{
            // print_r($user);
            if(empty($mat_khau)){
                $thongbao= "Vui lòng nhập mật khẩu";
            }else if ($user['mat_khau'] != $mat_khau){
                $thongbao= "Sai mật khẩu!";
            }
            
        }
    
    }
    else {
        if(empty($email) && empty($mat_khau)){
            $thongbao= "Vui lòng nhập thông tin";
        }else if(empty($email)){
            $thongbao= "Vui lòng nhập tên email";
        }else if(empty($mat_khau)){
            $thongbao= "Vui lòng nhập mật khẩu";
        }
        // var_dump($email);
        else if(!$user){
                $thongbao= "Sai email! <p>    <span> <a href='../taikhoan/dangky.php'> Đăng ký </a>nếu bạn chưa có tài khoản</span> <br/> </p> ";
        }
    

    
       
    }
}

else{
    

    if(exist_param("btn_logoff")){
    
            session_unset();
            
            // $VIEW_NAME="../trang-chinh/";

        
        
    }
 
    $mat_khau = get_cookie("mat_khau");
    

}



// $VIEW_NAME="login/dangnhap-form.php";



    
    if(exist_param("dang-ky")){
        if( empty($mat_khau)&&empty($email) &&empty($ho_ten) ){
            $thongbao = "Vui lòng nhập đầy đủ thông tin";
        }
    
     
        else if(empty($mat_khau) ){
            $thongbao= "Mời nhập mật khẩu";
        }
        else if(empty($ho_ten) ){
            $thongbao = "Mời nhập họ và tên";
        }
        else if(empty($email) ){
            $thongbao = "Mời nhập email";
        }
       
        else if(khach_hang_exist($email)){
            $thongbao= "Email này đã được sử dụng!";
        }
        else{
            $file_name = save_file("hinh", "$IMAGE_DIR/");
            $hinh = $file_name?$file_name:"user.png";
         
            try {
                khachhang_insert( $mat_khau, $ho_ten, $email,$vai_tro);
                $thongbao= "Đăng ký thành viên thành công!";
                
            } 
            catch (Exception $exc) {
        
                $thongbao= "Đăng ký thành viên thất bại!";
            }
        }
    }
    else{
        global $mat_khau, $ho_ten, $email, $hinh, $vai_tro;
    }



    $VIEW_NAME="taikhoan/dangnhap-form.php";
    if(exist_param('infor')){
        $VIEW_NAME="taikhoan/dangnhap-inf.php";
        
        }
require_once "../layout.php";