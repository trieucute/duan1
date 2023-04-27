<link rel="stylesheet" href="../../content/css/taikhoan.css">
<div class="row_login_center">
<h2 class="">CẬP NHẬT THÔNG TIN</h2>
        <form action="capnhat.php" method="post" enctype="multipart/form-data">
            <div class="row-cn">
              
                <div class="col-sm-8">
                <div class="form-group">
                        <label>Email</label>
                        <input name="email" class="form-controls" value="<?=$email?>" readonly disabled>
                    </div>
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input name="ho_ten" class="form-controls" value="<?=$ho_ten?>">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input name="dia_chi" class="form-controls" value="<?=$dia_chi?>">
                    </div><div class="form-group">
                        <label>SĐT</label>
                        <input name="SDT" class="form-controls" value="<?=$SDT?>" type="tel" >
                    </div>
                    <div class="form-group">
                        <label>Hình</label>
                        <input name="up_hinh" class="form-controls" type="file" >
                    </div>
                    
                    <div class="btns-login">
                    <input name="ma_user" class="form-controls" type="" value="<?=$ma_user?>" hidden>
                    <input name="mat_khau" class="form-controls" type="" value="<?=$mat_khau?>" hidden>
                    <input name="vai_tro" class="form-controls" type="" value="<?=$vai_tro?>" hidden>
                    <input name="hinh" class="form-controls" type="" value="<?=$hinh?>" hidden>

                        <button name="btn_update" class="btn-login" type="submit">Cập nhật</button>
                        <button type="reset" class="btn-login">Nhập lại</button>
                    </div>
                    <!--Giá trị mặc định-->
                    
                </div>
            </div>

        </form>
        <div class="thongbao" style="text-align:center;font-family: Mergeblack;">
        <?php
            if(isset($thongbao)&& ($thongbao!=""))
            echo $thongbao;
        ?>
        </div>
</div>