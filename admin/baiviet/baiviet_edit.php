<!--  Sửa bài viết -->
<div class="container-row-content bai_viet_edit">
        <h2>SỬA BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <?php
            $id_tin = $_GET['id_tin'];
            $sql_edit_news = "SELECT * FROM tin_tuc WHERE id_tin = '$id_tin'";
            $query_edit_news = mysqli_query($connect, $sql_edit_news);
            $row_edit_news = mysqli_fetch_assoc($query_edit_news);
            $upload_dir = '../../content/imgs/';

            ?>
            <div class="form-group-hh" style="width: 50%">
                <label for=""> Tiêu đề bài viết</label>
                <input name="news_title_update" type="text" value="<?php echo $row_edit_news['title'] ?>" class="form-control-hh" />
            </div>

            <div class="form-group-hh" style="width: 50%">
                <label for="">Tác giả</label>
                <input name="news_author_update" type="text" id="" value="<?php echo $row_edit_news['mo_ta'] ?>" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Mô tả</label>
                <input name="news_desc_update" type="text" value="<?php echo $row_edit_news['tac_gia'] ?>" class="form-control-hh" />
            </div>
            <div class="form-group-hh" style="width: 50%">
                <label for="">Hình ảnh đại diện </label>
                <input name="news_img_update" type="file" id="" class="form-control-hh" value="" />
                <img src="<?php echo $upload_dir .$row_edit_news['hinh_dd'] ?>" alt="" width="50px">
            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="edit_news">Sửa</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user bai_viet_show_btn" type="button"><a href="index.php">Danh sách</a> </button>
            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end sửa bài viết-->