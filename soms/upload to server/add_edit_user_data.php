<?php
	session_start();
	include("../connect/connection.php");

	$id = $_GET['idu'];
	$usname = $_POST['username'];
	$pass = $_POST['password'];
	$incry_pass = md5($pass);
	$tell = $_POST['tell'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$type = $_POST['depart'];
	$statusX = $_POST['txtStatus'];
	
	if ($pass != '') {
		$up = "UPDATE user SET password = '$incry_pass' WHERE list = '$id' ";
		$check = mysql_query($up);

		if ($check) {
			 	$up2 = "UPDATE user SET firstname = '$fname',lastname = '$lname',username = '$usname',tel = '$tell',depart = '$type',status = '$statusX' WHERE list = '$id' ";
				$check2 = mysql_query($up2);

				if ($check2) {
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
		 }else{
		 	echo "
		 	<script>
				alert('บันทึกไม่สำเร็จ');
				window.location = '../user_edit.php';
			</script>";
		 }
	}else{

		$up2 = "UPDATE user SET firstname = '$fname',lastname = '$lname',username = '$usname',tel = '$tell',depart = '$type' ,status = '$statusX' WHERE list = '$id' ";
		$check2 = mysql_query($up2);

			if ($check2) {
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
	}
?>