<?php
//call; 方法可以自動產生一個新的function
$obj = new CTest();//產生一個新物件
$obj->Foo(1, 2, 3, 4);
$obj->__call($goo,1);

class CTest {
	
	function __call($MethodName, $Parameters) {
		echo "Name: ", $MethodName, "<br>";//印出自動產生的方法 call
		echo "<pre>" . var_dump($Parameters) ."</pre>";
		echo "<hr>";
	}

	
}


?>
