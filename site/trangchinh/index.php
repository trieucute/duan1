<?php

require_once "../../dao/pdo.php";
require_once "../../global.php";
require_once "../../dao/hanghoa.php";
require_once "../../dao/loai.php";

extract($_REQUEST);
if (exist_param("gioi_thieu")) {
    $VIEW_NAME = "trangchinh/aboutus.php";
} else if (exist_param("lien_he")) {
    $VIEW_NAME = "contact.php";

}else if (exist_param("mua_hang")) {
    $VIEW_NAME = "trangchinh/mua_hang.php";

}else if (exist_param("giao_hang")) {
    $VIEW_NAME = "trangchinh/giao_hang.php";

}else if (exist_param("bao_hanh")) {
    $VIEW_NAME = "trangchinh/bao_hanh.php";
}else {

    $VIEW_NAME = "trangchinh/home.php";
}

require '../layout.php';  ?>