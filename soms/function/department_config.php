<?php
	session_start();
	include("../connect/connection.php");

	$name_d = $_POST["d_name"];
	$depart_id = $_GET["id"];
	$user_id = $_GET["idu"];

	// echo $user_id;
	// echo "<br>";
	// echo $depart_id;
	// echo "<br>";
	// echo $name_d;

	if ($_GET["cmd"] == 'edt') {
		$str_up = "UPDATE department SET department_name = '$name_d' WHERE department_id = '$depart_id'";
		$chk = mysql_query($str_up);
		if ($chk) {
			echo "
			<script>
				alert('แก้ไขเสร็จแล้ว');
				window.location = '../set_up.php?idu=".$user_id."';
			</script>";
		}
	}

	if ($_GET["cmd"] == 'ins') {

		$rnd = rand(0000000000,9999999999);

		$typ = pathinfo(basename($_FILES['imgno1']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/department/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['imgno1']['tmp_name'],$upload_path);

		$image_name = $name_new;
		$str_ins = "INSERT INTO department (department_id,department_name,image_depart) VALUES ('$rnd','$name_d','$image_name')";
		$chk = mysql_query($str_ins);
		if ($chk) {
			echo "
			<script>
				alert('เพิ่มข้อมูลสำเร็จ');
				window.location = '../set_up.php?idu=".$user_id."';
			</script>";
		}
	}

	if ($_GET["cmd"] == 'del') {
		$str = "SELECT * FROM department WHERE department_id = '$depart_id'";
		$strq = mysql_query($str);
		$fet = mysql_fetch_array($strq);
		$img = $fet["image_depart"];

		@unlink("../images/department/".$img);

		$str_del = "DELETE FROM department WHERE department_id = '$depart_id'";
		$chk = mysql_query($str_del);
		if ($chk) {
			echo "
			<script>
				alert('ลบข้อมูลสำเร็จ');
				window.location = '../set_up.php?idu=".$user_id."';
			</script>";
		}
	}
?>