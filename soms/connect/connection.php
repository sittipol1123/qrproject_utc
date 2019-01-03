<?php
 	$objConnect = mysql_connect("localhost","root","01234567") or die("Error Connect to Database");
  	$objDB = mysql_select_db("pms");
  	mysql_query("set names UTF8");
  	date_default_timezone_set('Asia/Bangkok');
?>