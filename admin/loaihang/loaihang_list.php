    <style>
     
   
    </style>
    <?php 
require "category_edit.php";
// require "category_delete.php";
// require "category_add.php";
    ?>
    <!--  Loại hàng -->

    <div class="container-row-content loai_hang_show"  style="<?php
                                                                    echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'Nhân viên') ? ' display: none;' : ''
                                                                    ?>">
        <h2>QUẢN LÝ LOẠI HÀNG</h2>
        <div class="list-chart" style="  margin-top: 70px;">
            <table class="sp-table">
                <tr>
                    <!-- <th></th> -->
                    <th>STT</th>
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th></th>
                    <th></th>

                </tr>
<?php
    $conn = mysqli_connect('localhost', 'root', '', 'demo-duan1');
    // BƯỚC 2: TÌM TỔNG SỐ RECORDS
    $result = mysqli_query($conn, 'select count(ma_loai) as total from loai');
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    // BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;

    // BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
    // tổng số trang
    $total_page = ceil($total_records / $limit);

    // Giới hạn current_page trong khoảng 1 đến total_page
    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    // Tìm Start
    $start = ($current_page - 1) * $limit;

    // BƯỚC 5: TRUY VẤN LẤY DANH SÁCH TIN TỨC
    // Có limit và start rồi thì truy vấn CSDL lấy danh sách tin tức
    $result = mysqli_query($conn, "SELECT * FROM loai order by ma_loai desc limit $start, $limit");

    ?>
    <div>
        <?php 
        // PHẦN HIỂN THỊ TIN TỨC
        // BƯỚC 6: HIỂN THỊ DANH SÁCH TIN TỨC
           $id_loai_hang = 1;
        // $sql_category = "SELECT * FROM loai order by ma_loai desc";
        // $query_category = mysqli_query($connect, $sql_category);

        while ($row_category  = mysqli_fetch_assoc($result )) { ?>
            <tr>
                <!-- <td class="checkbox-rect"><input type="checkbox" name="" id=""><span class="checkmark"></span></td> -->
                <td scope="row"><?php echo $id_loai_hang++; ?></td>
                <td><?php echo $row_category['ma_loai']; ?></td>
                <td><?php echo $row_category['ten_loai']; ?></td>
                <td><a href="index.php?loaihang_sua&ma_loai=<?php echo $row_category['ma_loai']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="index.php?loaihang_xoa&ma_loai=<?php echo $row_category['ma_loai']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php } ?>
    </div>

    </table>
  
    
         
            <div class="btns-submit">
                <button class="themmoi-lh loai_hang_add_btn" ><a href="index.php?loaihang_add"> Thêm mới</a></button>
                <!-- <button>Chọn tất cả</button>
                <button>Bỏ chọn tất cả</button> -->
                <!-- <button>Xoá</button> -->
            </div>
        </div>
    </div>  <nav aria-label="Page navigation example"  style="<?php
                                                                    echo (isset($_SESSION['user']['vai_tro']) && $_SESSION['user']['vai_tro'] == 'Nhân viên') ? ' display: none;' : ''
                                                                    ?>">
    <ul class="pagination">
       <?php 
        // PHẦN HIỂN THỊ PHÂN TRANG
        // BƯỚC 7: HIỂN THỊ PHÂN TRANG

        // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
        if ($current_page > 1 && $total_page > 1){
            echo '<li class="page-item"><a class="page-link" href="index.php?loaihang_list&page='.($current_page-1).'">Previous</a></li> ';
        }

        // Lặp khoảng giữa
        for ($i = 1; $i <= $total_page; $i++){
            // Nếu là trang hiện tại thì hiển thị thẻ span
            // ngược lại hiển thị thẻ a
            // if ($i == $current_page){
            //     echo '<span>'.$i.'</span> | ';
            // }
            // else{
                echo ' <li class="page-item"><a class="page-link" href="index.php?loaihang_list&page='.$i.'">'.$i.'</a> </li> ';
            // }
        }

        // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
        if ($current_page < $total_page && $total_page > 1){
            echo ' <li class="page-item"><a class="page-link" href="index.php?loaihang_list&page='.($current_page+1).'">Next</a> </li> ';
        }


    ?></ul>
    </nav>  
    <!-- end  quản lý lh-->