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
    <link rel="stylesheet" href="../menuadminss.css">
    <link rel="stylesheet" href="../../content/Font/stylesheet.css" />
    <style>
        ul a{
        text-decoration: none;

        }
      ul li{
        transition: 0.3s;
    transition-delay: 0.5s;
      }
        .actives{
            color: white;

            /* background-color: red; */
        }
        .item::before{
          /* background-color: red; */
          background-image: linear-gradient(to bottom, #C45AB3, #DD789A);


        }
       .item i{
        color: white;

    
        }
        .item a{
        color: whitesmoke;

    
        }
        .item.actives i{
          color: white;
          transition: all 0.5s linear;

    transition-delay: 0.5s;
    /* transform: scale(1.2); */
    animation:  identifier 1s linear ;

        }
        @keyframes identifier {
          10%{
            color: black;
            transform: scale(1.2);
            transition: all 0.5s linear;
          }
          50%{
            color: antiquewhite;
            transform: scale(1.3);
            transition: all 0.5s linear;

          }
          100%{
            color: white;
            transition: all 0.5s linear;

            transform: scale(1);
          }
        }
        /* .item:active .actives{
            color: white;
            background-color: red;
        } */
        /* .item.actives:active{
            color: white;
            background-color: red;
        } */
        .item a{
             color: whitesmoke;
             display: block;
        }
        .item.actives a{
            color: white;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul id="menu-ad" >
       <li class="item "> <a href="../trangchinh"  >
                    <i class="fa-solid fa-house-user "   ></i>Bảng Điều Khiển
                    
               </a> </li>
               <li class="item" ><a href="../loaihang/ " > <i class="fa-solid fa-folder-open"></i>Loại Hàng</a> </li>
                <li class="item"><a href="../hanghoa/">
                    <i class="fa-solid fa-shirt"></i>Hàng Hoá
    
                </li></a>
    
              <li class="item  item_user ">   <a href="../user/">
                    <i class="fa-solid fa-user"></i>Người Dùng</a>
    
                </li>
              <li class="item  item_cmt">  <a href="../binhluan/"><i class="fa-solid fa-comment"></i>Bình Luận</a></li>
                <a href="donhang.html"><li class="item">
                    <i class="fa-solid fa-cart-shopping"></i>Đơn Hàng
    
                </li></a>
                <a href="baiviet.html"><li class="item">
                    <i class="fa-solid fa-pen-to-square"></i>Bài Viết
    
                </li></a>
            <a href="../../index.php"    style="display: block;"  ><img src="../../content/imgs/logo_da1_png.png" alt="" width="80%"></a>

        <!-- <div id="action" class="action"></div> -->
        </ul>
    </div>
    <!-- <script src="../../content/js/menu.js"></script> -->
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