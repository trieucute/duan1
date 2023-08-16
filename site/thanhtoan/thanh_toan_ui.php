<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <style>
      /* label,
      input::placeholder {
  
        
      } */
      hr {
        border-top: 2px solid;
      }

    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="text-center my-5" style="margin: 1rem 0 !important">THANH TOÁN</h2>
      <div class="row">
        <h3 class="mb-4 mt-4 text-dark fs-3 fw-bold">Thông tin đặt hàng</h3>
        <div class="col-6">
          <form class="row g-3" action="thanh_toan.php" method="post">
            <div class="col-md-12 p-2">
              <?php if(isset($_SESSION['user'])){
                  $kh = $_SESSION['user'];
                  $kh_info = khach_hang_select_by_id($kh['email']) ;
              } ?>
              <input
                style="background-color: #e4e4e4"
                placeholder="Họ và tên"
                type="text"
                class="form-control p-4 rounded-2"
                id="inputName"
                value="<?php if(isset($kh)) echo $kh_info['ho_ten'] ?>"  
                name="ho_ten_nguoi_nhan"

                
              />
              <div class="error" style="color: #C60000;      font-family: Mergeblack; font-weight: bold;" > <?php echo isset($error['ho_ten_nguoi_nhan']) ? $error['ho_ten_nguoi_nhan'] : ''; ?></div>
            </div>
            <div class="col-12 p-2">
              <input
                style="background-color: #e4e4e4"
                placeholder="Email"
                type="email"
                class="form-control p-4 rounded-2"
                id="inputEmail"
                value="<?php if(isset($kh['email'])) echo $kh['email'] ?>"  
                name="email"

              />
              <div class="error" style="color: #C60000;       font-family: Mergeblack; font-weight: bold;" > <?php echo isset($error['email']) ? $error['email'] : ''; ?></div>
            </div>

            <div class="col-md-12 p-2">
              <input
                style="background-color: #e4e4e4"
                placeholder="Địa chỉ"
                type="text"
                class="form-control p-4 text-dark rounded-2"
                id="inputAddress"
                value="<?php if(isset($kh)) echo $kh_info['dia_chi'] ?>"
                name="dia_chi"  

              />
              <div class="error" style="color: #C60000;       font-family: Mergeblack;font-weight: bold;" > <?php echo isset($error['dia_chi']) ? $error['dia_chi'] : ''; ?></div>
            </div>
            <div class="col-md-12 p-2">
              <input
                style="background-color: #e4e4e4"
                placeholder="Điện thoại"
                type="number"
                class="form-control p-4 text-dark rounded-2"
                id="inputPhone"
                value="<?php if(isset($kh)) echo $kh_info['SDT'] ?>"
                name="SDT"  
              minlength="10"
              />
              <div class="error" style="color: #C60000;       font-family: Mergeblack; font-weight: bold;" > <?php echo isset($error['SDT']) ? $error['SDT'] : ''; ?></div>
            </div>

            

            <div class="col-12 my-lg-5 p-1">
              <div class="col-5 d-inline-block p-1 ">
                <button
                  style="background-color: #f1f397"
                  type="submit"
                  class="btn btn-primary p-2 w-100 text-dark fw-bold border-0 rounded-2 fs-5"
                  name="dat_hang"
                  value="1"
                  onclick=""
                >
                  ĐẶT HÀNG
                </button>
              </div>
              <div class="d-inline-block col-6 text-end">
                <a href="../giohang/gio_hang.php" class="col-6 text-decoration-none text-dark fw-bold fs-5">
                  << Quay lại trang giỏ hàng</a
                >
              </div>
            </div>
          <!-- </form> -->
          <h4> <?php 
            if(strlen($message) > 0){
              echo $message;
            }
          ?></h4>
        </div>
        <div class="col-6">
          <table class="table table-borderless">

          <?php  
          
          $cart = $_SESSION['cart'];
          $tong = 0;
          $ship = 30000;

          foreach($cart as $row):
            $tong +=  $row['so_luong']* $row['don_gia'] ;
          ?>
            <tr style="color: #8d8787" class="fw-bold">
              <td class="col-product w-50">
                <div class="cart-product d-flex gap-4">
                  <img
                    src="<?=$img_path?><?=$row['hinh'] ?>"
                    alt=""
                    width="25%"
                    height="5%"
                  />

                  <div class="cart-product-info d-flex flex-column fs-6">
                    <p class="mb-1" style="color: rgba(141, 135, 135, 1)">
                      <?=$row['name'] ?>
                    </p>
                    <p class="mb-1" style="color: rgba(141, 135, 135, 1)">
                      <?= number_format($row['don_gia'],0,",",".")."đ" ?>
                    </p>
                    <p style="color: rgba(141, 135, 135, 1)">Size: <?=$row['size'] ?></p>
                  </div>
                </div>
              </td>
              <td class="w-25"><?=  $row['so_luong'] ?></td>
              <td class="w-25 text-end px-5"><?php echo number_format($row['so_luong']* $row['don_gia'],0,",",".")  ?>đ</td>
            </tr>
            <?php endforeach ?>
          </table>
          <hr />
          <table class="table table-borderless">
            <tr>
              <td class="w-50"><h5 class="fw-bold">Phí ship</h5></td>
              <td class="w-25"></td>
              <td class="w-50 text-end px-5"><p class="fw-bold">30.000đ</p></td>
            </tr>
            <tr style="border-bottom: 2px solid #c3c4c6" class="">
              <td class="w-50"><h5 class="fw-bold">Tổng tiền</h5></td>
              <td class="w-25"></td>
              <td class="w-50 text-end px-5">
                <p class="fw-bold"><?php echo number_format($tong,0,",",".")."đ" ?></p>
              </td>
            </tr>
            <tr class="">
              <td class="w-50"><h5 class="fw-bold my-3">THÀNH TIỀN</h5></td>
              <td class="w-25"></td>
              <td class="w-50 text-end px-5">
                <p class="fw-bold my-3"><?= number_format($tong + $ship,0,",",".")."đ" ?></p>
              </td>
            </tr>
          </table>
          <!-- <form class="row g-3" action="thanh_toan.php" method="post"> -->
          <div class="">
              <div
              
                class="col-md-12 form-control rounded-2 "
                style="height:200px;"
              >
                <input
                checked
                  style="margin-left: 5px"
                  name="pttt"
                  type="radio"
                  id="tt1"
                  value="Khi nhận hàng"
                />
                <label for="tt1" class="" style="      color: rgba(119, 113, 113, 1);
        font-size: 22px;
        font-weight: 700;    padding: 10px 0;">Thanh toán khi nhận hàng</label>
        <br>
                <!-- <input
                  style="margin-left: 20px"
                  name="pttt"
                  type="radio"
                  id="tt2"
                  value="Chuyển khoản"
                />
                <label for="tt2" class="" style="      color: rgba(119, 113, 113, 1);
        font-size: 22px;
        font-weight: 700;">Thanh toán chuyển khoản</label> -->
           <input
                  style="margin-left: 5px; margin-top:10px"
                  name="pttt"
                  type="radio"
                  id="tt2"
                  value="Momo"
                />
                <label for="tt2" class="" style="      color: rgba(119, 113, 113, 1);
        font-size: 22px;
        font-weight: 700;    padding: 10px 0;">Thanh toán qua Momo</label>
        <img src="../../content/imgs/momo.png" alt="" width="40px" style="margin-left:30px ;">
        <br style="margin: 10px;">

        <input
                  style="margin-left: 5px;margin-top:10px"
                  name="pttt"
                  type="radio"
                  id="tt3"
                  value="Vnpay"
                />
                <label for="tt3" class="" style="      color: rgba(119, 113, 113, 1);
        font-size: 22px;
        font-weight: 700;    padding: 10px 0;">Thanh toán qua Vnpay</label>
        <img src="../../content/imgs/vnpay.png" alt="" width="40px" style="margin-left:30px ;">

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
