<?php
    include("lib_db.php");
    include("util.php");
    $sql = "select * from list_novel";
    $list_novel = select_list($sql);
    $sql = "select ln.name_novel, c.* from chapter c inner join list_novel ln on c.id_novel = ln.id";
    $chapter = select_list($sql);
    $sql = "select * from category";
    $categorys = select_list($sql);
    // for($i = 1; $i <= 100; $i++){
    //     $data=array();
    //     $data["number_chapter"] = $i;
    //     $data["id_novel"] = 26;
    //     $data["name_chap"] = "Băng hỏa lưỡng trọng thiên";
    //     $data["content"] = "Hai tiếng, Lục Thiếu Du hoàn không kịp phản ứng, trong miệng đã có hai viên yêu đan, ngay sau đó hai dòng chất lỏng nóng và lạnh trong xuất hiện trong cổ họng hắn. Một chất lỏng nóng như lửa đốt cháy trong thân thể hắn, trong khoảnh khắc trong cơ thể Lục Thiếu Du giống như lò thiêu. Chất lỏng còn lại thì lạnh lẽo như băng, ngay lập tức làm thân hình hắn kết thành một khối băng.
    //     ";
    //     $sql_insert_product = data_to_sql_insert("chapter", $data);
    //     $ret = exec_update($sql_insert_product);
    //     $sql = "update list_novel set total_chap = total_chap + 1 where id=26";
    //     $ret = exec_update($sql);
    // }
?>

<!DOCTYPE html>
<html class="HTML">
<head>
	<title>Quản lý danh sách truyện</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<meta http-equiv="Content-Type" content="text/shtml; charset=utf-8" />
	<link rel="icon" href="img_ảnh1.png" type="image/png" />
	<link type="text/css" href="../css/style.css" rel="stylesheet" media="screen"/>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</head>
