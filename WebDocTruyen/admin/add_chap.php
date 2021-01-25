<?php 
    include("lib_db.php");
    include("util.php");
    $id_novel = $_REQUEST["id_novel"];
    $number_chapter = $_REQUEST["number_chapter"];
    $name_chap = $_REQUEST["name_chap"];
    $content = $_REQUEST["content"];

    //Khởi tạo
    $data=array();
    $data["number_chapter"] = $number_chapter;
    $data["id_novel"] = $id_novel;
    $data["name_chap"] = $name_chap;
    $data["content"] = nl2br($content);
    $sql_insert_product = data_to_sql_insert("chapter", $data);
    $ret = exec_update($sql_insert_product);
    $sql = "update list_novel set total_chap = total_chap + 1 where id=$id_novel";
    $ret = exec_update($sql);
    header("location:index.php");
?>