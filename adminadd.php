<?php
header("Content-Type: text/html; charset=utf-8");
require_once("mysql_connect.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["username"]) || ($_SESSION["username"]=="")){
	header("Location: login.php");
}
//新增相簿
if(isset($_POST["action"])&&($_POST["action"]=="add")){
	$query_insert = "INSERT INTO `album` (`album_title` ,`album_date` ,`album_location` ,`album_desc`) VALUES (";
	$query_insert .= "'".$_POST["album_title"]."',";
	$query_insert .= "'".$_POST["album_date"]."',";
	$query_insert .= "'".$_POST["album_location"]."',";	
	$query_insert .= "'".$_POST["album_desc"]."')";
	mysql_query($query_insert);
	//取得新增的相簿編號
	$album_pid = mysql_insert_id();
	
	for ($i=0; $i<count($_FILES["ap_picurl"]["name"]); $i++) {
	  if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
		  $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (";
		  $query_insert .= $album_pid.",";
		  $query_insert .= "NOW(),";	  
		  $query_insert .= "'". $_FILES["ap_picurl"]["name"][$i]."',";
		  $query_insert .= "'".$_POST["ap_subject"][$i]."')";		  
		  mysql_query($query_insert);
		  if(!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i] , "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");;		  
	  }
	}	
	
	//重新導向到修改畫面
	header("Location: adminfix.php?id=".$album_pid);
}	
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<style type="text/css"></style>
</head>
<body bgcolor="#cccccc">
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="124" valign="top"><div>
      <p style="font-size:5em;align:center;color:#D9B300">[相片上傳]</p><br />
      </div>
      <div><a href="admin.php" style="font-size:2em;align:center;color:#000000;padding-right: 1em">[管理首頁]</a>
      <a href="member.php" style="font-size:2em;align:center;color:#000000">[登出管理系統]</a></div></td>
  </tr>
  <tr>
    <td><div>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td><div> 網路相簿管理界面-相增相簿</div>
              <div><a href="#" onClick="window.history.back();">回上一頁</a></div>
              <div>
                <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                  <p>相簿名稱：
                    <input type="text" name="album_title" id="album_title" />
                  </p>
                  <p>拍攝時間：
                    <input name="album_date" type="text" id="album_date" value="<?php echo date("Y-m-d H:i:s");?>" />
                    拍攝地點 ：
                    <input type="text" name="album_location" id="album_location" />
                  </p>
                  <p>相簿說明：
                    <textarea name="album_desc" id="album_desc" cols="100" rows="5"></textarea>
                  </p>
                  <hr />
                  <p> 照片1
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                    說明1：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片2
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                    說明2：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片3
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                    說明3：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片4
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                    說明4：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片5
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" />
                    說明5：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>
                    <input name="action" type="hidden" id="action" value="add">    
                    <input type="submit" name="button" id="button" value="確定新增" />
                    <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                  </p>
                </form>
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
