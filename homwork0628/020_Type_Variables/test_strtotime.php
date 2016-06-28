<?php
  $d = strtotime("2012-09-10");//距離1970-01-01的秒數
  
  // $d = strtotime("2012-09-10 -3 days");
  // $d = strtotime("2012-09-10 +1 month");
  echo $d;
  echo "<br>";
  echo date("Y-m-d", $d);
?>
