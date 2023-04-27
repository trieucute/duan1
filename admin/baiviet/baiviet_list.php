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
                    <!-- <th>Thêm nội dung</th> -->
                    <th></th>
                    <th></th>
                </tr>

                <?php
                $id_news = 1;
                $sql_news = "SELECT * FROM tin_tuc";
                $query_news = mysqli_query($connect, $sql_news);
                // $upload_dir = '../../content/imgs/';

                while ($row_news = mysqli_fetch_array($query_news)) {
                $upload_dir =$img_path . $row_news['hinh_dd']; // đường dẫn hình

                if(is_file($upload_dir)){
                
                    $urlHinhs="<img src='".$upload_dir."'  width='70px' height='50px'   style='object-fit: cover;'>";
                }else{
                    $urlHinhs="NO PHOTO";
                } 
?>
                    <tr>
                        <!-- <td class="checkbox-rect"><input type="checkbox" name="" id="" style="    top: 22px; left: 8px;"><span class="checkmark"></span></td> -->
                        <td scope="row"><?php echo $id_news++; ?></td>
                        <td style=" max-width: 200px;text-align: left; padding:0 15px "><?php echo $row_news['title']; ?></td>
                        <td style=" max-width: 300px;text-align: left; padding:0 15px "><?php echo $row_news['mo_ta']; ?></td>
                        <td><?php echo $row_news['ngay_dang']; ?></td>
                        <td><?php echo $row_news['tac_gia']; ?></td>
                        <td><?= $urlHinhs?></td>
                        <td><a href="index.php?ct_baiviet&id_tin=<?php echo $row_news['id_tin']; ?>"> Chi Tiết </a></td>
                        <td><a href="index.php?baiviet_sua&id_tin=<?php echo $row_news['id_tin']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="index.php?baiviet_xoa&id_tin=<?php echo $row_news['id_tin']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <button class="bai_viet_add_btn" name="'baiviet_add"><a href="index.php?baiviet_add">Thêm mới</a> </button>
                <!-- <button><a href="index.php">Danh sách</a> </button> -->
                <!-- <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý Bài viết-->
