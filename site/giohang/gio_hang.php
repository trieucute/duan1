<?php 
// session_start();
require_once "../../global.php";
extract($_REQUEST);
if(exist_param('del_item')){
  $cart = $_SESSION['cart'];

  array_splice($cart,$del_item,1);
  $_SESSION['cart'] = $cart;

}

$VIEW_NAME = "giohang/gio_hang_ui.php";

require "../layout.php";

?>