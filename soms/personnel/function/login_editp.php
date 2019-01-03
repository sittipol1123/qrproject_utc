<?php
	session_start();
	include("../connect/connection.php");

	$idp = $_GET["id"];

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
					$uid = $objResult['id'];
					
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