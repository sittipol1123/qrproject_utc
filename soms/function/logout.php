<?php
	session_start();
	unset($_SESSION['UserID']);
	unset($_SESSION['id']);
	mysql_close();
	header("location:../index.html");
?>