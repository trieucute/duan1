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
    <script
      src="https://kit.fontawesome.com/f892788311.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../content/css/ct-san-pham.css">
    <link rel="stylesheet" href="../../content/css/shops.css">
<style>
  @font-face {
    font-family: Mergeblack;
    src: url(../MergeBlack.woff);
}

</style>
  </head>
  
  <body>
    <div class=" container product-detail my-1 pt-4 shadow-none">
      <div class="row mb-4">
        <div class="col-lg-5">
        <img
          src="<?=$img_path?><?php $hinh= sp_hinh_dai_dien($ma_hh);
extract($hinh); echo $hinh?>" 
            alt=""
            srcset=""
            class=" main-img img-fluid w-100 rounded-2"
            height="600px"
            
          />
        </div>
        <div class="small-img-group col-lg-1 p-0 d-flex flex-column gap-1">
          <img
          src="<?=$img_path?><?php $hinh= sp_hinh_dai_dien($ma_hh);
extract($hinh); echo $hinh?>" 
            alt=""
            srcset=""
            height="18%"
            width="85%"
            class="small-img-col btn p-0 rounded-0"
          />
          <img
          src="<?=$img_path?><?php $hinh=sp_hinh_mo_ta($ma_hh);extract($hinh); echo $hinh ?>"
            alt=""
            srcset=""
            height="18%"
            width="85%"
            class="small-img-col btn p-0 rounded-0 opacity-50"
          />
        </div>
        <div class="col-lg-6 ps-4">

          <h3 style="color: #5f5959;    font-family: Mergeblack;" class="fw-bold fs-2 mb-lg-4" >
            <?=$ten_hh ?>
          </h3>
          <p class="price fw-bold fs-3 mb-lg-4 text-dark" style="font-family: Mergeblack;"><?=number_format($don_gia,0,",",".")."??" ?> </p>
          <div class="pick-size d-flex align-items-center d-flex gap-4 mb-4">
            <p class="fs-4 m-0 fw-bold" style="font-family: Mergeblack;">Size:</p>
            <div class="group-btn-size d-flex gap-3" style="font-family: Mergeblack;">
             
            
            
              <input checked data-size="s" name="size" class="btn-size" id="sizes" type="radio" hidden >
              <label  data-size="s" style=" background-color: #d9db88 ; width: 40px; height:40px ;font-family: Mergeblack;"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizes">S</label>
            
              <input data-size="m" name="size" class="btn-size" id="sizem" type="radio" hidden >
              <label data-size="m" style="width: 40px; height:40px ;font-family: Mergeblack;"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" class="fs-6" for="sizem">M</label>
          
              <input data-size="l" name="size" class="btn-size" id="sizel" type="radio" hidden >
              <label data-size="l" style="width: 40px; height:40px ;font-family: Mergeblack;"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" class="fs-6" for="sizel">L</label>
          
           
              <input data-size="xl" name="size" class="btn-size" id="sizexl" type="radio" hidden >
              <label data-size="xl" style="width: 47px; height:40px ;font-family: Mergeblack;"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizexl">XL</label>
           
              <input data-size="xxl" name="size" class="btn-size" id="sizexxl" type="radio" hidden >
              <label data-size="xxl" style="width: 55px; height:40px ;font-family: Mergeblack;"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizexxl">XXL</label>
            
            
            <!-- <button
                style="width: 40px;font-family: Mergeblack;"
                class="btn btn-size btn-secondary m-0 rounded-5 fs-6"
                aria-label="s"
                data-size="s"
                id="sizes"
              >
                S
              </button>
              <button
                style="width: 40px ;font-family: Mergeblack;"
                class="btn btn-size  btn-secondary m-0 rounded-5 fs-6"
                aria-label="m"
              >
                M
              </button>
              <button
                style="width: 40px;font-family: Mergeblack;"
                class="btn btn-size  btn-secondary m-0 rounded-5 fs-6"
                aria-label="l"
              >
                L
              </button>
              <button
                style="width: 40px;font-family: Mergeblack;"
                class="btn btn-size  btn-secondary m-0 rounded-5 fs-6"
                aria-label="xl"
              >
                XL
              </button> -->
            </div>
          </div>

          <div class="quantity-container d-flex align-items-center gap-4 mb-4">
            <p class="fs-4 m-0 fw-bold" style="font-family: Mergeblack;">S??? l?????ng:</p>
            <div class="buy-amount">
              <span onclick="handleMinus()" class="btn-minus"
                ><i class="fa-solid fa-minus"></i
              ></span>
              <input class="text-center input-amount" type="number" value="1" style="font-family: Mergeblack;" />
              <span onclick="handlePlus()" class="btn-plus"
                ><i class="fa-solid fa-plus"></i
              ></span>
            </div>
          </div>

          <button class="btn-add-cart mb-4" onclick="addToCart(<?php echo $ma_hh ?>)" style="font-family: Mergeblack;">Th??m v??o gi??? h??ng</button>

          <div class="description mt-4">
            <h3 class=" fs-4 fw-bold "style="font-family: Mergeblack;">M?? t???:</h3>
            <p class=" description-cotent fs-5 lh-base ps-4">
            <?=$mo_ta ?>
            </p>
          </div>
        </div>
      </div>

      <?php 
      if($ma_loai==7){?>
<div class="size-guide row " style="margin-bottom: 60px;">
        <h3 class="fs-4 fw-bold mt-4 mb-4" style="font-family: Mergeblack;">B???ng size:</h3>
        <p>
          Form gi??y ???????c Fit size theo form v?? ti??u chu???n c???a ng?????i ch??u ??.
        </p>
        <table style="margin-left: 15px;font-size: 23px; color: black;margin-top:10px">
          <tr>
            <th>Size S</th>
            <th>Size M</th>
            <th>Size L</th>
            <th>Size XL</th>
            <th>Size XXL</th>
            
          </tr>
          <tr>
            <td>Size ch??n 36,37</td>
            <td>Size ch??n 38,39</td>
            <td>Size ch??n 40,41</td>
            <td>Size ch??n 42,43</td>
            <td>Size ch??n 44,45</td>
          </tr>
        </table>
        
      </div>
      <?php }else{?>
        <div class="size-guide row">
        <h3 class="fs-4 fw-bold mt-4 mb-4" style="font-family: Mergeblack;">B???ng size:</h3>
        <p>
          Form qu???n ??o ???????c Fit size theo form v?? ti??u chu???n, n???u b???n ??ang c??n nh???c
          gi???a hai size, n??n ch???n size l???n h??n.
        </p>
        <p>Size S: Chi???u cao t??? 1m45 - 1m58, c??n n???ng d?????i 55kg</p>
        <p>Size M: Chi???u cao t??? 1m59  - 1m68, c??n n???ng d?????i 65kg</p>
        <p>Size L: Chi???u cao t??? 1m69 - 1m77, c??n n???ng d?????i 80kg</p>
        <p>Size XL: Chi???u cao t??? 1m78-1m85, c??n n???ng d?????i 90kg.</p>
        <p>Size XXL: Chi???u cao tr??n 1m85, c??n n???ng d?????i 105kg.</p>
      </div>
    <?php }?>
      
      <?php require "binh-luan.php" ?>
    </div>
    <?php require "hang-cung-loai.php" ?>

  
   

    <script>
      const mainImg = document.querySelector(".main-img");
      const smallImg = document.querySelectorAll(".small-img-col");
      const amountElement = document.querySelector(".input-amount");
      const btn_size_all = document.querySelectorAll(".btn-size");
      const btn_label_all = document.querySelectorAll(".btn-label");
      let size = "";
      let amount=0;
      
      smallImg.forEach(item =>{
        item.addEventListener("click",function(){
          mainImg.src = item.src;
          
        })
      })


      function handlePlus() {
       amountElement.value++;
        }

    function handleMinus() {
      if (amountElement.value > 1) {
          amountElement.value--;
        }
      }

      function addToCart(id){
        
        
        btn_size_all.forEach( (item)=>{
          if(item.checked){
            size = item.getAttribute('data-size');
          }

        amount = document.querySelector('.input-amount').value;
            
        })
        $.post("../giohang/shopping-cart-xuly.php",{id: id,size: size,amount: amount},function(data){
          const kq = data.split("-");
          $('#so_luong').text(kq[0]);
          // console.log(data);

        })

       
      }
     

      btn_label_all.forEach(item =>{
        item.addEventListener("click", function(e){
          const el = e.target;
          const size =el.getAttribute("data-size");
          el.style.backgroundColor = "#d9db88";
          btn_label_all.forEach(item =>{
            if( item.getAttribute("data-size") != size){
              item.style.backgroundColor = '#edf1ff';
            }
           
          })

        })
      })
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
