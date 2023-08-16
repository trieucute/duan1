<?php
// load sp dac biet
function load_sp_db(){
   $sql = "SELECT * FROM hang_hoa  where dac_biet=1 limit 0,8";
   $kq= pdo_query($sql);
      return   $kq;
}




// lọc theo sp nam
function load_sp_men(){
   $sql =  "SELECT * FROM hang_hoa  WHERE gioi_tinh = 'nam'";
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
   $sql =  "SELECT * FROM hang_hoa  WHERE gioi_tinh = 'unisex'";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo từ thấp - cao
function load_sp_HighToLow(){
   $sql =   "SELECT * FROM hang_hoa  ORDER BY don_gia ASC";
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo sp nam
function load_sp_men_ma_loai($ma_loai){
   $sql =  "SELECT * FROM hang_hoa  WHERE gioi_tinh = 'nam' and ma_loai=".$ma_loai;
   $kq= pdo_query($sql);
      return   $kq;
}
// lọc theo sp nữ
function load_sp_women_ma_loai($ma_loai){
   $sql =  "SELECT * FROM hang_hoa  WHERE gioi_tinh = 'nu' and ma_loai=".$ma_loai;
   $kq= pdo_query($sql);
      return   $kq;
}
function load_sp_unisex_ma_loai($ma_loai){
   $sql =  "SELECT * FROM hang_hoa hh WHERE gioi_tinh = 'unisex' and ma_loai=".$ma_loai;
   $kq= pdo_query($sql);
      return   $kq;
}

// hiện tất cả sản phẩm
   function sp_all(){
    $sql= "select * from hang_hoa  ";
    return   pdo_query($sql);
   }
   // hiện hình
   function sp_hinh_dai_dien($a){
      $sql= "select hinh from hinh where vai_tro_hinh like '%dai dien%'  and ma_hh = $a";
      return   pdo_query_one($sql);
     }
        // hiện hình
   function sp_hinh_mo_ta($a){
      $sql= "select hinh from hinh where vai_tro_hinh like '%mo ta%'  and ma_hh = $a";
      return   pdo_query_one($sql);
     }

 
   // hiện sản phẩm theo loại
   function sp_one($ma_loai){
      $sql = "SELECT  * FROM hang_hoa  WHERE ma_loai=".$ma_loai;
     
    return    pdo_query($sql);
      
   }
   // hiện san phảm cùng loại trong trang chi tiết
   function sp_one_cung_loai($ma_loai,$ma_hh){
      $sql = "SELECT  * FROM hang_hoa  WHERE ma_loai=$ma_loai and not ma_hh=$ma_hh order by ma_hh limit 0,4" ;
     
    return    pdo_query($sql);
      
   }

   // chi tiết sản phảm
   function sp_load($ma_hh){
      $sql = "SELECT * FROM hang_hoa WHERE ma_hh=".$ma_hh;
       return  pdo_query_one($sql);
     
   } 
   function sp_load_hinh($ma_hh){
      $sql = "SELECT * FROM hang_hoa hh join hinh h on h.ma_hh=hh.ma_hh  WHERE h.vai_tro_hinh= 'đại diện' and hh.ma_hh=".$ma_hh;
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




//  tăng lượt xem khi nhấn vào 1 sản phẩm
   function tang_lx($ma_hh){
      $sql = "UPDATE hang_hoa SET so_luot_xem= so_luot_xem +1 WHERE ma_hh = $ma_hh";
      pdo_execute($sql);
   }
   
   // tìm kiếm từ khoá
   function kq_timkiem($search){
     
      $sql="SELECT *FROM hang_hoa WHERE (ten_hh like '%$search%')";
      
      return pdo_query($sql);
   }
   function kq_timkiem_sex($sex,$start,$limit){
     
      $sql="SELECT *FROM hang_hoa  WHERE (gioi_tinh like '%$sex%') LIMIT $start, $limit ";
      
      return pdo_query($sql);
   }

// tìm kiếm hàng hóa phân trang theo từ khóa
function kq_phanTrang_timKiem($search,$start,$limit){
   $sql = "SELECT *FROM hang_hoa WHERE (ten_hh like '%$search%') LIMIT $start, $limit";
   return pdo_query($sql);
}

// tìm kiếm hàng hóa phân trang theo từ khóa ADMIN
function kq_phanTrang_timKiem_admin($search,$start,$limit){
   $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

   $sql = "SELECT *FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện' and (ten_hh like '%$search%') LIMIT $start, $limit";
   return mysqli_query($connect, $sql);
}

// đếm hàng hóa theo từ khóa
function dem_phanTrang_timKiem($search){
   $sql = "select count(ma_hh) from hang_hoa where ten_hh like '%$search%'";
   return pdo_query_value($sql);
}

// đếm hàng hóa theo mã loại

function hh_count_by_ma_loai($ma_loai){
   $sql = "select count(ma_hh)  from hang_hoa where ma_loai= ?";
   return pdo_query_value($sql,$ma_loai);
}

// đếm hàng hóa theo giới tính
function hh_count_by_sex($sex){
   $sql = "select count(ma_hh) from hang_hoa where gioi_tinh='".$sex."'";
   // print_r($sql);
   return pdo_query_value($sql);
}

// đếm tất cả hàng hóa
function hh_count_all(){
   $sql = "select count(ma_hh)  from hang_hoa ";
   return pdo_query_value($sql);

}
// tìm kiếm tất cả hàng hóa ADMIN
function hh_phan_trang_all_admin($start,$limit){
   $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

   $sql = "SELECT * FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện' order by hang_hoa.ma_hh desc  LIMIT $start, $limit";
   return mysqli_query($connect, $sql);
}

// tim kiếm hàng hóa phân trang theo mã loại
function hh_phan_trang_by_ma_loai($ma_loai,$start,$limit){
   $sql = "SELECT  * FROM hang_hoa WHERE ma_loai='".$ma_loai."' LIMIT $start, $limit";
   return pdo_query($sql);
}

// tìm kiếm tất cả hàng hóa
function hh_phan_trang_all($start,$limit){
   $sql = "SELECT  * FROM hang_hoa LIMIT $start, $limit";
   return pdo_query($sql);
}

// lấy số lượng size theo mã hàng hóa
function hh_so_luong_size($ma_hh, $size){
   $sql = "select size_$size from hang_hoa where ma_hh = $ma_hh";
   return pdo_query_value($sql);
}


// giảm số lương size

function hh_giam_so_luong ($ma_hh,$size,$so_luong){
   $sql = "update hang_hoa set size_$size= size_$size - $so_luong where ma_hh = $ma_hh ";
   pdo_execute($sql);
}


function thong_ke_binh_luan(){
   $sql = "SELECT hh.ma_hh, hh.ten_hh,"
           . " COUNT(*) so_luong,"
           . " MIN(bl.ngay_bl) cu_nhat,"
           . " MAX(bl.ngay_bl) moi_nhat"
           . " FROM binh_luan bl "
           . " JOIN hanghoa hh ON hh.ma_hh=bl.ma_hh "
           . " GROUP BY hh.ma_hh, hh.ten_hh"
           . " HAVING so_luong > 0";
   return pdo_query($sql);}
   ?>