<?php
session_start();
include("connect/connection.php");

	$idp = $_GET["id"];
	if (isset($_POST['g-recaptcha-response'])) {
		$captcha = $_POST['g-recaptcha-response'];
	}
	if (!$captcha) {
		if (!isset($idp)) {
			echo "
				<script>
					alert('โปรดยืนยันตัวตน');
					window.location = 'index.html';
				</script>";
		}else{
			echo "
				<script>
					alert('รหัสผ่านไม่ถูกต้อง');
					window.location = 'login_edt.php?idp=".$idp."';
				</script>";
		}
	}

	$secretKey = "6LdmG3MUAAAAABB6G10DLj9QOp40_h4gBMPF1rCZ";
 	$ip = $_SERVER['REMOTE_ADDR'];
 	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
 	$responseKeys = json_decode($response,true);
	if (intval($responseKeys["success"]) == 1) {
		echo "
			<script>
			alert('ผิดพลาด');
			window.location = 'index.html';
			</script>";
	}else{

	
	//$pid = echo $idp;
	
	$strSQL = "SELECT * FROM admin WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
	and password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

	if (!$objResult) {

		$in_pass = $_POST['password'];
		$incrype = md5($in_pass);

		$strSQL = "SELECT * FROM user WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
		and password = '".mysql_real_escape_string($incrype)."'";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);

			if(!$objResult)
			{
				if (!isset($idp)) {
					echo "
						<script>
							alert('รหัสผ่านไม่ถูกต้อง');
							window.location = 'index.html';
						</script>";
				}else{
					echo "
						<script>
							alert('รหัสผ่านไม่ถูกต้อง');
							window.location = 'login_edt.php?idp=".$idp."';
						</script>";
				}
			}
			else
			{
					$_SESSION["UserID"] = $objResult["username"];
					$_SESSION["id"] = $objResult["list"];
					$uid = $objResult['id'];
					//$idu = echo $uid;

					session_write_close();
						if (!isset($idp)) {	
							if($objResult["status"] == "Sys_Admin")
							{
								header("location:admin.php?page=1");
							}
							if($objResult["status"] == "ADMIN")
							{
								header("location:admin.php?page=1");
							}
							else if($objResult["status"] == "Employee")
							{
								header("location:employee/employee.php?page=1");
							}
							else if($objResult["status"] == "Personnel")
							{
								header("location:personnel/personnel.php?page=1");
							}
						}elseif (isset($idp)){
							if($objResult["status"] == "ADMIN")
							{
								header("location:shw_detail_mobile.php?idu=".$uid."&pid=".$idp."");
							}
							else if($objResult["status"] == "Employee")
							{
								header("location:shw_detail_mobile.php?idu=".$uid."&pid=".$idp."");
							}
							else if($objResult["status"] == "Personnel")
							{
								header("location:shw_detail_mobile.php?idu=".$uid."&pid=".$idp."");
							}
						}
			}			

	}else{

					$_SESSION["UserID"] = $objResult["username"];
					$_SESSION["Status"] = $objResult["status"];
					$_SESSION["id"] = $objResult["list"];

					session_write_close();	
					header("location:admin.php");
		}
	}
?>