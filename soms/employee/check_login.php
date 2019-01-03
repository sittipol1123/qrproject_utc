<?php
	/*$secret = '6LdmG3MUAAAAABB6G10DLj9QOp40_h4gBMPF1rCZ';
			
	$recaptcha = new recaptcha-master\src\ReCaptcha($secret);

	require_once '/recaptcha-master/src/autoload.php';

	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		
if ($resp->isSuccess()) {*/

	session_start();

	include('connect/connection.php');

	$strSQL = "SELECT * FROM admin WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
	and password = '".mysql_real_escape_string($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

	if (!$objResult) {

		$strSQL = "SELECT * FROM user WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
		and password = '".mysql_real_escape_string($_POST['password'])."'";
		$objQuery = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);

			if(!$objResult)
			{
					echo "
						<script>
							alert('รหัสผ่านไม่ถูกต้อง');
							window.location = 'index.html';
						</script>";
			}
			else
			{
					$_SESSION["UserID"] = $objResult["username"];
					//$_SESSION["Status"] = $objResult["status"];

					session_write_close();
					
					if($objResult["status"] == "ADMIN")
					{
						header("location:admin.php");
					}
					else if($objResult["status"] == "Employee")
					{
						header("location:employee/employee.php");
					}
					else if($objResult["status"] == "Personnel")
					{
						header("location:personnel/personnel.php");
					}
			}

	}else{

					$_SESSION["UserID"] = $objResult["username"];
					$_SESSION["Status"] = $objResult["status"];

					session_write_close();	
					header("location:admin.php");
		}
/*}else {
  $errors = "ลงทะเบียนไม่สำเร็จ กรุณาคลิกยืนยันว่าคุณไม่ใช่ robot!!";
  echo $errors;
}*/
?>
