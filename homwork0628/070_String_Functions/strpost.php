<?php
$s="abc1234abc";
$iPos=strpos($s,"1234");//找字串裡面有沒有1234
//=== 資料型態也必須相同
if($iPos!==false){
    echo "FIND";
}
else{
    echo "NOT FOUND";
}
?>