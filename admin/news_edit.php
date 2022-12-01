<?php
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");
if (isset($_POST['edit_news'])) {
    $id_tin = $_GET['id_tin_sua'];
    $news_title_update = $_POST['news_title_update'];
    $news_author_update = $_POST['news_author_update'];
    $news_desc_update = $_POST['news_desc_update'];

    $sql_edit_news = "SELECT * FROM tin_tuc WHERE id_tin = '$id_tin'";
    $query_edit_news = mysqli_query($connect, $sql_edit_news);
    $row_edit_news = mysqli_fetch_assoc($query_edit_news);
    
    $image_news = $_FILES['news_img_update'];
    $file_name_news = $image_news['name'];
    $file_name_news = explode('.', $file_name_news);
    $ext_news = end($file_name_news);
    if($ext_news==""){
        $new_file_news = $row_edit_news['hinh_dd'];
    } else {
        $new_file_news = md5(uniqid()) . '.' . $ext_news;
    }
    $upload_image_news = move_uploaded_file($image_news['tmp_name'], '../content/imgs/' . $new_file_news);


    $sql_update = "UPDATE tin_tuc SET title = '$news_title_update', mo_ta = '$news_desc_update', tac_gia = '$news_author_update', hinh_dd = '$new_file_news' WHERE id_tin = '$id_tin'";
    $query_update = mysqli_query($connect, $sql_update);
    
    header('location: dashboard.php');
}