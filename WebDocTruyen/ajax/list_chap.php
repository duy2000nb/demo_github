<?php
    include("../lib_db.php");
    $id = $_REQUEST["id"];
    $id_page = $_REQUEST["id_page"];
    $total_chap = $_REQUEST["total_chap"];
    $start = ($id_page-1)*50;
    $sql = "select number_chapter, name_chap from chapter where id_novel = $id order by number_chapter asc limit $start, 25";
    $list_chap1 = select_list($sql);

    $start = $id_page*50 - 25;
    $sql = "select number_chapter, name_chap from chapter where id_novel = $id order by number_chapter asc limit $start, 25";
    $list_chap2 = select_list($sql);
?>
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
                    if($i <= intdiv($total_chap-1, 50)+1){?>
                        <li <?php if($i == $id_page) echo "class=\"active\"";?> ><a onclick="changePage(<?php echo $id;?>, <?php echo $i;?>, <?php echo $total_chap;?>)" ><?= $i?></a></li>
                    <?php } else break;
                }
            } else{?>
            <?php if(intdiv($total_chap, 50) > 0){
                for($i = 0; $i <= intdiv($total_chap-1, 50); $i++){
                    if($i < 3){?>
                        <li <?php if($i == 0) echo "class=\"active\"";?> ><a onclick="changePage(<?php echo $id;?>, <?php echo $i+1;?>, <?php echo $total_chap;?>)" ><?= $i+1?></a></li> 
                    <?php }
                }
            }
            }?>
        </ul>
    </div>
</div>