<?php
	session_start();
	include("../../connect/connection.php");
	$idp = $_GET["idp"];

	$sel = "SELECT * FROM parcel LEFT JOIN image_parcel ON parcel_number = id_parcel WHERE parcel_id = '$idp'";
	$selquery = mysql_query($sel);
	$shw = mysql_fetch_array($selquery);
	$pnum = $shw["parcel_number"];
	$img1 = $shw["img_1"];
	$img2 = $shw["img_2"];
	$img3 = $shw["img_3"];
	$img4 = $shw["img_4"];
	$img5 = $shw["img_5"];
	$nul = " ";

		$typ = pathinfo(basename($_FILES['imgno1']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['imgno1']['tmp_name'],$upload_path);

		$image_name = $name_new;

	if ($_GET["cmd"] =='p1') {

		unlink("../../images/parcel/".$img1);

		$up_img = "UPDATE image_parcel SET img_1 = '$image_name' WHERE id_parcel = '$pnum'";
		$up_chk = mysql_query($up_img);

		if ($up_chk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../edit_picture.php?pid=".$idp."';
			</script>";
		}
	}

	if ($_GET["cmd"] =='p2') {

		unlink("../../images/parcel/".$img2);

		$up_img = "UPDATE image_parcel SET img_2 = '$image_name' WHERE id_parcel = '$pnum'";
		$up_chk = mysql_query($up_img);

		if ($up_chk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../edit_picture.php?pid=".$idp."';
			</script>";
		}
	}

	if ($_GET["cmd"] =='p3') {

		unlink("../../images/parcel/".$img3);

		$up_img = "UPDATE image_parcel SET img_3 = '$image_name' WHERE id_parcel = '$pnum'";
		$up_chk = mysql_query($up_img);

		if ($up_chk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../edit_picture.php?pid=".$idp."';
			</script>";
		}
	}

	if ($_GET["cmd"] =='p4') {

		unlink("../../images/parcel/".$img4);

		$up_img = "UPDATE image_parcel SET img_4 = '$image_name' WHERE id_parcel = '$pnum'";
		$up_chk = mysql_query($up_img);

		if ($up_chk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../edit_picture.php?pid=".$idp."';
			</script>";
		}
	}

	if ($_GET["cmd"] =='p5') {

		unlink("../../images/parcel/".$img5);

		$up_img = "UPDATE image_parcel SET img_5 = '$image_name' WHERE id_parcel = '$pnum'";
		$up_chk = mysql_query($up_img);

		if ($up_chk) {
			echo "
			<script>
				alert('บันทึก');
				window.location = '../edit_picture.php?pid=".$idp."';
			</script>";
		}
	}

	if ($_GET["cmd"] == 'add') {
		if ($img1 == ' ') {

			$up_img = "UPDATE image_parcel SET img_1 = '$image_name' WHERE id_parcel = '$pnum'";
			$up_chk = mysql_query($up_img);

			if ($up_chk) {
				echo "
				<script>
					alert('บันทึก');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			}
			exit();
		}elseif ($img2 == ' ') {

			$up_img = "UPDATE image_parcel SET img_2 = '$image_name' WHERE id_parcel = '$pnum'";
			$up_chk = mysql_query($up_img);

			if ($up_chk) {
				echo "
				<script>
					alert('บันทึก');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			}
			exit();
		}elseif ($img3 == ' ') {

			$up_img = "UPDATE image_parcel SET img_3 = '$image_name' WHERE id_parcel = '$pnum'";
			$up_chk = mysql_query($up_img);

			if ($up_chk) {
				echo "
				<script>
					alert('บันทึก');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			}
			exit();
		}elseif ($img4 == ' ') {

			$up_img = "UPDATE image_parcel SET img_4 = '$image_name' WHERE id_parcel = '$pnum'";
			$up_chk = mysql_query($up_img);

			if ($up_chk) {
				echo "
				<script>
					alert('บันทึก');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			}
			exit();
		}elseif ($img5 == ' ') {
			
			$up_img = "UPDATE image_parcel SET img_5 = '$image_name' WHERE id_parcel = '$pnum'";
			$up_chk = mysql_query($up_img);

			if ($up_chk) {
				echo "
				<script>
					alert('บันทึก');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			}
			exit();
		}
	}

	if ($_GET["cmd"] == 'del1') {

		$res = "UPDATE image_parcel SET img_1 = '$nul' WHERE id_parcel = '$pnum'";
		$chk = mysql_query($res);

		unlink("../../images/parcel/".$img1);

		if ($chk) {
			header("location:../edit_picture.php?pid=".$idp."");
		}else{
			echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			exit();
		}
	}

	if ($_GET["cmd"] == 'del2') {
		
		$res = "UPDATE image_parcel SET img_2 = '$nul' WHERE id_parcel = '$pnum'";
		$chk = mysql_query($res);

		unlink("../../images/parcel/".$img2);

		if ($chk) {
			header("location:../edit_picture.php?pid=".$idp."");
		}else{
			echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			exit();
		}
	}

	if ($_GET["cmd"] == 'del3') {
		
		$res = "UPDATE image_parcel SET img_3 = '$nul' WHERE id_parcel = '$pnum'";
		$chk = mysql_query($res);

		unlink("../../images/parcel/".$img3);

		if ($chk) {
			header("location:../edit_picture.php?pid=".$idp."");
		}else{
			echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			exit();
		}
	}

	if ($_GET["cmd"] == 'del4') {
		
		$res = "UPDATE image_parcel SET img_4 = '$nul' WHERE id_parcel = '$pnum'";
		$chk = mysql_query($res);

		unlink("../../images/parcel/".$img4);

		if ($chk) {
			header("location:../edit_picture.php?pid=".$idp."");
		}else{
			echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			exit();
		}
	}

	if ($_GET["cmd"] == 'del5') {
		
		$res = "UPDATE image_parcel SET img_5 = '$nul' WHERE id_parcel = '$pnum'";
		$chk = mysql_query($res);

		unlink("../../images/parcel/".$img5);

		if ($chk) {
			header("location:../edit_picture.php?pid=".$idp."");
		}else{
			echo "
				<script>
					alert('ผิดพลาด');
					window.location = '../edit_picture.php?pid=".$idp."';
				</script>";
			exit();
		}
	}
?>