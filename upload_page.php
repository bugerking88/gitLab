<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<HTML>
<head>
<link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
    body{
       background-color:gray; 
    }
</style>

</head>
<BODY>
    <header class="main-header">
        <div class="container text-center">
        <h1 class="top-title">圖片檔案上傳:</h1>
        </div>
    </header>
<?php
include("mysql_connect.inc.php");   
if($_SESSION['username'] == null){
    echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}

if (isset ( $_POST ["btnOK"] )) {//關聯陣列
	processFile ( $_FILES ["upfile"] );
}
function processFile($objFile) {
	if ($objFile ["error"] != 0) {
		echo "Upload Fail! ";
		echo "<a href='javascript:window.history.back();'>Back</a>";
		return;
	}

	$test = move_uploaded_file ( $objFile ["tmp_name"], 
	"photos/" . $objFile ["name"] );
	if (! $test) {
		die ( "move_uploaded_file() faile" );
	}
	
	echo "File uploaded<br />";
	echo "File name: " . $objFile ["name"] . "<br />";
	echo "File type: " . $objFile ["type"] . "<br />";
	echo "File size: " . $objFile ["size"] . "<br />";
	
	echo "--  Done --";

	header("refresh:2 ; upload_page.php");
}
?>      
<!--<H3>圖片檔案上傳:<HR></H3>-->
<div align="center">
<Form Method="post" enctype="multipart/form-data" action="">
<Input Type="File" Name="upfile" ><br>
<Input Type="Submit" name="btnOK" value=" 開始上傳 ">
</Form>

<a href="member.php">上一頁</a>
</div>
</BODY>
</HTML>
