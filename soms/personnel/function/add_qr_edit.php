<?php
	session_start();
	include("../connect/connection.php");

	date_default_timezone_set('Asia/Bangkok');
	$act = $_GET["act"];
	$idp = $_GET["id"];
	$uid = $_GET["uid"];
	$dta = $_POST["data"];
	$datenow = date("Y-m-d");

	if ($act == "nber") {
		$upd = "UPDATE parcel SET parcel_id = '$dta' , survey_date = '$datenow' WHERE id = '$idp' ";
		$chk = mysql_query($upd);
			$selu = "SELECT * FROM user WHERE id = '$uid' ";
			$seluquery = mysql_query($selu);
			$shwu = mysql_fetch_array($seluquery);
			$check_user = $shwu["status"];
			$idu = $shwu["id"];

			if ($chk) {
				echo "
					<script>
						alert('แก้ไขแล้ว');
						window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
					</script>";
			}else{
				echo "
					<script>
						alert('แก้ไขข้อมูลผิดพลาด');
						window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
					</script>";
			}
	}

	if ($act == "allp") {

		$upd = "UPDATE parcel SET all_volume = '$dta' , survey_date = '$datenow' WHERE id = '$idp' ";
		$chk = mysql_query($upd);

		if ($chk) {

			$selu = "SELECT * FROM user WHERE id = '$uid' ";
			$seluquery = mysql_query($selu);
			$shwu = mysql_fetch_array($seluquery);
			$check_user = $shwu["status"];
			$idu = $shwu["id"];

			echo "
				<script>
					alert('แก้ไขแล้ว');
					window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
				</script>";
		}else{
			echo "
				<script>
					alert('แก้ไขข้อมูลผิดพลาด');
					window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
				</script>";
		}
	}

	if ($act == "goodp") {

		$selu = "SELECT * FROM user WHERE id = '$uid' ";
		$seluquery = mysql_query($selu);
		$shwu = mysql_fetch_array($seluquery);

		$all = $shwu["all_volume"];

		$resultnw = $all - $dta;

		$upd = "UPDATE parcel SET good_volume = '$dta' , notwork_volume = '$resultnw' , survey_date = '$datenow' WHERE id = '$idp' ";
		$chk = mysql_query($upd);

		if ($chk) {
			echo "
				<script>
					alert('แก้ไขข้อมูลสำเร็จ');
					window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
				</script>";
		}else{
			echo "
				<script>
					alert('แก้ไขข้อมูลผิดพลาด');
					window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
				</script>";
		}
	}

	if ($act == "notp") {

		$selu = "SELECT * FROM user WHERE id = '$uid' ";
		$seluquery = mysql_query($selu);
		$shwu = mysql_fetch_array($seluquery);
		$all = $shwu["all_volume"];
		$good = $shwu["good_volume"];

		$result = $good + $dta;

		if ($result == $all) {
			$upd = "UPDATE parcel SET notwork_volume = '$dta' , survey_date = '$datenow' WHERE id = '$idp' ";
			$chk = mysql_query($upd);

			if ($chk) {
				echo "
					<script>
						alert('แก้ไขข้อมูลสำเร็จ');
						window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
					</script>";
			}else{
				echo "
					<script>
						alert('แก้ไขข้อมูลผิดพลาด');
						window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
					</script>";
			}
		}else{
			echo "
				<script>
					alert('แก้ไขข้อมูลผิดพลาด');
					window.location = '../shw_detail_mobile.php?pid=".$idp."&idu=".$uid."';
				</script>";
		}
	}
?>