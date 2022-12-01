
<?php if(!isset($_SESSION['cart']) || sizeof($_SESSION['cart']) <= 0 ) {
  
 echo' <p class="text-center">Bạn chưa có sản phẩm nào trong giỏ hàng</p>';
}else { ?>

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

      td input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.buy-amount {
  font-weight: 700;
  padding: 0;
  width: 50px;
  height: 100%;
  border: none;
  background-color: rgba(217, 217, 217, 1);
}

    
    </style>
  </head>
  <body class="container">
    <h3 class="text-center my-3 font-weight-bold fs-1 ">GIỎ HÀNG CỦA BẠN</h3>
    <div>
      <table class="table table-borderless">
        <thead >
          <tr>
            <th class="col-product text-dark fs-4  "><h4 class="my-5">Sản phẩm</h4></th>
            <th style="transform: translateX(-10%)" class="text-dark fs-4 "><h4 class="my-5">Số lượng</h4></th>
            <th  class=" text-end text-dark fs-4  "><h4 class="my-5">Tổng tiền</h4></th>
          </tr>
        </thead>

        <tbody>
          <?php 
            $cart = $_SESSION['cart'];
            $total = 0;
            $i = 0;
            foreach($cart as $row) {
              $price_product = 0;
              $total += $row['don_gia'] * $row['so_luong'];
              $price_product = $row['don_gia'] * $row['so_luong'];
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

                <div class="cart-product-info d-flex flex-column fs-5">
                  <p style="color: rgba(141, 135, 135, 1);"><?=$row['name'] ?></p>
                  <p style="color: rgba(141, 135, 135, 1);" ><?=number_format($row['don_gia'],0,",",".")."đ" ?></p>
                  <p style="color: rgba(141, 135, 135, 1);" >Size: <?=$row['size'] ?></p>
                </div>
              </div>
            </td>
            <td class="px-0"> <button onclick="handleMinus(<?php echo $i.','.$row['id'].',\''.$row['size'].'\'' ?>)"  class="border-0 bg-white ">-</button> <input style="color: rgba(141, 135, 135, 1) ;" class="buy-amount text-center bg-white" type="number" value="<?=$row['so_luong'] ?>"> <button onclick="handlePlus(<?php echo $i.','.$row['id'].',\''.$row['size'].'\'' ?>)"  class="border-0 bg-white">+</button></td>
            <td style="color: rgba(141, 135, 135, 1);" class="text-end fs-5 col-price"><?=number_format($price_product,0,",",".")."đ" ?></td>
              <td class="text-end"> <a href="gio_hang.php?del_item=<?=$i ?>" class="text-dark" ><i style="padding-top: 8px;" class="fa-solid fa-trash"></i></a> </td>
          </tr>
              
          <?php $i++; } ?>
          <tr class="">
            <td></td>
            <td colspan="3">
        
              <h4 class="text-end my-5 fw-bold">Thành Tiền: <span id="thanh_tien"> <?=number_format($total,0,",",".")."đ" ?></span></h4>
            </td>
          </tr>

          <tr class="">
            <td></td>
            <td colspan="2" class="text-end "><a href="../sanpham/shop.php" class="text-decoration-none"><h5 style="transform: translateY(50%);"><< Tiếp Tục Mua Hàng</h5></a></td>
            <td colspan="" class="text-end">
              <a   href="../thanhtoan/thanh_toan.php" class="text-decoration-none">  <p style="background-color: #F1F397 ; width:220px" class="text-center fs-4 fw-bold p-2 rounded-4 text-dark "> THANH TOÁN </p></a>
            </td>
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
    <script>

const amountElement = document.querySelectorAll(".buy-amount");
const priceElement = document.querySelectorAll('.col-price');


function handlePlus(number,id,size) {
 amountElement[number].value++;
 $.post("../giohang/shopping-cart-xuly.php",{id: id,size: size,amount: 1},function(data){
   const kq = data.split("-");
   $('#so_luong').text(kq[0]);
   
   priceElement[number].textContent = new Intl.NumberFormat('de-DE').format(kq[1]) + "đ";
   $('#thanh_tien').text(new Intl.NumberFormat('de-DE').format(kq[2]) + "đ");
   


  })
  }

function handleMinus(number,id,size) {
if (amountElement[number].value > 1) {
    amountElement[number].value--;
    $.post("../giohang/shopping-cart-xuly.php",{id: id,size: size,amount: -1},function(data){
      const kq = data.split("-");
   $('#so_luong').text(kq[0]);
   
   priceElement[number].textContent = new Intl.NumberFormat('de-DE').format(kq[1]) + "đ";
   $('#thanh_tien').text(new Intl.NumberFormat('de-DE').format(kq[2]) + "đ");
  })
  }
}
</script>
  </body>
</html>
<?php } ?>