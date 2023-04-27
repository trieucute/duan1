<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/khach-hang.php";
// extract($_REQUEST);
// require_once "encryption.php";
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
    check_login();

    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST); 
    
    if(exist_param("user_add")){

            try {
                require_once "encryption.php";
                if (isset($_POST['add_user']) !="") {
                    // if(!empty($email)  ){
                    $ho_ten = $_POST['ho_ten_user'];
                    $mat_khau = $_POST['mat_khau_user'];  
                    $mat_khau_encryption = encryptthis($mat_khau, $key);  
                    $email = $_POST['email_user'];
                    $dia_chi = $_POST['dia_chi_user'];
                    $sdt = $_POST['sdt_user'];
                    $vai_tro = $_POST['vai_tro_user'];
                
                    $image_user = $_FILES['hinh_user'];
                    $file_name_user = $image_user['name'];
                    $file_name_user = explode('.', $file_name_user);
                    $ext_user = end($file_name_user);
                    if($ext_user==""){
                        $new_file_user = "avt.png";
                    } else {
                        $new_file_user = md5(uniqid()) . '.' . $ext_user;
                    }
                    $upload_image_user = move_uploaded_file($image_user['tmp_name'], '../../content/imgs/' . $new_file_user);
                    if (empty($_POST['ho_ten_user'])){
                        $error['ho_ten_user'] = 'Bạn chưa nhập họ tên';
                    }
                    if (empty($_POST['mat_khau_user'])){
                        $error['mat_khau_user'] = 'Bạn chưa nhập mật khẩu';
                    }
                    if (empty($_POST['email_user'])){
                        $error['email_user'] = 'Bạn chưa nhập email';
                    }else if( $_POST['email_user']== khach_hang_exist($email)){
                        // $_POST['email_user']== khach_hang_exist($email);
                        $error['email_user'] = 'Email đã tồn tại';

                    }
                     if (empty($_POST['dia_chi_user'])){
                        $error['dia_chi_user'] = 'Bạn chưa nhập địa chỉ';
                    }
                     if (empty($_POST['sdt_user'])){
                        $error['sdt_user'] = 'Bạn chưa nhập số điện thoại';
                    }
                    if( $ho_ten!= "" && $mat_khau != "" && $email != "" && $dia_chi!= "" &&  $sdt!= ""   ){
                          $sql_insert_user = "INSERT INTO user (email, mat_khau, vai_tro, hinh) VALUES ('$email', '$mat_khau_encryption', '$vai_tro', '$new_file_user')";
                    $query_insert_user = mysqli_query($connect, $sql_insert_user);
                
                    $sql_select_user = "SELECT * FROM user ORDER BY ma_user DESC LIMIT 1";
                    $query_select_user = mysqli_query($connect, $sql_select_user);
                    $row_user = mysqli_fetch_assoc($query_select_user);
                    $ma_user = $row_user['ma_user'];
                
                    $sql_insert_khach_hang = "INSERT INTO khachhang (ma_user, ho_ten, dia_chi, sdt) VALUES ('$ma_user', '$ho_ten', '$dia_chi', '$sdt')";
                    $query_insert_khach_hang = mysqli_query($connect, $sql_insert_khach_hang);
                    $thongbao= "Thêm mới thành công!";
                        unset($ho_ten, $mat_khau,$email ,$dia_chi, $sdt, $new_file_user );
                    }else{
                        $thongbao= "Thêm mới thất bại!";}
                   
                 
                
                  

                
                }else{
                        //    $thongbao= "Thêm mới thất bại!";
                }
                    // unset($ten_loai, $ma_loai);
        //              }else{
        //     $thongbao= "Hãy nhập tài khoản mới";
        // }
                }
                catch (Exception $exc) {
                    // $thongbao= "Thêm mới thất bại!";
                }
               
      
        $VIEW_NAME = "kh_add.php";
    }
    
    else if(exist_param("user_xoa")){
        try {
            // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
            $sql_delete_khach_hang = "DELETE FROM khachhang WHERE ma_user = {$_GET['ma_user']};";
            $query_delete_khach_hang = mysqli_query($connect, $sql_delete_khach_hang);
            
            $sql_delete_user = "DELETE FROM user WHERE ma_user = {$_GET['ma_user']};";
            $query_delete_user = mysqli_query($connect, $sql_delete_user);
            
            $thongbao = "Đã xoá thành công";
     } 
        catch (Exception $exc) {
            $thongbao= "Xóa thất bại!";
        }
        // $listdanhmuc = loai_select_all();
    
        $VIEW_NAME = "user_list.php";

    }
