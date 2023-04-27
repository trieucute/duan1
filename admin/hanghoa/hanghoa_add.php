
    <!--  thêm mới hàng hoá -->
    <div class="container-row-content hang_hoa_add">
        <h2>THÊM MỚI HÀNG HOÁ</h2>
        <form action="" class="form-add-hh" style="margin-top:20px " method="POST" enctype="multipart/form-data">

            <div class="form-group-hh">
                <label for="">Loại hàng</label>
                <select name="ma_loai" id="" class="form-control-hh" >
                    <?php
                    $sql_category = "SELECT * FROM loai";
                    $query_category = mysqli_query($connect, $sql_category);
                    while ($row_category = mysqli_fetch_array($query_category)) { ?>
                        <option value="<?php echo $row_category['ma_loai'] ?>"><?php echo $row_category['ten_loai'] ?></option>;
                    <?php } ?>
                </select>
            </div>


            <div class="form-group-hh">
                <label for=""> Tên hàng hoá</label>
                <input type="text" name="ten_hh" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold; padding-bottom:6px" > <?php echo isset($error['ten_hh']) ? $error['ten_hh'] : ''; ?></div>

            </div>

            <div class="form-group-hh">
                <label for="">Giá</label>
                <input type="number" name="don_gia" id="" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['don_gia']) ? $error['don_gia'] : ''; ?></div>

            </div>
            <div class="form-group-hh">
                <label for="">Giảm giá</label>
                <input type="number" name="giam_gia" class="form-control-hh">
            </div>
            <div class="form-group-hh">
                <label for="">Giới Tính</label>
                <select name="gioi_tinh" id="" class="form-control-hh" >
                    <option value="nam">Nam</option>
                    <option value="nu">Nữ</option>
                    <option value="unisex">Unisex</option>
                </select>
            </div>
            <div class="form-group-hh">
                <label for="" >Hàng đặc biệt</label>
                <div class="form-control-hh" style="width:86%">
                    <input type="radio" name="dac_biet" id="" value="1">Đặc biệt
                    <input type="radio" name="dac_biet" id="" value="0" checked>Bình thường
                </div>
            </div>

            <div class="form-group-hh">
                <label for="">Hình đại diện </label>
                <input type="file" name="hinh1" id="" class="form-control-hh" >
              

            </div>
            <div class="form-group-hh">
                <label for="">Hình mô tả</label>
                <input type="file" name="hinh2" id="" class="form-control-hh">

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size S</label>
                <input type="number" name="size_s" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['size_s']) ? $error['size_s'] : ''; ?></div>

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size M</label>
                <input type="number" name="size_m" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['size_m']) ? $error['size_m'] : ''; ?></div>

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size L</label>
                <input type="number" name="size_l" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['size_l']) ? $error['size_l'] : ''; ?></div>

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XL</label>
                <input type="number" name="size_xl" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['size_xl']) ? $error['size_xl'] : ''; ?></div>

            </div>
            <div class="form-group-hh">
                <label for="">Số lượng size XXL</label>
                <input type="number" name="size_xxl" class="form-control-hh">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['size_xxl']) ? $error['size_xxl'] : ''; ?></div>

            </div>


            <div class="form-group-hh" style="width:100%">
                <label for="" style="width:100%">Mô tả</label>

                <textarea name="mo_ta" id="" rows="7" class="form-control-hh " style="width:95.5%"></textarea>
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;padding-bottom:6px" > <?php echo isset($error['mo_ta']) ? $error['mo_ta'] : ''; ?></div>

            </div>
            <div class="form-group-add" style=" width: 100%;">
                <button type="submit" name="themmoi" class="themmoi-hh">Thêm mới</button>
                <button type="reset">Nhập lại</button>

                <button class="ds-hh" type="button"><a href="index.php">Danh sách</a></button>

            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
            <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end thêm mới hh-->