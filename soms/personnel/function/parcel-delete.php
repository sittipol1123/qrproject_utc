<?php
	session_start();
	include('../connect/connection.php');

	$id = $_GET["CusID"];

	$strSQL = "SELECT * FROM parcel WHERE id = '$id' ";
	$objQuery = mysql_query($strSQL);
	$result = mysql_fetch_array($objQuery);

	//ลบรูปในโฟลเดอร์
	unlink("../images/parcel/".$result['image']);

	//ลบข้อมูลพัสดุในฐานข้อมูล
	$delte = "DELETE FROM parcel WHERE id = '$id' ";
	$sqldelresult = mysql_query($delte);

	$sql = "SELECT * FROM myqrcode WHERE parcelid = '$id' ";
	$query = mysql_query($sql);
	$qrresult = mysql_fetch_array($query);

	if ($qrresult['parcelid'] == '') {
		if ($sqldelresult) {
			echo " 
			<script>
				alert('ลบข้อมูลแล้ว');
				window.location = '../parcel_edit.php';
			</script>";
		}
		else {
			echo "nooooooo";
		}
	}
		
	}else{
		//ลบqr-code
		unlink("../gen_qrcode/temp/".$qrresult['qrcode']);
		
		//ลบqr-code ออกจากdb
		$delqr = "DELETE FROM myqrcode WHERE parcelid = '$id' ";
		$delqrquery = mysql_query($delqr);

			if ($delqrquery) {
				echo " 
				<script>
					alert('ลบข้อมูลแล้ว');
					window.location = '../parcel_edit.php';
				</script>";
	}
?>