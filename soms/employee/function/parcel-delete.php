<?php
	session_start();
	include('../../connect/connection.php');

	$id = $_GET["idp"];
	$department = $_GET["departid"];

	$strSQL = "SELECT * FROM parcel WHERE parcel_id = '$id' ";
	$objQuery = mysql_query($strSQL);
	$result = mysql_fetch_array($objQuery);

	$id_img = $result["parcel_number"];

	$img_str = "SELECT * FROM image_parcel WHERE id_parcel = '$id_img' ";
	$imgqry = mysql_query($img_str);
	$img = mysql_fetch_array($imgqry);

	//ลบรูปในโฟลเดอร์
	
	/*unlink("../images/parcel/".$img['img_2']);
	unlink("../images/parcel/".$img['img_3']);
	unlink("../images/parcel/".$img['img_4']);
	unlink("../images/parcel/".$img['img_5']);*/

	if ($img['img_1'] != ' ') {
		@unlink("../../images/parcel/".$img['img_1']);
	}
	if ($img['img_2'] != ' ') {
		@unlink("../../images/parcel/".$img['img_2']);
	}
	if ($img['img_3'] != ' ') {
		@unlink("../../images/parcel/".$img['img_3']);
	}
	if ($img['img_4'] != ' ') {
		@unlink("../../images/parcel/".$img['img_4']);
	}
	if ($img['img_5'] != ' ') {
		@unlink("../../images/parcel/".$img['img_5']);
	}

	//ลบข้อมูลพัสดุในฐานข้อมูล
	$delte = "DELETE FROM parcel WHERE parcel_id = '$id' ";
	$sqldelresult = mysql_query($delte);

	$del_img = "DELETE FROM image_parcel WHERE id_parcel = '$id_img' ";
	$del_query = mysql_query($del_img);

	$sql = "SELECT * FROM myqrcode WHERE parcelid = '$id' ";
	$query = mysql_query($sql);
	$qrresult = mysql_fetch_array($query);

	if ($qrresult['parcelid'] == ' ') {
		if ($sqldelresult) {
			echo " 
			<script>
				alert('ลบข้อมูลแล้ว');
				window.location = '../parcel_department.php?parcelID=".$department."';
			</script>";
		}else {
			echo "nooooooo";
		}	
	}else{
		//ลบqr-code
		@unlink("../../gen_qrcode/temp/".$qrresult['qrcode']);
		
		//ลบqr-code ออกจากdb
		$delqr = "DELETE FROM myqrcode WHERE parcelid = '$id' ";
		$delqrquery = mysql_query($delqr);

			if ($delqrquery) {
				echo " 
				<script>
					alert('ลบข้อมูลแล้ว');
					window.location = '../parcel_department.php?parcelID=".$department."';
				</script>";
			}
	}
?>