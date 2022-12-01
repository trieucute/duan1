<?php 

require_once "../../global.php";
require_once "../../dao/don-hang.php";
require_once "../../dao/hanghoa.php";

extract($_REQUEST);
// if(exist_param('ordered')){

  if(isset($_SESSION['user'])){
    $id_kh = $_SESSION['user']['ma_kh'];

    $don_hang = don_hang_by_ma_kh($id_kh);

    $VIEW_NAME = "donhang/don_hang_ui.php";
  }

else if(exist_param('ma_dh')){
  $ma_dh = $_GET['ma_dh'];
  // $ct_don_da_dat = array();
  $cart = $_SESSION['cart'];
  
  $ct_don_hang = select_ct_don_hang($ma_dh);

  foreach($ct_don_hang as $row){

    $hh = sp_load($row['ma_hh']);

    $ct_don_da_dat[$row['ma_chi_tiet_don_hang']] = array(
      'id' => $row['ma_hh'],
      'name' => $hh['ten_hh'],
      'hinh' => $hh['hinh'],
      'don_gia' => $hh['don_gia'],
      'so_luong' => $row['so_luong'],
       'size' => $row['size'],

    );
    

  }
   print_r($ct_don_hang);
  $VIEW_NAME = "donhang/ct_don_da_dat.php";




}else{
  // $thong_bao="<h3>Bạn không có đơn hàng nào</h3>";
}


require "../layout.php";

?>