<!--  Bình luận -->
<div class="container-row-content binh_luan_show">
        <h2>QUẢN LÝ BÌNH LUẬN</h2>
        <div class="list-chart" style="margin-top: 30px">
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
                $sql_cmt = "SELECT binh_luan.ma_bl, hang_hoa.ten_hh, hinh.hinh, binh_luan.ma_hh, binh_luan.ngay_bl FROM binh_luan LEFT JOIN hang_hoa on binh_luan.ma_hh = hang_hoa.ma_hh LEFT JOIN hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'Đại diện' GROUP BY hang_hoa.ma_hh order by binh_luan.ma_bl desc";
                $query_cmt = mysqli_query($connect, $sql_cmt);
                $upload_dir = '../../content/imgs/';

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
                            <a href="index.php?ct_bl&ma_hh_bl=<?php echo $ma_hh; ?>">Chi tiết </a>
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