<?php 

if (isset($_COOKIE["userName"]))
  $sUserName = $_COOKIE["userName"];
else 
  $sUserName = "Guest";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Lab - index</title>
</head>
<body style="background-color:#C4E1FF;">

<table width="600" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#B15BFF" >
  <tr>
    <td align="center" bgcolor="#CCCCCC"><font color="#000000">會員系統 - 首頁</font></td>
  </tr>
  <tr>
  
  <?php if ($sUserName == "Guest"): ?>
    <td align="center" valign="baseline"><a href="login.php"><input type="submit" value="登入"  style="background-color:pink"></a> 
    
  <?php else: ?>
    <td align="center" valign="baseline"><a href="login.php?logout=1"><input type="submit" value="登出"  style="background-color:pink"></a>
  <?php endif; ?>
    
    | <a href="secret.php"><input type="submit" value="會員專用頁"  style="background-color:pink"></a></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#01814A"><?php echo "Welcome! " . $sUserName ?> </td>
  </tr>
</table>


</body>
</html>