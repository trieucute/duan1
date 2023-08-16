<!--  sửa nội dung bài viết -->
<div class="container-row-content add_user news_content_edit">
    <?php 
        //   $id_tin = $_GET['id_tin'];
          $sql_edit_news = "SELECT * FROM noi_dung_bv WHERE id_nd = '$id_nd'";
          $query_edit_news = mysqli_query($connect, $sql_edit_news);
          $row_edit_news = mysqli_fetch_assoc($query_edit_news);
          $upload_dir = '../../content/imgs/';
    ?>
        <h2>SỬA DUNG BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <div class="form-group-hh" style="width: 50%">
                <label for="">Hình ảnh </label>
                <input type="file" id="" name="news_content_img_update" class="form-control-hh" />
                <?php if($row_edit_news['hinh'] !=""){ ?><img src="<?php echo $upload_dir .$row_edit_news['hinh'] ?>" alt="" width="50px"><?php }?>

            </div>
            <div class="form-group-hh" style="width: 100%">
                <label for="" style="width: 100%">Nội dung </label>

                <textarea id="" rows="10" name="news_content_content" class="form-control-hh" style="width: 95.5%"><?= $row_edit_news['noi_dung']?></textarea>
            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="edit_news_content">Sửa</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user bai_viet_show_btn" type="button"><a href="index.php?ct_baiviet&id_tin=<?=$id_tin?>">Danh sách tin chi tiết</a> </button>

            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end sửa nội dung bài viết-->