<body style="min-width: 768px;">
    <div class="row">
        <div class="col-sm-3 btn-group-vertical" style="height: 250px; padding: 25px 0 0 25px;">
            <button type="button" onclick='onClick(1)' class="btn btn-primary menu">Đăng truyện</button>
            <button type="button" onclick='onClick(2)' class="btn btn-primary menu">Thêm thể loại</button>
            <button type="button" onclick='onClick(3)' class="btn btn-primary menu">Đăng chương mới</button>
        </div>
        <div class="col-sm-9">
            <div class="container" id="1" style="display: block;">
                <div class="#" style=" margin-top:10px">
                    <h2>Đăng truyện mới</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="add_novel.php" enctype="multipart/form-data">
                            <div class="form-group row">   
                            <label class="col-4 col-form-label">Tên truyện</label>                        
                                <div class="col-8">
                                    <input id="" name="name_novel" class="form-control "  type="text">
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
                                    <input name="author" class="form-control" type="text">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-4 col-form-label">Thể loại</label>
                                <div class="col-8">
                                    <select class="js-example-basic-multiple" name="category[]" multiple="multiple" style="width:100%;">
                                        <?php foreach($categorys as $category){?>
                                            <option value="<?= $category[0]?>"><?= $category[1]?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <br>       
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Mô tả</label>
                                <div class="col-8">
                                    <textarea name="description" rows="4" class="form-control" type="text"></textarea>
                                </div>
                            </div>  
                            <br>                
                            <div class="form-group row">
                                <label  class="col-4 col-form-label">Hot</label>
                                <div class="col-8">
                                <input name="hot" type="checkbox" style="height: 38px;">
                                </div>
                            </div>  
                            <br>                                     
                            <div class="form-group" style="text-align: center;">
                                <button type="submit" name="add" class="btn btn-primary" style="">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container" id="2" style="display: none;">
                <div class="#" style=" margin-top:10px">
                    <h2>Thêm thể loại</h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" action="add_category.php" enctype="multipart/form-data">
                            <div class="form-group row">   
                            <label class="col-4 col-form-label">Tên thể loại</label>                        
                                <div class="col-8">
                                    <input id="" name="name_category" class="form-control "  type="text">
                                </div>
                            </div>
                            <br>
                            <div class="form-group" style="text-align: center;">
                                <button type="submit" name="add" class="btn btn-primary" style="">Thêm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="container" id="3" style="display: none;">
                <div class="#" style=" margin-top:10px">
                        <h2>Đăng chương mới</h2>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form method="post" action="add_chap.php" enctype="multipart/form-data">
                                <div class="form-group row">   
                                <label class="col-4 col-form-label">Tên truyện</label>                        
                                    <div class="col-8">
                                        <select class="js-example-basic-single" name="id_novel" style="width:100%;">
                                            <?php foreach($list_novel as $list){
                                                echo "<option value=\"$list[0]\">$list[1]</option>";
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">   
                                <label class="col-4 col-form-label">Chương</label>                        
                                    <div class="col-8">
                                        <input id="" name="number_chapter" class="form-control "  type="text">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">   
                                <label class="col-4 col-form-label">Tên Chương</label>                        
                                    <div class="col-8">
                                        <input id="" name="name_chap" class="form-control "  type="text">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">   
                                <label class="col-4 col-form-label">Nội dung</label>                        
                                    <div class="col-8">
                                        <textarea  id="" name="content" class="form-control" rows="5" type="text"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group" style="text-align: center;">
                                    <button type="submit" name="add" class="btn btn-primary" style="">Thêm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <div class="container-fluid" id="4" style="display: block;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Mã truyện</th>
                <th>Tên truyện</th>
                <th>Ảnh</th>
                <th>Tác giả</th>
                <th>Mô tả</th>               
                <th>Tổng số chương</th>
                <th>Đăng lần cuối</th>
                <th>Tình trạng</th>
                <th>Hot</th>          
            </tr>
            </thead>
            <tbody>
                <?php foreach ($list_novel as $list){?>
                    <form method="post" action="edit_novel.php">
                    <tr>
                            <td><input name="id" type="hidden" value="<?php echo $list[0]; ?>"><?php echo $list[0]; ?></td>
                            <td><input name="name" type="hidden" value="<?php echo $list[1]; ?>"><?php echo $list[1]; ?></td>    
                            <td><input name="image" type="hidden" value="<?php echo $list[2]; ?>"><?php echo $list[2]; ?></td> 
                            <td><input name="author" type="hidden" value="<?php echo $list[3]; ?>"><?php echo $list[3]; ?></td>    
                            <td><input name="description" type="hidden" value="<?php echo $list[4]; ?>"><span class="limit"><?php echo $list[4]; ?></span></td>    
                            <td><?php echo $list[5]; ?></td>    
                            <td><?php echo $list[6]; ?></td> 
                            <td><input name="status" type="hidden" value="<?php echo $list[7]; ?>"><?php echo $list[7]; ?></td> 
                            <td><input name="hot" type="hidden" value="<?php echo $list[8]; ?>"><?php echo $list[8]; ?></td> 
                            <td><button type="submit" name="edit" class="btn btn-primary">Sửa</button></td>      
                            <td><button type="submit" name="delete" class="btn btn-primary">Xóa</button></td>                                                                                           
                        </tr> 
                    </form>               
                <?php }?>
            </tbody>
        </table>
    </div>
    <div class="container-fluid" id="5" style="display: none;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Mã thể loại</th>
                <th>Tên thể loại</th>        
            </tr>
            </thead>
            <tbody>
                <?php foreach ($categorys as $category){?>
                    <form method="post" action="delete_category.php">
                    <tr>
                            <td><input name="id" type="hidden" value="<?php echo $category[0]; ?>"><?php echo $category[0]; ?></td>
                            <td><input name="name" type="hidden" value="<?php echo $category[1]; ?>"><?php echo $category[1]; ?></td>    
                            <td><button type="submit" name="delete" class="btn btn-primary">Xóa</button></td>                                                                                           
                        </tr> 
                    </form>               
                <?php }?>
            </tbody>
        </table>
    </div> 
    <div class="container-fluid" id="6" style="display: none;">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tên truyện</th>
                <th>Chương</th> 
                <th>Tên chương</th>   
                <th>Nội dung</th>          
            </tr>
            </thead>
            <tbody>
                <?php foreach ($chapter as $chap){?>
                    <form method="post" action="edit_chap.php?id_novel=<?= $chap[2]?>">
                    <tr>
                            <td><input name="name_novel" type="hidden" value="<?php echo $chap[0]; ?>"><?php echo $chap[0]; ?></td>
                            <td><input name="number_chapter" type="hidden" value="<?php echo $chap[1]; ?>"><?php echo $chap[1]; ?></td>    
                            <td><input name="name_chap" type="hidden" value="<?php echo $chap[3]; ?>"><?php echo $chap[3]; ?></td> 
                            <td><input name="content" type="hidden" value="<?php echo $chap[4]; ?>"><span class="limit"><?php echo $chap[4]; ?></span></td>    
                            <td><button type="submit" name="edit" class="btn btn-primary">Sửa</button></td>      
                            <td><button type="submit" name="delete" class="btn btn-primary">Xóa</button></td>                                                                                           
                        </tr> 
                    </form>               
                <?php }?>
            </tbody>
        </table>
    </div> 
</body>
<script>
    $('.js-example-basic-multiple').select2();
    $('.js-example-basic-single').select2();
    function onClick(id){
        for(var i = 1; i < 7; i++){
            
            if(i == id || i == id + 3)
            {
                document.getElementById(i).style.display = "block";
            }
            else
            {
                document.getElementById(i).style.display = "none";
            }
        }
    }
    function update_novel(id){

    }
    function delete_novel(id){
        var sql = "delete from list_novel where id = " + id;
    }
</script>
<style>
    .menu{
        padding: 10px;
    }
    .limit{
        overflow: hidden;
        text-overflow: ellipsis;
        -webkit-line-clamp: 5;
        display: -webkit-box;
        -webkit-box-orient: vertical;
    }
</style>