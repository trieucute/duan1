
 <!--  Sửa hàng hoá -->
 <div class="container-row-content hang_hoa_edit">
        <h2>SỬA HÀNG HOÁ</h2>
        <form action="" class="form-add-hh" style="margin-top:40px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh">
                <label for="">Loại hàng</label>
                <select name="ma_loai_update" id="" class="form-control-hh" >
                    <?php
                    $ma_hh = $_GET['ma_hh'];
                    $sql_edit_hh = "SELECT * FROM hang_hoa WHERE ma_hh = '$ma_hh'";
                    $query_edit_hh = mysqli_query($connect, $sql_edit_hh);
                    $row_edit_hh = mysqli_fetch_assoc($query_edit_hh);
                    $sql_category = "SELECT * FROM loai";
                    $query_category = mysqli_query($connect, $sql_category);

                    $sql_edit_hinh = "SELECT * FROM hinh WHERE ma_hh = '$ma_hh'";
                    $query_edit_hinh = mysqli_query($connect, $sql_edit_hinh);
                    $row_edit_hinh = mysqli_fetch_assoc($query_edit_hinh);

                    $upload_dir =$img_path . $row_edit_hinh['hinh']; // đường dẫn hình

                    if(is_file($upload_dir)){
                    
                        $urlHinhs="<img src='".$upload_dir."'  width='70px' height='50px'   style='object-fit: cover;'>";
                    }else{
                        $urlHinhs="<span style='color:white;'>NO PHOTO</span>";
                    } 
                    $sql_edit_hinh2 = "SELECT * FROM hinh WHERE vai_tro_hinh like '%mô tả%' and ma_hh = '$ma_hh'";
                    $query_edit_hinh2 = mysqli_query($connect, $sql_edit_hinh2);
                    $row_edit_hinh2 = mysqli_fetch_assoc($query_edit_hinh2);

                    $upload_dir2 =$img_path . $row_edit_hinh2['hinh']; // đường dẫn hình

                    if(is_file($upload_dir2)){
                    
                        $urlHinhs2="<img src='".$upload_dir2."'  width='70px' height='50px'   style='object-fit: cover;'>";
                    }else{
                        $urlHinhs2="<span style='color:white;'>NO PHOTO</span>";
                    } 
                
                    while ($row_category = mysqli_fetch_array($query_category)) { 
                     
                        ?>
                    
                        <option value="<?php echo $row_category['ma_loai'] ?>" <?php echo ($row_category['ma_loai'] == $row_edit_hh['ma_loai']) ? 'selected="selected"' : '' ?>><?php echo $row_category['ten_loai'] ?></option>;
                    <?php } ?>
                </select>
            </div>

            <div class="form-group-hh">
                <label for=""> Tên hàng hoá</label>
                <input type="text" name="ten_hh_update" class="form-control-hh" value="<?php echo $row_edit_hh['ten_hh'] ?>">
            </div>

            <div class="form-group-hh">
                <label for="">Giá</label>
                <input type="number" name="don_gia_update" id="" class="form-control-hh" value="<?php echo $row_edit_hh['don_gia'] ?>">
            </div>
            <div class="form-group-hh">
                <label for="">Giảm giá</label>
                <input type="number" name="giam_gia_update" class="form-control-hh" value="<?php echo $row_edit_hh['giam_gia'] ?>">
            </div>
            <div class="form-group-hh">
                <label for="">Giới Tính</label>
                <select name="gioi_tinh_update" id="" class="form-control-hh" >
                    <option value="nam" <?php echo ($row_edit_hh['gioi_tinh'] == "nam") ? 'selected="selected"' : '' ?>>Nam</option>
                    <option value="nu" <?php echo ($row_edit_hh['gioi_tinh'] == "nu") ? 'selected="selected"' : '' ?>>Nữ</option>
                    <option value="unisex" <?php echo ($row_edit_hh['gioi_tinh'] == "unisex") ? 'selected="selected"' : '' ?>>Unisex</option>
                </select>
            </div>
            <div class="form-group-hh">
                <label for="" >Hàng đặc biệt</label>
                <div class="form-control-hh"  style="width:86%">
                    <input type="radio" name="dac_biet_update" id="" value="1" <?php echo ($row_edit_hh['dac_biet'] == 1) ? 'checked' : '' ?>>Đặc biệt
                    <input type="radio" name="dac_biet_update" id="" value="0" <?php echo ($row_edit_hh['dac_biet'] == 0) ? 'checked' : '' ?>>Bình thường
                </div>
            </div>
            <div class="form-group-hh">
                <label for="">Hình đại diện </label>
                <input type="file" name="hinh1_update" id="" class="form-control-hh">
                <?= $urlHinhs?>
            </div>
            <div class="form-group-hh">
                <label for="">Hình mô tả</label>
                <input type="file" name="hinh2_update" id="" class="form-control-hh">
                <?= $urlHinhs2?>

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size S</label>
                <input type="number" name="size_s_update" value="<?php echo $row_edit_hh['size_s'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size M</label>
                <input type="number" name="size_m_update" value="<?php echo $row_edit_hh['size_m'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size L</label>
                <input type="number" name="size_l_update" value="<?php echo $row_edit_hh['size_l'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XL</label>
                <input type="number" name="size_xl_update" value="<?php echo $row_edit_hh['size_xl'] ?>" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XXL</label>
                <input type="number" name="size_xxl_update" value="<?php echo $row_edit_hh['size_xxl'] ?>" class="form-control-hh">
            </div>


            <div class="form-group-hh" style="width:100%">
                <label for="" style="width:100%">Mô tả</label>

                <textarea name="mo_ta_update" id="" rows="7" class="form-control-hh " style="width:95.5%" value=""><?= $row_edit_hh['mo_ta'] ?></textarea>

            </div>
            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="capnhat" class="themmoi-hh">Sửa</button>
                <button type="reset">Nhập lại</button>

                <button class="ds-hh" type="button" name=""><a href="index.php">Danh sách</a></button>

   
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
            <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>

        </form>
    </div>
    <!-- end sửa hh-->

