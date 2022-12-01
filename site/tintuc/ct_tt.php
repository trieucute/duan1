<?php   
    require "../../dao/pdo.php";
    require '../../global.php';
    require '../../dao/tintuc.php';
    
    extract($_REQUEST);
    $tt=chi_tiet_tt($id_tin);
   
    extract($tt);
    $tin= chi_tiet_nd($id_tin);
    $VIEW_NAME="../tintuc/ct_tt_ui.php";
    require "../layout.php";
    ?>
