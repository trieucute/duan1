<link rel="stylesheet" href="../../content/css/taikhoan.css">
<div class="row_login_center">
<h2 class="">Mã xác nhận</h2>
        <form action="" method="post" >
      
            <div class="row-cn">
              
                <div class="col-sm-8">
                <div class="form-group">
                <label>Email</label>

                <input name="email" class="form-controls" value=""  type="email"  >
                <div class="error" style="color: #C60000;   font-family: 'Signika Negative'; font-weight: bold;margin: 10px 0" > <?php echo isset($error['email']) ? $error['email'] : ''; ?></div>

            </div>
           
            <div class="form-group" style="margin-top: 10px ;">
                <label>Nhập mã xác nhận</label>
                <input name="mk_1l" type="password" class="form-controls" minlength="8">
                <div class="error" style="color: #C60000;   font-family: 'Signika Negative'; font-weight: bold;margin: 10px 0" > <?php echo isset($error['mk_1l']) ? $error['mk_1l'] : ''; ?></div>

            </div>
            <!-- <div class="form-group"style="margin-top: 10px ;">
                <label>Xác nhận mật khẩu mới</label>
                <input name="mat_khau3" type="password" class="form-controls" minlength="6">
            </div>
                     -->
                    <div class="btns-login" style="margin-top: 30px ;">
                    <button name="btn_acp" class="btn-login" type="submit">Xác nhận</button>
                    </div>
                    <!--Giá trị mặc định-->
                    <input name="vai_tro" value="<?=$vai_tro?>" type="hidden">
                    <input name="ma_user" value="<?=$_SESSION['user']['ma_user']?>" hidden >
           
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