<?php
session_start();
require_once "../../dao/pdo.php";
require_once "../../dao/hanghoa.php";


if(isset($_POST['id'])){

  $id_hh = $_POST['id'];
  $id_don_hang = 0;
  $size = $_POST['size'];
  $amount = $_POST['amount'];
  $hh = sp_load_hinh($id_hh);

  switch ($size) {
    case 'm':
      $id_don_hang = $id_hh +1;
      break;
    case 'l':
    
      $id_don_hang = $id_hh +2;

    break;
    case "xl":
      $id_don_hang = $id_hh +3;
      break;
      case "xxl":
        $id_don_hang = $id_hh +4;
        break;
    default:
      $id_don_hang = $id_hh;
      break;
  }
 

//  print_r($hh);

 if(!isset($_SESSION['cart'])){
  $cart[$id_don_hang] = array(
    'id' => $id_hh,
    'name' => $hh['ten_hh'],
    'hinh' => $hh['hinh'],
    'don_gia' => $hh['don_gia'],
    'so_luong' => $amount,
    'size' => $size,
    
  );
  
  }else{
    $cart = $_SESSION['cart'];
    if(array_key_exists($id_don_hang,$cart) && $cart[$id_don_hang]['size'] == $size ){

     

      $cart[$id_don_hang] = array(
        'id' => $id_hh,
        'name' => $hh['ten_hh'],
        'hinh' => $hh['hinh'],
        'don_gia' => $hh['don_gia'],
        'so_luong' => (int)$cart[$id_don_hang]['so_luong'] + $amount,
         'size' => $size,
      );
     
    
  
    }else{
      $cart[$id_don_hang ] = array(
        'id' => $id_hh,
        'name' => $hh['ten_hh'],
        'hinh' => $hh['hinh'],
        'don_gia' => $hh['don_gia'],
        'so_luong' => $amount,
        'size' => $size,

      );
  
      
    }
   

   

  }

  $_SESSION['cart'] = $cart;
  $tong_tien_sp = $_SESSION['cart'][$id_don_hang]['so_luong'] * $_SESSION['cart'][$id_don_hang]['don_gia'];
  $so_luong =0;
  $thanh_tien = 0;
  foreach($cart as $value){
    $so_luong += $value['so_luong'];
    $thanh_tien += $value['so_luong'] * $value['don_gia'];
  }
  
  // print_r($cart);
  echo $so_luong."-".$tong_tien_sp."-".$thanh_tien;
  

 }
 


?>