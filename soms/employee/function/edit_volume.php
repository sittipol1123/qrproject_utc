<?php
	session_start();
	include("../connect/connection.php");

	$idp = $_GET["id"];
	$val = $_POST["data"];

	if ($_GET["cmd"] == "good") {
		$sel = "SELECT * FROM parcel WHERE id = '$idp' ";
		$selq = mysql_query($sel);
		$shw = mysql_fetch_array($selq);

		$aval = $shw["all_volume"];

		if ($val > $aval) { 
?>
			<!DOCTYPE html>
			<html>
			<body>
				<script>
					var idp = '<?php echo $idp; ?>';
					alert('ข้อมูลไม่ถูกต้อง');
					window.location = '../show_detail.php?parcelID='+ idp;
				</script>
			</body>
			</html>
<?php
		}else{
			$dow = $aval - $val;

			$up = "UPDATE parcel SET good_volume = '$val' , notwork_volume = '$dow' WHERE id = '$idp' ";
			$chk = mysql_query($up);

			if ($chk) {				
?>
		<!DOCTYPE html>
		<html>
		<body>
			<script>
				var idp = '<?php echo $idp; ?>';
				alert('อัพเดท');
				window.location = '../show_detail.php?parcelID='+ idp;
			</script>
		</body>
		</html>
<?php  } } } 
	if ($_GET["cmd"] == "down") {
		$sel = "SELECT * FROM parcel WHERE id = '$idp' ";
		$selq = mysql_query($sel);
		$shw = mysql_fetch_array($selq);

		$aval = $shw["all_volume"];
		$goodv = $shw["good_volume"];

		$chk = $goodv + $val;

		if ($chk > $aval) { 
?>
			<!DOCTYPE html>
			<html>
			<body>
				<script>
					var idp = '<?php echo $idp; ?>';
					alert('ข้อมูลไม่ถูกต้อง');
					window.location = '../show_detail.php?parcelID='+ idp;
				</script>
			</body>
			</html>
<?php
			}else{
			$dow = $aval - $val;

			$up = "UPDATE parcel SET notwork_volume = '$val' WHERE id = '$idp' ";
			$chk = mysql_query($up);

			if ($chk) {
?>
			<!DOCTYPE html>
			<html>
			<body>
				<script>
					var idp = '<?php echo $idp; ?>';
					alert('อัพเดท');
					window.location = '../show_detail.php?parcelID='+ idp;
				</script>
			</body>
			</html>
<?php  } } } 
		if ($_GET["cmd"] == "all") {

			$upa = "UPDATE parcel SET all_volume = '$val' WHERE id = '$idp' ";
			$chk = mysql_query($upa);

			if ($chk) {
?>
			<!DOCTYPE html>
			<html>
			<body>
				<script>
					var idp = '<?php echo $idp; ?>';
					alert('อัพเดท');
					window.location = '../show_detail.php?parcelID='+ idp;
				</script>
			</body>
			</html>
<?php
			}else{
?>
			<!DOCTYPE html>
			<html>
			<body>
				<script>
					var idp = '<?php echo $idp; ?>';
					alert('ข้อมูลผิดพลาด');
					window.location = '../show_detail.php?parcelID='+ idp;
				</script>
			</body>
			</html>
<?php } } ?>