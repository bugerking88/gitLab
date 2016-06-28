<?php
  $x = 3;
  if ($x >= 10 && foo())//第一條件不滿足第二條件就不跑 精簡評估
    echo "yes";
  else
    echo "no";
    
  echo "<hr>";

  $x = 3;
  if ($x >= 10 & foo())//全部都會執行
    echo "yes";
  else
    echo "no";
    
function foo()
{
   echo "foo() is running.<br>";
}

?>