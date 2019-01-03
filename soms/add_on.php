<?php
session_start();
include("connect/connection.php");

 	$firstname = $_POST['fname'];
 	$lastname = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$status = $_POST['status'];
	$tel = $_POST['tellephone'];
	$depart = $_POST['department'];
	$randdom = rand(0000000000,9999999999);


	if ($firstname == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'add_user.php';
			</script>";
	}elseif ($lastname == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'add_user.php';
			</script>";
	}elseif ($username == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'add_user.php';
			</script>";
	}elseif ($password == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'add_user.php';
			</script>";
	}elseif ($status == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'add_user.php';
			</script>";

	}else{
		$incrype = md5($password);

        $SQL = " insert into user (list,firstname,lastname,username,password,status,id,depart,tel) values ('','$firstname','$lastname','$username','$incrype','$status','$randdom','$depart','$tel'); ";
    $check = mysql_query($SQL);
    
	if ($check) {
		echo "
			<script>
				alert('บันทึก');
				window.location = 'add_user.php';
			</script>";
	}else{
		echo "
			<script>
				alert('ทำรายการไม่สำเร็จ');
				window.location = 'add_user.php';
			</script>";
	}
}
?>