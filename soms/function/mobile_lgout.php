<?php
	session_start();
	$pid = $_GET["idp"];
	unset($_SESSION['UserID']);
	unset($_SESSION['id']);
	header("location:../shw_detail_mobile.php?parcelID=".$pid." ");
?>