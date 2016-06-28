<?php
header("content-type: text/html; charset=utf-8");

function ran($a){
   

for($i=0;$i<6;$i){
    // echo ran()."<br>";
    
     $num=rand(0,48);
    if($a[$num]!=null)
    {
        $fi.=$a[$num].",";
        $a[$num]=null;
        $i++;
       
    }

}
    echo $fi."<br>";   
    
}
if(isset($_POST["num"])){
    for($i=0,$x=1;$i<49;$i++,$x++){
    $a[$i]=$x;
    // echo $a[$i]."<br>";
}
 ran($a);
}
?>
<html>
    <head></head>
    <body>
        <form method="post">
            <input type="submit" id="num"name="num" value="開獎">
            
        </form>
        
    </body>
</html>    