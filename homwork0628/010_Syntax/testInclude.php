<?php
  //include("testDefine.php");沒找到檔案只警告
  include_once("testDefine.php");//只會去抓一次 
  // require("testDefine.php");沒找到檔案 就ERROR
//建議都用*_once
  echo test;
?>