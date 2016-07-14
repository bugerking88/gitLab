<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("mysql_connect.php");
//計算點閱數
if(isset($_GET["action"])&&($_GET["action"]=="hits")){	
	$query_hits = "UPDATE `albumphoto` SET `ap_hits`=`ap_hits`+1 WHERE `ap_id`=".$_GET["id"];
	mysql_query($query_hits);
	header("Location: albumphoto.php?id=".$_GET["id"]);
}
//顯示相簿資訊SQL敘述句
$query_RecAlbum="SELECT * FROM `album` WHERE `album_id`=".$_GET["id"];
//顯示照片SQL敘述句
$query_RecPhoto="SELECT * FROM albumphoto WHERE album_id=".$_GET["id"];
//將二個SQL敘述句查詢資料儲存到 $RecAlbum、$RecPhoto 中
$RecAlbum=mysql_query($query_RecAlbum);
$RecPhoto=mysql_query($query_RecPhoto);
//計算照片總筆數
$total_records=mysql_num_rows($RecPhoto);
//取得相簿資訊
$row_RecAlbum=mysql_fetch_assoc($RecAlbum);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>網路相簿</title>
<style type="text/css">
#float_photo{
height: 230px;
width: 200px;
float:left;
margin:50px;
background-color: #28FF28;
}
</style>
</head>
<body bgcolor="#cccccc">
 <center>
<table width="778" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <td height="124"><p style="font-size:60px" >[生活、旅行的記錄]</p>
    <a href="member.php"><p style="font-size:30px;color:#842B00;padding-right: 1em">[相簿首頁]</p></a> 
    <a href="admin.php"><p style="font-size:30px;color:#842B00">[相簿管理]</p></a></td>
  </tr>
  <tr>
   <td><div>
     <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
       <tr>
         <td><div><p style="font-size:30px"><?php echo $row_RecAlbum["album_title"];?></p>
           </div>
           <div>照片總數：<?php echo $total_records;?></div>
           <div>
             <p style="font-size:20px">拍攝時間：<?php echo $row_RecAlbum["album_date"];?>
             拍攝地點：
             <?php echo $row_RecAlbum["album_location"];?></p>
             <p style="font-size:15px"><?php echo nl2br($row_RecAlbum["album_desc"]);?></p>
             </div>
           <?php while($row_RecPhoto=mysql_fetch_assoc($RecPhoto)){?>
           <div id="float_photo">
           <div><a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>"><img src="photos/<?php echo $row_RecPhoto["ap_picurl"];?>" alt="<?php echo $row_RecPhoto["ap_subject"];?>" width="180" height="180" border="0" /></a></a></div>
           <div><a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>"><?php echo $row_RecPhoto["ap_subject"];?></a><br />
             <span>點閱次數：<?php echo $row_RecPhoto["ap_hits"];?></span></div>
           </div>
           <?php }?></td>
         </tr>
     </table>
   </div></td>
  </tr>

</table>
</center>
</body>
</html>
