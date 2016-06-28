<?php
$a = 20;
function myFunction($b) {
	//echo "a = $a<br>";
	$a = 30;
	//echo "a = $a<br>";
	global $a, $c;// 這邊才會抓到函式外面的全域變數 $a=20
	//echo "a = $a<br>";
	return $c = ($b + $a);
}
// 請預測答案是多少?
echo myFunction(40) + $c;//120
?>