<?php
function ShowStar($iCount, $sWhat = "*")
{
	if ($iCount <= 0)//先檢查數值範圍 如果不再裡面就先跳出
	{
		echo "iCount > 0 please";
		return;
	}
	if ($iCount > 20)
	{
		echo "iCount <= 20 please";
		return;
	}
	
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)
	{
		$result .= $sWhat;
	}
	echo $result;
}

$iHowMany = 21;
ShowStar($iHowMany);
?>