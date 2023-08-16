<head>
<link rel="stylesheet" href="../../content/Font/stylesheet.css">
<link rel="stylesheet" href="../../content/css/home_respons.css">

    <style>
     
    .tin-container{
        width: 85%;
        margin: 0 auto;
    }
        .tieude>h2 {
            font-size: 2em;
            margin: 20px 0;
            font-family: Mergeblack;

            text-align: center;
        }

        .tintuc {
            width: 100%;
            height: 100%;
            display: flex;
            /* margin: 20px 0; */
            margin: 30px 0;
            flex-wrap: wrap;
            /* justify-content: center; */
        }

        .tin {
            width: 48%;
            margin: 30px 10px ;
            height: 15em;
            display: flex;

        }

        .tintuc>.tin>.anh>img {
            width: 24.9rem;
            height: 14.4rem;
            object-fit: cover;
            border-radius: 10px;
        }

        .content-text-tin{
            margin-left: 1em;
            font-family: 'Signika Negative';
            font-weight: bold;
        }

        .tin>.content-text-tin>h1 {
            font-size: 1.4em;
            /* width: 10.5em;
            height: 3.5em; */
    font-family: Mergeblack;

        }

        .tin>.content-text-tin>h5 {
            font-size: 1em;
            width: 12em;
            height: 6em;
            overflow: hidden;

        }

        .btn-group .button {
            border: 2px solid black;
            color: black;
            padding: 0.25em 1.3em;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 1.1em;
            cursor: pointer;
    
    font-family: Mergeblack;

            border-radius: 0.4em;
        }
        .btn-group .button a {
            color: black;
            
    
    font-family: Mergeblack;

            border-radius: 0.4em;
        }

        .btn-group .button:not(:last-child) {
            border-right: none;
        }

        .btn-group a .button :hover {
            background-color: black;
            /* color: white; */
        }
        .btn-group a  :hover {
            background-color: black;
            color: white;
        }
        .content-text-tin {
    margin-left: 1em;
    display: flex;
    font-family: 'Signika Negative';
    font-weight: bold;
    flex-direction: column;
    justify-content: space-around;
}
    </style>
</head>
<div class="tin-container">
    <div class="tieude">
        <h2>TIN TỨC</h2>
    </div>
    <div class="tintuc">
        <?php

        foreach ($listtt as  $tt) {
            extract($tt); ?>

            <div class="tin">
                <div class="anh">
                    <img src="<?= $img_path ?><?php echo $tt['hinh_dd'] ?>">
                </div>
                <div class="content-text-tin">
                    <h1><?= $tt['title'] ?></h1>
                    <h5><?= $tt['mo_ta'] ?></h5>
                    <div class="btn-group">
                        <a href="../tintuc/ct_tt.php?id_tin=<?=$tt['id_tin']?>"><button class="button">Xem </button></a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
