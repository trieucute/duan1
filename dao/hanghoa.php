<?php
// load sp dac biet
function load_sp_db(){
   $sql = "SELECT * FROM hang_hoa where dac_biet=1 limit 0,8";
   $kq= pdo_query($sql);
      return   $kq;
}

// lọc theo sp nam
function load_sp_men(){
   $sql =  "SELECT * FROM hang_hoa WHERE gioi_tinh = 'nam'";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo sp nữ
function load_sp_women(){
   $sql =  "SELECT * FROM hang_hoa WHERE gioi_tinh = 'nu'";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo sp unisex
function load_sp_unisex(){
   $sql =  "SELECT * FROM hang_hoa WHERE gioi_tinh = 'unisex'";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo từ thấp - cao
function load_sp_HighToLow(){
   $sql =   "SELECT * FROM hang_hoa ORDER BY don_gia ASC";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo từ  cao - thấp
function load_sp_LowToHigh(){
   $sql = "SELECT * FROM hang_hoa ORDER BY don_gia DESC";
   $kq= pdo_query($sql);
      return   $kq;
}
// hiện tất cả sản phẩm
   function sp_all(){
    $sql= "select * from hang_hoa ";
    return   pdo_query($sql);
   }
   // hiện sản phẩm theo loại
   function sp_one($ma_loai){
      $sql = "SELECT  * FROM hang_hoa WHERE ma_loai=".$ma_loai;
     
    return    pdo_query($sql);
      
   }

   // chi tiết sản phảm
   function sp_load($ma_hh){
      $sql = "SELECT * FROM hang_hoa WHERE ma_hh=".$ma_hh;
       return  pdo_query_one($sql);
     
   } 
   
   //  load tên dm khi nhấn vào 1 tên loại hàng
   function load_tendmsp($ma_loai){
      $sql = "SELECT  ten_loai FROM loai WHERE ma_loai=".$ma_loai;
      $tendm= pdo_query_one($sql);
      extract($tendm);
      return $ten_loai;
   }


   // them sp
      function insert_sp($ten_hh,$hinh,$don_gia,$mo_ta,$luot_xem,$ngay_nhap,$giam_gia,$dac_biet,$ma_loai){
         $sql = "insert into hanghoa(ten_hh,hinh,don_gia,mo_ta,luot_xem,ngay_nhap,giam_gia,dac_biet,ma_loai) values ('$ten_hh','$hinh','$don_gia','$mo_ta','$luot_xem','$ngay_nhap','$giam_gia','$dac_biet','$ma_loai')";
         pdo_execute($sql); 
   }
  // xoa sp
  function xoa_sp($ma_hh){
   $sql = "DELETE FROM hanghoa WHERE ma_hh=".$ma_hh;
   pdo_execute($sql);
  }

  // update sp
  function update_sp($ma_hh,$ten_hh,$hinh,$don_gia,$mo_ta,$luot_xem,$ngay_nhap,$giam_gia,$dac_biet,$ma_loai){
   if($hinh!=""){ 
       $sql= "update hanghoa set ten_hh = ' ".$ten_hh. " ',hinh = '".$hinh."',don_gia = ' ".$don_gia. " ', mo_ta = ' ".$mo_ta. " ' , luot_xem = '".$luot_xem." ', ngay_nhap = ' ".$ngay_nhap. " ', giam_gia = ' ".$giam_gia. " ', dac_biet=' ".$dac_biet." ' , ma_loai = ' ".$ma_loai. " '  where ma_hh=".$ma_hh;
   }else{
      $sql= "update hanghoa set ten_hh = ' ".$ten_hh. " ' ,don_gia = ' ".$don_gia. " ', mo_ta = ' ".$mo_ta. " ' , luot_xem = '".$luot_xem." ', ngay_nhap = ' ".$ngay_nhap. " ', giam_gia = ' ".$giam_gia. " ', dac_biet=' ".$dac_biet." ' , ma_loai = ' ".$ma_loai. " '  where ma_hh=".$ma_hh;
   }
   pdo_execute($sql);
  }

// phan trang sản phẩm
function phan_trangsp(){
   $pagesize=5;
   $startrow=0;
   $sql = "SELECT * FROM hanghoa limit  $pagesize,$startrow";
   pdo_query($sql);
   return    pdo_query($sql);

}


//  tăng lượt xem khi nhấn vào 1 sản phẩm
   function tang_lx($ma_hh){
      $sql = "UPDATE hang_hoa SET so_luot_xem= so_luot_xem +1 WHERE ma_hh = $ma_hh";
      pdo_execute($sql);
   }
   
   // tìm kiếm từ khoá
   function kq_timkiem($search){
     
      $sql="SELECT *FROM hang_hoa hh "."join loai lo on lo.ma_loai=hh.ma_loai"." WHERE (ten_hh like '%$search%')";
      
      return pdo_query($sql);
   }
   function kq_timkiem_sex($sex){
     
      $sql="SELECT *FROM hang_hoa hh "."join loai lo on lo.ma_loai=hh.ma_loai"." WHERE (gioi_tinh like '%$sex%')";
      
      return pdo_query($sql);
   }

   ?>