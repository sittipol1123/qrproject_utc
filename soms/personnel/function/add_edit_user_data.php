<?php
	session_start();
	include("../connect/connection.php");

	$id = $_GET['idu'];
	$usname = $_POST['username'];
	$pass = $_POST['password'];
	$tell = $_POST['tell'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];

	$up = "UPDATE user SET firstname = '$fname',lastname = '$lname',username = '$usname',password = '$pass',tel = '$tell' WHERE list = '$id' ";
	$check = mysql_query($up);

	if ($check) {
	 	echo "
	 	<script>
			alert('บันทึก');
			window.location = '../delete_user.php';
		</script>";
	 }else{
	 	echo "
	 	<script>
			alert('บันทึกไม่สำเร็จ');
			window.location = '../user_edit.php';
		</script>";
	 }


?>