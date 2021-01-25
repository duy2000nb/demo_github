<?php 
    include("lib_db.php");
    include("util.php");
    $id_novel = $_REQUEST["id_novel"];
    $number_chapter = $_REQUEST["number_chapter"];
    $name_chap = $_REQUEST["name_chap"];
    $content = $_REQUEST["content"];

    //Khởi tạo
    $data=array();
    $data["name_chap"] = $name_chap;
    $data["content"] = nl2br($content);
    $cond = "id_novel=" . $id_novel . " and number_chapter=" . $number_chapter;
    $sql_update_product = data_to_sql_update("chapter", $data, $cond);
    $ret = exec_update($sql_update_product);
    header("location:index.php");
?>