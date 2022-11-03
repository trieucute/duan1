<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="content/fontawesome-free-6.1.1-web/css/all.css">
    <link rel="stylesheet" href="content/MergeBlack.woff">
  
</head>
<body>
    <div class="all">
        <header>
            <?php include "site/layout/menu.php"?>
        </header>
        <main>
            <?php 
             if ((isset($_GET['act']))  && ($_GET['act'])){
                $act = trim(strip_tags($_GET['act']));
                switch($act){
                    case "lienhe" : require_once 'site/trangchinh/contact.php'; break;
                    case "gioithieu" : require_once 'site/trangchinh/aboutus.php'; break;
                    case "search" : require_once 'timkiem.php'; break;
                    
                }
                } else {
                    require_once 'site/home.php';
                }
            ?>  
                
        </main>
        <footer>
        <?php include "site/layout/footer.php"?>

        </footer>
    </div>
</body>
</html>