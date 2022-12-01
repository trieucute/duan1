<?php
require_once 'pdo.php';

function tin_tuc_select_all(){
    $sql = "SELECT * FROM tin_tuc  ";
   return  pdo_query($sql);
    
}
// chi tiet tin
function chi_tiet_tt($id_tin){
    $sql = "SELECT * FROM noi_dung_bv  nd join tin_tuc tt on tt.id_tin=nd.id_tin  where nd.id_tin=$id_tin";
   return pdo_query_one($sql);
    
}
function chi_tiet_nd($id_tin){
    $sql = "SELECT noi_dung,id_tin,hinh FROM noi_dung_bv  where id_tin=$id_tin";
   return pdo_query($sql);
    
}
?>