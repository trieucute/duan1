<?php
include_once "currency_format.php";
require_once "../../dao/pdo.php";
require_once "../../dao/thongke.php";
require_once "../../dao/hanghoa.php"; ?>

<head>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

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
            <!-- <canvas id="myChart" style="width:100%;max-width:900px; text-align: center;margin: 0 auto; "></canvas> -->
            <?php
            // $sql_ao_khoac = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo khoác%'";
            // $query_ao_khoac = mysqli_query($conn, $sql_ao_khoac);
            // $count_ao_khoac = mysqli_num_rows($query_ao_khoac);

            // $sql_ao_thun = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo thun%'";
            // $query_ao_thun = mysqli_query($conn, $sql_ao_thun);
            // $count_ao_thun = mysqli_num_rows($query_ao_thun);

            // $sql_ao_len = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%áo len%'";
            // $query_ao_len = mysqli_query($conn, $sql_ao_len);
            // $count_ao_len = mysqli_num_rows($query_ao_len);

            // $sql_so_mi = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%sơ mi%'";
            // $query_so_mi = mysqli_query($conn, $sql_so_mi);
            // $count_so_mi = mysqli_num_rows($query_so_mi);

            // $sql_quan = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%quần%'";
            // $query_quan = mysqli_query($conn, $sql_quan);
            // $count_quan = mysqli_num_rows($query_quan);

            // $sql_tui_sach = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%túi sách%'";
            // $query_tui_sach = mysqli_query($conn, $sql_tui_sach);
            // $count_tui_sach = mysqli_num_rows($query_tui_sach);

            // $sql_vay = "SELECT * FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like '%váy%'";
            // $query_vay = mysqli_query($conn, $sql_vay);
            // $count_vay = mysqli_num_rows($query_vay);

            // $sql_giay = "SELECT ten_hh FROM hang_hoa JOIN loai ON hang_hoa.ma_loai = loai.ma_loai WHERE loai.ten_loai like 'giày'";
            // $query_giay = mysqli_query($conn, $sql_giay);
            // $count_giay = mysqli_num_rows($query_giay);

            ?>

            <!-- <link rel="stylesheet" href="../../content/css/hanghoaadminn.css"> -->


            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdnjs.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
            </head>

            <div class="add-text">
                <h2>THỐNG KÊ ĐƠN HÀNG <span></span></h2>
            </div>
            <div id="myfirstchart" style="height: 250px;"></div>
            <?php

            $items = thong_ke_hang_hoa();
            ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    thongke();

                  var char=  new Morris.Line({
                        // ID of the element in which to draw the chart.
                        element: 'myfirstchart',
                        // Chart data records -- each entry in this array corresponds to a point on
                        // the chart.
                        // data: [{
                        //         year: '2021-10',
                        //         order: 5,
                        //         sales: 100000,
                        //         quantity: 20
                        //     },

                        //     // { year: '2009', value: 10 },
                        //     // { year: '2010', value: 5 },
                        //     // { year: '2011', value: 5 },
                        //     // { year: '2012', value: 20 }
                        // ],
                        // The name of the data record attribute that contains x-values.
                        xkey: 'date',
                        // A list of names of data record attributes that contain y-values.
                        ykeys: ['date','order', 'sales'],
                        // Labels for the ykeys -- will be displayed when you hover over the
                        // chart.
                        labels: ['Đơn hàng', 'Doanh thu', ]
                    });
                    function thongke(){
                        var text='365 ngày qua';
                 
                        $.ajax({
                            url:"thongke.php",
                            method:"POST",
                            dataType:"JSON",
                            success:function(data){
                                char.setData(data);
                                $('#text-date').text(text);
                            }
                        });
                    }
                });
            </script>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <?php

            $items = thong_ke_hang_hoa();
            ?>
            <script type="text/javascript">
                google.charts.load("current", {
                    packages: ["corechart"]
                });
                google.charts.setOnLoadCallback(drawChart);
                google.charts.addClass("back");

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Loại', 'Số Lượng'],
                        <?php
                        foreach ($items as $item) {
                            echo "['$item[ten_loai]',     $item[so_luong]],";
                        }
                        ?>
                    ]);

                    var options = {
                        title: 'TỶ LỆ HÀNG HÓA',
                        is3D: true,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>

            <div class="add-text">
                <h2>BIỂU ĐỒ THỐNG KÊ</h2>
            </div>

            <div id="piechart_3d" style="width: 100%; height: 500px; text-align:center"></div>
            <div class="form-group" style=" text-align: left;">
                <!-- <button type="submit" style=" text-align: left;"><a href="index.php?list"   >THỐNG KÊ</a></button> -->
            </div>


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