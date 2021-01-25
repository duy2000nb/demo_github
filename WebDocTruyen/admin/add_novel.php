<?php 
    include("lib_db.php");
    include("util.php");
    $name_novel = $_REQUEST["name_novel"];
    $image = ($_FILES["image"]["name"]!="") ? upload_file_by_name("image") : "";
    $author = $_REQUEST["author"];
    $category = $_REQUEST["category"];
    $description = $_REQUEST["description"];
    $hot = isset($_REQUEST["hot"])?1:0;

    //Khởi tạo
    $data=array();
    $data["id"] = null;
    $data["name_novel"] = $name_novel;
    $data["image"] = $image; 
    $data["author"] = $author;
    $data["description"] = nl2br($description);
    $data["total_chap"] = 0;
    date_default_timezone_set('Etc/GMT-7');
    $data["update_time"] = date("Y-m-d H:i:s");
    $data["status"] = false;
    $data["hot"] = $hot;
    $sql_insert_product = data_to_sql_insert("list_novel", $data);
    $ret = exec_update($sql_insert_product);
    $sql = "select id from list_novel where name_novel = \"$name_novel\"";
    $id_novel = select_one($sql);
    $data=array();
    $data["id_novel"] = $id_novel[0];
    foreach($category as $value){
        $data["id_category"] = $value;
        $sql_insert_product = data_to_sql_insert("category_novel", $data);
        $ret = exec_update($sql_insert_product);
    }
    // print_r($data);
    header("location:index.php");
?>