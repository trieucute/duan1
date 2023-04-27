 <!-- chi tiết đơn hàng -->
 <div class="container-row-content chi_tiet_don_hang">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
        <h2 style="font-size:24px ; color: aliceblue;">Mã đơn hàng: <?php  echo $ma_don_hang?> </h2>
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

                <?php
                $id_ctdh = 1;
                $ma_don_hang = $_GET['ma_don_hang'];
                $sql_chi_tiet_don_hang = "SELECT ma_chi_tiet_don_hang, hang_hoa.ten_hh, hang_hoa.don_gia,chi_tiet_don_hang.so_luong,chi_tiet_don_hang.size FROM chi_tiet_don_hang INNER JOIN hang_hoa on chi_tiet_don_hang.ma_hh = hang_hoa.ma_hh WHERE ma_don_hang = '$ma_don_hang' ";
                $query_chi_tiet_don_hang = mysqli_query($connect, $sql_chi_tiet_don_hang);
                $upload_dir = '../../content/imgs/';

                while ($row_chi_tiet_don_hang = mysqli_fetch_array($query_chi_tiet_don_hang)) { ?>
                    <tr>
                        <td><?php echo $id_ctdh++ ?></td>
                        <td><?php echo $row_chi_tiet_don_hang['ma_chi_tiet_don_hang']; ?></td>
                        <td><?php echo $row_chi_tiet_don_hang['ten_hh']; ?></td>
                        <td><?php echo $row_chi_tiet_don_hang['so_luong']; ?></td>
                        <td><?php echo $row_chi_tiet_don_hang['size']; ?></td>
                        <td><?php echo currency_format($row_chi_tiet_don_hang['don_gia'] * $row_chi_tiet_don_hang['so_luong']); ?></td>

                    </tr>
                <?php } ?>

            </table>
            <form action="" method="POST">
                <div style="font-family: Mergeblack; font-size: 17px; margin: 10px; display: flex; flex-direction: column;">
                    <label for="trang_thai">Trạng thái</label>
                    <?php
                    $sql_trang_thai = "SELECT trang_thai FROM don_hang WHERE ma_don_hang = '$ma_don_hang'";
                    $query_trang_thai = mysqli_query($connect, $sql_trang_thai);
                    $row_trang_thai = mysqli_fetch_assoc($query_trang_thai);
                    ?>
                    <select name="trang_thai" id="" style="font-family: Mergeblack; font-size: 17px;  width: 30%;border-radius: 5px;padding: 6px 15px; margin: 10px 0;background:#C45AB3;;color: white;">
                        <option value="Chờ xác nhận" <?php echo ($row_trang_thai['trang_thai'] == 'Chờ xác nhận') ? 'selected' : '' ?>>Chờ xác nhận</option>
               
                        <option value="Đang vận chuyển" <?php echo ($row_trang_thai['trang_thai'] == 'Đang vận chuyển') ? 'selected' : '' ?>>Đang vận chuyển</option>
                        <option value="Đã giao hàng" <?php echo ($row_trang_thai['trang_thai'] == 'Đã giao hàng') ? 'selected' : '' ?>>Đã giao hàng</option>
                        <option value="Đã huỷ" <?php echo ($row_trang_thai['trang_thai'] == 'Đã huỷ') ? 'selected' : '' ?>>Đã hủy</option>
                    </select>
                </div>
                <div class="btns-submit">
                    <button type="submit" name="cap_nhat_don_hang">Cập nhật</button>
                    <button class="don_hang_show_btn" type="button"><a href="index.php">Danh sách</a> </button>

                </div>
            </form>
        </div>
    </div>
    <!-- end chi tiết đơn hàng -->