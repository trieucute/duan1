    <!--  Sửa người dùng -->
    <?php require_once "encryption.php";?>
    <div class="container-row-content ">
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
                <input type="file" name="hinh_user_update" id="" class="form-control-hh" >

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Địa chỉ</label>
                <input type="text" name="dia_chi_user_update" value="<?php echo $row_edit_user['dia_chi'] ?>" class="form-control-hh"  >
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Số điện thoại</label>
                <input type="number" name="sdt_user_update" class="form-control-hh" value="<?php echo $row_edit_user['sdt'] ?>" maxlength="11">
            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="" style="width:100%">Vai trò</label>
                <div class="form-control-hh">
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'admin') ? 'checked' : '' ?> value="admin">Admin
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'Nhân viên') ? 'checked' : '' ?> value="Nhân viên">Nhân viên
                    <input type="radio" name="vai_tro_user_update" <?php echo ($row_edit_user['vai_tro'] == 'Khách hàng') ? 'checked' : '' ?> value="Khách hàng">Khách hàng
                </div>
            </div>

            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="edit_user">Sửa</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user" type="button"><a href="index.php">Danh sách</a> </button>

            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end sửa người dùng-->