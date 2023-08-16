<!DOCTYPE html>
<html lang="en">

<head>
    <title>Nhóm 4</title>
    <!-- <link rel="stylesheet" type="text/css" href="content/css/bootstrap.css" /> -->
    <link href="../../content/css/slides.css" rel="stylesheet" />
    <link href="../../content/css/menu.css" rel="stylesheet" />
   
    <link href="../../content/css/respon_menu.css" rel="stylesheet" />
    <link href="../../content/css/boostrap.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../content/fontawesome-free-6.1.1-web/css/all.css">
    <style>
    .navbar-nav li:hover .drop-menu,
    .navbar-nav li:hover .mega-box {
        z-index: 200;
    }

    #so_luong {
  background-color: #F6F6C9 !important;
  top: -48%;
  right: -55%;
  width: 17px;
  height: 19px;
  font-size: 12px;
}
.navbar-expand-lg .navbar-collapse ul li a {
    font-size: 17px;
}
#input_search {
   
    transform: translate(-254px, 0%);
    width: 270px ;
}


.header_section .container-fluid {
    height: 93px ;
    background: white;
}
.navbar {
    height: 93px ;
}
.navbar-nav{
    padding-right: 6%;
}
.navbar-brands{
    display: none;
}
.nav_menu{
    display: none;
}
.checkbtn{
    display: none;

}
.nav_menu_mb{
    display: none;
}

    </style>
</head>

<body>

    <div class="header_section " >
    <div class="nav_menu_mb">


<input type="checkbox" class="check" id="check_menu_mb" hidden>
<label for="check_menu_mb" class="checkbtn"><i class="fa-solid fa-bars"></i></label>
<label for="check_menu_mb" class="nav_overplay"></label>
<nav class="nav_menu">

    <ul>
        <li class="icon_close"><label for="check_menu_mb"><i class="fa-solid fa-circle-xmark"></i></label>
        </li>
        <li class="languages">
            <a href="../taikhoan/dangnhap.php" style="color: #FAC437">Đăng nhập </a>
            <span style="color: White;">|</span>
            <a href="../taikhoan/dangky.php">Đăng ký </a>
        </li>
        <li><a href="../trangchinh/">TRANG CHỦ</a></li>
        <!-- <li><a href="">ALL SẢN PHẨM</a></li> -->
       
        <?php
                    $listdanhmuc = loai_select_all();
                    foreach ($listdanhmuc as $dm) {

      
                        echo '
                              <li><a href="../sanpham/shop.php?ma_loai=' . $dm['ma_loai'] . '" >' . $dm['ten_loai'] . '</a></li>';
                              
                            
                    }
                    ?>
        <!-- <li><a href="">KHUYẾN MÃI</a></li> -->
        <li><a href="../trangchinh?gioi_thieu">GIỚI THIỆU</a></li>
        <li><a href="../trangchinh?lien_he">LIÊN HỆ</a></li>
        <li><a href="../tintuc/tintuc.php">TIN TỨC</a></li>
      

        <li>

            <a href="" class="social"> <i class="fa-brands fa-facebook-f" style="color: black"></i></a>
            <a href="" class="social"><i class="fa-brands fa-twitter" style="color: black"></i></a>
            <a href="" class="social"><i class="fab fa-instagram"  style="color: black"></i></a>

        </li>

    </ul>
   
</nav>
<a class="navbar-brands" href="../trangchinh/" >

<img src="../../content/imgs/logo1-removebg-preview.png" alt="" style="color: black;" width="100%">

</a>
<div class="cart">
<a href="../giohang/gio_hang.php" class="cart_contains position-relative">
                        <?php 
                  $number =0;
                  
                  if(isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach($cart as $value){
                      $number += $value['so_luong'];
                    }

                  }
                ?>
                <span  id="so_luongs" style="  
    font-size: 12px; border-radius: 50% !important;     margin-top: -16px;
    margin-left: 24px;background-color: #F6F6C9 !important;" class="so_luongs d-inline-block text-center  position-absolute rounded-circle "><?=$number ?></span>
                 <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                        </a>
</div>
<div class="tk_mb">
<form class="search" action="../sanpham/shop.php" method="get">
                            <input type="search" name="search" id="input_search" class="form-control rounded"
                                placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon"
                                style="filter: drop-shadow(0px 2px 2px rgba(0, 0, 0, 0.25));" />
                            <!-- <div class="input-group-prepend">
                                <a href=""><button class="btn btn_search" type="submit"><i
                                            class="fas fa-search"></i></button></a>
                            </div> -->
                        </form>
