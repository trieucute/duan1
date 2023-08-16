<?php
require '../../global.php';
require '../../dao/khach-hang.php';

check_login();

extract($_REQUEST);

if(exist_param("btn_update")){
    $file_name = save_file("up_hinh", "$img_path/");
    $hinh = $file_name?$file_name:$hinh;
    try {
        if ( preg_match("/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/",  $_POST['SDT']) == false &&  $_POST['SDT'] !=""){
 
            $error['SDT'] = 'Bạn nhập sai số điện thoại';
          }
          if(preg_match("/^(0|\+84)(\s|\.)?((3[2-9])|(5[689])|(7[06-9])|(8[1-689])|(9[0-46-9]))(\d)(\s|\.)?(\d{3})(\s|\.)?(\d{3})$/",  $_POST['SDT']) == true ||  $SDT == ""){
               khach_hang_update_hinh($ma_user,$email,$hinh);
   
        khach_hang_update($ma_user,$ho_ten,$dia_chi,$SDT);
        $thongbao= "Cập nhật thông tin thành viên thành công!";
      
    
          }
         $_SESSION['user'] = khach_hang_select_by_ma($ma_user);


    } 
    catch (Exception $exc) {
        print_r($exc);
        $thongbao= "Cập nhật thông tin thành viên thất bại!";
    }

}
else{

        extract( $_SESSION['user'] );
    
    
    
}

$VIEW_NAME="taikhoan/capnhat-form.php";
require '../layout.php';?>