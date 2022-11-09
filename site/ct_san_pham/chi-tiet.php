<?php

require_once "../../global.php";
require_once "../../dao/hanghoa.php";
require_once "../../dao/pdo.php";


extract($_REQUEST);
echo $ma_hh;  
$hang_hoa = sp_load($ma_hh);
extract($hang_hoa);

tang_lx($ma_hh);
// echo $hinh;

$VIEW_NAME = "ct_san_pham/chi-tiet-ui.php";
require "../layout.php";

?>