</div>
</div>
        <div id="header_sections"></div>
      
        <div class="container-fluid" id="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="../trangchinh/" >

                    <img src="../../content/imgs/logo1-removebg-preview.png" alt="" style="color: black;" width="100%">

                </a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav" style="">
                        <li class="nav-item " style="z-index: 200;">
                            <a class="nav-link active" href="../trangchinh/">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../sanpham/shop.php"> sản phẩm </a>

                            <input type="checkbox" id="showMega" hidden>
                            <!-- <label for="showMega" class="mobile-item">sản phẩm</label> -->
                            <div class="mega-box" style="z-index: 200;">
                                <div class="content" style="z-index: 200;">
                                    <div class="row">
                                        <ul class="mega-links">
                                            <li style="margin-left:20px ;">Danh mục</li>

                                            <?php
                    $listdanhmuc = loai_select_all();
                    foreach ($listdanhmuc as $dm) {

      
                        echo '
                              <li><a href="../sanpham/shop.php?ma_loai=' . $dm['ma_loai'] . '" >' . $dm['ten_loai'] . '</a></li>';
                              
                            
                    }
                    ?>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <ul class="mega-links">
                                            <li style="margin-left:5px ;margin-bottom:-10px">Giới Tính</li>

                                            <form class="sex" action="../sanpham/shop.php" method="get">
                                                <input name="sex" id="input_search" class="form-control rounded"
                                                    placeholder="Tìm kiếm" aria-label="Search"
                                                    aria-describedby="search-addon" value="nam" hidden />
                                                <div class="input-group-prepend">
                                                    <a href=""><button class="btn btn_search" type="submit" value="Nam"
                                                            style="color:black;font-size:17px ">Nam</button></a>


                                                </div>
                                            </form>
                                            <form class="sex" action="../sanpham/shop.php" method="get">
                                                <input name="sex" id="input_search" class="form-control rounded"
                                                    placeholder="Tìm kiếm" aria-label="Search"
                                                    aria-describedby="search-addon" value="nu" hidden />
                                                <div class="input-group-prepend">


                                                    <a href=""><button class="btn btn_search" type="submit" value="Nữ"
                                                            style="color:black;font-size:17px">Nữ</button></a>


                                                </div>
                                            </form>
                                            <form class="sex" action="../sanpham/shop.php" method="get">
                                                <input name="sex" id="input_search" class="form-control rounded"
                                                    placeholder="Tìm kiếm" aria-label="Search"
                                                    aria-describedby="search-addon" value="unisex" hidden />
                                                <div class="input-group-prepend">


                                                    <a href=""><button class="btn btn_search" type="submit"
                                                            value="Unisex"
                                                            style="color:black;font-size:17px">Unisex</button></a>


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
                            <a class="nav-link" href="../trangchinh?gioi_thieu"> giới thiệu </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../trangchinh?lien_he">liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../tintuc/tintuc.php">tin tức</a>
                        </li>
                    </ul>
                    <div class="user_option-box">
                        <form class="search" action="../sanpham/shop.php" method="get">
                            <input type="search" name="search" id="input_search" class="form-control rounded"
                                placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon"
                                style="filter: drop-shadow(0px 2px 2px rgba(0, 0, 0, 0.25));" />
                            <div class="input-group-prepend">
                                <a href=""><button class="btn btn_search" type="submit"><i
                                            class="fas fa-search"></i></button></a>
                            </div>
                        </form>
                        <?php  if(isset($_SESSION['user']['email']) && ($_SESSION['user']['email'])!=""){?>
                        <a href="../taikhoan/dangnhap.php?infor" style="border-radius:100%">
                            <?php
                if(isset($_SESSION['user']['hinh'])){ ?>

                            <img src="<?=$img_path?><?=$_SESSION['user']['hinh'] ?>" width='30' height='30'
                                style='clip-path: circle(50%);    object-fit: cover;'>

                            <?php }else{?>
                            <i class="fa fa-user" aria-hidden="true"></i>



                            <?php }?>
                        </a>
                        <?php }else{
                ?><a href="../taikhoan/dangnhap.php">LOGIN</a>

                        <?php }?>
                        <a href="../giohang/gio_hang.php" class="cart_contain position-relative">
                        <?php 
                  $number =0;
                  
                  if(isset($_SESSION['cart'])) {
                    $cart = $_SESSION['cart'];
                    foreach($cart as $value){
                      $number += $value['so_luong'];
                    }

                  }
                ?>
                <span  id="so_luong" class="so_luong d-inline-block text-center  position-absolute rounded-circle "><?=$number ?></span>
                 <i class="fa fa-cart-plus" aria-hidden="true"></i>

                        </a>
                    </div>
                </div>
            </nav>
        </div>
                </div>
    <script type="text/javascript" src="jquery-2.1.1.min.js"></script>

    <script src="../../content/js/menufixed.js"></script>