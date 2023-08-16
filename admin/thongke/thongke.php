<?php 

//  require "../../content/carbondate/autoload.php";
//  use Carbon\Carbon;
//  use Carbon\CarbonInterval;
//  $subdays = Carbon::now('Asia/Ho_Chi_Minh')->subdays (365)->toDateString(); 
//  $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
//  $sql ="SELECT *, count(ma_don_hang) as donhang FROM don_hang dh join chi_tiet_don_hang ct on dh.ma_don_hang=ct.ma_don_hang WHERE dh.ngay_dat_hang BETWEEN '$subdays' AND '$now' ORDER BY dh.ngay_dat_hang ASC";
//  $sql_query=mysqli_query($mysqli,$sql);
//  while($val = mysqli_fetch_array($sql_query)){
//     $chart_data[]=array(
//         'date' => $val['ngay_dat_hang'],
//         'order' => $val['donhang'],
//         'sales' =>$val['so_luong'] * $val['don_gia'] ,
//         // 'quantity'=> $val['soluongban']
//     );
//  }
//  echo $data= json_encode($chart_data);

 ?>