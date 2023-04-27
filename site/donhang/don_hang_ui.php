
<!--  -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .history{
            width: 90%;
            margin: 0 auto;
            color: black;
        }

        .history table tr th{
            font-size: 1.7em;
            text-align: center;
        } 
        .history table {
            width: 100%;
        }
        .history table td{
            font-size: 1.2em;
            text-align: center;
        }
        .history h1{
            text-align: center;
        }
        .history td a{
            color:brown;
            text-decoration: none;
        }
        .history td a:hover{
            color:#EF9A53;
        }
        .history td:last-child{
           padding: 0 20px;
        }
        .history td:nth-child(2){
           padding: 0 20px;
           max-width: 350px;
           text-align: left;
        }
    </style>
 </head>
 <body>
    <div class="history" ><br>
    <h1 >Đơn hàng đã đặt</h1><br>
    <table >
        <tr>
        <!-- <th >Mã đơn hàng</th> -->
        <th >Địa chỉ</th>
        <th >Số điện thoại</th>
        <th>Thanh toán</th>
        <th >Tổng tiền</th>

        <th >Trạng Thái</th>
        <th></th>
    </tr>
    <?php foreach($don_hang as $row): ?>
    <tr>
        <!-- <td><?=$row['ma_don_hang'] ?></td> -->
        <td style="padding: 15px 10px;max-width:250px"><?=$row['dia_chi'] ?> </td>
        <td style="text-align: center;"><?=$row['SDT'] ?></td>
        <td><?=$row['phuong_thuc_thanh_toan'] ?></td>
        <td><?=number_format($row['tong_tien'] ,0,",",".")."đ"?></td>

        <td><?=$row['trang_thai'] ?></td>   
        <td ><a href="../donhang/don_hang.php?ma_dh=<?=$row['ma_don_hang'] ?>">Xem đơn hàng</a></td>
    </tr>
    <?php  endforeach ?>
    </table>
    
    </div>
 </body>
 </html>
