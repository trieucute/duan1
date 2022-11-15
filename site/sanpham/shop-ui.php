<head>
    <link rel="stylesheet" href="../../content/css/shops.css">
    <style>
       
    </style>
</head>
<div class="text-animation">
    <marquee>Quần áo bền vững<span style="color: #277BC0; font-size:33px"> được tuyển chọn</span> <span style="margin: 0 50px;"><i class="fa-solid fa-minus" style="color: #277BC0;"></i> <i class="fa-solid fa-minus" style="color: #277BC0;"></i> <i class="fa-solid fa-minus" style="color: #277BC0;"></i></span>Mua<span style="color: #277BC0; font-size:33px"> ít hơn</span> bằng cách <span style="color: #277BC0; font-size:33px">biết nhiều hơn</span></marquee>

</div>
<div class="hot-sale">
                    <h2><strong> <?php if(isset($tendm)){ print_r($tendm);}else{
                        echo "Sản phẩm";
                    } ?></strong></h2>
                </div>
                <div class="locsp">
            <div class="row-loc">
                    <span>A -> Z</span>
            </div>
            <div class="row-loc2">
                <form action="shop.php" method="POST">
             
                <select name="sex" id="">
                    <option value="default"  >Mặc định</option>
                    <option value="low_to_high" name="thap">Thấp -> cao</option>
                    <option value="high_to_low" name="cao">Cao -> thấp</option>
                    <option value="nam"   name="sex"  >Nam</option>
                    <option value="nu" name="sex">Nữ</option>
                    <option value="unisex" name="sex">Unisex</option>


                    </select>
                    <button type="submit" > Lọc</button>
                              <!-- <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="nam" hidden/>
                              <div class="input-group-prepend">
                                <a href=""><button class="btn btn_search" type="submit" value="Nam" style="color:black;font-size:17px ">Nam</button></a>
                                
                               
                              </div>
                            </form>
                            <form class="sex" action="../sanpham/shop.php" method="POST">
                              <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="nu" hidden/>
                              <div class="input-group-prepend">
                                
                                
                                <a href=""><button class="btn btn_search" type="submit" value="Nữ"  style="color:black;font-size:17px">Nữ</button></a>
                         

                              </div>
                            </form>
                            <form class="sex" action="../sanpham/shop.php" method="POST">
                              <input name="sex" id="input_search" class="form-control rounded" placeholder="Tìm kiếm" aria-label="Search" aria-describedby="search-addon" value="unisex" hidden/>
                              <div class="input-group-prepend">
                                
                                
                                <a href=""><button class="btn btn_search" type="submit" value="Unisex"  style="color:black;font-size:17px">Unisex</button></a>
                         

                              </div>
                            </form> -->
                
                </form>
            </div>
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
                    <img src="<?=$img_path?><?php echo $hh['hinh1']?>" height= "250" width="100%" >
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
<div class="box-content-fot">
    <div class="text-content-fot">Lấy những thứ tốt  <i class="fa-solid fa-circle-check"></i></div>
    <div class="img-box">
        <img src="../../content/imgs/ct-fott.png" alt="" class="img-fot1">
    <img src="../../content/imgs/ct-fott2.png" alt=""  class="img-fot2">
    </div>
    
</div>