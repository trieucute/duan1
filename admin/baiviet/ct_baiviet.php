<!--  chi tiết Bài viết-->
<div class="container-row-content chi_tiet_bai_viet">
        <h2>CHI TIẾT BÀI VIẾT</h2>
        <h2 style="font-size: 24px; color: aliceblue">Mã bài viết: <?php echo $_GET['id_tin'] ?></h2>

        <div class="list-chart" style="margin-top: 20px">
            <table class="sp-table">
                <tr>
                    <th>STT</th>
                    <th>Nội dung</th>
                    <th>Hình</th>

                    <th></th>
                    <th></th>
                </tr>

                <?php
                $id= 1;
                $id_tin= $_GET['id_tin'];
                $sql_bai_viet = "SELECT * FROM noi_dung_bv WHERE id_tin = '$id_tin'";
                $query_bai_viet = mysqli_query($connect, $sql_bai_viet);
            // = '../../content/imgs/';
        
           

                while ($row_bai_viet = mysqli_fetch_array($query_bai_viet)) { 
                    $upload_dir =$img_path . $row_bai_viet['hinh']; // đường dẫn hình

                    if(is_file($upload_dir)){
                      
                        $urlHinhs="<img src='".$upload_dir."'  width='70px' style='object-fit: cover;'>";
                    }else{
                        $urlHinhs="";
                    }
                    ?>
                    <tr>
                        <td scope="row"><?php echo $id++; ?></td>
                        <td  style=" max-width: 400px;text-align: left; padding:0 15px "><?php echo $row_bai_viet['noi_dung']; ?></td>
                        <td> <?=$urlHinhs?></td>

                        <td><a href="index.php?ct_baiviet&id_tin=<?=$id_tin?>&sua_nd_bv&id_nd=<?php echo $row_bai_viet['id_nd']; ?>" class="icon_product"><i class="fa-solid fa-pen-to-square"></i></a></td>
                        <td><a href="index.php?ct_baiviet&id_tin=<?=$id_tin?>&xoa_nd_bv&id_nd=<?php echo $row_bai_viet['id_nd']; ?>" class="icon_product"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            <div class="btns-submit">
                <button class="news_content_add_btn"><a href="index.php?ct_baiviet&id_tin=<?=$id_tin?>&content_add">Thêm mới</a> </button>
                <button class="ds-user bai_viet_show_btn" type="button"><a href="index.php">Danh sách</a> </button>

            </div>
        </div>
    </div>
    <!-- end quản chi tiết Bài viết-->
