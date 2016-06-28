<?php
header("Content-Type: image/png");//MINE

$filename = "cc.png";
$fileHandle = fopen($filename, "rb");
echo fread($fileHandle, filesize($filename));//fread 盡量不干涉的情況讀進來
fclose($filename);

?>