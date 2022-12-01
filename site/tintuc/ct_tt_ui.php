<head>
<link rel="stylesheet" href="../../content/Font/stylesheet.css">
<style>
.trang-chi-tiet{
    /* margin-left: 2em; */
    width: 80%;
    margin: 40px auto;
}
.trang-chi-tiet span{
    padding-right: 60px;
}
.trang-chi-tiet .content{
    font-family: 'Signika Negative';
    font-weight: bold;
    font-size: 1.2em;
}
.trang-chi-tiet>.content>p{
    margin-top: 30px;
   
    color: black;
}
.trang-chi-tiet>.content>img{
    display: block;
    margin: 0 auto;;
    width: 20em;
    height: 25em;
    object-fit: cover;
}
.trang-chi-tiet>.content>.mo-ta{
    text-align: center;
}
.back_tt{
    margin: 50px 0;

}
.back_tt a button{
    border-radius: 10px;
    padding: 8px 13px;
    border: none;
    outline: none;
    font-size: 1.2em;
}

</style>


</head>
<?php 

    // print_r($tin);


?>

    <div class="trang-chi-tiet">
        <h1><?=$tt['title']?></h1>
            <span>Tác giả : <?=$tt['tac_gia']?></span>
            <span>Ngày đăng : <?=$tt['ngay_dang']?></span>
        <div class="content">
        <?php     
        foreach($tin as $t){
        extract($t);?>
        <p><?=$t['noi_dung']?></p>
        <?php if($t['hinh']!=""){?>
            <img src="<?=$img_path?><?= $t['hinh']?>">
      <?php  }?>
      
        <?php  } ?>

             
        
            
        </div>
        <div class="back_tt">
        <a href="../tintuc/tintuc.php"><button><< Quay lại</button></a>
    </div>
    </div>
   
  