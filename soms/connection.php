<?php
 	$objConnect = mysql_connect("qr.utc.ac.th","admin_qrdb","c8U4hO5kqO") or die("Error Connect to Database");
  	$objDB = mysql_select_db("admin_qrDB");
  	mysql_query("set names UTF8");
  	date_default_timezone_set('Asia/Bangkok');
?>