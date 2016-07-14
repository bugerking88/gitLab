<?php session_start(); ?>

<?php
include("mysql_connect.php");
// header("Content-Type: text/html; charset=utf-8");
if($_SESSION['username'] != null)
{
        $id=$_SESSION['username'];
        $sql = "SELECT * FROM Member_Table where username = '$id'";
        $sql2="SELECT * FROM Photo_Table";
        $result = mysql_query($sql);

}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=login.php>';
}
//預設每頁筆數
$pageRow_records = 8;
//預設頁數

$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecAlbum = "SELECT `album`.`album_id` , `album`.`album_date` , `album`.`album_location` , `album`.`album_title` , `album`.`album_desc` , `albumphoto`.`ap_picurl`, count( `albumphoto`.`ap_id` ) AS `albumNum` FROM `album` LEFT JOIN `albumphoto` ON `album`.`album_id` = `albumphoto`.`album_id` GROUP BY `album`.`album_id` , `album`.`album_date` , `album`.`album_location` , `album`.`album_title` , `album`.`album_desc` ORDER BY `album_date` DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecAlbum = $query_RecAlbum." LIMIT ".$startRow_records.", ".$pageRow_records;
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecAlbum 中
$RecAlbum = mysql_query($query_limit_RecAlbum);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecAlbum 中
$all_RecAlbum = mysql_query($query_RecAlbum);
//計算總筆數
$total_records = mysql_num_rows($all_RecAlbum);
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);
?>

    <html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>網路相簿</title>
        <style type="text/css">
#float_photo{
height: 240px;
width: 200px;
float:left;
margin:50px;
background-color: #ADADAD;
}
        </style>
    </head>

    <body bgcolor="#9D9D9D">
        <center>
            <table width="800" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="3" valign="top">
                        <p style="font-size:5em;align:center;color:#D9B300">[生活、旅行的記錄]</p>
                        <div><a href="index.php" style="font-size:2em;align:center;color:#FFFFFF;padding-right: 1em">相簿首頁</a>
                            <a href="admin.php" style="font-size:2em;align:center;color:#FFFFFF;padding-right: 1em">相簿管理</a>
                            <a href="update.php" style="font-size:2em;align:center;color:#FFFFFF;padding-right: 1em">會員資料修改</a>
                            <a href="logout.php" style="font-size:2em;align:center;color:#FFFFFF;padding-right: 1em">登出</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div>
                            <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
                                <tr>
                                    <td>
                                        <div>
                                            <p style="font-size:2em">網路相簿總覽</p>
                                        </div>
                                        <div>
                                            <p style="font-size:2em">相簿總數:
                                                <?php echo $total_records;?>
                                            </p>
                                        </div>

                                        <?php	while($row_RecAlbum=mysql_fetch_assoc($RecAlbum)){ ?>
                                            <div id="float_photo">
                                                <a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"];?>">
                                                    <?php if($row_RecAlbum["albumNum"]==0){?><img src="img/nopic.png" alt="暫無圖片" width="120" height="120" border="0" />
                                                    <?php }else{?><img src="photos/<?php echo $row_RecAlbum["ap_picurl"];?>" alt="<?php echo $row_RecAlbum["album_title"];?>" width="180" height="180" border="0" />
                                                    <?php }?>
                                                </a>
                                          
                                                <p>
                                                    <a href="albumshow.php?id=<?php echo $row_RecAlbum["album_id"];?>">
                                                        <?php echo $row_RecAlbum["album_title"];?>
                                                    </a><br />
                                                    <span>共 <?php echo $row_RecAlbum["albumNum"];?> 張</span><br>
                                                    <br>
                                                </p>
                                            </div>
                        </div>
                        <?php }?>

                        </td>
                        </tr>
                        </table>
                        </div>
                    </td>
                </tr>
            </table>
            <div>
                            <p style="font-size:1.5em">
                                <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
                                <a href="?page=1">|&lt;</a> <a href="?page=<?php echo $num_pages-1;?>">&lt;&lt;</a>
                                <?php }else{?> |&lt; &lt;&lt;
                                <?php }?>
                                <?php
  	  for($i=1;$i<=$total_pages;$i++){
  	  	  if($i==$num_pages){
  	  	  	  echo $i." ";
  	  	  }else{
  	  	      echo "<a href=\"?page=$i\">$i</a> ";
  	  	  }
  	  }
  	  ?>
                                    <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
                                    <a href="?page=<?php echo $num_pages+1;?>">&gt;&gt;</a> <a href="?page=<?php echo $total_pages;?>">&gt;|</a>
                                    <?php }else{?> &gt;&gt; &gt;|
                                    <?php }?>
                            </p>
                        </div>
        </center>
    </body>

    </html>