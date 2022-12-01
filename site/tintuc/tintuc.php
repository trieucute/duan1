<?php   
    require "../../dao/pdo.php";
    require '../../global.php';
    require '../../dao/tintuc.php';
    
    extract($_REQUEST);
    $listtt = tin_tuc_select_all();
// if(exist_param("dang-ky")){
//     if( empty($mat_khau)&&empty($email) &&empty($mat_khau2) ){
//         $thongbao = "Vui lòng nhập đầy đủ thông tin";
//     }
// }
    $VIEW_NAME="../tintuc/tintuc-ui.php";
    require "../layout.php";
    ?>
