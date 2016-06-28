<?php

function ShowStar() {
	$args = func_get_args();
	
	if (!isset($args[0]))
		$args[0] = 5;//沒有值就填5
	if (!isset($args[1]))
		$args[1] = "*";//沒有值就填*
	ShowStar_all($args[0], $args[1]);//isset判斷的是 "變數"

                    				//empty判斷的是 "值"
}

function ShowStar_all($iCount, $sWhat = "*")
{
	if ($iCount <= 0)
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

ShowStar(2, "^");//傳值進去
ShowStar(null, "$");
ShowStar();//沒有傳值進去就用預設的
?>