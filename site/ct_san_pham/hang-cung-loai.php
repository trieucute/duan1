<head>
<link rel="stylesheet" href="../../content/css/shops.css">

</head>
<hr>
<div >
  <h3 class="text-center">SẢN PHẨM CÙNG LOẠI</h3>

  <div id="sanpham" class="data ">   
     
        <?php  

        // show sp từ db
        $hh_cung_loai = sp_one_cung_loai($ma_loai,$ma_hh);
        foreach ($hh_cung_loai as $hh) : 
          ?>
      
            <div class="flex-row-sp" >
                <div class="row-sp " >      
                    <a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$hh['ma_hh']?>" class="sp">
                    <img src="<?=$img_path?><?php $a=$hh['ma_hh'] ;$hinhdd= sp_hinh_dai_dien($a); foreach ($hinhdd as $hinh){ echo $hinh; }?>" height= "250" width="100%" >
                    <img class="hover-img" src="<?=$img_path?><?php $hinhmt=sp_hinh_mo_ta($a); foreach($hinhmt as $hinh_mt){ echo $hinh_mt ;}?>" height= "250" width="100%" >

                    <h5><?=$hh['ten_hh']?> </h5>
                    
                    <div class="gia"> <?=number_format($hh['don_gia'],0,",",".")?>đ</div>
           
             
                  </a>
                </div>
            </div>
          <?php endforeach ?>
</div>
</div>
