<!--  ĐƠN HÀNG -->
<style>
    .in{
        color: #F5D5AE;cursor: pointer;
    }
.in:hover{
    color: #EF9A53;
}
</style>
<div class="container-row-content don_hang_show" style="<?php echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'nhan_vien') ? 'display: none;' : '' ?>">
        <h2>QUẢN LÝ ĐƠN HÀNG</h2>
        <div class="list-chart" style="  margin-top: 10px;">
            <table class="sp-table">
                <tr>
                    <th>Mã đơn </th>
                    <th>Tên người nhận</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt</th>

                    <th>Tổng tiền</th>
                    <th>Thanh toán</th>
                    <th>Trạng thái</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $sql_order = "SELECT * FROM don_hang where trang_thai='Chờ xác nhận'   order by  ma_don_hang desc";
                $query_order = mysqli_query($connect, $sql_order);
                $upload_dir = '../../content/imgs/';

                while ($row_order = mysqli_fetch_array($query_order)) { ?>
                    <tr>
                        <td><?php echo $row_order['ma_don_hang']; ?></td>
                        <td><?php echo $row_order['ho_ten_nguoi_nhan']; ?></td>
                        <td  style=" max-width: 140px;"><?php echo $row_order['SDT']; ?></td>
                        <td style=" max-width: 250px;text-align: left; padding:0 15px "><?php echo $row_order['dia_chi']; ?></td>
                        <td><?php echo $row_order['ngay_dat_hang']; ?>
                        <td  style=" max-width: 150px; padding:0 15px ; color:#FFADBC"><?php echo currency_format($row_order['tong_tien']);
                            ?></td>
                        <td><?php echo $row_order['phuong_thuc_thanh_toan']; ?></td>
                        <td><?php echo $row_order['trang_thai']; ?></td>

                        <td class="chitiet-cmt" style="color: #c45ab3; cursor: pointer">
                            <a href="index.php?ct_dh&ma_don_hang=<?php echo $row_order['ma_don_hang']; ?>"   style="  padding:0 10px ;">XEM </a>
                        </td>
                        <td style="" class="in">In hoá đơn</td>
                    </tr>
                <?php } ?>

            </table>

        </div>
    </div>
    <!-- end  quản lý  ĐƠN HÀNG-->