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
  // }
  if(exist_param('ma_dh')){
    $ma_dh = $_GET['ma_dh'];
    
    $ct_don_hang = select_ct_don_hang($ma_dh);
  
    foreach($ct_don_hang as $row){
  
      $hh = sp_load_hinh($row['ma_hh']);
  
      $ct_don_da_dat[] = array(
        'id' => $row['ma_hh'],
        'name' => $hh['ten_hh'],
        'hinh' => $hh['hinh'],
        'don_gia' => $hh['don_gia'],
        'so_luong' => $row['so_luong'],
         'size' => $row['size'],
        // 'tong_tien' =>$row['tong_tien'],
      );
    }  
    $VIEW_NAME = "donhang/ct_don_da_dat.php";

    
  
  }
if(exist_param('huy_don_hang')){
  // $ma_dh = $_POST['ma_dh'];

    don_hang_by_huy($ma_dh) ;
      
    // $VIEW_NAME = "donhang/don_hang_ui.php";
  $thongbao= "Huỷ thành công";
  }

}

  // $VIEW_NAME = "donhang/don_hang_ui.php";





require "../layout.php";

?>