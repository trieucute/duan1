
<head>
    <link rel="stylesheet" href="../../content/css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../content/Font/stylesheet.css">

    <style>

        .main-ct{
            width: 100%;
            display: flex;
            justify-content: center;
            margin: 20px 0;
          
        }
        .map{
            width: 50%;
            float: left;
        }
       .map iframe{
            height: 670px;
            margin: 0px 0px 0px 30px;
            width: 90%;
        }
        .in4{
            width: 50%;
            float: right;
            margin: 0px 30px 0px 0px;
        }
        .in4-text p{
            font-family: 'Signika Negative';

            color: black;
            font-size: 20px;    
        }
        form label{
            color: black;
            padding-top: 10px;
            font-size: 20px;    

        }
       .in4-form input{
            background-color: #EDEDED;
            border: none;
            padding: 13px 15px;
            margin: 8px 0;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            border-radius: 10px;
            width: 100%;
        }
        .in4-form  form button{
            border-radius: 40px;
            border: 1px solid #FF4B2B;
            background-color: #C60000;
            color:white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 45px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }
        .in4-form  form textarea{
            background-color: #EDEDED;
            border: none;
            padding: 13px 15px;
            margin: 8px 0;
            filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
            border-radius: 10px;
            width: 100%;
        }
  
    </style>
</head>
<body>
  
    <div class="main-ct">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443661450984!2d106.62563971462322!3d10.853821092269094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2sQuang%20Trung%20Software%20City!5e0!3m2!1sen!2s!4v1668695799579!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="in4">
            <div class="in4-text">
                <h2>TH??NG TIN LI??N H???</h2>
   
                <p><b style=" font-family: Mergeblack;">?????a ch???:</b> C??ng Vi??n Ph???n M???m Quang Trung, Qu???n 12 </p>
                <p><b style=" font-family: Mergeblack;">Email:</b> f6fashionz@gmail.com</p>
                <p><b style=" font-family: Mergeblack;">Hotline:</b> 0369540497</p>
                <p>C???m ??n b???n ???? quan t??m. N???u b???n mu???n li??n l???c v???i ch??ng t??i h??y li??n l???c v???i ch??ng  t??i theo form b??n d?????i. Ch??ng t??i s??? h???i ????p nhanh nh???t ?????n b???n.</p>
            </div>
            <div class="in4-form">
                <h1>G???i th???c m???c cho ch??ng t??i</h1>
                <form action="../trangchinh/?lien_he" method="post">
                    <label for="name">H??? t??n *</label><br>
                    <input name="ho_ten" type="text" placeholder="" value=""><br>
                    <label for="email">Email</label><br>
                    <input name="email" type="text" value=""placeholder="" ><br>
                    <label for="content">N???i dung</label><br>
                    <textarea name="nd_qus" id="content" cols="88" rows="6"></textarea><br>
                <!-- <input name="ghi_nho" type="checkbox" width="10%;" ><span style="float: ;left">Ghi nh??? t??i kho???n?</span>  -->
                    <button name="submit_qus"style="margin-top: 25px;">G???i</button>
                </form>
            </div>
            
        </div>
    </div>
    <div class="thongbao" style="text-align:center;font-family: Mergeblack;">
        <?php
            if(isset($thongbao)&& ($thongbao!="")){
            echo $thongbao;}
        ?>
        </div>
    <?php
        if(isset($_POST['submit_qus'])== true){
            $email = $_POST['email'];
            $ho_ten = $_POST['ho_ten'];
            $nd_qus = $_POST['nd_qus'];

            $tb_email =gui_email_tb($email,$ho_ten,$nd_qus);
            if($tb_email == true){
                $thongbao="C???m ??n b???n ???? g???i th???c m???c cho ch??ng t??i, ch??ng t??i s??? gi???i ????p nhanh nh???t";
            }else{
                $thongbao="G???i th???c m???c kh??ng th??nh c??ng";

            }
        }
function gui_email_tb($email,$ho_ten,$nd_qus){
    require "../taikhoan/PHPMailer/src/PHPMailer.php"; 
    require "../taikhoan/PHPMailer/src/SMTP.php"; 
    require '../taikhoan/PHPMailer/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: ch??? ????? debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'f6fashionz@gmail.com'; // SMTP username
        $mail->Password = 'hgqyhgggloskxodt';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
       
        $mail->setFrom('f6fashionz@gmail.com','F6FashionZ');
        $mail->addAddress($email,$ho_ten);     
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'G???i th?? th???c m???c th??nh c??ng';
        $noidungthu =   "<strong>Hello  {$email} </strong> <p><strong style='color:red;'> C???m ??n b???n ???? g???i th???c m???c cho F6 FashionZ</strong> </p> <p>Ch??ng t??i s??? li??n h??? b???n s???m nh???t v?? kh???c ph???c t??nh tr???ng </p>"; 
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
</body>
