<?php
function ShowStar($iCount, $sWhat = "*")//如果$sWhat 沒有傳值 預設 *
{
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)
	{
		$result .= $sWhat;
	}
	echo $result;
}

$iHowMany = 6;

ShowStar($iHowMany,"V");//傳遞變數6和"V"

?>