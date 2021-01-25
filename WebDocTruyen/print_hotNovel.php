<?php
    if($i == 3 or $i == 9){
        echo "hidden-xs col-sm-3 col-md-2";
    }
    else if(($i > 3 and $i < 6) or ($i > 9 and $i < 12)){
        echo "hidden-xs hidden-sm col-md-2";
    }
    else{
        echo "col-xs-4 col-sm-3 col-md-2";
    }
?>