
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->

    <title>Document</title>
    <link rel="stylesheet" href="../../content/Font/MergeBlack.woff">
    <!-- <link rel="stylesheet" href="../../content/css/indexss.css"> -->
    <link rel="stylesheet" href="../menune.css">
    <link rel="stylesheet" href="../../content/font/Font/stylesheet.css" />

    <style>
        main{
            margin-left: 14.7%;
        }
        .container-row-content{
            margin: 0 0 0 10px !important;
            /* padding-top: 10px; */
        }
        .list-chart table tr td {
    font-size: 18px !important;
   
}
    </style>
</head>
<?php
// require_once "../../global.php";

check_login();
// if (!isset($_SESSION['user']['vai_tro']) && ($_SESSION['user']['vai_tro'] != 'admin'  || $_SESSION['user']['vai_tro'] != 'Nhân viên')) {
//     header('Location: /404/');
//     exit;
// }else {
     ?>


<body>
    <div class="container adminss">
        <header>
            <?php include  "menu.php" ?>
        </header>
        <main>

            <?php
            include $VIEW_NAME;?>
        </main>
    </div>
    <!-- <script src="../../content/js/menu.js"></script> -->
</body>

<?php 
// }

?>
