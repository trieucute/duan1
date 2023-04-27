  <!--  thêm mới nội dung bài viết -->
  <div class="container-row-content add_user news_content_add">
        <h2>THÊM NỘI DUNG BÀI VIẾT</h2>
        <?php
        //   $id_tin= $_GET['id_tin'];
          $sql_bai_viet = "SELECT * FROM noi_dung_bv WHERE id_tin = '$id_tin'";
          $query_bai_viet = mysqli_query($connect, $sql_bai_viet);

      
        ?>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <div class="form-group-hh" style="width: 50%">
            <input type="" name="id_tin" value="<?=$id_tin?>" hidden >
                <label for="">Hình ảnh </label>
                <input type="file" id="" name="news_content_img" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 100%">
                <label for="" style="width: 100%">Nội dung </label>

                <textarea id="" rows="10" name="news_content_content" class="form-control-hh" style="width: 95.5%"></textarea>
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['news_content_content']) ? $error['news_content_content'] : ''; ?></div>

            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="add_news_content">Thêm Nội Dung</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user bai_viet_show_btn" type="button"><a href="index.php?ct_baiviet&id_tin=<?=$id_tin?>">Danh sách tin chi tiết</a> </button>
            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>

    <!-- end thêm mới nội dung bài viết-->