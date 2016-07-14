<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("mysql_connect.php");
//顯示照片SQL敘述句
$query_RecPhoto="SELECT `album`.`album_title`,`albumphoto`.* FROM `album`,`albumphoto` WHERE (`album`.`album_id`=`albumphoto`.`album_id`) AND `ap_id`=".$_GET["id"];
//將SQL敘述句查詢資料到 $result 中
$RecPhoto=mysql_query($query_RecPhoto);
//取得相簿資訊
$row_RecPhoto=mysql_fetch_assoc($RecPhoto);
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
    <td height="124" valign="top" ><div><p style="font-size:40px" >相片瀏覽</p></div>
      <div><a href="member.php" style="padding-right: 20px;font-size:25px">|相簿首頁|</a>
      <a href="admin.php" style="font-size:25px">|相簿管理|</a></div></td>
  </tr>
  <tr>
    <td><div>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td><div><p style="font-size:21px"><?php echo $row_RecPhoto["album_title"];?></p></div>
              <div><img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" /></div>
              <div>
                <p style="font-size:18px">相片描述:<?php echo $row_RecPhoto["ap_subject"];?></p>
                <p style="font-size:18px">拍攝時間:<?php echo $row_RecPhoto["ap_date"];?></p>
                 <div><a href="albumshow.php?id=<?php echo $row_RecPhoto["album_id"];?>">回上一頁</a></div>
              </div></td>
          </tr>
        </table>
      </div></td>
  </tr>
</table>
</body>
</html>
