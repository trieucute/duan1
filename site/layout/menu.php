<!DOCTYPE html>
<html lang="en">
<head>
  <title>Nhóm 4</title>
  <!-- <link rel="stylesheet" type="text/css" href="content/css/bootstrap.css" /> -->
  <link href="../../content/css/menu.css" rel="stylesheet" />
  <link href="../../content/css/slide.css" rel="stylesheet" />

  <link href="../../content/css/boostrap.css" rel="stylesheet" />

  <link rel="stylesheet" href="../../content/fontawesome-free-6.1.1-web/css/all.css">
<style>
.navbar-nav li:hover .drop-menu,
.navbar-nav li:hover .mega-box{
z-index: 200;
}
</style>
</head>
<body>
    <header class="header_section">
      <div id="header_sections"></div>
      <div class="container-fluid" id="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="../trangchinh/">
            
              <img src="../../content/imgs/logo1.jpg" alt="" >
            
          </a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav" style="padding-right:40px">
              <li class="nav-item " style="z-index: 200;">
                <a class="nav-link active" href="../trangchinh/">Trang chủ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../sanpham/shop.php"> sản phẩm </a>
                
                <input type="checkbox" id="showMega" hidden>
                <!-- <label for="showMega" class="mobile-item">sản phẩm</label> -->
                <div class="mega-box" style="z-index: 200;">
                <div class="content"  style="z-index: 200;">
                <div class="row">
                        <ul class="mega-links">
                        <li style="margin-left:20px ;">Danh mục</li>
                          
                <?php
                    $listdanhmuc = loai_select_all();
                    foreach ($listdanhmuc as $dm) {

      
                        echo '
                              <li><a href="../sanpham/shop.php?ma_loai=' . $dm['ma_loai'] . '" >' . $dm['ten_loai'] . '</a></li>';
                              
                            
                    }
                    ?></ul>
                </div>
                <div class="row">
                        <ul class="mega-links">
                        <li style="margin-left:5px ;margin-bottom:-10px">Giới Tính</li> 
                       
                            <form class="sex" action="../sanpham/shop.php" method="POST">
                              <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="nam" hidden/>
                              <div class="input-group-prepend">
                                <a href=""><button class="btn btn_search" type="submit" value="Nam" style="color:black;font-size:17px ">Nam</button></a>
                                
                               
                              </div>
                            </form>
                            <form class="sex" action="../sanpham/shop.php" method="POST">
                              <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="nu" hidden/>
                              <div class="input-group-prepend">
                                
                                
                                <a href=""><button class="btn btn_search" type="submit" value="Nữ"  style="color:black;font-size:17px">Nữ</button></a>
                         

                              </div>
                            </form>
                            <form class="sex" action="../sanpham/shop.php" method="POST">
                              <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="unisex" hidden/>
                              <div class="input-group-prepend">
                                
                                
                                <a href=""><button class="btn btn_search" type="submit" value="Unisex"  style="color:black;font-size:17px">Unisex</button></a>
                         

                              </div>
                            </form>
                          <!-- <li><a href="">Nam</a></li>
                          <li><a href="">Nữ</a></li>
                          <li><a href="">Unisex</a></li> -->
                        </ul>
                </div>
                <div class="row row-img">
                        <img src="../../content/imgs/menu1.webp" alt="">
                        <img src="../../content/imgs/aolen1.2.jpg" alt="">
                      </div>
                </div>
               </div>
               
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="index.php?act=gioithieu"> giới thiệu </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?act=lienhe">liên hệ</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">tin tức</a>
              </li>
            </ul>
            <div class="user_option-box">
            <form class="search" action="../sanpham/shop.php" method="POST">
              <input type="search" name="search" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" />
              <div class="input-group-prepend">
                <a href=""><button class="btn btn_search" type="submit"><i class="fas fa-search"></i></button></a>
              </div>
            </form>
                    <?php  if(isset($_SESSION['user']['email']) && ($_SESSION['user']['email'])!=""){?>
              <a href="../taikhoan/dangnhap-inf.php">
              <i class="fa fa-user" aria-hidden="true"></i>
              <?php }else{
                ?><a href="../taikhoan/dangnhap.php">LOGIN</a>
          
              <?php }?>
              <a href="">
              <i class="fa fa-cart-plus" aria-hidden="true"></i>
                
              </a>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <script type="text/javascript" src="jquery-2.1.1.min.js"></script>

    <script src="../../content/js/menufixed.js"></script>