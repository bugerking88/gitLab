<?php
//Office lens
  $x = getdate();//取的時間的陣列
  //var_dump($x);
  echo gettype($x), "<br>";
  
  $x = date('Y-m-d H:i:s');//常用的格式   格式化一个本地时间／日期
  echo $x, "<br>";
  echo gettype($x), "<br>";//string
  
  $x = gmdate('Y-m-d H:i:s');//           格林威治時間
  echo $x, "<br>";//2016-06-23 06:43:00
  
  $x = strtotime(gmdate('Y-m-d H:i:s'));
  echo $x, "<br>";//1466664180
  echo gettype($x), "<br>";//integer
  
?>