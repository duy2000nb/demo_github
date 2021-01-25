<?php 
    include("lib_db.php");
    include("util.php");
    $name_category = $_REQUEST["name_category"];


    //Khởi tạo
    $data=array();
    $data["id"] = null;
    $data["name"] = $name_category;
    $sql_insert_product = data_to_sql_insert("category", $data);
    $ret = exec_update($sql_insert_product);
    header("location:index.php");
?>