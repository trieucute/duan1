<!--   hàng hoá -->


<div class="container-row-content nhan_vien hang_hoa_show" style="<?php
                                                                    echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'Nhân viên') ? ' display: none;' : ''
                                                                    ?>">
    <h2>QUẢN LÝ HÀNG HOÁ</h2>
    <div class="list-chart" style="  margin-top: 30px;">
        <form class="search-hh" method="get" action="index.php">
            <input type="text" name="search" placeholder="Tìm kiếm" >
            <button type="submit"><i class="fas fa-search"></i></button>
        </form>
        <table class="sp-table">
            <tr>
                <!-- <th></th> -->
                <th>STT</th>
                <th>Mã </th>
                <th>Tên hàng hoá</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Lượt xem</th>
                <th>Size S</th>
                <th>Size M</th>
                <th>Size L</th>
                <th>Size XL</th>
                <th>Size XXL</th>
                <th></th>
                <th></th>
            </tr>



            <?php
            // $conn = mysqli_connect('localhost', 'root', '', 'demo-duan1');
            // // BƯỚC 2: TÌM TỔNG SỐ RECORDS
            // $result = mysqli_query($conn, 'select count(ma_hh) as total from hang_hoa');
            // $row = mysqli_fetch_assoc($result);
            // $total_records = $row['total'];

            // // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
            // $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            // $limit = 7;

            // // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
            // // tổng số trang
            // $total_page = ceil($total_records / $limit);

            // // Giới hạn current_page trong khoảng 1 đến total_page
            // if ($current_page > $total_page) {
            //     $current_page = $total_page;
            // } else if ($current_page < 1) {
            //     $current_page = 1;
            // }

            // // Tìm Start
            // $start = ($current_page - 1) * $limit;

            // // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
            // // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
            // $result = mysqli_query($conn, "SELECT * FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện'  order by hang_hoa.ma_hh desc limit $start, $limit");

            ?>
            <div>


              
            <?php
                $id_hh = 1;

                // $sql_product = "SELECT * FROM hang_hoa inner join hinh on hang_hoa.ma_hh = hinh.ma_hh WHERE hinh.vai_tro_hinh = 'đại diện'";
                // $sp = mysqli_query($connect, $sql_product);
            

                foreach ($sp as $row){ 
                    extract($row);
                    $upload_dir =$img_path . $row['hinh']; // đường dẫn hình

                    if(is_file($upload_dir)){
                    
                        $urlHinhs="<img src='".$upload_dir."'  width='50px' height='50px'   style='object-fit: cover;'>";
                    }else{
                        $urlHinhs="NO PHOTO";
                    }                     ?>

                    <tr>
                        <!-- <td class="checkbox-rect"><input type="checkbox" name="" id="" style="    top: 22px; left: 8px;"><span class="checkmark"></span></td> -->
                        <td scope="row"><?php echo $id_hh++; ?></td>
                        <td><?php echo $row['ma_hh']; ?></td>
                        <td><?php echo $row['ten_hh']; ?></td>
                        <td><?=$urlHinhs?></td>
                        <td><?php echo currency_format($row['don_gia']); ?></td>
                        <td><?php echo currency_format($row['giam_gia']); ?></td>
                        <td><?php echo $row['so_luot_xem']; ?></td>
                        <td><?php echo $row['size_s']; ?></td>
                        <td><?php echo $row['size_m']; ?></td>
                        <td><?php echo $row['size_l']; ?></td>
                        <td><?php echo $row['size_xl']; ?></td>
                        <td><?php echo $row['size_xxl']; ?></td>

                        <td><a href="index.php?hanghoa_sua&ma_hh=<?php echo $row['ma_hh']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="index.php?hanghoa_xoa&ma_hh=<?php echo $row['ma_hh']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
                </tr>
            </div>
        </table>


        <div class="btns-submit">
            <button class="themmoi-lh loai_hang_add_btn"><a href="index.php?hanghoa_add"> Thêm mới</a></button>
            <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button> -->
            <!-- <button>Xoá</button> -->
        </div>
    </div>
</div>
<nav aria-label="Page navigation example"  style="<?php
                                                                    echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'Nhân viên') ? ' display: none;' : ''
                                                                    ?>">
<ul class="pagination">

       <?php 
        // PHẦN HIỂN THỊ PHÂN TRANG
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev

      if ($current_page > 1 && $total_page > 1 && isset($_GET['search']) ){
            $search = $_GET['search'];
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?search='.$search.'&page='.($current_page-1).'" style="   ">Trước</a></li> ';

       

        }else if($current_page > 1 && $total_page > 1){
            echo '<li class="page-item" style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?'.'page='.($current_page-1).'" style=" ">Trước</a></li> ';

        }

  

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++){
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            // if ($i == $current_page){
            //     echo '<span>'.$i.'</span> | ';
            // }
            // else{

               if(isset($_GET['search'])){

                $search = $_GET['search'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?search='.$search.'&page='.$i.'"  style="  ">'.$i.'</a> </li> ';


             
               
               }else{
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?'.'page='.$i.'"  style="   ;">'.$i.'</a> </li> ';

               }



            // }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){


         if(isset($_GET['search'])) {
                $search = $_GET['search'];
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?search='.$search.'&page='.($current_page+1).'"  style="">Sau</a> </li> ';


      
            } else{
                echo ' <li class="page-item"  style="padding: 0 10px"><a class="page-link" href="../hanghoa/index.php?'.'page='.($current_page+1).'"  style=" ">Sau</a> </li> ';


            }


        }


    ?></ul>

</nav>
<!-- end  quản lý hh-->
