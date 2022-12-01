
<?php   
    require "../../dao/pdo.php";
    require '../../global.php';
    require '../../dao/loai.php';
  require "../../dao/hanghoa.php";
    extract($_REQUEST);
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;
    $start = ($current_page - 1) * $limit;

  
    if(exist_param("ma_loai")){
       
        // print_r($sp);  
         $total_records = (int)hh_count_by_ma_loai($ma_loai);
         $tendm = load_tendmsp($ma_loai);
         $sp = hh_phan_trang_by_ma_loai($ma_loai,$start,$limit);
    
    }else if(exist_param("search")){
        $total_records = (int)dem_phanTrang_timKiem($search);
        $sp= kq_phanTrang_timKiem($search,$start,$limit);
       

    }else if(exist_param("sex")){
        $total_records = (int)hh_count_by_sex($sex);
        $sp=kq_timkiem_sex($sex,$start,$limit);
    }
//     else if(exist_param("cao")){
//             $sp= load_sp_HighToLow();
//     }else if(exist_param("thap")){
//         $sp= load_sp_LowToHigh();
// }
    

//     if (exist_param('filter')== "men") {
      
//             $sp=load_sp_men();
//     } 
    
//    if  (exist_param('filter') == "women") {
//         $sp=load_sp_women();
//     } 
    
//     if  (exist_param('filter') == "unisex") {
//         $sp=load_sp_unisex();
//     } 
//     if  (exist_param('filter')== "low_to_high") {
//         $sp=load_sp_LowToHigh();
//     } 
//     if   (exist_param('filter')== "high_to_low") {
//         $sp=load_sp_HighToLow();
//     } 
    
    else{
     $total_records = (int)hh_count_all();
     $sp = hh_phan_trang_all($start,$limit);    
    //  $sp= sp_all();
       
    }
   
    $total_page = ceil($total_records / $limit);
     // Giới hạn current_page trong khoảng 1 đến total_page
     if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }
    $VIEW_NAME = "../sanpham/shop-ui.php";
  

    require "../layout.php";
    ?> 