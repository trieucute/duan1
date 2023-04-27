    <!--  thêm mới Loại hàng -->
    <div class="container-row-content loai_hang_add">
        <h2>THÊM MỚI LOẠI HÀNG</h2>
        <form action="" class="form-add-lh" method="POST" style="    margin: 80px auto;">
            <div class="form-group-add">
                <label for="">Tên loại</label>
                <input type="text" name="ten_loai" id="" class="form-control-add">
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold; padding-bottom:6px" > <?php echo isset($error['ten_loai']) ? $error['ten_loai'] : ''; ?></div>

            </div>
            <div class="form-group-add" style="padding-top:0px ;">
                <button class="" type="submit" name="themmoi">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-lh" type="button" ><a href="index.php">Danh sách</a> </button>

            </div>

            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
            <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end thêm mới lh-->