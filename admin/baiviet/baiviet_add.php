 <!--  thêm mới bài viết -->
 <div class="container-row-content bai_viet_add">
        <h2>THÊM MỚI BÀI VIẾT</h2>
        <form action="" class="form-add-hh" style="margin-top: 40px" method="POST" enctype="multipart/form-data">
            <div class="form-group-hh" style="width: 50%; padding: 10px 0" >
                <label for=""> Tiêu đề bài viết</label>
                <input name="news_title" type="text" class="form-control-hh" value="<?php if(isset($news_title)) echo $news_title?>" />
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['news_title']) ? $error['news_title'] : ''; ?></div>
            </div>

            <div class="form-group-hh" style="width: 50%; padding: 10px 0">
                <label for="">Tác giả</label>
                <input name="news_author" type="text" id="" class="form-control-hh"  value="<?php if(isset($news_author)) echo $news_author?>" />
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['news_author']) ? $error['news_author'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width: 50%; padding: 10px 0">
                <label for="">Mô tả</label>
                <input name="news_desc" type="text" class="form-control-hh" value="<?php if(isset($news_desc)) echo$news_desc?>"  />
                <div class="error" style="color: #FFADBC;   font-family: 'Signika Negative'; font-weight: bold;" > <?php echo isset($error['news_desc']) ? $error['news_desc'] : ''; ?></div>

            </div>
            <div class="form-group-hh" style="width: 50%; padding: 10px 0">
                <label for="">Hình ảnh đại diện </label>
                <input name="news_img" type="file" id="" class="form-control-hh" />


            </div>

            <div class="form-group-add" style="width: 100%">
                <button type="submit" name="add_news">Thêm mới</button>
                <button type="reset">Nhập lại</button>
                <button class="ds-user bai_viet_show_btn" type="button"><a href="index.php">Danh sách</a> </button>
            </div>
            <div class="thongbao" style="color: white;    font-family: Mergeblack; ">
    <?php 
                if(isset($thongbao)&& ($thongbao!=""))
                echo $thongbao;?></div>
        </form>
    </div>
    <!-- end thêm mới bài viết-->
