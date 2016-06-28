<?php

for ($i = 1; $i <= 3; $i++) {
	for ($j = 1; $j <= 4; $j++) {
		echo "$i , $j <br>";
		if (($i + $j) % 4 == 0)//餘數是0 跳出FOR
		    break;//跳一層
		    //break 2;//跳兩層
		    //continue 2; 不執行這行下面的程式 繼續進行下2層的for
	}
	echo "-----<br>";
}


?>