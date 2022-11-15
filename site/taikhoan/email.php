<?php
    $to_email = 'trieutran989@gmail.com';
    $subject = 'Testing PHP Mailẹkhfjkhsdjkfhjkdfhjksdhfas';
    $message = 'This mail is sent using the PHP mail functilkfjslkfjlkdsjflksdflkdshfon';
    $headers = 'From: f6fashionz@gmail.com';
    if(mail($to_email, $subject, $message, $headers)==true){
        echo 'thanh cong';
    }else{
        echo 'sai';

    }

    

?>
 