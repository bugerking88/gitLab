<?php

echo "Path and FileName:" . __FILE__ . "<br />";//找到實體路徑
echo "Path: " . dirname ( __FILE__ )."/data/team.txt";//只取前面
echo "Filename: " . basename ( __FILE__ ) . "<br />";//檔名
echo "Filesize: " . filesize ( __FILE__ )?>檔案大小

