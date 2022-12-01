<link rel="stylesheet" href="../../content/css/dangnhap-inf.css">
<style>
  .filters__button a{
    text-decoration: none;
    color:#551a8b;
  }
</style>
<div class="profile container">
      <!-- Theme button -->
      <i class="ri-moon-line change-theme" id="theme-button"></i>

      <div class="profile__container grid">
        <div class="profile__data">
         
            <div class="profile__perfil" >
              <?php
              
                if(isset($_SESSION['user']['hinh']) != ""){ ?>
                 
                 <img src="<?=$img_path?><?=$_SESSION['user']['hinh'] ?>"  style='object-fit: cover; '>
                  
                <?php }
                else{?>
              <i class="fa fa-user" aria-hidden="true" style=" font-size: 100px; border-radius:none" ></i>
                
                  

                <?php } ?>
              
              <!-- Insert your image, according to the example size of the portfolio -->
     
            </div>
          
          <h3 class="profile__profession"><?php
          if($_SESSION['user']['vai_tro']=='khachhang'){
            echo 'Khách hàng';
          }else if ($_SESSION['user']['vai_tro']=='admin'){
            echo 'Admin';

          }else if ($_SESSION['user']['vai_tro']=='nhanvien'){
            echo 'Nhân viên';
          }
          ?>
          </h3>
          <?php if($_SESSION['user']['ho_ten']){?>
          <h2 class="profile__name">Tên: <?=$_SESSION['user']['ho_ten']?></h2>
          <?php } ?>
          <h2 class="profile__name">Email: <?=$_SESSION['user']['email']?></h2>
          

          <li style="list-style: none;"><a href="../taikhoan/dangnhap.php?btn_logoff">Đăng xuất</a></li>
        </div>
        
      </div>
</div>
<div class="main">
      <section class="filters_container">
        <!--=============== FILTERS TABS ===============-->

        <ul class="filters__content">
          <li class="filters__button filter-tab-active"  ><a href="capnhat.php"  >Cập Nhật Thông Tin </a></li>
          <span>|</span>
          <li class="filters__button" ><a href="doimk.php" >Đổi Mật Khẩu </a></li>
          <span>|</span>
         <li class="filters__button" ><a href="../donhang/don_hang.php" > Đơn Hàng Của Bạn </a></li>
         <?php if (($_SESSION['user']['vai_tro']=='admin') || ($_SESSION['user']['vai_tro']=='nhanvien') ){?>
           <span>|</span>
          <li class="filters__button" ><a href="../../admin/dashboard.php">Quản Trị Website</a></li>
          <?php }?>
         
         
          
        </ul>

      </section>
      
</div>

  