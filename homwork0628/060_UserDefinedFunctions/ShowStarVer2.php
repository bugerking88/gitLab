<?php
function ShowStar($iCount)
{
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)//迴圈跑icount次 
	{
		$result .= "*";//$result=$result."*";
	}
	echo $result;
}

$iHowMany = 3;
ShowStar($iHowMany);//傳遞參數進showstar 這個函式
?>