    <!--  Sửa Loại hàng -->
    <div class="container-row-content loai_hang_edit">
        <h2>SỬA LOẠI HÀNG</h2>
        <form action="" class="form-add-lh" method="POST">
            <div class="form-group-add">
                <label for="">Tên loại</label>
                <?php
                $ma_loai = $_GET['ma_loai'];
                $sql_category_edit = "SELECT * FROM loai WHERE ma_loai = '$ma_loai'";
                $query_category_edit = mysqli_query($connect, $sql_category_edit);
                $row_category_edit = mysqli_fetch_assoc($query_category_edit);
                ?>
                <input type="text" name="ten_loai_update" value="<?php echo $row_category_edit['ten_loai'] ?>" id="" class="form-control-add">
            </div>
            <div class="form-group-add" style="padding-top:30px ;">
                <button class="themmoi-lh" type="submit" name="capnhat">Sửa</button>


                <button type="reset">Nhập lại</button>
                <button class="ds-lh" type="button" ><a href="index.php">Danh sách</a> </button>
                <!-- <button class="ds-lh" type="button">Danh sách</button> -->

            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
            <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
    </div>
        </form>
     
    <!-- end thêm sửa lh-->