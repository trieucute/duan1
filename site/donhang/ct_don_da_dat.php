<?php 
// echo "<pre>";
// print_r($ct_don_da_dat);

// echo "<pre>";
// print_r($ct_don_hang);

// echo "<pre>";
// print_r($hh );

?>
 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
       rel="stylesheet"
       integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
       crossorigin="anonymous"
     />
     <link rel="stylesheet" href="../../content/css/shops.css">
     <script
       src="https://kit.fontawesome.com/f892788311.js"
       crossorigin="anonymous"
     ></script>
 
     <title>Document</title>
     <style>
       * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
       }
 
       th,
       td,
       .thanh_tien {
         width: 20% !important;
       }
       .col-product {
         width: 50% !important;
       }
 
       .cart-product-info p {
         margin-bottom: 10px;
       }
       .table-borderless tr:last-child td a{
        font-size: 20px;
       }
     </style>
   </head>
   <body class="container">
     <h3 class="text-center my-3 font-weight-bold fs-1 " style="    margin: 0.5rem !important;  font-size: 28px  !important;">ĐƠN HÀNG CỦA BẠN</h3>
     <h5 class="text-center fw-bold">MÃ ĐƠN HÀNG:<?=$ma_dh ?></h5>
     <div>
       <table class="table table-borderless">
         <thead >
           <tr>
             <th class="col-product text-dark fs-4  "><h4 class="my-5">Sản phẩm</h4></th>
             <th style="transform: translateX(-10%)" class="text-dark fs-4 "><h4 class="my-5">Số lượng</h4></th>
             <th  class=" text-end text-dark fs-4 col-price "><h4 class="my-5">Tổng tiền</h4></th>
           </tr>
         </thead>
 
         <tbody>
          <?php
             $total =0;
           foreach($ct_don_da_dat as $row) : 
       
            
            $price_product = $row['so_luong'] * $row['don_gia'];
            $total += $price_product; 

            ?>

           <tr>
             <td class="col-product">
               <div class="cart-product d-flex gap-4">
                 <img
                   src="<?=$img_path?><?=$row['hinh']?>"
                   alt=""
                   width="20%"
                   height="10%"
                 />
 
                 <div class="cart-product-info d-flex flex-column fs-5"><a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$row['id']?>" style="text-decoration: none;" >
                   <p style="color: rgba(141, 135, 135, 1);"><?=$row['name'] ?></p>
                   <p style="color: rgba(141, 135, 135, 1);" ><?=number_format($row['don_gia'],0,",",".")."đ" ?></p>
                   <p style="color: rgba(141, 135, 135, 1);" >Size: <?=$row['size'] ?></p></a>
                 </div>
               </div>
             </td>
             <td style="color: rgba(141, 135, 135, 1);" class="fs-5 "><?=$row['so_luong'] ?></td>
             <td style="color: rgba(141, 135, 135, 1);" class="text-end fs-5 col-price"><?=number_format($price_product,0,",",".")."đ" ?></td>
           </tr>
           <?php endforeach ?>
               
           <tr class="">
             <td></td>
             <td colspan="3">
              <h5 class="text-end my-5 fw-bold">Phí vận chuyển: 30.000đ</h5>
               <h4 class="text-end my-5 fw-bold">Tổng Tiền: <?=number_format($total+ 30000,0,",",".")."đ" ?></h4>
      
               <?php 
               
                $huy = don_hang_huy($ma_dh);
                foreach ($huy as $h){
                  if(isset($h['trang_thai'] ) == 'Chờ xác nhận'){ 
                  // var_dump($h['trang_thai']);
                  // print_r( $h['trang_thai']);
                
                // <!-- var_dump($huy['trang_thai']);
                // print_r( $huy)
             
?>
               
               
               <form action="" method="post">
                <input type="" name="ma_dh" value="<?= $ma_dh?>" hidden>
               <h5 class="text-end my-5 fw-bold" ><a href="../donhang/don_hang.php?huy_don_hang&ma_dh=<?=$ma_dh?>" style="color: black; padding:7px 20px;border-radius:5px;    background-color: #F1F397; width: 220px;">Huỷ đơn hàng</a></h5>

               </form>
             
               <?php
                  }
             }
              ?>
                <h5 class="thongbao text-end my-5 fw-bold" style="color: red;    font-family: Mergeblack; ">
            <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></h5>
             
             </td>
           </tr>
           <tr>
            <td><a href="../donhang/don_hang.php" style="text-decoration: none; color:black;"> << Quay lại</a></td>
           </tr>
 
         </tbody>
       </table>
     </div>
     <div class="box-content-fot">
     <div class="text-content-fot">Lấy những thứ tốt  <i class="fa-solid fa-circle-check"></i></div>
     <div class="img-box">
         <img src="../../content/imgs/ct-fott.png" alt="" class="img-fot1">
     <img src="../../content/imgs/ct-fott2.png" alt=""  class="img-fot2">
     </div>
     
 </div>
 
     <script
       src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
       crossorigin="anonymous"
     ></script>
   </body>
 </html>