<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Quản Lý</title>
    <link rel="stylesheet" href="Font/stylesheet.css" />
    <link rel="stylesheet" href="Menuadmin.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <style>
        .display_none {
            display: none;
        }
        svg{
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
        .cmt_active table tr{
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
</head>

<?php
if (!isset($_SESSION)) {
    session_start();
}

    // if (!isset($_SESSION['user']['vai_tro']) || $_SESSION['user']['vai_tro'] != 'admin'  || $_SESSION['user']['vai_tro'] != 'nhanvien') {
    //     header('Location: /404/');
    //     exit;
    // }

include_once "currency_format.php";
include_once "encryption.php";
include_once 'product_add.php';
include_once 'product_edit.php';
include_once 'category_add.php';
include_once 'category_edit.php';
include_once 'user_add.php';
include_once 'user_edit.php';
include_once 'desc_cmt_comfirm.php';
include_once 'news_add.php';
include_once 'news_edit.php';
include_once 'news_add_content.php';
require_once "../dao/pdo.php";
require_once "../dao/thongke.php";
?>

<body>

    <div class="menu-row">
        <div class="menu">
            <ul>
                <li class="item active menu-active bang_dieu_khien_show_btn">
                    <i class="fa-solid fa-house-user "></i>Bảng Điều Khiển

                </li>
                <li class="item item_loai_hang loai_hang_show_btn"><i class="fa-solid fa-folder-open"></i>Loại Hàng</li>
                <li class="item item_hang_hoa hang_hoa_show_btn">
                    <i class="fa-solid fa-shirt"></i>Hàng Hoá

                </li>

                <li class="item  item_user khach_hang_show_btn">
                    <i class="fa-solid fa-user"></i>Người Dùng

                </li>
                <li class="item binh_luan_show_btn"><i class="fa-solid fa-comment"></i>Bình Luận</li>
                <li class="item don_hang_show_btn">
                    <i class="fa-solid fa-cart-shopping"></i>Đơn Hàng

                </li>
                <li class="item bai_viet_show_btn">
                    <i class="fa-solid fa-pen-to-square"></i>Bài Viết

                </li>


                <div id="action" class=""></div>
                <div><a href="../index.php" ><img src="../content/imgs/logo_da1_png.png" alt="" width="90%"></a></div>
            </ul>
        </div>
    </div>
    <!--  bảng điểu khiển-->
    <div class="container-row-content chart bang_dieu_khien">
        <?php  
                $dem_user=dem_user();
                $dem_bl=dem_bl();
                $dem_dh=dem_dh();
                ?>
        <div class="row-content-top">
            <h2>BẢNG ĐIỀU KHIỂN</h2>
            <div class="order-content">
                <div class="order-row">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span><?php  foreach ($dem_dh as $dh) {
                                echo "    $dh[so_luong]";
                            };?></span>
                    <p>Đơn hàng</p>
                </div>
                <div class="order-row">
                    <i class="fa-solid fa-comment"></i>
                    <span><?php  foreach ($dem_bl as $bl) {
                                echo "    $bl[so_luong]";
                            };?></span>
                    <p>Bình luận</p>
                </div>
                <div class="order-row">
                    <i class="fa-solid fa-user"></i>
              
                    <span> <?php  foreach ($dem_user as $user) {
                                echo "    $user[so_luong]";
                            };?></span>
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
            <table   class="sp-table">
            <?php
                require_once "../dao/pdo.php";
                require_once "../dao/hanghoa.php";
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

          foreach ($items as $item){
              extract($item);
      ?>
          <tr>
              <td><?=$ten_loai?></td>
              <td><?=$so_luong?></td>
          
              <td><?=currency_format($gia_max)?></td>
              <td><?=currency_format($gia_min)?></td>
              <td><?=currency_format($gia_avg)?></td>
          </tr>
      <?php
          }
      ?>
      
  </table>
            </div>
        </div>
    </div>
    <!-- end bảng điểu khiển-->


    <!--  Loại hàng -->
    <div class="container-row-content loai_hang_show" style="<?php echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'nhanvien') ? 'display: none;' : '' ?>">
        <h2>QUẢN LÝ LOẠI HÀNG</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <!-- <th></th> -->
                    <th>STT</th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th></th>
                    <th></th>

                </tr>
                <?php
                $id_loai_hang = 1;
                $sql_category = "SELECT * FROM loai";
                $query_category = mysqli_query($connect, $sql_category);

                while ($row_category = mysqli_fetch_array($query_category)) { ?>
                    <tr>
                        <!-- <td class="checkbox-rect"><input type="checkbox" name="" id=""><span class="checkmark"></span></td> -->
                        <td scope="row"><?php echo $id_loai_hang++; ?></td>
                        <td><?php echo $row_category['ma_loai']; ?></td>
                        <td><?php echo $row_category['ten_loai']; ?></td>
                        <td><a href="dashboard.php?ma_loai=<?php echo $row_category['ma_loai']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="category_delete.php?ma_loai=<?php echo $row_category['ma_loai']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <button class="themmoi-lh loai_hang_add_btn">Thêm mới</button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button> -->
                <!-- <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý lh-->

    <!--  thêm mới Loại hàng -->
    <div class="container-row-content loai_hang_add">
        <h2>THÊM MỚI LOẠI HÀNG</h2>
        <form action="" class="form-add-lh" method="POST">
            <div class="form-group-add">
                <label for="">Tên loại</label>
                <input type="text" name="ten_loai" id="" class="form-control-add">
            </div>
            <div class="form-group-add" style="padding-top:30px ;">
                <button class="" type="submit" name="add_category">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <!-- <button class="ds-lh" type="button">Danh sách</button> -->

            </div>
        </form>
    </div>
    <!-- end thêm mới lh-->

    <!--  Sửa Loại hàng -->
    <div class="container-row-content loai_hang_edit">
        <h2>SỬA LOẠI HÀNG</h2>
        <form action="" class="form-add-lh" method="POST">
            <div class="form-group-add">
                <label for="">Tên loại</label>
                <?php
                $ma_loai = $_GET['ma_loai'];
                $sql_category_edit = "SELECT * FROM loai WHERE ma_loai = '$ma_loai'";
                $query_category_edit = mysqli_query($connect, $sql_category_edit);
                $row_category_edit = mysqli_fetch_assoc($query_category_edit);
                ?>
                <input type="text" name="ten_loai_update" value="<?php echo $row_category_edit['ten_loai'] ?>" id="" class="form-control-add">
            </div>
            <div class="form-group-add" style="padding-top:30px ;">
                <button class="themmoi-lh" type="submit" name="edit_category">Sửa</button>
                <button type="reset">Nhập lại</button>
                <!-- <button class="ds-lh" type="button">Danh sách</button> -->

            </div>
        </form>
    </div>
    <!-- end thêm sửa lh-->


    <!--   hàng hoá -->

    <div class="container-row-content nhan_vien hang_hoa_show" style="<?php echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'nhanvien') ? 'display: none;' : '' ?>">
        <h2>QUẢN LÝ HÀNG HOÁ</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <!-- <th></th> -->
                    <th>STT</th>
                    <th>Mã </th>
                    <th>Tên hàng hoá</th>
                    <th>Hình</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Lượt xem</th>
                    <th>Size S</th>
                    <th>Size M</th>
                    <th>Size L</th>
                    <th>Size XL</th>
                    <th>Size XXL</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
                $id_hh = 1;
                $sql_product = "SELECT * FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện'";
                $query_product = mysqli_query($connect, $sql_product);
                $upload_dir = '../content/imgs/';

                while ($row = mysqli_fetch_array($query_product)) { ?>
                    <tr>
                        <!-- <td class="checkbox-rect"><input type="checkbox" name="" id="" style="    top: 22px; left: 8px;"><span class="checkmark"></span></td> -->
                        <td scope="row"><?php echo $id_hh++; ?></td>
                        <td><?php echo $row['ma_hh']; ?></td>
                        <td><?php echo $row['ten_hh']; ?></td>
                        <td><img src="<?php echo $upload_dir . $row['hinh'] ?>" width="50px" height="50px" style="object-fit: cover;"></td>
                        <td><?php echo currency_format($row['don_gia']); ?></td>
                        <td><?php echo currency_format($row['giam_gia']); ?></td>
                        <td><?php echo $row['so_luot_xem']; ?></td>
                        <td><?php echo $row['size_s']; ?></td>
                        <td><?php echo $row['size_m']; ?></td>
                        <td><?php echo $row['size_l']; ?></td>
                        <td><?php echo $row['size_xl']; ?></td>
                        <td><?php echo $row['size_xxl']; ?></td>
                        <td><a href="dashboard.php?ma_hh=<?php echo $row['ma_hh']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="product_delete.php?ma_hh=<?php echo $row['ma_hh']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
                </tr>
            </table>
            <div class="btns-submit">
                <button class="themmoi-hh hang_hoa_add_btn">Thêm mới</button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý hh-->

    <!--  thêm mới hàng hoá -->
    <div class="container-row-content hang_hoa_add">
        <h2>THÊM MỚI HÀNG HOÁ</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh">
                <label for="">Loại hàng</label>
                <select name="ma_loai" id="" class="form-control-hh" style="width: 96.2%;">
                    <?php
                    $sql_category = "SELECT * FROM loai";
                    $query_category = mysqli_query($connect, $sql_category);
                    while ($row_category = mysqli_fetch_array($query_category)) { ?>
                        <option value="<?php echo $row_category['ma_loai'] ?>"><?php echo $row_category['ten_loai'] ?></option>;
                    <?php } ?>
                </select>
            </div>


            <div class="form-group-hh">
                <label for=""> Tên hàng hoá</label>
                <input type="text" name="ten_hh" class="form-control-hh">
            </div>

            <div class="form-group-hh">
                <label for="">Giá</label>
                <input type="number" name="don_gia" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Giảm giá</label>
                <input type="number" name="giam_gia" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Giới Tính</label>
                <select name="gioi_tinh" id="" class="form-control-hh" style="width: 96.2%;">
                    <option value="nam">Nam</option>
                    <option value="nu">Nữ</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>
            <div class="form-group-hh">
                <label for="" style="width:100%">Hàng đặc biệt</label>
                <div class="form-control-hh">
                    <input type="radio" name="dac_biet" id="" value="1">Đặc biệt
                    <input type="radio" name="dac_biet" id="" value="0" checked>Bình thường
                </div>
            </div>

            <div class="form-group-hh">
                <label for="">Hình đại diện </label>
                <input type="file" name="hinh1" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Hình mô tả</label>
                <input type="file" name="hinh2" id="" class="form-control-hh">

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size S</label>
                <input type="number" name="size_s" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size M</label>
                <input type="number" name="size_m" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size L</label>
                <input type="number" name="size_l" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XL</label>
                <input type="number" name="size_xl" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XXL</label>
                <input type="number" name="size_xxl" class="form-control-hh">
            </div>


            <div class="form-group-hh" style="width:100%">
                <label for="" style="width:100%">Mô tả</label>

                <textarea name="mo_ta" id="" rows="7" class="form-control-hh " style="width:95.5%"></textarea>

            </div>
            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="add_product" class="themmoi-hh">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <!-- <button class="ds-hh" type="button">Danh sách</button> -->
            </div>
        </form>
    </div>
    <!-- end thêm mới hh-->

    <!--  Sửa hàng hoá -->
    <div class="container-row-content hang_hoa_edit">
        <h2>SỬA HÀNG HOÁ</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh">
                <label for="">Loại hàng</label>
                <select name="ma_loai_update" id="" class="form-control-hh" style="width: 96.2%;">
                    <?php
                    $ma_hh = $_GET['ma_hh'];
                    $sql_edit_hh = "SELECT * FROM hang_hoa WHERE ma_hh = '$ma_hh'";
                    $query_edit_hh = mysqli_query($connect, $sql_edit_hh);
                    $row_edit_hh = mysqli_fetch_assoc($query_edit_hh);
                    $sql_category = "SELECT * FROM loai";
                    $query_category = mysqli_query($connect, $sql_category);
                    while ($row_category = mysqli_fetch_array($query_category)) { ?>
                        <option value="<?php echo $row_category['ma_loai'] ?>" <?php echo ($row_category['ma_loai'] == $row_edit_hh['ma_loai']) ? 'selected="selected"' : '' ?>><?php echo $row_category['ten_loai'] ?></option>;
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-hh">
                <label for=""> Tên hàng hoá</label>
                <input type="text" name="ten_hh_update" class="form-control-hh" value="<?php echo $row_edit_hh['ten_hh'] ?>">
            </div>

            <div class="form-group-hh">
                <label for="">Giá</label>
                <input type="number" name="don_gia_update" id="" class="form-control-hh" value="<?php echo $row_edit_hh['don_gia'] ?>">
            </div>
            <div class="form-group-hh">
                <label for="">Giảm giá</label>
                <input type="number" name="giam_gia_update" class="form-control-hh" value="<?php echo $row_edit_hh['giam_gia'] ?>">
            </div>
            <div class="form-group-hh">
                <label for="">Giới Tính</label>
                <select name="gioi_tinh_update" id="" class="form-control-hh" style="width: 96.2%;">
                    <option value="nam" <?php echo ($row_edit_hh['gioi_tinh'] == "nam") ? 'selected="selected"' : '' ?>>Nam</option>
                    <option value="nu" <?php echo ($row_edit_hh['gioi_tinh'] == "nu") ? 'selected="selected"' : '' ?>>Nữ</option>
                    <option value="unisex" <?php echo ($row_edit_hh['gioi_tinh'] == "unisex") ? 'selected="selected"' : '' ?>>Unisex</option>
                </select>
            </div>
            <div class="form-group-hh">
                <label for="" style="width:100%">Hàng đặc biệt</label>
                <div class="form-control-hh">
                    <input type="radio" name="dac_biet_update" id="" value="1" <?php echo ($row_edit_hh['dac_biet'] == "1") ? 'checked' : '' ?>>Đặc biệt
                    <input type="radio" name="dac_biet_update" id="" value="0" <?php echo ($row_edit_hh['dac_biet'] == "0") ? 'checked' : '' ?>>Bình thường
                </div>
            </div>
            <div class="form-group-hh">
                <label for="">Hình đại diện </label>
                <input type="file" name="hinh1_update" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Hình mô tả</label>
                <input type="file" name="hinh2_update" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size S</label>
                <input type="number" name="size_s_update" value="<?php echo $row_edit_hh['size_s'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size M</label>
                <input type="number" name="size_m_update" value="<?php echo $row_edit_hh['size_m'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size L</label>
                <input type="number" name="size_l_update" value="<?php echo $row_edit_hh['size_l'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XL</label>
                <input type="number" name="size_xl_update" value="<?php echo $row_edit_hh['size_xl'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XXL</label>
                <input type="number" name="size_xxl_update" value="<?php echo $row_edit_hh['size_xxl'] ?>" class="form-control-hh">
            </div>


            <div class="form-group-hh" style="width:100%">
                <label for="" style="width:100%">Mô tả</label>

                <textarea name="mo_ta_update" id="" rows="7" class="form-control-hh " style="width:95.5%" value="<?php echo $row_edit_hh['mo_ta'] ?>"></textarea>

            </div>
            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="edit_product" class="themmoi-hh">Sửa</button>
                <!-- <button class="ds-hh" type="button">Danh sách</button> -->
            </div>
        </form>
    </div>
    <!-- end sửa hh-->

    <!--  người dùng -->
    <div class="container-row-content nhan_vien khach_hang_show" style="<?php echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'nhanvien') ? 'display: none;' : '' ?>">
        <h2>QUẢN LÝ NGƯỜI DÙNG</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <th>STT</th>
                    <th>Mã khách hàng</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Hình</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Vai trò</th>

                    <th></th>
                    <th></th>
                </tr>

                <?php
                $id_user = 1;
                $sql_user = "SELECT * FROM user LEFT JOIN khachhang ON user.ma_user = khachhang.ma_user";
                $query_user = mysqli_query($connect, $sql_user);

                while ($row_user = mysqli_fetch_array($query_user)) { ?>
                    <tr>
                        <td scope="row"><?php echo $id_user++; ?></td>
                        <td><?php echo $row_user['ma_user']; ?></td>
                        <td><?php echo $row_user['ho_ten']; ?></td>
                        <td><?php echo $row_user['email']; ?></td>
                        <td><?php echo decryptthis($row_user['mat_khau'], $key); ?></td>
                        <td><img src="<?php echo $upload_dir . $row_user['hinh']; ?>" width="50px" height="50px" style="object-fit: cover;"></td>
                        <td style="max-width: 260px;padding: 0 20px;"    ><?php echo $row_user['dia_chi']; ?></td>
                        <td><?php echo $row_user['SDT']; ?></td>
                        <td><?php echo $row_user['vai_tro']; ?></td>
                        <td><a href="dashboard.php?ma_user=<?php echo $row_user['ma_user']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="user_delete.php?ma_user=<?php echo $row_user['ma_user']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <button class="themmoi-user khach_hang_add_btn">Thêm mới</button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý người dùng-->

    <!--  thêm mới người dùng -->
    <div class="container-row-content khach_hang_add">
        <h2>THÊM MỚI NGƯỜI DÙNG</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh" style="width:50%">
                <label for="">Họ tên</label>
                <input type="text" name="ho_ten_user" class="form-control-hh">
            </div>

            <div class="form-group-hh" style="width:50%">
                <label for="">Mật khẩu</label>
                <input type="password" name="mat_khau_user" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Email</label>
                <input type="email" name="email_user" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Hình ảnh </label>
                <input type="file" name="hinh_user" id="" class="form-control-hh">

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Địa chỉ</label>
                <input type="text" name="dia_chi_user" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Số điện thoại</label>
                <input type="number" name="sdt_user" class="form-control-hh" maxlength="11">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="" style="width:100%">Vai trò</label>
                <div class="form-control-hh">
                    <input type="radio" name="vai_tro_user" value="admin">Admin
                    <input type="radio" name="vai_tro_user" value="nhanvien">Nhân viên
                    <input type="radio" name="vai_tro_user" value="khachhang" checked>Khách hàng
                </div>
            </div>

            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="add_user">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <!-- <button class="ds-user" type="button">Danh sách</button> -->

            </div>
        </form>
    </div>
    <!-- end thêm mới người dùng-->

    <!--  Sửa người dùng -->
    <div class="container-row-content khach_hang_edit">
        <h2>SỬA NGƯỜI DÙNG</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">
            <?php
            $ma_user = $_GET['ma_user'];
            $sql_edit_user = "SELECT * FROM user LEFT JOIN khachhang on user.ma_user = khachhang.ma_user WHERE user.ma_user = '$ma_user'";
            $query_edit_user = mysqli_query($connect, $sql_edit_user);
            $row_edit_user = mysqli_fetch_assoc($query_edit_user);
            ?>
            <div class="form-group-hh" style="width:50%">
                <label for="">Họ tên</label>
                <input type="text" name="ho_ten_user_update" value="<?php echo $row_edit_user['ho_ten'] ?>" class="form-control-hh">
            </div>

            <div class="form-group-hh" style="width:50%">
                <label for="">Mật khẩu</label>
                <input type="password" name="mat_khau_user_update" value="<?php echo decryptthis($row_edit_user['mat_khau'], $key) ?>" id="" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Email</label>
                <input type="email" name="email_user_update" value="<?php echo $row_edit_user['email'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Hình ảnh </label>
                <input type="file" name="hinh_user_update" id="" class="form-control-hh">

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Địa chỉ</label>
                <input type="text" name="dia_chi_user_update" value="<?php echo $row_edit_user['dia_chi'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Số điện thoại</label>
                <input type="number" name="sdt_user_update" class="form-control-hh" value="<?php echo $row_edit_user['sdt'] ?>" maxlength="11">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="" style="width:100%">Vai trò</label>
                <div class="form-control-hh">
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'admin') ? 'checked' : '' ?> value="admin">Admin
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'nhanvien') ? 'checked' : '' ?> value="nhanvien">Nhân viên
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'khachhang') ? 'checked' : '' ?> value="khachhang">Khách hàng
                </div>
            </div>

            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="edit_user">Sửa</button>
                <button type="reset">Nhập lại</button>
                <!-- <button class="ds-user" type="button">Danh sách</button> -->

            </div>
        </form>
    </div>
    <!-- end sửa người dùng-->
    <!--  Bình luận -->
    <div class="container-row-content binh_luan_show">
        <h2>QUẢN LÝ BÌNH LUẬN</h2>
        <div class="list-chart" style="margin-top: 70px">
            <table class="sp-table">
                <tr>
                    <th></th>
                    <th>Mã bình luận</th>
                    <th>Tên hàng hoá</th>
                    <th>Ảnh</th>
                    <th>Số bình luận</th>
                    <th>Chưa duyệt</th>
                    <th>Mới nhất</th>
                    <th>Cũ nhất</th>

                    <th></th>
                </tr>

                <?php
                $id = 1;
                // $sql_cmt = "SELECT * FROM binh_luan GROUP BY ma_hh;";
                $sql_cmt = "SELECT binh_luan.ma_bl, hang_hoa.ten_hh, hinh.hinh, binh_luan.ma_hh, binh_luan.ngay_bl FROM binh_luan LEFT JOIN hang_hoa on binh_luan.ma_hh = hang_hoa.ma_hh LEFT JOIN hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'Đại diện' GROUP BY hang_hoa.ma_hh;";
                $query_cmt = mysqli_query($connect, $sql_cmt);
                $upload_dir = '../content/imgs/';

                while ($row_cmt = mysqli_fetch_array($query_cmt)) { ?>
                    <tr>
                        <td scope="row"><?php echo $id++; ?></td>
                        <td><?php echo $row_cmt['ma_bl']; ?></td>
                        <td><?php echo $row_cmt['ten_hh']; ?></td>
                        <td><img src="<?php echo $upload_dir . $row_cmt['hinh'] ?>" width="50px" height="50px" style="object-fit: cover;"></td>
                        <td>
                            <?php $ma_hh = $row_cmt['ma_hh'];
                            $sql_count = "SELECT ma_hh FROM binh_luan WHERE ma_hh = $ma_hh;";
                            $query_count = mysqli_query($connect, $sql_count);
                            $row_count = mysqli_num_rows($query_count);
                            echo $row_count;
                            ?>
                        </td>
                        <td>
                            <?php $ma_hh = $row_cmt['ma_hh'];
                            $sql_comfirm = "SELECT ma_hh FROM binh_luan WHERE ma_hh = $ma_hh AND trang_thai NOT LIKE '%đã duyệt%';";
                            $query_comfirm = mysqli_query($connect, $sql_comfirm);
                            $row_comfirm = mysqli_num_rows($query_comfirm);
                            echo $row_comfirm;
                            ?>
                        </td>
                        <td>
                            <?php $sql_date_new = "SELECT * FROM binh_luan WHERE ma_hh = $ma_hh ORDER BY ngay_bl DESC LIMIT 1;";
                            $query_date_new = mysqli_query($connect, $sql_date_new);
                            $row_date_new = mysqli_fetch_array($query_date_new);
                            echo $row_date_new['ngay_bl']; ?>
                        </td>
                        <td>
                            <?php $sql_date_old = "SELECT * FROM binh_luan WHERE ma_hh = $ma_hh ORDER BY ngay_bl ASC LIMIT 1;";
                            $query_date_old = mysqli_query($connect, $sql_date_old);
                            $row_date_old = mysqli_fetch_array($query_date_old);
                            echo $row_date_old['ngay_bl']; ?>
                        </td>
                        <td class="chitiet-cmt" style="color: #c45ab3; cursor: pointer">
                            <a href="dashboard.php?ma_hh_bl=<?php echo $ma_hh; ?>">Chi tiết </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <!-- <button class="themmoi-user">Thêm mới</button> -->
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý bình luận-->
    <!-- chi tiết Bình luận -->
    <div class="container-row-content chi_tiet_binh_luan">
        <h2>CHI TIẾT BÌNH LUẬN</h2>
        <?php 
           $ma_hh_bl = $_GET['ma_hh_bl'];
         $sql_desc_tenhh = "SELECT  ten_hh from hang_hoa WHERE ma_hh=$ma_hh_bl";
         $query_desc_tenhh = mysqli_query($connect, $sql_desc_tenhh);
         
         ?>
        <h2 style="font-size: 24px; color: aliceblue">
            Hàng hoá: <?php 
            // while ($row_desc_tenhh = mysqli_fetch_assoc($query_desc_tenhh)) { 
                $row_desc_tenhh = mysqli_fetch_assoc($query_desc_tenhh);
                echo $row_desc_tenhh['ten_hh'] ;
            // }
            ?>
        </h2>
        <div class="list-chart" style="margin-top: 70px">
            <table class="sp-table">
                <tr>
                    <th></th>
                    <th>Nội dung</th>
                    <th>Ngày bình luận</th>
                    <th>Người bình luận</th>
                    <th></th>
                </tr>

                <?php
             
                $sql_desc_cmt = "SELECT * FROM binh_luan LEFT OUTER JOIN khachhang on binh_luan.ma_kh = khachhang.ma_kh WHERE ma_hh = $ma_hh_bl;";
                $query_desc_cmt = mysqli_query($connect, $sql_desc_cmt);

                while ($row_desc_cmt = mysqli_fetch_array($query_desc_cmt)) { ?>
                    <tr>
                        <td class="checkbox-rect">
                            <!-- <input type="checkbox" name="" id="" style="top: 22px; left: 8px" /><span class="checkmark"></span> -->
                        </td>
                        
                        <td><?php echo $row_desc_cmt['noi_dung']; ?></td>
                        <td><?php echo $row_desc_cmt['ngay_bl']; ?></td>
                        <td><?php echo $row_desc_cmt['ho_ten']; ?></td>
                        <td>
                            <form action="" method="POST">
                                <button style="padding: 3px 8px; cursor: pointer; background-color: #c45ab3; color: aliceblue; font-family: Mergeblack; font-size: 15px; border-radius: 5px;" <?php echo ($row_desc_cmt['trang_thai'] == 'đã duyệt') ? 'type="button" > Đã duyệt' : 'name="comfirm_cmt" > Duyệt' ?><input type="text" name="ma_binh_luan" value="<?php echo $row_desc_cmt['ma_bl']; ?>" style="display: none;"> </button>
                            </form>
                        </td>
                        <td><a href="desc_cmt_delete.php?ma_bl=<?php echo $row_desc_cmt['ma_bl']; ?>&ma_hh_bl=<?php echo $ma_hh_bl ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="btns-submit">
                <!-- <button class="all-cmt">
                    <a href="dashboard.php?">Tổng hợp bình luận</a>
                </button> -->
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  chi tiết bình luận-->

    <!--  ĐƠN HÀNG -->
    <div class="container-row-content don_hang_show cmt_active" style="<?php echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'nhanvien') ? 'display: none;' : '' ?>">
        <h2>QUẢN LÝ ĐƠN HÀNG</h2>
        <div class="list-chart" style="  margin-top: 10px;">
            <table class="sp-table">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Khách hàng</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>

                    <th>Tổng tiền</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>

                <?php
                $sql_order = "SELECT * FROM don_hang LEFT OUTER JOIN khachhang on don_hang.ma_kh = khachhang.ma_kh LEFT OUTER JOIN user ON khachhang.ma_user = user.ma_user";
                $query_order = mysqli_query($connect, $sql_order);
                $upload_dir = '../content/imgs/';

                while ($row_order = mysqli_fetch_array($query_order)) { ?>
                    <tr>
                        <td><?php echo $row_order['ma_don_hang']; ?></td>
                        <td><?php echo $row_order['ho_ten']; ?></td>
                        <td><?php echo $row_order['SDT']; ?></td>
                        <td style=" max-width: 250px;padding: 0 10px  "><?php echo $row_order['dia_chi']; ?></td>
                        <td><?php echo $row_order['ngay_dat_hang']; ?>
                        <td><?php echo '100000000' #$row_order['tong_tien']; 
                            ?></td>
                        <td><?php echo $row_order['phuong_thuc_thanh_toan']; ?></td>
                        <td>
                            <form action="" method="POST">
                                <select name="" id="">
                                    <option value="" selected>
                                        <button style="padding: 3px 8px; cursor: pointer; background-color: #c45ab3; color: aliceblue; font-family: Mergeblack; font-size: 15px; border-radius: 5px;" <?php echo ($row_order['trang_thai'] == 'Đơn mới') ? 'type="button" > Đã duyệt' : 'name="comfirm_cmt" > Duyệt' ?><input type="text" name="ma_binh_luan" value="<?php echo $row_desc_cmt['ma_bl']; ?>" style="display: none;"> </button>
                                    </option>
                                    <option value="">Hoàn tất</option>
                                    <option value="">Đang xử lý</option>
                                </select>
                            </form>
                        </td>

                        <td class="chitiet-cmt" style="color: #c45ab3; cursor: pointer">
                            <a href="dashboard.php?ma_don_hang=<?php echo $row_order['ma_don_hang']; ?>">Chi tiết </a>
                        </td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <!-- bấm cập nhật khi thay đổi trạng thái và trạng thái lúc đầu sẽ là đơn mới -->
                <button>Cập nhật</button>

            </div>
        </div>
    </div>
    <!-- end  quản lý  ĐƠN HÀNG-->

    <!-- chi tiết đơn hàng -->
    <div class="container-row-content chi_tiet_don_hang">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <h2 style="font-size:24px ; color: aliceblue;">Mã đơn hàng: 1</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <th>STT</th>
                    <th>Mã chi tiết</th>
                    <th>Tên hàng hoá</th>
                    <th>Số lượng</th>
                    <th>Size</th>
                    <th>Đơn giá</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>1</td>
                    <td>Áo sơ mi denim</td>
                    <td>2</td>
                    <td>M</td>
                    <td>699.000đ</td>


                </tr>
                <tr>
                    <td>2</td>
                    <td>3</td>
                    <td>Áo thun oversize </td>
                    <td>1</td>
                    <td>S</td>
                    <td>1.000.000đ</td>


                </tr>
                <tr>
                    <td>3</td>
                    <td>2</td>
                    <td>Áo len Blanco </td>
                    <td>1</td>
                    <td>XL</td>
                    <td>300.000đ</td>


                </tr>

            </table>
            <div class="btns-submit">
                <!-- <button><a href="donhang.html">Danh sách</a> </button> -->

            </div>
        </div>
    </div>
    <!-- end chi tiết đơn hàng -->

    <!--  Bài viết-->
    <div class="container-row-content bai_viet_show">
        <h2>QUẢN LÝ BÀI VIẾT</h2>
        <div class="list-chart" style="margin-top: 20px">
            <table class="sp-table">
                <tr>
                    <!-- <th ></th> -->
                    <th></th>
                    <th>Tiêu đề bài viết</th>
                    <th>Mô tả</th>
                    <th>Ngày đăng</th>
                    <th>Tác giả</th>
                    <th>Hình</th>
                    <th>Thêm nội dung</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $id_news = 1;
                $sql_news = "SELECT * FROM tin_tuc";
                $query_news = mysqli_query($connect, $sql_news);

                while ($row_news = mysqli_fetch_array($query_news)) { ?>
                    <tr>
                        <!-- <td class="checkbox-rect"><input type="checkbox" name="" id="" style="    top: 22px; left: 8px;"><span class="checkmark"></span></td> -->
                        <td scope="row"  style=" text-align: left; padding:0 20px  "><?php echo $id_news++; ?></td>
                        <td style="text-align: left;  "><?php echo $row_news['title']; ?></td>
                        <td style=" max-width: 250px;text-align: left;  "><?php echo $row_news['mo_ta']; ?></td>
                        <td><?php echo $row_news['ngay_dang']; ?></td>
                        <td><?php echo $row_news['tac_gia']; ?></td>
                        <td><img src="<?php echo $upload_dir . $row_news['hinh_dd'] ?>" width="50px" height="50px" style="object-fit: cover;"></td>
                        <td><a href="dashboard.php?id_tin_content=<?php echo $row_news['id_tin']; ?>"> Thêm</a></td>
                        <td><a href="dashboard.php?id_tin_sua=<?php echo $row_news['id_tin']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="news_delete.php?id_tin=<?php echo $row_news['id_tin']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <button class="bai_viet_add_btn">Thêm mới</button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý Bài viết-->

    <!--  thêm mới bài viết -->
    <div class="container-row-content bai_viet_add">
        <h2>THÊM MỚI BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <div class="form-group-hh" style="width: 50%">
                <label for=""> Tiêu đề bài viết</label>
                <input name="news_title" type="text" class="form-control-hh" />
            </div>

            <div class="form-group-hh" style="width: 50%">
                <label for="">Tác giả</label>
                <input name="news_author" type="text" id="" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Mô tả</label>
                <input name="news_desc" type="text" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Hình ảnh đại diện </label>
                <input name="news_img" type="file" id="" class="form-control-hh" />
            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="add_news">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user" type="button">
                    <a href="baiviet.html">Danh sách</a>
                </button>
            </div>
        </form>
    </div>
    <!-- end thêm mới bài viết-->

    <!--  Sửa bài viết -->
    <div class="container-row-content bai_viet_edit">
        <h2>SỬA BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <?php
            $id_tin = $_GET['id_tin_sua'];
            $sql_edit_news = "SELECT * FROM tin_tuc WHERE id_tin = '$id_tin'";
            $query_edit_news = mysqli_query($connect, $sql_edit_news);
            $row_edit_news = mysqli_fetch_assoc($query_edit_news);
            ?>
            <div class="form-group-hh" style="width: 50%">
                <label for=""> Tiêu đề bài viết</label>
                <input name="news_title_update" type="text" value="<?php echo $row_edit_news['title'] ?>" class="form-control-hh" />
            </div>

            <div class="form-group-hh" style="width: 50%">
                <label for="">Tác giả</label>
                <input name="news_author_update" type="text" id="" value="<?php echo $row_edit_news['mo_ta'] ?>" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Mô tả</label>
                <input name="news_desc_update" type="text" value="<?php echo $row_edit_news['tac_gia'] ?>" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Hình ảnh đại diện </label>
                <input name="news_img_update" type="file" id="" class="form-control-hh" />
            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="edit_news">Sửa</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user" type="button">
                    <a href="baiviet.html">Danh sách</a>
                </button>
            </div>
        </form>
    </div>
    <!-- end sửa bài viết-->

    <!--  thêm mới nội dung bài viết -->
    <div class="container-row-content add_user news_content_add">
        <h2>THÊM NỘI DUNG BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <div class="form-group-hh" style="width: 50%">
                <label for="">Hình ảnh </label>
                <input type="file" id="" name="news_content_img" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 100%">
                <label for="" style="width: 100%">Nội dung </label>

                <textarea id="" rows="10" name="news_content_content" class="form-control-hh" style="width: 95.5%"></textarea>
            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="add_news_content">Thêm Nội Dung</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user" type="button">
                    <a href="baiviet.html">Danh sách</a>
                </button>
            </div>
        </form>
    </div>
    <!-- end thêm mới nội dung bài viết-->



    <!-- NO ROLE-->
    <div class="container-row-content blog_active no_have_access">
        <h2 style="font-size: 70px;">Không có quyền truy cập</h2>

    </div>


    <!-- end-->
</body>
<!-- animation chuyên trang menu -->
<script src="menu.js"></script>
<!-- end-->

<!-- chuyển layout -->
<script>
    let layout = {
        bang_dieu_khien_show_btn: "bang_dieu_khien",
        loai_hang_show_btn: "loai_hang_show",
        loai_hang_add_btn: "loai_hang_add",
        loai_hang_edit_btn: "loai_hang_edit",
        hang_hoa_show_btn: "hang_hoa_show",
        hang_hoa_add_btn: "hang_hoa_add",
        hang_hoa_edit_btn: "hang_hoa_edit",
        khach_hang_show_btn: "khach_hang_show",
        khach_hang_add_btn: "khach_hang_add",
        khach_hang_edit_btn: "khach_hang_edit",
        binh_luan_show_btn: "binh_luan_show",
        chi_tiet_binh_luan_btn: "chi_tiet_binh_luan",
        don_hang_show_btn: "don_hang_show",
        chi_tiet_don_hang: "chi_tiet_don_hang",
        bai_viet_show_btn: "bai_viet_show",
        bai_viet_add_btn: "bai_viet_add",
        bai_viet_edit_btn: "bai_viet_edit",
        news_content_add_btn: "news_content_add",
        no_have_access: "no_have_access",
    };
    let layout_key = Object.keys(layout);
    let layout_value = Object.values(layout);
    $(document).ready(function() {
        for (let i = 0; i < layout_value.length; i++) {
            $("." + layout_value[i]).addClass("display_none");
        }
        $(".bang_dieu_khien").removeClass("display_none");
    });

    $(document).ready(function() {
        if (<?php echo (isset($_GET["ma_hh"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".hang_hoa_edit").removeClass("display_none");
        } else if (<?php echo (isset($_GET["ma_user"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".khach_hang_edit").removeClass("display_none");
        } else if (<?php echo (isset($_GET["ma_loai"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".loai_hang_edit").removeClass("display_none");
        } else if (<?php echo (isset($_GET["ma_hh_bl"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".chi_tiet_binh_luan").removeClass("display_none");
        } else if (<?php echo (isset($_GET["id_tin_sua"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".bai_viet_edit").removeClass("display_none");
        } else if (<?php echo (isset($_GET["id_tin_content"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".news_content_add").removeClass("display_none");
        } else if (<?php echo (isset($_GET["ma_don_hang"])) ? "true" : "false" ?>) {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".chi_tiet_don_hang").removeClass("display_none");
        } else {
            for (let i = 0; i < layout_value.length; i++) {
                $("." + layout_value[i]).addClass("display_none");
            }
            $(".bang_dieu_khien").removeClass("display_none");
        }
        for (let a = 0; a < layout_key.length; a++) {
            $("." + layout_key[a]).click(function() {
                for (let b = 0; b < layout_value.length; b++) {
                    $("." + layout_value[b]).addClass("display_none");
                }
                $("." + layout[layout_key[a]]).removeClass("display_none");
            });
        }
    });
</script>

</html>