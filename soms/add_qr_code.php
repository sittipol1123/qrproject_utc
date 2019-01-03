<?php
	session_start();
	include('function/check-user.php');
	include('connect/connection.php');
	$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

  	$idu = $objResult['list'];
	$id_parcel = $_GET["pid"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="gen_qrcode/index.php?idu=<?php echo $idu; ?>" name="atosmt">
		<input type="hidden" name="data" value="http://qr.utc.ac.th/soms/shw_detail_mobile.php?parcelID=<?php echo $id_parcel;?>">
		<input type="hidden" name="id" value="<?php echo $id_parcel;?>">
	</form>
<script type="text/javascript">
    document.atosmt.submit();
</script>
</body>
</html>