<?php
require '../../global.php';
require '../../dao/khach-hang.php';

check_login();

extract($_REQUEST);

if(exist_param("btn_update")){
    $file_name = save_file("up_hinh", "$IMAGE_DIR/");
    $hinh = $file_name?$file_name:$hinh;
    try {
     
        khach_hang_update_hinh($ma_user,$mat_khau,$email, $hinh,$vai_tro);
   
        khach_hang_update($ma_user,$ho_ten,$dia_chi,$SDT);
        $thongbao= "Cập nhật thông tin thành viên thành công!";
      
        $_SESSION['user'] = khach_hang_select_by_ma($ma_user);


    } 
    catch (Exception $exc) {
        // print_r($exc);
        $thongbao= "Cập nhật thông tin thành viên thất bại!";
    }

}
else{

        extract( $_SESSION['user'] );
    
    
    
}

$VIEW_NAME="taikhoan/capnhat-form.php";
require '../layout.php';?>