<?php 
    include("lib_db.php");
    include("util.php");
    $id_novel = $_REQUEST["id_novel"];
    $name_novel = $_REQUEST["name_novel"];
    $image = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image") : "";
    $author = $_REQUEST["author"];
    $description = $_REQUEST["description"];
    $status = isset($_REQUEST["status"])?1:0;
    $hot = isset($_REQUEST["hot"])?1:0;

    //Khởi tạo
    $data=array();
    $data["name_novel"] = $name_novel;
    if(!empty($image)){
        $data["image"] = $image; 
    }
    $data["author"] = $author;
    $data["description"] = nl2br($description);
    $data["status"] = $status;
    $data["hot"] = $hot;
    $cond = "id=" . $id_novel;
    $sql_update_product = data_to_sql_update("list_novel", $data, $cond);
    $ret = exec_update($sql_update_product);
    header("location:index.php");
?>