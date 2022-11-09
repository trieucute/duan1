<?php

require_once "../../dao/pdo.php";
require_once "../../global.php";
require_once "../../dao/hanghoa.php";
require_once "../../dao/loai.php";

extract($_REQUEST);
if (exist_param("gioi_thieu")) {
    $VIEW_NAME = "gioithieu.php";
} else if (exist_param("lien_he")) {
    $VIEW_NAME = "lienhe.php";
} else if (exist_param("hoi_dap")) {
    $VIEW_NAME = "trangchinh/hoi-dap.php";
} else {

    $VIEW_NAME = "trangchinh/home.php";
}

require '../layout.php';  ?>