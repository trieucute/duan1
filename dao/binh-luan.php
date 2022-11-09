
<?php 

function binh_luan_select_by_hang_hoa($ma_hh){
  $sql = "select * from binh_luan where ma_hh =". $ma_hh ;
  return pdo_query($sql);
}


function  binh_luan_insert(){
  
}

?>
