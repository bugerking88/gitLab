<?php
	$score = 95;//一項一項進行比對
	if ($score >=60 && $score < 70) {//大於等於60小於70就印D 
		echo 'D';
	} elseif ($score>=70 && $score<80) {
		echo 'C';
	} elseif ($score>=80 && $score<90) {
		echo 'B';		
	} elseif ($score>=90 && $score<=100) {
		echo 'A';		
	} else {
		echo 'Fail';
	}
?>