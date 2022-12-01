<link rel="stylesheet" href="../../content/css/shops.css">
<link rel="stylesheet" href="../../content/css/main.css">

<style>
    .mover{
        width:271em;
    }
</style>
<?php 
include "../layout/banner.php";?>
<section class="box-list">
    <div class="text-list"><h3 style="text-align: center; padding-top: 20px">DANH MỤC SẢN PHẨM</h3>
        <p class="line-list"></p>
    </div>
    <div class="tech-slideshow">
        <div class="mover">
            <a class="item" href="../sanpham/shop.php?ma_loai=1">
               <img src="../../content/imgs/dmaokhoac.avif">
                <div class="text">Giảm giá 20% áo khoác</div>
</a>
            <a class="item" href="../sanpham/shop.php?ma_loai=5">
                <img src="../../content/imgs/dmtui.jpg" class="avatar">
                <div class="text">Mua quần tây ngon bổ  </div>       
</a>
        <a class="item" href="../sanpham/shop.php?ma_loai=7">
            <img src="../../content/imgs/dmgiay.avif" >
            
            <div class="text">Giảm tiếp 30% giày </div>
</a>
        <a class="item" href="../sanpham/shop.php?ma_loai=2">
            <img src="../../content/imgs/dmaothun.avif" class="avatar">
            <div class="text">Giảm sốc áo thun chỉ còn 3xx.xxxđ</div>
</a> 
    </div>
    </div>
</section>
<?php 
include "../layout/bosuutap.php";?>
<section class="content">
          
      
<?php
   $sp= load_sp_db();
?>

<div class="hot-sale">
                    <h2>SẢN PHẨM BÁN CHẠY</h2>
                    <i class="fa-solid fa-minus" style="color: #277BC0;"></i><i class="fa-solid fa-minus" style="color: #277BC0;"></i><i class="fa-solid fa-minus" style="color: #277BC0;"></i>
                </div>
                <div id="sanpham" class="data ">   
     
     <?php 
     // chuyển đơn vị tiền tệ vnd
if (!function_exists('currency_format')) {
 function currency_format($number, $suffix = 'đ') {
     if (!empty($number)) {
         return number_format($number, 0, ',', '.') . "{$suffix}";
     }
 }
}
// show sp từ db
foreach ($sp as $hh) {  
    extract($hh);      
         
    ?>
   <div class="flex-row-sp">
       <div class="row-sp">      
       <a href="../ct_san_pham/chi-tiet.php?ma_hh=<?=$hh['ma_hh']?>" class="sp">
           <img src="<?=$img_path?><?php $a=$hh['ma_hh'] ;$hinhdd= sp_hinh_dai_dien($a); foreach ($hinhdd as $hinh){ echo $hinh; }?>" height= "250" width="100%" >
           <img class="hover-img" src="<?=$img_path?><?php $hinhmt=sp_hinh_mo_ta($a); foreach($hinhmt as $hinh_mt){ echo $hinh_mt ;}?>" height= "250" width="100%" >
   
           <h5><?=$hh['ten_hh']?> </h5>
         
           <div class="gia"> <?=currency_format($hh['don_gia'])?></div>
           <!-- <div class="btn">
  <button class="btn-order"><span>GIỎ HÀNG</span> </button>
           </div> -->
    
         </a>
       </div>
   </div>
  <?php }?></div>
        </section>
        <section class="mail-content">
            <div class="text-mail">BẢN TIN</div>
            <div class="text-comt">Đăng ký để nhận thông tin</div>
            <form class="input-mail"  method="post">
                <input type="email" placeholder="Nhập email" name="email">
                <button type="submit" name="submit_thong_bao">Đăng ký</button>
                
</form>
            <div class="img-right">
                <img src="../../content/imgs/Model-Man-In-Suit-Transparent.png" alt="">
                <img src="../../content/imgs/pngwing.com.png" alt="">
            </div>
            <div class="thongbao" style="text-align:center;font-family: Mergeblack;">
        <?php
            if(isset($thongbao)&& ($thongbao!=""))
            echo $thongbao;
        ?>
        </div>
        </section>
       
        <?php
        if(isset($_POST['submit_thong_bao'])== true){
            $email = $_POST['email'];
            $tb_email =gui_email_tb($email);
            if($tb_email == true){
                $thongbao="Cảm ơn bạn đã đăng ký";
            }else{
                $thongbao="Đăng ký nhận thông báo không thành công";

            }
        }
function gui_email_tb($email){
    require "../taikhoan/PHPMailer/src/PHPMailer.php"; 
    require "../taikhoan/PHPMailer/src/SMTP.php"; 
    require '../taikhoan/PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'f6fashionz@gmail.com'; // SMTP username
        $mail->Password = 'hgqyhgggloskxodt';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
       
        $mail->setFrom('f6fashionz@gmail.com', 'F6 FashionZ');
        $mail->addAddress($email);     
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư chào mừng';
        $noidungthu =   "<strong>Hello  {$email} </strong><p> Cảm ơn bạn đã đăng ký nhận thông báo mới nhất từ<strong> F6 FashionZ</strong> </p><p>Có bất kỳ thông tin và tin tức hoặc sản phẩm mới chúng tôi sẽ liên hệ với bạn</p> "; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        return true;
       
    } catch (Exception $e) {
        return false;
        $mail->ErrorInfo;
    }
   

}
        ?>