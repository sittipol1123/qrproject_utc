<?php
session_start();
mysql_connect('localhost','root','01234567');
mysql_select_db('pms');

$sql = "SELECT * FROM parcel" ;
$objsql = mysql_query($sql);
$resultsql = mysql_fetch_array($objsql);

$list = $resultsql['list'];
mysql_close();

session_start();
mysql_connect('localhost','root','01234567');
mysql_select_db('pms');

$sql = "SELECT * FROM myqrcode" ;
$objsql = mysql_query($sql);
$resultsql = mysql_fetch_array($objsql);

$qrlocation = $resultsql['qrcode'];
mysql_close();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1> <?php echo $list; ?> </h1><br>
<img src="gen_qrcode/temp/<?php echo $qrlocation; ?>">
</body>
</html>