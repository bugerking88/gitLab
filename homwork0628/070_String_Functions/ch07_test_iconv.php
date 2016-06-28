<?php
  // header("content-type: text/html; charset=utf-8");
  header("content-type: text/html; charset=big5");
  $s = "許功蓋";
  echo strlen($s), ", ";  // 9
  echo strlen(iconv("UTF-8", "big5", $s));//轉換編碼(來源編碼,目標編碼,來源)
  echo "<HR>";
  echo iconv("UTF-8", "big5", $s);
?>
