
        <div class=" panel panel-default shadow-none mt-4">
            <h3 style="background-color: #E0E0E0;font-family: Mergeblack;" class="fw-bold p-3 rounded-top  fs-4 p-0 ">Bình Luận:</h3>
            <div class="panel-body">
            <?php
                require '../../dao/binh-luan.php';
                if(exist_param("noi_dung")){
                    $ma_kh = $_SESSION['user']['ma_kh'];
                    $ngay_bl = date_format(date_create(), 'Y-m-d');
                    binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
                }
                $binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh);
            ?>
                <ul class="list-unstyle text-dark fw-bold fs-5 d-flex justify-content-between ps-3">
                    <?php 
              
              foreach ( $binh_luan_list as $bl) {
                  echo "<li >$bl[noi_dung] </li> <li><b>$bl[ma_kh]</b>, $bl[ngay_bl] </li>";
                }
                
                ?>
                </ul>
            </div>
            
            <div class="panel-footer">
            <?php
                if(!isset($_SESSION['user'])){
                    echo '<b class="text-danger text-center mg-auto d-block fw-bold fs-5 rounded-bottom " style="font-family: Mergeblack;"><a href="../taikhoan/dangnhap.php" style="color:red;     text-decoration: none; fon-weight:bold;">Đăng nhập</a> để bình luận về sản phẩm này</b>';
                }else{
            ?>
                <form action="<?=$_SERVER["REQUEST_URI"]?>" method="post">
                    <div class="form-group">
                        <div class=" d-flex ">
                            <div  class="col-sm-11 px-0">
                                <input style="background-color: #F5F5F5 ;" name="noi_dung" class="form-control rounded-3"/>
                            </div>
                            <div style="padding-left: 5px !important;" class="col-sm-1 px-0">
                                <button style="background-color: #F5F5F5 ;" class="btn btn-secondary w-100  text-dark fw-bold" >Gửi</button>
                            </div>
                        </div>
                    </div>
                </form>                
            <?php }?>
            </div>
        </div>        