//     else if(exist_param("loaihang_sua")){
//         $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
// if (isset($_POST['edit_category'])) {
//     $ma_loai = $_GET['ma_loai'];
//     $ten_loai = $_POST['ten_loai_update'];

    // $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
    // $query_update_loai = mysqli_query($connect, $sql_update_loai);
    // header('location: dashboard.php');
// }
//         $capnhatdm= loai_select_by_id($ma_loai);
//         extract($capnhatdm);
//         $thongbao = "Đã lấy thành công";
//         $VIEW_NAME = "loaihang_edit.php";
//     }
    else if(exist_param("user_sua")){ 
    
        try {
          
            // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
            if (isset($_POST['edit_user'])) {
                require_once "encryption.php";

                $ma_user = $_GET['ma_user'];
                $ho_ten = $_POST['ho_ten_user_update'];
                $mat_khau = $_POST['mat_khau_user_update'];  
                $mat_khau_encryption = encryptthis($mat_khau, $key);  
                $email = $_POST['email_user_update'];
                $dia_chi = $_POST['dia_chi_user_update'];
                $sdt = $_POST['sdt_user_update'];
                $vai_tro = $_POST['vai_tro_user_update'];
            
                $sql_user = "SELECT * FROM user WHERE ma_user = $ma_user";
                $query_user = mysqli_query($connect, $sql_user);
                $row_user = mysqli_fetch_assoc($query_user);
                
                $image_user_update = $_FILES['hinh_user_update'];
                $file_name_user_update = $image_user_update['name'];
                $file_name_user_update = explode('.', $file_name_user_update);
                $ext_user_update = end($file_name_user_update);
                if($ext_user_update==""){
                    $new_file_user_update = $row_user['hinh'];
                } else {
                    $new_file_user_update = md5(uniqid()) . '.' . $ext_user_update;
                }
                $upload_image_user_update = move_uploaded_file($image_user_update['tmp_name'], '../../content/imgs/' . $new_file_user_update);
            
                $sql_user_update = "UPDATE user SET email = '$email', mat_khau = '$mat_khau_encryption', vai_tro = '$vai_tro', hinh = '$new_file_user_update' WHERE ma_user = '$ma_user'";
                $query_user_update = mysqli_query($connect, $sql_user_update);
            
                $sql_khach_hang_update = "UPDATE khachhang SET ho_ten = '$ho_ten', dia_chi = '$dia_chi', sdt = '$sdt' WHERE ma_user = '$ma_user'";
                $query_khach_hang_update = mysqli_query($connect, $sql_khach_hang_update);
                $thongbao='Cập nhật thành công';
            }else{
            // $thongbao= "Cập nhật thất bại!";

            }
          
      
             
        } 
        catch (Exception $exc) {
            // $thongbao= "Cập nhật thất bại!";
        }
    
       
        $VIEW_NAME = "kh_edit.php";

    }
    // else if(exist_param("loaihang_list")){
    //     $listdanhmuc = loai_select_all();
    //     $VIEW_NAME = "loaihang_list.php";
    // }
    else if(exist_param("nhanvien_list")){
        $VIEW_NAME = "nhanvien_list.php";

    }else  if(exist_param("khachhang_list")){
        $VIEW_NAME = "kh_list.php";

    }
    else{
        $VIEW_NAME = "user_list.php";
    }
require "../index.php";
    
?>