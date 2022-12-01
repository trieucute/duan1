<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['add_news'])) {
    $news_title = $_POST['news_title'];
    $news_author = $_POST['news_author'];
    $news_desc = $_POST['news_desc'];
    
    $image_news = $_FILES['news_img'];
    $file_name_news = $image_news['name'];
    $file_name_news = explode('.', $file_name_news);
    $ext_news = end($file_name_news);
    if($ext_news==""){
        $new_file_news = "";
    } else {
        $new_file_news = md5(uniqid()) . '.' . $ext_news;
    }
    $upload_image_news = move_uploaded_file($image_news['tmp_name'], '../content/imgs/' . $new_file_news);


    $sql_insert_news = "INSERT INTO tin_tuc (title, mo_ta, tac_gia, hinh_dd) VALUES ('$news_title', '$news_desc', '$news_author', '$new_file_news')";
    $query_insert_news = mysqli_query($connect, $sql_insert_news);
}