<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../../content/css/ct-san-pham.css">
    <link rel="stylesheet" href="../../content/css/shops.css">
    <link rel="stylesheet" href="../../content/css/home_respons.css">

<style>
  @font-face {
    font-family: Mergeblack;
    src: url(../MergeBlack.woff);
}
.img-fluid {
    max-width: 100%;
    height: auto;
}
body{
   position: relative;
}
.pick-size label {
  color: black;
    border: none;
}
  .img-order-fly{
    position: absolute;
    z-index: 9999999999;
    top: 5px;
    left:20px;
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 100%;
    border :2px solid black;
  }
  .img_product_fly {
	position: absolute;
	width: 30px !important;
	height: auto;
  border-radius: 100%;

	z-index: 999;
}
.none{
  position: relative;
}
.none::before{
  /* display: none;
   */
   content: "";
   border-left: 1px solid red;
   width: 50px;
   height: 35px;
   position: absolute;
   left: 13px;
   /* bottom: 0; */
   top: 20px;
   transform: rotate(45deg);
    /* bottom: 10px; */
}
.none::after{
  /* display: none;
   */
   content: "";
   border-left: 1px solid red;
   width: 50px;
   height: 35px;
   position: absolute;
   right: -22px;
    /* bottom: 0; */
    top: -15px;
   transform: rotate(-45deg);
    /* bottom: 10px; */
}
.no-events{
   pointer-events: none !important;
}
</style>
  </head>
  
  <body>
    <div class=" container product-detail my-1 pt-4 shadow-none">
      <div class="row mb-4  order-shop">
        <div class="col-lg-5">
        <img
          src="<?=$img_path?><?php $hinh= sp_hinh_dai_dien($ma_hh);
