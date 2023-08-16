<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="content/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="content/Font/MergeBlack.woff">
<link rel="stylesheet" href="content/css/home_respon.css">
<link rel="stylesheet" href="content/css/respon_menu.css">
<link rel="shortcut icon" href="../../content/imgs/logo_ne.png">
    <script src="https://code.jquery.com/jquery-3.6.1.js"></script>

  <style>
    .header_menu{
        height: 93px;
        background-color: white;
        box-shadow: 2px 2px grey;
    }
    header{
        background-color: white;

    }
    @font-face {
    font-family: Mergeblack;
    src: url(../content/Font/MergeBlack.woff);
}
  </style>
</head>
<body>
        <?php 
            // require_once "../dao/pdo.php";
            // require_once "../dao/hanghoa.php";
require_once "../../dao/loai.php";
            
            ?>
    <div class="all">
        <header class="header_menu">
            <?php include "layout/menu.php"?>
        </header>
        <main>
            <?php 
             include $VIEW_NAME;

            ?>  
                
        </main>
        <footer>
        <?php include "layout/footer.php"?>

        </footer>
    </div>
</body>
</html>