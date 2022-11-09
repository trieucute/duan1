<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="content/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="content/MergeBlack.woff">
  <style>
    header{
        height: 100px;
        background-color: white;
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
        <header>
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