<html>
<head>
<title>ThaiCreate.Com PHP & MySQL Tutorial</title>
</head>
<body>
<?php
	include('connect/connection.php');

	$strSQL = "DELETE FROM user ";
	$strSQL .="WHERE list = '".$_GET["userID"]."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{
		header("location:delete_user.php");
	}
	else
	{
		echo "Error Delete [".$strSQL."]";
	}
	mysql_close($objConnect);
?>
</body>
</html>