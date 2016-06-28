<?php
function ShowStar($iCount, $sWhat = "*")//討論有沒有效率比較好的方法
{
	if ($iCount > 0)//要輸入大於0
	{
		if ($iCount <= 20)//小於20
		{
			$result = "";
			for ($i = 1; $i <= $iCount; $i++)
			{
				$result .= $sWhat;
			}
			echo $result;
		}
		else 
			echo "iCount <= 20 please.";
	}
	else
	{
		echo "iCount > 0 please.";
	}
}

$iHowMany = 21;
ShowStar($iHowMany);
?>