<?php
session_start();
include("../../connect/connection.php");
date_default_timezone_set('Asia/Bangkok');
	
	$datenow = date("Y-m-d");
	$n_parcel = $_POST["p_name"];
	$de_parcel = $_POST["p_detail"];
	$type_parcel = $_POST["p_type"];
	$parcel_depart = $_POST["p_depart"];
	$idp = $_GET["idp"];

	if ($n_parcel != ' ' && $type_parcel != ' ' && $parcel_depart != ' ') {
		$strup = "UPDATE parcel SET name = '$n_parcel',detail = '$de_parcel',type_number = '$type_parcel',department_number = '$parcel_depart',date_check = '$datenow' WHERE parcel_id = '$idp'";
		$chk = mysql_query($strup);
		if ($chk) {
			echo "
					<script>
						alert('แก้ไขแล้ว');
						window.location = '../edit_parcel.php?idp=".$idp."';
					</script>";
			}else{
				echo "
					<script>
						alert('แก้ไขข้อมูลผิดพลาด');
						window.location = '../edit_parcel.php?idp=".$idp."';
					</script>";
			}
	}
?>