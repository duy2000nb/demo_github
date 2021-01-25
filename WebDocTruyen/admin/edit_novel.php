<?php
    include("lib_db.php");
    $id = $_REQUEST["id"];
    if(isset($_POST["delete"]))
    {
        $sql = "delete from list_novel where id=$id";
        $delete = exec_update($sql);
        header("location:index.php");
    }
    $name = $_REQUEST["name"];
    $image = $_REQUEST["image"];
    $author = $_REQUEST["author"];
    $description = $_REQUEST["description"];
    $status = $_REQUEST["status"];
    $hot = $_REQUEST["hot"];
?>
<!DOCTYPE html>
<html class="HTML">
<head>
	<title>Sửa thông tin truyện</title>
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
            <form method="post" action="update_novel.php?id_novel=<?= $id?>" enctype="multipart/form-data">
                <div class="form-group row">   
                <label class="col-4 col-form-label">Tên truyện</label>                        
                    <div class="col-8">
                        <input id="" name="name_novel" class="form-control" value="<?= $name?>" type="text">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-4 col-form-label">Ảnh</label>
                    <div class="col-8">
                    <input id="" name="image" class="form-control-file" type="file">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-4 col-form-label">Tác giả</label>
                    <div class="col-8">
                        <input name="author" class="form-control" value="<?= $author?>"type="text">
                    </div>
                </div>
                <br>       
                <div class="form-group row">
                    <label  class="col-4 col-form-label">Mô tả</label>
                    <div class="col-8">
                    <textarea name="description" class="form-control" rows="10" type="text"><?= $description?></textarea>
                    </div>
                </div> 
                <br>                
                <div class="form-group row">
                    <label  class="col-4 col-form-label">Trạng thái</label>
                    <div class="col-8">
                        <input name="status" type="checkbox" <?php if(!empty($status)) echo "checked";?> style="height: 38px;">
                    </div>
                </div>   
                <br>                
                <div class="form-group row">
                    <label  class="col-4 col-form-label">Hot</label>
                    <div class="col-8">
                        <input name="hot" type="checkbox" <?php if(!empty($hot)) echo "checked";?> style="height: 38px;">
                    </div>
                </div>  
                <br>                                     
                <div class="form-group" style="text-align: center;">
                    <button type="submit" name="edit" class="btn btn-primary" value="<?= $id?>" style="">Sửa</button>
                </div>
            </form>
        </div>
    </div>
</body>