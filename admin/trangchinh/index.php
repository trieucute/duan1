<?php 
require_once "../../global.php";
// if (!isset($_SESSION['user']['vai_tro']) && ($_SESSION['user']['vai_tro'] != 'admin'  || $_SESSION['user']['vai_tro'] != 'Nhân viên')) {
//     header('Location: /404/');
//     exit;
// }
check_login();

$VIEW_NAME = "trangchinh/home.php";
require "../index.php";
?>