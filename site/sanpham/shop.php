
<?php   
    require "../../dao/pdo.php";
    require '../../global.php';
    require '../../dao/loai.php';
  require "../../dao/hanghoa.php";
    extract($_REQUEST);
    if(exist_param("ma_loai")){
        $sp = sp_one($ma_loai);
        // print_r($sp);  
        $tendm = load_tendmsp($ma_loai);
        
    }else if(exist_param("search")){
        $sp=kq_timkiem($search);

    }else if(exist_param("sex")){
        $sp=kq_timkiem_sex($sex);
    }
    

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
        $sp= sp_all();
    }
  
    $VIEW_NAME = "../sanpham/shop-ui.php";

    require "../layout.php";
    ?> 