
        <div class=" panel panel-default shadow-none mt-4">
            <h3 style="background-color: #E0E0E0;font-family: Mergeblack;" class="fw-bold p-3 rounded-top  fs-4 p-0 ">Bình Luận:</h3>
            <div class="panel-body">
            <?php
                // require '../../dao/binh-luan.php';
                // if(exist_param("noi_dung")){
                //     $ho = $_SESSION['user']['ma_kh'];
                //     $ngay_bl = date_format(date_create(), 'Y-m-d');
                //     binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
                // }
                // $binh_luan_list = binh_luan_select_by_hang_hoa($ma_hh);
            ?>
                <ul class="list-unstyle text-dark fw-bold fs-5 d-flex justify-content-between ps-3" style="flex-wrap: wrap !important;
                  flex-direction: row !important;   font-family: Mergeblack;font-size:19px !important; color:#7B7B7B !important">
                    <?php 
              
              foreach ( $binh_luan_list as $bl) {
                  echo "<li style=' width:100% !important ' ><li>$bl[noi_dung] </li> <li> $bl[ho_ten] : $bl[ngay_bl] </li></li>";
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
                        <div class=" d-flex " >
                            <div  class="col-sm-11 px-0">
                                <input type="" name="trang_thai" id="" value="duyệt" hidden>
                                <input style="background-color: #F5F5F5 ;filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);font-family: Mergeblack;" name="noi_dung" class="form-control rounded-3"/>
                            </div>
                            <div style="padding-left: 5px !important;" class="col-sm-1 px-0">
                                <button style="background-color: #F5F5F5 ;font-family: Mergeblack;" class="btn btn-secondary w-100  text-dark fw-bold"  type="submit">Gửi</button>
                            </div>
                        </div>
                    </div>
                </form>                
            <?php }?>
            </div>
        </div>        
