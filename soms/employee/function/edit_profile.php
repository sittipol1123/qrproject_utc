<?php
	session_start();
	include("../../connect/connection.php");
	$id = $_GET["idu"];
	$dta = $_POST["sdt"];

	if ($_GET["cmd"] == "fn") {
		$upd = "UPDATE user SET firstname = '$dta' WHERE list = '$id' ";
		$sqlchk = mysql_query($upd);
		if ($sqlchk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../set_up.php';
			</script>";
		}
	}

	if ($_GET["cmd"] == "ln") {
		$upd = "UPDATE user SET lastname = '$dta' WHERE list = '$id' ";
		$sqlchk = mysql_query($upd);
		if ($sqlchk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../set_up.php';
			</script>";
		}
	}

	if ($_GET["cmd"] == "tel") {
		$upd = "UPDATE user SET tel = '$dta' WHERE list = '$id' ";
		$sqlchk = mysql_query($upd);
		if ($sqlchk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../set_up.php';
			</script>";
		}
	}

		if ($_GET["cmd"] == "usn") {
		$upd = "UPDATE user SET username = '$dta' WHERE list = '$id' ";
		$sqlchk = mysql_query($upd);
		if ($sqlchk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../set_up.php';
			</script>";
		}
	}

		if ($_GET["cmd"] == "psw") {
		$encrype = md5($dta);
		$upd = "UPDATE user SET password = '$encrype' WHERE list = '$id' ";
		$sqlchk = mysql_query($upd);
		if ($sqlchk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../set_up.php';
			</script>";
		}
	}
?>