<!--  người dùng -->
<div class="container-row-content nhan_vien khach_hang_show"  style="<?php
                                                                    echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'Nhân viên') ? ' display: none;' : ''
                                                                    ?>">
        <h2>QUẢN LÝ NGƯỜI DÙNG</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <th>STT</th>
                    <th>Mã khách hàng</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <!-- <th>Mật khẩu</th> -->
                    <th>Hình</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Vai trò</th>

                    <th></th>
                    <th></th>
                </tr>

                <?php
                $id_user = 1;
                $sql_user = "SELECT * FROM user LEFT JOIN khachhang ON user.ma_user = khachhang.ma_user order by vai_tro ='admin' desc" ;
                $query_user = mysqli_query($connect, $sql_user);
                // $upload_dir = '../../content/imgs/';

                while ($row_user = mysqli_fetch_array($query_user)) { 
                    $upload_dir =$img_path . $row_user['hinh']; // đường dẫn hình

                if(is_file($upload_dir)){
                
                    $urlHinhs="<img src='".$upload_dir."'  width='70px' height='50px'   style='object-fit: cover;'>";
                }else{
                    $urlHinhs="NO PHOTO";
                } 
                    ?>
                
                    <tr>
                        <td scope="row"><?php echo $id_user++; ?></td>
                        <td><?php echo $row_user['ma_user']; ?></td>
                        <td><?php echo $row_user['ho_ten']; ?></td>
                        <td><?php echo $row_user['email']; ?></td>
             
                        <td><?=$urlHinhs?></td>
                        <td style="max-width: 260px;padding: 0 20px;"    ><?php echo $row_user['dia_chi']; ?></td>
                        <td><?php echo $row_user['SDT']; ?></td>
                        <td><?php echo $row_user['vai_tro']; ?></td>
                        <td><a href="index.php?user_sua&ma_user=<?php echo $row_user['ma_user']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="index.php?user_xoa&ma_user=<?php echo $row_user['ma_user']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>

            </table>
            <div class="btns-submit">
                <button class="themmoi-user khach_hang_add_btn" name="user_add"><a href="index.php?user_add"> Thêm mới</a></button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button>
                <button>Xoá</button> -->
            </div>
        </div>
    </div>
    <!-- end  quản lý người dùng-->