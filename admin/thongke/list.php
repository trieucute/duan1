<?php
include_once "currency_format.php";
require_once "../../dao/pdo.php";
require_once "../../global.php";
require_once "../../dao/thongke.php";
require_once "../../dao/hanghoa.php"; 
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
// if (!isset($_SESSION['user']['vai_tro']) && ($_SESSION['user']['vai_tro'] != 'admin'  || $_SESSION['user']['vai_tro'] != 'Nhân viên')) {
//     header('Location: /404/');
//     exit;
// }
check_login();

?>

<head>
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</head>
<style>
    .display_none {
        display: none;
    }

    svg {
        width: 100%;
    }

    rect {
        /* background-color: #c45ab3; */
        fill: none;
        width: 100%;
    }

    g text {
        fill: white;
    }

    .cmt_active table tr {
        margin: 40px 0;
        height: 100px;
    }

    .cmt_active table tr th {
        font-size: 22px;
    }

    .cmt_active table tr td {
        font-size: 19px;
    }

    .cmt_active table tr td select {
        font-size: 16px;
        padding: 2px;
        border-radius: 5px;
        font-family: 'Signika Negative';
        font-weight: bold;
    }
</style>

<div class="container-row-content chart bang_dieu_khien">
    <?php
    $dem_user = dem_user();
    $dem_bl = dem_bl();
    $dem_dh = dem_dh();
    ?>
    <div class="row-content-top">
        <h2>BẢNG ĐIỀU KHIỂN</h2>
        <div class="order-content">
            <div class="order-row">
                <i class="fa-solid fa-cart-shopping"></i>
                <span><?php foreach ($dem_dh as $dh) {
                            echo "    $dh[so_luong]";
                        }; ?></span>
                <p>Đơn hàng</p>
            </div>
            <div class="order-row">
                <i class="fa-solid fa-comment"></i>
                <span><?php foreach ($dem_bl as $bl) {
                            echo "    $bl[so_luong]";
                        }; ?></span>
                <p>Bình luận</p>
            </div>
            <div class="order-row">
                <i class="fa-solid fa-user"></i>

                <span> <?php foreach ($dem_user as $user) {
                            echo "    $user[so_luong]";
                        }; ?></span>
                <p>Tài khoản</p>
            </div>
        </div>

    </div>
    <div class="row-content-mid ">
            <div class="chart">
                <canvas id="myChart" style="width:100%;max-width:900px; text-align: center;margin: 0 auto; "></canvas>
                <?php
                $sql_ao_khoac = "SELECT COUNT(*) as tong_ao_khoac FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo khoác%'";
                $query_ao_khoac = mysqli_query($connect, $sql_ao_khoac);
                $count_ao_khoac = mysqli_fetch_assoc($query_ao_khoac);
                $tong_ao_khoac = $count_ao_khoac['tong_ao_khoac'];

                $sql_ao_thun = "SELECT COUNT(*) as tong_ao_thun FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo thun%'";
                $query_ao_thun = mysqli_query($connect, $sql_ao_thun);
                $count_ao_thun = mysqli_fetch_assoc($query_ao_thun);
                $tong_ao_thun = $count_ao_thun['tong_ao_thun'];

                $sql_ao_len = "SELECT COUNT(*) as tong_ao_len FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo len%'";
                $query_ao_len = mysqli_query($connect, $sql_ao_len);
                $count_ao_len = mysqli_fetch_assoc($query_ao_len);
                $tong_ao_len = $count_ao_len['tong_ao_len'];

                $sql_so_mi = "SELECT COUNT(*) as tong_so_mi FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%sơ mi%'";
                $query_so_mi = mysqli_query($connect, $sql_so_mi);
                $count_so_mi = mysqli_fetch_assoc($query_so_mi);
                $tong_so_mi = $count_so_mi['tong_so_mi'];

                $sql_quan = "SELECT COUNT(*) as tong_quan FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%quần%'";
                $query_quan = mysqli_query($connect, $sql_quan);
                $count_quan = mysqli_fetch_assoc($query_quan);
                $tong_quan = $count_quan['tong_quan'];

                $sql_tui_sach = "SELECT COUNT(*) as tong_tui_sach FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%túi sách%'";
                $query_tui_sach = mysqli_query($connect, $sql_tui_sach);
                $count_tui_sach = mysqli_fetch_assoc($query_tui_sach);
                $tong_tui_sach = $count_tui_sach['tong_tui_sach'];

                $sql_vay = "SELECT COUNT(*) as tong_vay FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%váy%'";
                $query_vay = mysqli_query($connect, $sql_vay);
                $count_vay = mysqli_fetch_assoc($query_vay);
                $tong_vay = $count_vay['tong_vay'];

                $sql_giay = "SELECT COUNT(*) as tong_giay FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like 'giày'";
                $query_giay = mysqli_query($connect, $sql_giay);
                $count_giay = mysqli_fetch_assoc($query_giay);
                $tong_giay = $count_giay['tong_giay'];

                ?>
                <script>
                    var xValues = ["Áo Thun", "Áo Sơ Mi", "Áo Len", "Áo Khoác", "Quần", "Túi Xách", "Giày", "Đầm / Váy"];
                    var yValues = [<?php echo $tong_ao_thun . ',' .  $tong_so_mi . ',' . $tong_ao_len . ',' . $tong_ao_khoac . ',' . $tong_quan . ',' . $tong_tui_sach . ',' . $tong_giay . ',' . $tong_vay ?>];
                    var barColors = [
                        "#b91d47",
                        "#00aba9",
                        "#2b5797",
                        "#e8c3b9",
                        "#1e7145",
                        "#1ef45",
                        "#C539B4",
                        "#F5D5AE"
                    ];

                    new Chart("myChart", {
                        type: "pie",
                        data: {
                            labels: xValues,
                            datasets: [{
                                backgroundColor: barColors,

                                data: yValues
                            }]
                        },
                        options: {
                            title: {
                                display: true,

                                text: "Thống kê hàng hoá"
                            }
                        },

                    });
                </script>
            </div>
        </div>
    <hr style="height: 3px; background-color: white; width: 95%;text-align: center;margin: 0 auto;">
    <div class="row-content-bot">
        <div class="list-chart">
            <table class="sp-table">
                <?php
                // require_once "../dao/pdo.php";

                $items = thong_ke_hang_hoa();
                ?>
                <tr>
                    <th>LOẠI HÀNG</th>
                    <th>SỐ LƯỢNG</th>
                    <th>GIÁ CAO NHẤT</th>
                    <th>GIÁ THẤP NHẤT</th>
                    <th>GIÁ TRUNG BÌNH</th>
                </tr>

                <?php

                foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr>
                        <td><?= $ten_loai ?></td>
                        <td><?= $so_luong ?></td>

                        <td><?= currency_format($gia_max) ?></td>
                        <td><?= currency_format($gia_min) ?></td>
                        <td><?= currency_format($gia_avg) ?></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>
</div>
<!-- end bảng điểu khiển-->