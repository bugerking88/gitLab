<?php
$iSum = 0;
$i = 1;
while ($i <= 10)
{
	$iSum += $i;//$iSum 累加$i的值
	$i += 1;//$i 每次加一
}
echo $iSum;

echo "<hr>";

$iSum = 0;
$i = 0;
while ($i < 10)
{
	$i++;//$i 每次加一
	$iSum += $i;//$iSum 累加$i的值
}
echo $iSum
?>