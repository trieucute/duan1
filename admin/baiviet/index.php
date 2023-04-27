<?php
require "../../global.php";
require "../../dao/loai.php";
require "../../dao/hanghoa.php";
// extract($_REQUEST);
$connect = mysqli_connect("localhost", "root", "", "demo-duan1");





    check_login();

    //phân giải các field name từ form trong form thành cách biến
    extract($_REQUEST); 
    
    if(exist_param("baiviet_add")){
        // if(!empty($ten_loai)){
            try {
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
                    $upload_image_news = move_uploaded_file($image_news['tmp_name'], '../../content/imgs/' . $new_file_news);
                    if (empty($_POST['news_title'])){
                        $error['news_title'] = 'Bạn chưa nhập tiêu đề';
                    }
                    if (empty($_POST['news_author'])){
                        $error['news_author'] = 'Bạn chưa nhập tên tác giả';
                    }
                    if (empty($_POST['news_desc'])){
                        $error['news_desc'] = 'Bạn chưa nhập mô tả';
                    }
                    // if (empty($_POST['new_file_news'])){
                    //     $error['new_file_news'] = 'Bạn chưa thêm hình';
                    // }
                    
                if( $news_title !="" && $news_author !="" &&  $news_desc !=""  ){

               
                    $sql_insert_news = "INSERT INTO tin_tuc (title, mo_ta, tac_gia, hinh_dd) VALUES ('$news_title', '$news_desc', '$news_author', '$new_file_news')";
                    $query_insert_news = mysqli_query($connect, $sql_insert_news);
                
                    $thongbao = "Thêm thành công";
                // }else{
                //            $thongbao= "Thêm mới thất bại!";
                // }
                    // unset($ten_loai, $ma_loai);
                }
                 }
                  }  catch (Exception $exc) {
                    // $thongbao= "Thêm mới thất bại!";
                }
            
        // }else{
        //     // $thongbao= "Thêm mới thất bại!";
        // }
        $VIEW_NAME = "baiviet_add.php";
    }

    else if(exist_param("baiviet_xoa")){
        try {
            // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");

            $sql_delete_loai = "DELETE FROM tin_tuc WHERE id_tin = '$_GET[id_tin]'";
            $query_delete_loai = mysqli_query($connect, $sql_delete_loai);
            
            $thongbao = "Đã xoá thành công";
     } 
        catch (Exception $exc) {
            $thongbao= "Xóa thất bại!";
        }
        // $listdanhmuc = loai_select_all();
    
        $VIEW_NAME = "baiviet_list.php";

    }
//     else if(exist_param("loaihang_sua")){
//         $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
// if (isset($_POST['edit_category'])) {
//     $ma_loai = $_GET['ma_loai'];
//     $ten_loai = $_POST['ten_loai_update'];

    // $sql_update_loai = "UPDATE loai SET ten_loai = '$ten_loai' WHERE ma_loai = '$ma_loai'";
    // $query_update_loai = mysqli_query($connect, $sql_update_loai);
    // header('location: dashboard.php');
