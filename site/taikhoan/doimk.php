<?php
require '../../global.php';
require '../../dao/khach-hang.php';

check_login();

extract($_REQUEST);
$VIEW_NAME="taikhoan/doimk-form.php";

if(exist_param("btn_change")){
    if($mat_khau2 != $mat_khau3){
        $thongbao= "Xác nhận mật khẩu mới không đúng!";
    }
    else{
        $user = khach_hang_select_by_ma($ma_user);
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
               //  $mat_khau = trim(decryptthis($mat_khau, $key));
          function decryptthis($mat_khau, $key)
          {
              $encryption_key = base64_decode($key);
              list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($mat_khau), 2), 2, null);
              return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
          }
   
           if (decryptthis($user['mat_khau'], $key) == $mat_khau) {
            
                
                try {
                $mat_khau2 = $_POST['mat_khau2'];
              $mat_khau2 = trim(encryptthis($mat_khau2, $key));

                    khach_hang_change_password($ma_user, $mat_khau2);
                    $thongbao= "Đổi mật khẩu thành công!";
                } 
                catch (Exception $exc) {
                    $thongbao= "Đổi mật khẩu thất bại !";
                    
                }
            
            }
            else{
                // var_dump($user);
                $thongbao= "Sai mật khẩu!";
            }
        }
        else{
            // $thongbao= "Sai mã đăng nhập!";
        }        
    }
}


require '../layout.php';?>