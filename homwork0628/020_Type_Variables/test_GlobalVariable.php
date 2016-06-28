<?php
 $a = 20;//預設情況看不到全域變數
function myfunction($b) {//$b=40
	// print "a=$a<br>";$a=空值

	$a = 30;
	// print "a=$a<br>"; $a=30
	global $a, $c;//此時的變數$a 抓函示外面的 20
	//$c 外面沒有 既便宣告成global變數
	// print "a=$a<br>";
	return $c = ($b + $a);//C=60
}
print myfunction(40) + $c;// 60+60
?>