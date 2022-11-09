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
            src="<?=$img_path?><?=$hinh1 ?>"
            alt=""
            srcset=""
            class=" main-img img-fluid w-100 rounded-2"
            height="600px"
            
          />
        </div>
        <div class="small-img-group col-lg-1 p-0 d-flex flex-column gap-1">
          <img
            src="<?=$img_path?><?=$hinh1 ?>"
            alt=""
            srcset=""
            height="18%"
            width="85%"
            class="small-img-col btn p-0 rounded-0"
          />
          <img
            src="<?=$img_path?><?=$hinh2 ?>"
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
            <div class="group-btn-size d-flex gap-3" style="font-family: Mergeblack;">
              <button
                style="width: 40px;font-family: Mergeblack;"
                class="btn btn-size btn-secondary m-0 rounded-5 fs-6"
                aria-label="s"
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
              </button>
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

          <button class="btn-add-cart mb-4" style="font-family: Mergeblack;">Thêm vào giỏ hàng</button>

          <div class="description mt-4">
            <h3 class=" fs-4 fw-bold "style="font-family: Mergeblack;">Mô tả:</h3>
            <p class=" description-cotent fs-5 lh-base ps-4">
            <?=$mo_ta ?>
            </p>
          </div>
        </div>
      </div>

      <div class="size-guide row">
        <h3 class="fs-4 fw-bold mt-4 mb-4" style="font-family: Mergeblack;">Bảng size:</h3>
        <p>
          Form áo được Fit size theo form và tiêu chuẩn, nếu bạn đang cân nhắc
          giữa hai size, nên chọn size lớn hơn.
        </p>
        <p>Size S: Chiều cao từ 1m50 - 1m65, cân nặng trên 55kg</p>
        <p>Size M: Chiều cao từ 1m65 - 1m72, cân nặng dưới 65kg</p>
        <p>Size L: Chiều cao từ 1m70 - 1m77, cân nặng dưới 80kg</p>
        <p>Size XL: Chiều cao trên 1m80, cân nặng dưới 98kg.</p>
      </div>
      <?php require "binh-luan.php" ?>
    </div>
    <?php require "hang-cung-loai.php" ?>

  
   

    <script>
      const mainImg = document.querySelector(".main-img");
      const smallImg = document.querySelectorAll(".small-img-col");
      const amountElement = document.querySelector(".input-amount");
      const btn_size_all = document.querySelectorAll(".btn-size");
      
      
      
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
     

      // btn_size_all.forEach(item =>{
      //   item.addEventListener("click", function(e){
      //     const el = e.target;
      //     const size =e.target.getAttribute("aria-label");
      //     el.style.backgroundColor = "#d9db88";
      //     btn_size_all.forEach(item =>{
      //       if( item.getAttribute("aria-label") != size){
      //         item.style.backgroundColor = '#edf1ff';
      //       }
           
      //     })

      //   })
      // })
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