// }
//         $capnhatdm= loai_select_by_id($ma_loai);
//         extract($capnhatdm);
//         $thongbao = "Đã lấy thành công";
//         $VIEW_NAME = "loaihang_edit.php";
//     }
    else if(exist_param("baiviet_sua")){ 
    
        try {
          
            // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
            if (isset($_POST['edit_news'])) {
                $id_tin = $_GET['id_tin'];
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
                $upload_image_news = move_uploaded_file($image_news['tmp_name'], '../../content/imgs/' . $new_file_news);
            
            
                $sql_update = "UPDATE tin_tuc SET title = '$news_title_update', mo_ta = '$news_desc_update', tac_gia = '$news_author_update', hinh_dd = '$new_file_news' WHERE id_tin = '$id_tin'";
                $query_update = mysqli_query($connect, $sql_update);
                // header('location: dashboard.php');
                $thongbao='Cập nhật thành công';
            }else{
            // $thongbao= "Cập nhật thất bại!";

            }
          
      
             
        } 
        catch (Exception $exc) {
            // $thongbao= "Cập nhật thất bại!";
        }
    
       
        $VIEW_NAME = "baiviet_edit.php";

    }
    else if(exist_param("ct_baiviet")){
        // $listdanhmuc = loai_select_all();
        if(exist_param("content_add")){
            // $listdanhmuc = loai_select_all();
            try {
                if (isset($_POST['add_news_content'])) {
                    $id_tin = $_POST['id_tin'];
                    $news_content_content = $_POST['news_content_content'];
                    // if (empty($_POST['news_title'])){
                    //     $error['news_title'] = 'Bạn chưa nhập tiêu đề';
                    // }
                  
                    if (empty($_POST['news_content_content'])){
                        $error['news_content_content'] = 'Bạn chưa nhập nội dung';
                    }
                    // if (empty($_POST['new_file_news'])){
                    //     $error['new_file_news'] = 'Bạn chưa thêm hình';
                    // }
                    
                if( $news_content_content !=""   ){
                    $image_news_content = $_FILES['news_content_img'];
                    $file_name_news_content = $image_news_content['name'];
                    $file_name_news_content = explode('.', $file_name_news_content);
                    $ext_news_content = end($file_name_news_content);
                    if($ext_news_content==""){
                        $new_file_news_content = "";
                    } else {
                        $new_file_news_content = md5(uniqid()) . '.' . $ext_news_content;
                    }
                    $upload_image_news_content = move_uploaded_file($image_news_content['tmp_name'], '../../content/imgs/' . $new_file_news_content);
                    
                    
                    $sql_insert_news = "INSERT INTO noi_dung_bv (id_tin, noi_dung, hinh) VALUES ('$id_tin', '$news_content_content', '$new_file_news_content')";
                    $query_insert_news = mysqli_query($connect, $sql_insert_news);
                
                    $thongbao = "Thêm thành công";
                // }else{
                //            $thongbao= "Thêm mới thất bại!";
                // }
                    // unset($ten_loai, $ma_loai);
                
                 }
                }
                  }  catch (Exception $exc) {
                    // $thongbao= "Thêm mới thất bại!";
                }
            
            $VIEW_NAME = "content_add.php";
        }else if(exist_param("xoa_nd_bv")){
            try {
                // $connect = mysqli_connect("localhost", "root", "", "demo-duan1");
    
                $sql_delete = "DELETE FROM noi_dung_bv WHERE id_nd = {$_GET['id_nd']}";
                $query_delete = mysqli_query($connect, $sql_delete);
                
                $thongbao = "Đã xoá thành công";
         } 
            catch (Exception $exc) {
                $thongbao= "Xóa thất bại!";
            }
            // $listdanhmuc = loai_select_all();
        
            $VIEW_NAME = "ct_baiviet.php";
    
        }else if(exist_param("sua_nd_bv")){
            try {
            if (isset($_POST['edit_news_content'])) {
                $id_nd = $_GET['id_nd'];
                $news_content_content_update = $_POST['news_content_content'];
                
                $sql_edit_news_content = "SELECT * FROM noi_dung_bv WHERE id_nd = '$id_nd'";
                $query_edit_news_content = mysqli_query($connect, $sql_edit_news_content);
                $row_edit_news_content = mysqli_fetch_assoc($query_edit_news_content);
            
                $image_news_content = $_FILES['news_content_img_update'];
                $file_name_news_content = $image_news_content['name'];
                $file_name_news_content = explode('.', $file_name_news_content);
                $ext_news_content = end($file_name_news_content);
                if($ext_news_content==""){
                    $new_file_news_content = $row_edit_news_content['hinh'];
                } else {
                    $new_file_news_content = md5(uniqid()) . '.' . $ext_news_content;
                }
                $upload_image_news_content = move_uploaded_file($image_news_content['tmp_name'], '../../content/imgs/' . $new_file_news_content);
                
                
                $sql_update = "UPDATE noi_dung_bv SET noi_dung = '$news_content_content_update', hinh = '$new_file_news_content' WHERE id_nd = '$id_nd'";
                $query_update = mysqli_query($connect, $sql_update);
                $thongbao='Cập nhật thành công';
            }else{
            // $thongbao= "Cập nhật thất bại!";

            }
          
      
             
        } 
        catch (Exception $exc) {
            // $thongbao= "Cập nhật thất bại!";
        }
    
       
        $VIEW_NAME = "content_edit.php";
        }
        else{
           $VIEW_NAME = "ct_baiviet.php";
       
            

        }

        }
    else{
        $VIEW_NAME = "baiviet_list.php";
    }
require "../index.php";
    
?>