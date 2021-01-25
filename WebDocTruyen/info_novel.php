<?php
    include("lib_db.php");
    $id = $_REQUEST["id"];
    $id_page = isset($_REQUEST["id_page"])?$_REQUEST["id_page"]:1;

    $sql = "select * from category";
    $categorys = select_list($sql);

    $sql = "select * from list_novel where id = $id";
    $novel = select_one($sql);

    $sql = "select c.name, c.id from category_novel cn inner join category c on cn.id_category = c.id where id_novel = $id";
    $categorys_novel = select_list($sql);

    $sql = "select total_chap from list_novel where id = $id";
    $total_chap = select_one($sql);

    $start = ($id_page-1)*50;
    $sql = "select number_chapter, name_chap from chapter where id_novel = $id order by number_chapter asc limit $start, 25";
    $list_chap1 = select_list($sql);

    $start = $id_page*50 - 25;
    $sql = "select number_chapter, name_chap from chapter where id_novel = $id order by number_chapter asc limit $start, 25";
    $list_chap2 = select_list($sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $novel[1]?></title>
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
                <div class="container info">
                    <div class="title">
                        <h2>THÔNG TIN TRUYỆN</h2>
                    </div>
                    <h3 class="name"><?= $novel[1]?></h3>
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-3 info-holder">
                            <div class="book">
                                <img src="image/<?= $novel[2]?>" style="width:200px;">
                            </div>
                            <strong>Tác giả: </strong>
                            <a href="#"><?= $novel[3]?><br></a>
                            <strong>Thể loại: </strong>
                            <?php foreach($categorys_novel as $key => $category_novel){?>
                                <a href="search_category.php?id_category=<?= $category_novel[1]?>"><?= $category_novel[0];?></a>
                                <?php if($key !== array_key_last($categorys_novel)) echo ","?>
                            <?php }?>
                            <br>
                            <strong>Tình trạng:</strong>
                            <span><?php if($novel[7]) echo "FULL"; else echo "Đang ra";?></span>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-9 desc">
                            <?= $novel[4]?>
                        </div>
                    </div>
                </div>
                <div class="container list-chap">
                    <div class="title">
                        <h2>DANH SÁCH CHƯƠNG</h2>
                    </div>
                    <div id="list">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <?php foreach($list_chap1 as $list){?>
                                    <a href="desc_chap.php?id_novel=<?= $id?>&number_chapter=<?= $list[0]?>"><?php echo "Chương " .$list[0] .": " .$list[1];?></a><br>
                                <?php }?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <?php foreach($list_chap2 as $list){?>
                                        <a href="desc_chap.php?id_novel=<?= $id?>&number_chapter=<?= $list[0]?>"><?php echo "Chương " .$list[0] .": " .$list[1];?></a><br>
                                <?php }?>
                            </div>
                        </div>
                        <div class="list">
                            <ul class="pagination">
                                <?php if($id_page > 1){
                                    for($i = ($id_page-1); $i < ($id_page+2); $i++){
                                        if($i <= intdiv($total_chap[0]-1, 50)+1){?>
                                            <li <?php if($i == $id_page) echo "class=\"active\"";?> ><a onclick="changePage(<?= $id?>, <?= $i?>, <?= $total_chap[0]?>)" ><?= $i?></a></li>
                                        <?php } else break;
                                    }
                                } else{?>
                                <?php if(intdiv($total_chap[0], 50) > 0){
                                    for($i = 0; $i <= intdiv($total_chap[0]-1, 50); $i++){
                                        if($i < 3){?>
                                            <li <?php if($i == 0) echo "class=\"active\"";?> ><a onclick="changePage(<?= $id?>, <?= $i+1?>, <?= $total_chap[0]?>)" ><?= $i+1?></a></li> 
                                        <?php }
                                    }
                                }
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>
            <div class="footer"></div>
        </div>
    </body>
</html>
<style>
    .info{
        margin-bottom: 20px;
    }
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
    .info .name{
        font-size: 24px;
        font-weight: bold;
        margin: 10px 0;
        text-transform: uppercase;
        text-align: center;
    }
    .info-holder a{
        color: #4E4E4E;
        text-decoration-color: #4E4E4E;
    }
    .info-holder .book{
        text-align: center;
    }
    .list-chap .list{
        text-align: center;
    }
    .list-chap #list a{
        color: #4E4E4E;
        font-size: 16px;
        text-decoration-color: #4E4E4E;
    }
</style>
<script>
    function changePage(id,id_page,total_chap){
			var f = "id=" + id + "&id_page=" + id_page +'&total_chap=' + total_chap;
			var _url = "ajax/list_chap.php?"+f;
			$.ajax({
				url: _url,
				data: f,
				cache: false,
				success: function(data) {
					$("#list").html(data);
				}
			});
    }
</script>