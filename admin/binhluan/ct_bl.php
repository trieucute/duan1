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
                        
                        <td style="max-width:250px; "><?php echo $row_desc_cmt['noi_dung']; ?></td>
                        <td><?php echo $row_desc_cmt['ngay_bl']; ?></td>
                        <td><?php echo $row_desc_cmt['ho_ten']; ?></td>
                        <td>
                            <form action="" method="POST">
                                <button style="padding: 3px 8px; cursor: pointer; background-color: #c45ab3; color: aliceblue; font-family: Mergeblack; font-size: 15px; border-radius: 5px;" <?php echo ($row_desc_cmt['trang_thai'] == 'đã duyệt') ? 'type="button" > Đã duyệt' : 'name="comfirm_cmt" > Duyệt' ?><input type="text" name="ma_binh_luan" value="<?php echo $row_desc_cmt['ma_bl']; ?>" style="display: none;"> </button>
                            </form>
                        </td>
                        <td><a href="index.php?ct_bl&ma_bl=<?php echo $row_desc_cmt['ma_bl']; ?>&ma_hh_bl=<?php echo $ma_hh_bl ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="btns-submit">
              <a href="index.php">  <button class="all-cmt" value="">
                    Tổng hợp bình luận
                </button></a>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  chi tiết bình luận-->