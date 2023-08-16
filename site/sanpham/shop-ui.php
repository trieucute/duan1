<head>
    <link rel="stylesheet" href="../../content/css/shops.css">
<link rel="stylesheet" href="../../content/css/home_respons.css">

    <style>
       .box-content-fot {

    width: 90%;}
    .text-content-fot {
    
    z-index: 1;
    position: absolute;}
    .img-fot1, .img-fot2 {

    height: 35rem;
    
    width: 18%;}
    .pagination {
        justify-content: center;
    flex-wrap: wrap;}
    </style>
</head>
<div class="text-animation">
    <marquee>Quần áo bền vững<span style="color: #277BC0; font-size:33px"> được tuyển chọn</span> <span style="margin: 0 50px;"><i class="fa-solid fa-minus" style="color: #277BC0;"></i> <i class="fa-solid fa-minus" style="color: #277BC0;"></i> <i class="fa-solid fa-minus" style="color: #277BC0;"></i></span>Mua<span style="color: #277BC0; font-size:33px"> ít hơn</span> bằng cách <span style="color: #277BC0; font-size:33px">biết nhiều hơn</span></marquee>

</div>
<div class="hot-sale">
                    <h2><strong style="text-transform:uppercase ;font-size:0.9em"> <?php if(isset($tendm)){ print_r($tendm);}else{
                        echo "Sản phẩm";
                    } ?></strong></h2>
                </div>
                <div class="locsp">
            <div class="row-loc">
                    <span>A -> Z</span>
            </div>
            <!-- <div class="row-loc2">
                <form action="shop.php" method="POST">
             
                <select name="filter" id="">
                    <option value="default"  >Mặc định</option>
                    <option value="low_to_high" name="thap">Thấp -> cao</option>
                    <option value="high_to_low" name="cao">Cao -> thấp</option>
                    <option value="nam"   name="nam"  >Nam</option>
                    <option value="nu" name="nu">Nữ</option>
                    <option value="unisex" name="unisex">Unisex</option>


                    </select>
                    <button type="submit" > Lọc</button> -->
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
             extract($hh); 
            
          
             ?>
    
    <div class="flex-row-sp">
     <div class="row-sp">      
     <a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$hh['ma_hh']?>" class="sp">
         <img src="<?=$img_path?><?php $a=$hh['ma_hh'] ;$hinhdd= sp_hinh_dai_dien($a); foreach ($hinhdd as $hinh){ echo $hinh; }?>" height= "250" width="100%" >
         <img class="hover-img" src="<?=$img_path?><?php $hinhmt=sp_hinh_mo_ta($a); foreach($hinhmt as $hinh_mt){ echo $hinh_mt ;}?>" height= "250" width="100%" >
 
         <h5><?=$hh['ten_hh']?> </h5>
       
         <div class="gia"> <?=currency_format($hh['don_gia'])?></div>
         <!-- <div class="btn">
<button class="btn-order"><span>GIỎ HÀNG</span> </button>
         </div> -->
  
       </a>
     </div>
            </div>
<?php }?></div>
<nav aria-label="Page navigation example" style="margin: 0 auto;     width: fit-content;
    font-size: 20px; ">
    <ul class="pagination">
       <?php 
        // PHẦN HIỂN THỊ PHÂN TRANG
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1 && isset($_GET['ma_loai']) ) {
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?ma_loai='.$ma_loai.'&page='.($current_page-1).'" style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none;">Trước</a></li> ';
        }else if ($current_page > 1 && $total_page > 1 && isset($_GET['search']) ){
            $search = $_GET['search'];
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?search='.$search.'&page='.($current_page-1).'" style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none;">Trước</a></li> ';

        }else if($current_page > 1 && $total_page > 1 && isset($_GET['sex']) ){
            $sex = $_GET['sex'];
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?sex='.$sex.'&page='.($current_page-1).'" style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none;">Trước</a></li> ';



        }else if($current_page > 1 && $total_page > 1){
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?'.'page='.($current_page-1).'" style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none;">Trước</a></li> ';


        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++){
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            // if ($i == $current_page){
            //     echo '<span>'.$i.'</span> | ';
            // }
            // else{
               if(isset($_GET['ma_loai'])){
               
                   echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?ma_loai='.$ma_loai.'&page='.$i.'"  style="    border-radius: 50%;    background-color: #F6F6C9;padding: 10px 20px;border: none;">'.$i.'</a> </li> ';
                
               }else if(isset($_GET['search'])){

                $search = $_GET['search'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?search='.$search.'&page='.$i.'"  style="    border-radius: 50%;    background-color: #F6F6C9;padding: 10px 20px;border: none;">'.$i.'</a> </li> ';


               } else if(isset($_GET['sex'])){
                $sex = $_GET['sex'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?sex='.$sex.'&page='.$i.'"  style="    border-radius: 50%;    background-color: #F6F6C9;padding: 10px 20px;border: none;">'.$i.'</a> </li> ';


               }
               
               else{
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?'.'page='.$i.'"  style="    border-radius: 50%;    background-color: #F6F6C9;padding: 10px 20px;border: none;">'.$i.'</a> </li> ';

               }

            // }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){

            if(isset($_GET['ma_loai'])){

                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?ma_loai='.$ma_loai.'&page='.($current_page+1).'"  style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none">Sau</a> </li> ';
            } else if(isset($_GET['search'])) {
                $search = $_GET['search'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?search='.$search.'&page='.($current_page+1).'"  style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none">Sau</a> </li> ';


            } else if(isset($_GET['sex'])){
                $sex = $_GET['sex'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?sex='.$sex.'&page='.($current_page+1).'"  style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none">Sau</a> </li> ';


            } else{
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../sanpham/shop.php?'.'page='.($current_page+1).'"  style="    border-radius: 50%; background-color: #F6F6C9;padding: 10px 20px;border: none">Sau</a> </li> ';


            }
        }


    ?></ul>
    </nav>
<div class="box-content-fot">
    <div class="text-content-fot">Lấy những thứ tốt  <i class="fa-solid fa-circle-check"></i></div>
    <div class="img-box">
        <img src="../../content/imgs/ct-fott.png" alt="" class="img-fot1">
    <img src="../../content/imgs/ct-fott2.png" alt=""  class="img-fot2">
    </div>
    
</div>