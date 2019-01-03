<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	include('../connect/connection.php');

	$strSQL = "DELETE FROM parcel ";
	$strSQL .="WHERE parcel_id = '".$_GET["CusID"]."' ";
	$objQuery = mysql_query($strSQL);
	if($objQuery)
	{
		header("location:delete.php");
	}
	else
	{
		echo "Error Delete [".$strSQL."]";
	}
	mysql_close($objConnect);
?>
</body>
</html>