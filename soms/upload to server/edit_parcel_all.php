<?php
session_start();
include("../connect/connection.php");
date_default_timezone_set('Asia/Bangkok');
	
	$datenow = date("Y-m-d");
	$n_parcel = $_POST["p_name"];
	$de_parcel = $_POST["p_detail"];
	$type_parcel = $_POST["p_type"];
	$parcel_depart = $_POST["p_depart"];
	$idp = $_GET["idp"];
	$pnmber = $_POST["parcel_num"];
	$fk_pcel = $_GET["fkp"];

	$select = "SELECT * FROM parcel";
	$selquery = mysql_query($select);
	while ($chk = mysql_fetch_array($selquery)) {
		if ($chk["parcel_number"] == $pnmber) {
			echo "
				<script>
						alert('มีหมายเลขครุภัณฑ์นี้แล้ว');
						window.location = '../edit_parcel.php?idp=".$idp."';
					</script>";
				exit();
		}
	}

	if ($n_parcel != ' ' && $type_parcel != ' ' && $parcel_depart != ' ') {
		$strup = "UPDATE parcel SET parcel_number = '$pnmber', name = '$n_parcel',detail = '$de_parcel',type_number = '$type_parcel',department_number = '$parcel_depart',date_check = '$datenow' WHERE parcel_id = '$idp'";
		$chk = mysql_query($strup);
		if ($chk) {
			$up = "UPDATE image_parcel SET id_parcel =  '$pnmber' WHERE id_parcel ='$fk_pcel'";
			$chk2 = mysql_query($up);
			if ($chk2) {
					echo "
							<script>
								alert('แก้ไขแล้ว');
								window.location = '../edit_parcel.php?idp=".$idp."';
							</script>";
					}
			}else{
				echo "
					<script>
						alert('แก้ไขข้อมูลผิดพลาด');
						window.location = '../edit_parcel.php?idp=".$idp."';
					</script>";
			}
	}
?>