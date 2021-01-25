<?php
    include("lib_db.php");
    $sql = "select * from category";
    $categorys = select_list($sql);
    $id_category = $_REQUEST["id_category"];
    $sql = "select name from category where id = $id_category";
    $name_category = select_one($sql);
    $sql = "select ln.id, ln.name_novel, ln.author, ln.total_chap from category_novel cn inner join list_novel ln on cn.id_novel = ln.id where cn.id_category = $id_category";
    $lists = select_list($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Tìm kiếm</title>
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
    <div class="container-fluid wrapper" style="min-height:700px">
            <?php include("header.php");?>
            <div class="container-fluid content">
                <div class="container">
                    <div class="title">
                        <h2><?= $name_category[0]?></h2>                       
                    </div>
                    <?php foreach($lists as $list){?>
                        <div class="row">
                            <div class="col-xs-8">
                                <h3 class="name-novel">
                                    <a href="info_novel.php?id=<?= $list[0]?>"><?php echo $list[1];?></a>
                                </h3>
                                <div class="author">
                                    <?php echo $list[2];?>
                                </div>
                            </div>
                            <div class="col-xs-4 chap">
                                <span>Chương <?php echo $list[3];?></span>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </body>
</html>
<style>
    .content .title{
        border-bottom: 1px #EEE solid;
        height: 41px;
        margin-bottom: 10px;
    }
    .content .title h2{
        display: inline-block;
        line-height: 40px;
        font-size: 20px;
        margin: 0;
        padding: 0;
        border-bottom: 1px black solid;
    }
    .content .col-xs-8{
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .content .name-novel{
        margin: 0;
    }
    .content .name-novel a{
        font-size: 18px;
        font-weight: bold;
        color: #4E4E4E;
        text-decoration-color: #4E4E4E;
    }
    .content .author{
        font-style: italic;
    }
    .content .chap{
        height: 66.4px;
    }
    .content .chap span{
        line-height: 66.4px;
        font-size: 14px;
        color: #4E4E4E;
    }
</style>
