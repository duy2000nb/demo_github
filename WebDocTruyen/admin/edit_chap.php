<?php
    include("lib_db.php");
    $id_novel = $_REQUEST["id_novel"];
    $number_chapter = $_REQUEST["number_chapter"];
    if(isset($_POST["delete"]))
    {
        $sql = "delete from chapter where id_novel=$id_novel and number_chapter=$number_chapter";
        $delete = exec_update($sql);
        $sql = "update list_novel set total_chap = total_chap - 1 where id=$id_novel";
        $update = exec_update($sql);
        header("location:index.php");
    }
    $name_chap = $_REQUEST["name_chap"];
    $content = $_REQUEST["content"];
    $name_novel = $_REQUEST["name_novel"];
?>
<!DOCTYPE html>
<html class="HTML">
<head>
	<title>Sửa thông tin chương</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link rel="icon" href="img_ảnh1.png" type="image/png" />
	<link type="text/css" href="../css/style.css" rel="stylesheet" media="screen"/>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body>
    <div class="container" id="1" style="display: block;">
        <div class="#" style=" margin-top:10px">
            <h2>Sửa thông tin truyện</h2>
            <hr>
        </div>
        <div class="container">
            <form method="post" action="update_chap.php?id_novel=<?= $id_novel?>&number_chapter=<?= $number_chapter?>" enctype="multipart/form-data">
                <div class="form-group row">   
                <label class="col-4 col-form-label">Tên truyện</label>                        
                    <div class="col-8">
                        <input id="" readonly class="form-control" value="<?= $name_novel?>"  type="text">
                    </div>
                </div>
                <br>
                <div class="form-group row">   
                <label class="col-4 col-form-label">Tên Chương</label>                        
                    <div class="col-8">
                        <input id="" name="name_chap" class="form-control" value="<?= $name_chap?>" type="text">
                    </div>
                </div>
                <br>
                <div class="form-group row">   
                <label class="col-4 col-form-label">Nội dung</label>                        
                    <div class="col-8">
                        <textarea  id="" name="content" class="form-control" rows="5" type="text"><?= $content?></textarea>
                    </div>
                </div>
                <br>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" name="edit" class="btn btn-primary" style="">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>