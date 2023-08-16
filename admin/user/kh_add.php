
    <!--  thêm mới người dùng -->
    <div class="container-row-content khach_hang_add">
        <h2>THÊM MỚI NGƯỜI DÙNG</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh" style="width:50%">
                <label for="">Họ tên</label>
                <input type="text" name="ho_ten_user" class="form-control-hh" value="<?php if(isset($ho_ten)) echo $ho_ten?>">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" ><?php echo isset($error['ho_ten_user']) ? $error['ho_ten_user'] : ''; ?></div>
                
            </div>

            <div class="form-group-hh" style="width:50%">
                <label for="">Mật khẩu</label>
                <input type="password" name="mat_khau_user" id="" class="form-control-hh" >
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['mat_khau_user']) ? $error['mat_khau_user'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Email</label>
                <input type="email" name="email_user" class="form-control-hh" value="<?php if(isset($email)) echo $email?>">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" ><?php echo isset($error['email_user']) ? $error['email_user'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Hình ảnh </label>
                <input type="file" name="hinh_user" id="" class="form-control-hh" value="<?php if(isset($new_file_user)) echo $new_file_user?>">

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Địa chỉ</label>
                <input type="text" name="dia_chi_user" class="form-control-hh" value="<?php if(isset($dia_chi)) echo $dia_chi?>">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" ><?php echo isset($error['dia_chi_user']) ? $error['dia_chi_user'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="">Số điện thoại</label>
                <input type="number" name="sdt_user" class="form-control-hh" maxlength="11" value="<?php if(isset($sdt)) echo $sdt?>">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['sdt_user']) ? $error['sdt_user'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width:50%">
                <label for="" style="width:100%">Vai trò</label>
                <div class="form-control-hh">
                    <input type="radio" name="vai_tro_user" value="admin">Admin
                    <input type="radio" name="vai_tro_user" value="Nhân viên">Nhân viên
                    <input type="radio" name="vai_tro_user" value="Khách hàng" checked>Khách hàng
                </div>
            </div>

            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="add_user">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user" type="button"><a href="index.php">Danh sách</a> </button>

            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end thêm mới người dùng-->

    