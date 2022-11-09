<link rel="stylesheet" href="../../content/css/shops.css">

<hr>
<div>
  <h3 class="text-center">SẢN PHẨM CÙNG LOẠI</h3>
  <div id="sanpham" class="data ">   
     
        <?php  

        // show sp từ db
        $hh_cung_loai = sp_one($ma_loai);
        foreach ($hh_cung_loai as $hh) : 
          ?>
      
            <div class="flex-row-sp">
                <div class="row-sp">      
                    <a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$hh['ma_hh']?>" class="sp">
                    <img src="<?=$img_path?><?php echo $hh['hinh1']?>" height= "250" width="100%" >
           <img class="hover-img" src="<?=$img_path?><?php echo $hh['hinh2']?>" height= "250" width="100%" >

                    <h5><?=$hh['ten_hh']?> </h5>
                    
                    <div class="gia"> <?=number_format($hh['don_gia'],0,",",".")?>đ</div>
           
             
                  </a>
                </div>
            </div>
          <?php endforeach ?>
</div>
</div>