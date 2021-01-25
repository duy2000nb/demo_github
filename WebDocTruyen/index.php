<?php
    include("lib_db.php");
    $sql = "select name_novel, image, id from list_novel where hot = 1 limit 12";
    $novels = select_list($sql);
    $sql = "select name_novel, total_chap, id from list_novel where total_chap != 0 order by update_time desc limit 10";
    $update_novels = select_list($sql);
    $sql = "select * from category";
    $categorys = select_list($sql);
    function category_novel($id_novel){
        $sql = "select c.name, c.id from category_novel cn inner join category c on cn.id_category = c.id where cn.id_novel = $id_novel";
        return select_list($sql);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Đọc truyện</title>
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
                <div class="container truyen-hot">
                    <div class="title-list">
                        <h2>
                            <a href=#>TRUYỆN HOT</a>
                        </h2>
                    </div>
                    <div class="ds-truyen">
                        <div class="row item">
                            <?php for($i = 0; $i < 6; $i++){?>
                            <div class="<?php include("print_hotNovel.php")?>">
                                <a href="info_novel.php?id=<?= $novels[$i][2];?>">
                                    <img src="./image/<?= $novels[$i][1]?>">
                                    <div class="title">
                                        <h3 class="name"><?= $novels[$i][0]?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                        </div>
                        <div class="row item">
                            <?php for($i = 6; $i < 12; $i++){?>
                            <div class="<?php include("print_hotNovel.php")?>">
                                <a href="info_novel.php?id=<?= $novels[$i][2];?>">
                                    <img src="./image/<?= $novels[$i][1]?>">
                                    <div class="title">
                                        <h3 class="name"><?= $novels[$i][0]?></h3>
                                    </div>
                                </a>
                            </div>
                            <?php }?>
                    </div>
                </div>
                <div class="container truyen-moi">
                    <div class="title-list">
                        <h2>
                            <a href=#>TRUYỆN MỚI CẬP NHẬT</a>
                        </h2>
                    </div>
                    <?php foreach($update_novels as $key => $update_novel){?>
                    <div class="row"> 
                        <div class="col-xs-5 col-sm-5 col-md-5 col-ten <?php if($key === array_key_last($update_novels)){echo "last";}?>">
                            <a href="info_novel.php?id=<?= $update_novel[2]?>"><?php echo $update_novel[0]?></a>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4 col-theloai <?php if($key === array_key_last($update_novels)){echo "last";}?>">
                            <?php $category_names = category_novel($update_novel[2]); foreach($category_names as $key1 => $category_name){?>
                            <a href="search_category.php?id_category=<?= $category_name[1]?>"><?php echo $category_name[0]?></a>
                            <?php if($key1 !== array_key_last($category_names)){echo ", ";}?>
                            <?php } if(empty($category_names)) echo "<span style=\"color: #4E4E4E;font-size: 16px;line-height: 40px;\">Trống</span>";?>
                        </div>
                        <div class="col-xs-3 col-sm-3 col-md-3 col-chuong <?php if($key === array_key_last($update_novels)){echo "last";}?>">
                            <a href="desc_chap.php?id_novel=<?= $update_novel[2]?>&number_chapter=<?= $update_novel[1]?>"> Chương <?php echo $update_novel[1]?></a>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
            <div class="footer"></div>
        </div>
    </body>
</html>