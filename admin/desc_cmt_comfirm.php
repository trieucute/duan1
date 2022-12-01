<?php
if (isset($_POST['comfirm_cmt'])) {
    $sql_comfirm_desc_cmt = "UPDATE binh_luan SET trang_thai = 'đã duyệt' WHERE ma_bl = '$_POST[ma_binh_luan]'";
    $query_comfirm_desc_cmt = mysqli_query($connect, $sql_comfirm_desc_cmt);
}