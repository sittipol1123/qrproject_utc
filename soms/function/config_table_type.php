<?php
	session_start();
	include("../connect/connection.php");

	$uid = $_GET["userid"];
	$ad_data = $_POST["type_name"];
	$dep = $_POST["val"];
	$id = $_GET["id"];
	$val_age = $_POST["age_p"];

	if ($_GET["cmd"] == 'add') {
		$str_add = "INSERT INTO parcel_type";
		$str_add .= "(type_name,depreciate)";
		$str_add .= "VALUES";
		$str_add .= "('".$ad_data."','".$dep."')";
		$add_query = mysql_query($str_add);
		if ($add_query) {
			echo "
				<script>
					alert('เพิ่มข้อมูลสำเร็จ');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
			}else{
				echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
		}
	}

	if ($_GET["cmd"] == 'cfig') {
		$str_config = "UPDATE parcel_type SET type_name = '$ad_data', depreciate = '$dep' , parcel_age = '$val_age' WHERE type_id = '$id'";
		$query_config = mysql_query($str_config);
		if ($query_config) {
			echo "
				<script>
					alert('แก้ไขข้อมูลสำเร็จ');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
			}else{
				echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
		}
	}
	
	if ($_GET["cmd"] == 'del') {
		$str_del = "DELETE FROM parcel_type WHERE type_id = '$id'";
		$del_query = mysql_query($str_del);
		if ($del_query) {
			echo "
				<script>
					alert('ลบข้อมูลสำเร็จ');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
			}else{
				echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../set_up.php?idu=".$uid."';
				</script>";
		}
	}
?>