<?php
require_once 'pdo.php';
// them kh trong phần đăng ký
function khachhang_insert( $mat_khau, $email,$vai_tro,$ho_ten){
    $sql = "insert into user( mat_khau,email,vai_tro,ho_ten) values ('$mat_khau', '$email','$vai_tro','$ho_ten')  ";

   
 
    pdo_execute($sql);
}
function khachhang_mauser(){
    $sql ="insert into khachhang(ma_user,ho_ten) 
    SELECT ma_user,ho_ten from user ORDER by ma_user DESC limit 1 ";
    pdo_execute($sql);

}



// kiem tra  khach hang
 function checkusers($ma_user){
    $sql = "select * from user where ma_kh= '$ma_user'";
    pdo_execute($sql);

    
 }


 // hiện tất cả khach hàng
 function users(){
    $sql = "select * from user" ;
    return  pdo_query($sql);
 }

// Thêm khách hàng mới
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat,$vai_tro){
    $sql = "INSERT INTO user(ma_kh, mat_khau, ho_ten, email, hinh,kich_hoat,vai_tro) VALUES ('$ma_kh', '$mat_khau', '$ho_ten', '$email', '$hinh','$kich_hoat','$vai_tro')";
   pdo_execute($sql);
}
//Cập nhật thông tin 1 khách hàng
// UPDATE user SET mat_khau=".$mat_kh4324au.",ho_ten=".$ho_t3442en.",email=".$emai432432l",vai_tro="$va432432i_tro" where ma_user=73;
// UPDATE khachhang set ho_ten=".$ho_t3442en.",hinh='hiđsad34234nh' where ma_user=73
function khach_hang_update($ma_user,$mat_khau, $ho_ten, $email, $vai_tro){

   $sql = "UPDATE user SET mat_khau='".$mat_khau."',ho_ten='".$ho_ten."',email='".$email."',vai_tro='".$vai_tro."' WHERE ma_user='".$ma_user."' ";
    pdo_execute($sql);
}
function khach_hang_update_hinh($ma_user,$ho_ten,$hinh,$dia_chi,$SDT){
    if($hinh!=""){
     
      $sql = "UPDATE khachhang SET ho_ten='".$ho_ten."',hinh='".$hinh."' ,dia_chi='".$dia_chi."' ,SDT='".$SDT."' WHERE ma_user='".$ma_user."' ";
   
    }else{
      
       $sql = "UPDATE khachhang SET ho_ten='".$ho_ten."' ,dia_chi='".$dia_chi."' ,SDT='".$SDT."' WHERE ma_user='".$ma_user."'";
    }
       pdo_execute($sql);
   }

// Xóa một hoặc nhiều khách hàng
function khach_hang_delete($ma_kh){
    $sql = "DELETE FROM user  WHERE ma_kh= '$ma_kh'";
    // if(is_array($ma_kh)){
    //     foreach ($ma_kh as $ma_kh) {
    //         pdo_execute($sql);
    //     }
    // }
    // else{
        pdo_execute($sql);
    // }
}

//Truy vấn một kháh hàng theo email
function khach_hang_select_by_id($email){
    $sql = "SELECT * FROM user u join khachhang k on u.ma_user= k.ma_user where email='$email'";
    $kh=pdo_query_one($sql);
    return $kh ;
}
function khach_hang_select_by_ma($ma_user){
    $sql = "SELECT * FROM user u join khachhang k on u.ma_user= k.ma_user where u.ma_user='$ma_user' ";
    $kh=pdo_query_one($sql);
    return $kh ;
}

//Kiểm tra sự tồn tại của một khách hang3
function khach_hang_exist($email){
    $sql = "SELECT count(*) FROM user WHERE email='$email'";
    return pdo_query_value($sql) > 0;
}

// //Lấy danh sách kh theo vai trò
// function khach_hang_select_by_role($vai_tro){
//     $sql = "SELECT * FROM khachhang WHERE vai_tro=".$vai_tro;
//     return pdo_query($sql);
// }
//Cập nhật mật khẩu của 1 khách hàng
function khach_hang_change_password($ma_user, $mat_khau_moi){
    $sql = "UPDATE user SET mat_khau=? WHERE ma_user=?";
    pdo_execute($sql, $mat_khau_moi, $ma_user);
}