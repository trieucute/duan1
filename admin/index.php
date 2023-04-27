
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
            margin-left: 15%;
        }
        .container-row-content{
            margin: 0 0 !important;
            /* padding-top: 10px; */
        }
    </style>
</head>
<?php


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

