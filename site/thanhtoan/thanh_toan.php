<?php 
// session_start();

require_once "../../global.php";
require_once "../../dao/khach-hang.php";
require_once "../../dao/don-hang.php";
require_once "../../dao/hanghoa.php";

extract($_REQUEST);
$message = "";
if(exist_param('dat_hang')){
  if (isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $kh_info = khach_hang_select_by_id($user['email']) ;

  }else{
    header("location:../taikhoan/dangky.php");


  };
  $cart = $_SESSION['cart'];
  $tong_tien = 0;
  $ship = 30000;
  foreach($cart as $row){
    $tong_tien += $row['so_luong'] * $row['don_gia'];

  }
  
  add_don_hang($email,$SDT,$dia_chi, "đơn mới",$kh_info['ma_kh'],$pttt,$ho_ten,$tong_tien+$ship);
  $don = don_hang_top1();

  foreach($cart as $row){
    add_don_hang_ct($row['id'],$don['ma_don_hang'],$row['so_luong'],$row['don_gia'],$row['size']);
    hh_giam_so_luong($row['id'],$row['size'],$row['so_luong']);

  }

  $message = "Đặt hàng thành công";

  $_SESSION['cart'] = array();
  

}

$VIEW_NAME = "thanhtoan/thanh_toan_ui.php";

require "../layout.php";



?>