<?php 
    include("lib_db.php");
    $id = $_REQUEST["id"];
    $sql = "delete from category where id=$id";
    $delete = exec_update($sql);
    print_r($_REQUEST);
    header("location:index.php");
?>