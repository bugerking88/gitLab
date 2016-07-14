<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("mysql_connect.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["username"]) || ($_SESSION["username"]=="")){
	header("Location: login.php");
}
//更新相簿
if(isset($_POST["action"])&&($_POST["action"]=="update")){	
	//更新相簿資訊
	$query_update = "UPDATE `album` SET ";
	$query_update .= "`album_title`='".$_POST["album_title"]."',";
	$query_update .= "`album_date`='".$_POST["album_date"]."',";
	$query_update .= "`album_location`='".$_POST["album_location"]."',";	
	$query_update .= "`album_desc`='".$_POST["album_desc"]."' ";	
	$query_update .= "WHERE `album_id`=".$_POST["album_id"];
	mysql_query($query_update);	
	//更新照片資訊
	for ($i=0; $i<count($_POST["ap_id"]); $i++) {
		$query_update = "UPDATE `albumphoto` SET `ap_subject`='".$_POST["update_subject"][$i]."' WHERE `ap_id`=".$_POST["ap_id"][$i];	
		mysql_query($query_update);
	}
	//執行檔案刪除
	for ($i=0; $i<count($_POST["delcheck"]); $i++) {
		$delid = $_POST["delcheck"][$i];
		$query_del = "DELETE FROM `albumphoto` WHERE `ap_id`=".$_POST["ap_id"][$delid];	
		mysql_query($query_del);
		unlink("photos/".$_POST["delfile"][$delid]);
	}
	//執行照片新增及檔案上傳
	for ($i=0; $i<count($_FILES["ap_picurl"]); $i++) {
	  if ($_FILES["ap_picurl"]["tmp_name"][$i] != "") {
		  $query_insert = "INSERT INTO albumphoto (album_id, ap_date, ap_picurl, ap_subject) VALUES (";
		  $query_insert .= $_POST["album_id"].",";
		  $query_insert .= "NOW(),";	  
		  $query_insert .= "'". $_FILES["ap_picurl"]["name"][$i]."',";
		  $query_insert .= "'".$_POST["ap_subject"][$i]."')";		  
		  mysql_query($query_insert);		  
		  if(!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"][$i] , "photos/" . $_FILES["ap_picurl"]["name"][$i])) die("檔案上傳失敗！");;		  
	  }
	}		
	//重新導向回到本畫面
	header("Location: ?id=".$_POST["album_id"]);
}
//顯示相簿資訊SQL敘述句
$query_RecAlbum = "SELECT * FROM `album` WHERE `album_id`=".$_GET["id"];
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT * FROM `albumphoto` WHERE `album_id`=".$_GET["id"]." ORDER BY `ap_date` DESC";
//將二個SQL敘述句查詢資料到 $RecAlbum、$RecPhoto 中
$RecAlbum = mysql_query($query_RecAlbum);
$RecPhoto = mysql_query($query_RecPhoto);
//計算照片總筆數
$total_records = mysql_num_rows($RecPhoto);
//取得相簿資訊
$row_RecAlbum=mysql_fetch_assoc($RecAlbum);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<style type="text/css"></style>
<!--<link href="style.css" rel="stylesheet" type="text/css" />-->
</head>
<body bgcolor="#cccccc">
<table align="center">
  <tr>
    <td height="40">
      <p style="font-size:30px" >[網路相簿管理界面-修改相簿資訊]</p>
      <div><a href="admin.php" style="font-size:24px;color:#842B00;padding-right: 1em">[管理首頁]</a>
      <a href="member.php" style="font-size:24px;color:#842B00">[登出管理系統]</a></div></td>
  </tr>
  <tr>
    <td><div>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td>
              <div>相片總數: <?php echo $total_records;?></div>
              <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div>
                  <p>相簿內容</p>
                  <p>相簿名稱：
                    <input name="album_title" type="text" id="album_title" value="<?php echo $row_RecAlbum["album_title"];?>" />
                    <input name="album_id" type="hidden" id="album_id" value="<?php echo $row_RecAlbum["album_id"];?>" />                  
                  </p>
                  <p>拍攝時間：
                    <input name="album_date" type="text" id="album_date" value="<?php echo $row_RecAlbum["album_date"];?>" /><br />
                    拍攝地點：
                    <input name="album_location" type="text" id="album_location" value="<?php echo $row_RecAlbum["album_location"];?>" />
                  </p>
                  <p>相簿說明：
                    <textarea name="album_desc" id="album_desc" cols="45" rows="5"><?php echo $row_RecAlbum["album_desc"];?></textarea>
                  </p>
                  <hr />
                </div>
                <?php
			   $checkid=0;
			   while($row_RecPhoto=mysql_fetch_assoc($RecPhoto)){
			   ?>
                <div>
                  <div><img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" alt="<?php echo $row_RecPhoto["ap_subject"];?>" width="150" height="150" border="0" /></div>
                  <div>
                    <p>
                      <input name="ap_id[]" type="hidden" id="ap_id[]" value="<?php echo $row_RecPhoto["ap_id"];?>" />
                      <input name="delfile[]" type="hidden" id="delfile[]" value="<?php echo $row_RecPhoto["ap_picurl"];?>">
                      <input name="update_subject[]" type="text" id="update_subject[]" value="<?php echo $row_RecPhoto["ap_subject"];?>" size="15" />
                      <br />
                      <input name="delcheck[]" type="checkbox" id="delcheck[]" value="<?php echo $checkid;$checkid++?>" />
                      刪除?</p>
                  </div>
                </div>
                <?php }?>
                <div>
                  <hr />
                  <p>新增照片</p>
                  <div></div>
                  <p> 照片1
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" /><br />
                    說明1：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片2
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" /><br />
                    說明2：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片3
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" /><br />
                    說明3：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片4
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" /><br />
                    說明4：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>照片5
                    <input type="file" name="ap_picurl[]" id="ap_picurl[]" /><br />
                    說明5：
                    <input type="text" name="ap_subject[]" id="ap_subject[]" />
                  </p>
                  <p>
                    <input name="action" type="hidden" id="action" value="update">
                    <input type="submit" name="button" id="button" value="確定修改" />
                    <input type="button" name="button2" id="button2" value="回上一頁" onClick="window.history.back();" />
                  </p>
                </div>
              </form></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
