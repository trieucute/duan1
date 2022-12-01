
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th{
            font-size: 1.2em;
            text-align: center;
        }
        td{
            font-size: 1.2em;
            text-align: center;
        }
        h1{
            text-align: center;
        }
        body{
            font-size: 1.2em;
        }
    </style>
 </head>
 <body>
    <div class="history">
    <h1>Đơn Đã Đặt</h1>
    <table style="width:100%">
        <tr>
        <th>Mã đơn hàng</th>
        <th>Địa chỉ</th>
        <th>Số điện thoai</th>
        <th>Thanh toán</th>
        <th>Trạng Thái</th>
        <th></th>
    </tr>
    <?php foreach($don_hang as $row): ?>
    <tr>
        <td><?=$row['ma_don_hang'] ?></td>
        <td><?=$row['dia_chi'] ?> </td>
        <td><?=$row['SDT'] ?></td>
        <td><?=$row['phuong_thuc_thanh_toan'] ?></td>
        <td><?=$row['trang_thai'] ?></td>   
        <td><a href="../donhang/don_hang.php?ma_dh=<?=$row['ma_don_hang'] ?>">Chi tiết</a></td>
    </tr>
    <?php  endforeach ?>
    </table>
    </div>
 </body>
 </html>