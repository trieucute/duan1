<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['add_news_content'])) {
    $id_tin = $_GET['id_tin_content'];
    $news_content_content = $_POST['news_content_content'];
    
    $image_news_content = $_FILES['news_content_img'];
    $file_name_news_content = $image_news_content['name'];
    $file_name_news_content = explode('.', $file_name_news_content);
    $ext_news_content = end($file_name_news_content);
    if($ext_news_content==""){
        $new_file_news_content = "";
    } else {
        $new_file_news_content = md5(uniqid()) . '.' . $ext_news_content;
    }
    $upload_image_news_content = move_uploaded_file($image_news_content['tmp_name'], '../content/imgs/' . $new_file_news_content);
    
    
    $sql_insert_news = "INSERT INTO noi_dung_bv (id_tin, noi_dung, hinh) VALUES ('$id_tin', '$news_content_content', '$new_file_news_content')";
    $query_insert_news = mysqli_query($connect, $sql_insert_news);
    header('location: dashboard.php');
}