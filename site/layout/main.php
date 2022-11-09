<link rel="stylesheet" href="../../content/css/shops.css">
<link rel="stylesheet" href="../../content/css/main.css">


<?php 
include "../layout/banner.php";?>
<section class="box-list">
    <div class="text-list"><h3 style="text-align: center; padding-top: 20px">DANH MỤC SẢN PHẨM</h3>
        <p class="line-list"></p>
    </div>
    <div class="tech-slideshow">
        <div class="mover">
            <a class="item" href="../sanpham/shop.php?ma_loai=1">
               <img src="../../content/imgs/dmaokhoac.avif">
                <div class="text">Giảm giá 20% áo khoác</div>
</a>
            <a class="item" href="../sanpham/shop.php?ma_loai=8">
                <img src="../../content/imgs/dmtui.jpg" class="avatar">
                <div class="text">Mua 2 thứ bất kì, tặng 1 túi chéo  </div>       
</a>
        <a class="item" href="../sanpham/shop.php?ma_loai=7">
            <img src="../../content/imgs/dmgiay.avif" >
            
            <div class="text">Giảm tiếp 30% giày </div>
</a>
        <a class="item" href="../sanpham/shop.php?ma_loai=2">
            <img src="../../content/imgs/dmaothun.avif" class="avatar">
            <div class="text">Giảm sốc áo thun chỉ còn 3xx.xxxđ</div>
</a> 
    </div>
    </div>
</section>
<?php 
include "../layout/bosuutap.php";?>
<section class="content">
          
      
<?php
   $sp= load_sp_db();
?>

<div class="hot-sale">
                    <h2>SẢN PHẨM BÁN CHẠY</h2>
                    <i class="fa-solid fa-minus" style="color: #277BC0;"></i><i class="fa-solid fa-minus" style="color: #277BC0;"></i><i class="fa-solid fa-minus" style="color: #277BC0;"></i>
                </div>
                <div id="sanpham" class="data ">   
     
     <?php 
     // chuyển đơn vị tiền tệ vnd
if (!function_exists('currency_format')) {
 function currency_format($number, $suffix = 'đ') {
     if (!empty($number)) {
         return number_format($number, 0, ',', '.') . "{$suffix}";
     }
 }
}
// show sp từ db
foreach ($sp as $hh) {  
    extract($hh);?>

   <div class="flex-row-sp">
       <div class="row-sp">      
       <a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$hh['ma_hh']?>" class="sp">
           <img src="<?=$img_path?><?php echo $hh['hinh']?>" height= "250" width="100%" >
           <img class="hover-img" src="<?=$img_path?><?php echo $hh['hinh2']?>" height= "250" width="100%" >

           <h5><?=$hh['ten_hh']?> </h5>
           
           <div class="gia"> <?=currency_format($hh['don_gia'])?></div>
           <!-- <div class="btn">
<button class="btn-order"><span>GIỎ HÀNG</span> </button>
           </div> -->
    
         </a>
       </div>
   </div>
<?php }?></div>
        </section>
        <section class="mail-content">
            <div class="text-mail">BẢN TIN</div>
            <div class="text-comt">Đăng ký để nhận thông tin</div>
            <div class="input-mail">
                <input type="text" placeholder="Nhập email">
                <button type="submit">Đăng ký</button>
            </div>
            <div class="img-right">
                <img src="../../content/imgs/Model-Man-In-Suit-Transparent.png" alt="">
                <img src="../../content/imgs/pngwing.com.png" alt="">
            </div>
        </section>