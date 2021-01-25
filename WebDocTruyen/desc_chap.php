<?php
    include("lib_db.php");
    $id_novel = $_REQUEST["id_novel"];
    $number_chapter = $_REQUEST["number_chapter"];

    $sql = "select ln.name_novel, ln.total_chap, c.* from chapter c inner join list_novel ln on c.id_novel = ln.id where ln.id = $id_novel and c.number_chapter = $number_chapter";
    $chapter = select_one($sql);
    $sql = "select number_chapter from chapter where id_novel = $id_novel";
    $list_chap = select_list($sql);
    $sql = "select * from category";
    $categorys = select_list($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= "Chương " . $chapter[2] . ": " . $chapter[4] ?></title>
        <meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
        <meta name=”viewport” width="device-width", initial-scale="1" />
        <link type="text/css" href="css/style.css" rel="stylesheet" media="screen"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400&display=swap" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container-fluid wrapper">
            <?php include("header.php");?>
            <div class="container-fluid content">
                <div class="container">
                    <a class="name" href="#"><?= $chapter[0]?></a>
                    <div class="name-chap"><?= "Chương " . $chapter[2] . ": " . $chapter[4] ?></div>
                    <div class="button-group">
                        <a href="desc_chap.php?id_novel=<?= $id_novel?>&number_chapter=<?= $number_chapter-1?>" <?php if($number_chapter == 1) echo " disabled "?>type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <form action="desc_chap.php?id_novel=<?= $id_novel?>" method="post">
                            <select name="number_chapter" class="form-control" required="required"  onchange="this.form.submit()">
                                <?php foreach($list_chap as $value){?>
                                    <option value="<?= $value[0]?>" <?php if($value[0]==$number_chapter) echo "selected"; ?> >Chương <?= $value[0]?></option>";
                                <?php }?>
                            </select>
                        </form>
                        <a href="desc_chap.php?id_novel=<?= $id_novel?>&number_chapter=<?= $number_chapter+1?>" <?php if($number_chapter == $chapter[1]) echo " disabled "?> type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                    <div class="desc">
                        <?= $chapter[5]?>
                    </div>
                    <div class="button-group">
                        <a href="desc_chap.php?id_novel=<?= $id_novel?>&number_chapter=<?= $number_chapter-1?>" <?php if($number_chapter == 1) echo " disabled "?>type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <form action="desc_chap.php?id_novel=<?= $id_novel?>" method="post">
                            <select name="number_chapter" class="form-control" required="required"  onchange="this.form.submit()">
                                <?php foreach($list_chap as $value){?>
                                    <option value="<?= $value[0]?>" <?php if($value[0]==$number_chapter) echo "selected"; ?> >Chương <?= $value[0]?></option>";
                                <?php }?>
                            </select>
                        </form>
                        <a href="desc_chap.php?id_novel=<?= $id_novel?>&number_chapter=<?= $number_chapter+1?>" <?php if($number_chapter == $chapter[1]) echo " disabled "?> type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </body>
</html>
<style>
    .content{
        text-align: center;
    }
    .content .name{
        font-size: 24px;
        color: #4E4E4E;
        text-decoration: none;
        text-transform: uppercase;
    }
    .content .button-group{
        margin: 20px 0px;
        display: inline-block;
    }
    .content .button-group select{
        display: inline-block;
        width: 150px;
    }
    .content .desc{
        text-align: justify;
        padding-bottom: 20px;
    }
    form{
        display:inline;
    }
</style>
