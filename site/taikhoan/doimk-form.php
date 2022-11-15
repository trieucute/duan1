<link rel="stylesheet" href="../../content/css/taikhoan.css">
<div class="row_login_center">
<h2 class="">ĐỔI MẬT KHẨU</h2>
        <form action="doimk.php" method="post" >
            <div class="row-cn">
              
                <div class="col-sm-8">
                <div class="form-group">
                
                <input name="email" class="form-controls" value="<?= $_SESSION["user"]['email']?>"  hidden>
            </div>
                <div class="form-group" style="margin-top: 10px ;">
                <label>Mật khẩu cũ</label>
                <input name="mat_khau" type="password" class="form-controls">
            </div>
            <div class="form-group" style="margin-top: 10px ;">
                <label>Mật khẩu mới</label>
                <input name="mat_khau2" type="password" class="form-controls" minlength="8">
            </div>
            <div class="form-group"style="margin-top: 10px ;">
                <label>Xác nhận mật khẩu mới</label>
                <input name="mat_khau3" type="password" class="form-controls" minlength="8">
            </div>
                    
                    <div class="btns-login" style="margin-top: 30px ;">
                    <button name="btn_change" class="btn-login">Đổi mật khẩu</button>
                    </div>
                    <!--Giá trị mặc định-->
                    <input name="vai_tro" value="<?=$vai_tro?>" type="hidden">
                    <input name="ma_user" value="<?=$_SESSION["user"]['ma_user']?>" hidden >
           
                    <input name="hinh" value="<?=$hinh?>" type="hidden">
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