extract($hinh); echo $hinh?>" 
            alt=""
            srcset=""
            class=" main-img img-fluid w-100 rounded-2 img_product"
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
          <p class="price fw-bold fs-3 mb-lg-4 text-dark" style="font-family: Mergeblack;"><?=number_format($don_gia,0,",",".")."đ" ?> </p>
          <div class="pick-size d-flex align-items-center d-flex gap-4 mb-4">
            <p class="fs-4 m-0 fw-bold" style="font-family: Mergeblack;">Size:</p>
            <div class="group-btn-size d-flex gap-3" style="font-family: Mergeblack; color:black">
             
            <?php
            $arr_size = array($so_luong_size_s,$so_luong_size_m,$so_luong_size_l,$so_luong_size_xl,$so_luong_size_xxl);
            function mark_size_left($arr_size){
              for ($i=0; $i < count($arr_size) ; $i++) { 
                if($arr_size[$i] >0){
                  return $i;
                }
                
              }
             
            }
            $mark_size = mark_size_left($arr_size);
            if($so_luong_size_s>0){?>            
              <input <?php if($mark_size == 0) echo "checked" ?> data-size="s" name="size" class="btn-size" id="sizes" type="radio" hidden >
              <label  data-size="s" style=" background-color: #d9db88 ; width: 40px; height:40px ;font-family: Mergeblack;"  onclick="hh_het_size(<?php echo $so_luong_size_s ?>,this)"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizes">S</label>
              <?php   }else{?>
    
              <label   style=" background-color: #6B728E; width: 40px; height:40px ;font-family: Mergeblack; color:black" onclick="hh_het_size(<?php echo $so_luong_size_s ?>,this)"  class="   m-0 rounded-5 fs-6 text-center none " for="sizes" > <span style="line-height: 40px;">S</span> </label>
                <?php  } ?>

                <?php
            if($so_luong_size_m>0){?>            
              <input <?php if($mark_size == 1) echo "checked" ?> data-size="m" name="size" class="btn-size" id="sizem" type="radio" hidden >
              <label data-size="m" style=" background-color: rgb(237, 241, 255);width: 40px; height:40px ;font-family: Mergeblack;"  onclick="hh_het_size(<?php echo $so_luong_size_m ?>,this)"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" class="fs-6" for="sizem">M</label>   
              <?php   }else{?>
                
                <label   style=" background-color: #6B728E; width: 40px; height:40px ;font-family: Mergeblack;" onclick="hh_het_size(<?php echo $so_luong_size_m ?>,this)"  class="   m-0 rounded-5 fs-6 text-center none " for="sizes" > <span style="line-height: 40px;">M</span> </label>
                <?php  } ?>

                <?php
            if($so_luong_size_l>0){?>            
              
                <input <?php if($mark_size == 2) echo "checked" ?> data-size="l" name="size" class="btn-size" id="sizel" type="radio" hidden >
                <label data-size="l" style="background-color:rgb(237, 241, 255);width: 40px; height:40px ;font-family: Mergeblack;"  onclick="hh_het_size(<?php echo $so_luong_size_l ?>,this)"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" class="fs-6" for="sizel">L</label>
            
              <?php   }else{?>
                <label   style=" background-color: #6B728E; width: 40px; height:40px ;font-family: Mergeblack;" onclick="hh_het_size(<?php echo $so_luong_size_l ?>,this)"  class="   m-0 rounded-5 fs-6 text-center none " for="sizes" > <span style="line-height: 40px;">L</span> </label>
                <?php  } ?>
              
                <?php
            if($so_luong_size_xl>0){?>            
              
                 <input  <?php if($mark_size == 3) echo "checked" ?> data-size="xl" name="size" class="btn-size" id="sizexl" type="radio" hidden >
                 <label data-size="xl" style="background-color: rgb(237, 241, 255);width: 47px; height:40px ;font-family: Mergeblack;"  onclick="hh_het_size(<?php echo $so_luong_size_xl ?>,this)"  class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizexl">XL</label>
              
              <?php   }else{?>
                <label   style=" background-color: #6B728E; width: 40px; height:40px ;font-family: Mergeblack;" onclick="hh_het_size(<?php echo $so_luong_size_xl ?>,this)"  class="   m-0 rounded-5 fs-6 text-center none " for="sizes" > <span style="line-height: 40px;">XL</span> </label>
                <?php  } ?>
              
                <?php
            if($so_luong_size_xxl>0){?>            
              
              <input  <?php if($mark_size == 4) echo "checked" ?> data-size="xxl" name="size" class="btn-size" id="sizexxl" type="radio" hidden >
              <label data-size="xxl" style="background-color: rgb(237, 241, 255) ;width: 55px; height:40px ;font-family: Mergeblack; "   onclick="hh_het_size(<?php echo $so_luong_size_xxl ?>,this)" class=" btn btn-label btn-secondary m-0 rounded-5 fs-6" for="sizexxl">XXL</label>
                
              <?php   }else{?>
                <label   style=" background-color: #6B728E; width: 40px; height:40px ;font-family: Mergeblack;" onclick="hh_het_size(<?php echo $so_luong_size_xxl ?>,this)"  class="   m-0 rounded-5 fs-6 text-center none " for="sizes" > <span style="line-height: 40px;">XXL</span> </label>
                <?php  } ?>
            
            <!-- <script>
    const chart = document.querySelector('.none')
    document.querySelector('.hien').addEventListener("click", function(){
      chart.classList.add('.none');

    })
            </script> -->
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
            <p class="fs-4 m-0 fw-bold" style="font-family: Mergeblack;">Số lượng:</p>
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
          <div class="fly_img"></div>

          <button class="btn-add-cart mb-4 btn-order" href="javascript:void(0);" onclick="addToCart(<?php echo $ma_hh ?>)" style="font-family: Mergeblack;">Thêm vào giỏ hàng</button>

          <div class="description mt-4">
            <h3 class=" fs-4 fw-bold "style="font-family: Mergeblack;">Mô tả:</h3>
            <p class=" description-cotent fs-5 lh-base ps-4">
            <?=$mo_ta ?>
            </p>
          </div>
        </div>
      </div>

      <?php 
      if($ma_loai==7){?>
<div class="size-guide row " style="margin-bottom: 60px;">
        <h3 class="fs-4 fw-bold mt-4 mb-4" style="font-family: Mergeblack;">Bảng size:</h3>
        <p>
          Form giày được Fit size theo form và tiêu chuẩn của người châu á.
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
            <td>Size chân 36,37</td>
            <td>Size chân 38,39</td>
            <td>Size chân 40,41</td>
            <td>Size chân 42,43</td>
            <td>Size chân 44,45</td>
          </tr>
        </table>
        
      </div>
      <?php }else{?>
        <div class="size-guide row">
        <h3 class="fs-4 fw-bold mt-4 mb-4" style="font-family: Mergeblack;">Bảng size:</h3>
        <p>
          Form quần áo được Fit size theo form và tiêu chuẩn, nếu bạn đang cân nhắc
          giữa hai size, nên chọn size lớn hơn.
        </p>
        <p>Size S: Chiều cao từ 1m45 - 1m58, cân nặng dưới 55kg</p>
        <p>Size M: Chiều cao từ 1m59  - 1m68, cân nặng dưới 65kg</p>
        <p>Size L: Chiều cao từ 1m69 - 1m77, cân nặng dưới 80kg</p>
        <p>Size XL: Chiều cao từ 1m78-1m85, cân nặng dưới 90kg.</p>
        <p>Size XXL: Chiều cao trên 1m85, cân nặng dưới 105kg.</p>
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
      const btn_add_cart = document.querySelector(".btn-add-cart");
      let size = "";
      let amount=0;

      window.addEventListener("load", () => {
        btn_size_all.forEach((item) =>{
          if(item.checked){
            item.nextElementSibling.style.backgroundColor ='#d9db88';
          }

        });
    
  
     });
      
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

      function hh_het_size(so_luong_size,ob){
        if(so_luong_size == 0){
          btn_add_cart.textContent = "Hết hàng";
          btn_add_cart.classList.add('no-events');
        }else{
          btn_add_cart.textContent = "Thêm vào giỏ hàng";
          btn_add_cart.classList.remove('no-events');
        }
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
      $(document).on('click', '.btn-order', function(e) {
      e.preventDefault();
      var $parent = $(this).parents('.order-shop');
      var $img = $parent.find('.img_product').attr('src');
      var parTop = $('.fly_img').offset().top;
      var parLeft = $('.fly_img').offset().left;
      $('<img />' , {
        src: $img,
        class: 'img_product_fly',
        alt: 'fly_img'
      }).appendTo('body').css({
        top: parTop,
        left: parLeft
        })
        .animate({
          top: $('.fa-cart-plus').offset().top,
          left: $('.fa-cart-plus').offset().left,
        }, 1300, function() {
          $(this).remove();
        });
      });

    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
