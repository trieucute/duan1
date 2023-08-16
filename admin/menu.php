<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../menuadmins.css"> -->
    <link rel="stylesheet" href="../../content/Font/MergeBlack.woff">
    <!-- <link rel="stylesheet" href="../../content/css/indexss.css"> -->
    <link rel="stylesheet" href="../menune.css">
    <link rel="stylesheet" href="../../content/Font/stylesheet.css" />
    <style>
        .menu > ul >li {
    /* padding: 10px; */
    margin-bottom: 25px !important;
}
/* .item_con > li {
    /* padding: 10px; */
    /* margin-bottom: 0px !important; */
/* } */ 
.menu {
    width: 215px !important;
    font-size: 18px !important;
}
    </style>
    <?php 
check_login();

    // if (!isset($_SESSION['user']['vai_tro']) && ($_SESSION['user']['vai_tro'] != 'admin'  || $_SESSION['user']['vai_tro'] != 'Nhân viên')) {
    //     header('Location: /404/');
    //     exit;
    // } else {?>
</head>
<body>

    <div class="menu" style="margin: 0px 0 30px 10px !important;">
  
   <div class="title-control" style="text-align:center ; color:azure;font-size:23px; margin-bottom: 20px;  font-family: Mergeblack;">Trang quản trị web</div>
        <ul id="menu-ad" >
       <li class="item "> <a href="../trangchinh"  >
                    <i class="fa-solid fa-house-user "   ></i>Bảng Điều Khiển
                    
               </a> </li>
               <li class="item" ><a href="../loaihang/ " > <i class="fa-solid fa-folder-open"></i>Loại Hàng</a> </li>
                <li class="item"><a href="../hanghoa/">
                    <i class="fa-solid fa-shirt"></i>Hàng Hoá
    
                </li></a>
    
              <li class="item  item_user ">   <a href="../user/">
                    <i class="fa-solid fa-user"></i>Người Dùng</a>   <i class="fa-solid fa-chevron-down" style="position: absolute; margin:0 5px"></i>
                <ul class="item_con">
                    <li ><a href="../user/index.php?nhanvien_list">Nhân viên</a> </li>
                    <li><a href="../user/index.php?khachhang_list">Khách hàng</a></li>

                </ul>
    
                </li>
              <li class="item  item_cmt">  <a href="../binhluan/"><i class="fa-solid fa-comment"></i>Bình Luận</a></li>
              
              <li class="item">
                <a href="../donhang/"><i class="fa-solid fa-shirt"></i> Đơn Hàng</a>  <i class="fa-solid fa-chevron-down" style="position: absolute;    margin: 0 5px;"></i>
                <ul class="item_con">
                    <li ><a href="../donhang/index.php?don_moi">Đơn mới</a> </li>
                    <li><a href="../donhang/index.php?dang_giao">Đang giao</a></li>
                    <li><a href="../donhang/index.php?da_giao">Đã giao</a></li>
             

                </ul>
            </li>
                <li class="item"><a href="../baiviet/">
                    <i class="fa-solid fa-pen-to-square"></i>Bài Viết
    
                </a></li>
            <a href="../../index.php"    style="display: block;"  ><img src="../../content/imgs/logo_ne.png" alt="" width="80%"></a>

        <!-- <div id="action" class="action"></div> -->
        </ul>
    </div>
    <script src="../menu.js"></script>
</body>
</html>

<script>
  // Add active class to the current button (highlight it)
//   var header = document.getElementById("menu-ad");
//   var btns = header.getElementsByClassName("item");
//   for (var i = 0; i < btns.length; i++) {
//     btns[i].addEventListener("click", function() {
//     var current = document.getElementsByClassName("actives");
//     current[0].className = current[0].className.replace(" actives", "");
//     this.className += " actives";

//     });
//   }
  </script>