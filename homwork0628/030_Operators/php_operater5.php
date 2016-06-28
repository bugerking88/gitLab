<?php
  $x = 1;
  $y = $x++;//$y=$x;$x++;
  echo "x = $x, y = $y";
  //x = 2, y = 1
  echo "<br>";

  $x = 1;
  $y = ++$x;//$x++;$y=$x;
  echo "x = $x, y = $y";//x = 2, y = 2
?>
