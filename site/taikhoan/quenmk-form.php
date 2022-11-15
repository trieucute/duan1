<link rel="stylesheet" href="../../content/css/taikhoan.css">
<div class="row_login_center" style="margin: 50px auto;">
<h2 class="">QUÊN MẬT KHẨU</h2>
<div class="row-cn">
              
              <div class="col-sm-8">
        <form action="quenmk.php" method="post">
       
             
                <input name="ma_user" class="form-control" hidden>
          
                <div class="form-group" style="margin-top: 20px ;">
                <label>Địa chỉ email</label>
                <input name="email" class="form-controls">
            </div>
            <div class="btns-login" style="margin-top: 50px ;">
                <button name="btn_forgot" class="btn-login">Tìm lại mật khẩu</button>
            </div>
        </form>
              </div>
</div>
        <div class="thongbao" style="text-align:center;font-family: Mergeblack;">
        <?php
            if(isset($thongbao)&& ($thongbao!=""))
            echo $thongbao;
        ?>
        </div>
</div>