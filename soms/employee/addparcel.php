<?php
	session_start();
	include('../function/check-user.php');
	include('../connect/connection.php');

	$strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  	$objQuery = mysql_query($strSQL);
  	$objResult = mysql_fetch_array($objQuery);
  	$statusup = $objResult['status'];
  	$department = $objResult['depart'];

  	//รับค่าจากpost//
	date_default_timezone_set('Asia/Bangkok');
	$datenow = date("Y-m-d");
	$id = $objResult['list'];
	$p_name = $_POST['name_p'];
	$parcel_number = $_POST['parcel_number'];
	$type_p = $_POST['typ'];
	$price = $_POST['price'];
	$date_buy = date('Y-m-d',strtotime($_POST['date_b']));
	$departid = $_POST['department'];
	$deta = $_POST['detail'];

	//ตรวจสอบค่าว่างใน input//
	if ($id == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($p_name == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($parcel_number == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($type_p == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($price == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($date_buy == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}elseif ($departid == '') {
		echo "
			<script>
				alert('กรอกข้อมูลไม่ครบ');
				window.location = 'parcel_add.php';
			</script>";
	}else{

	//ตรวจสอบเลขครุภุณฑ์
	$strchk = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
	$chkquery = mysql_query($strchk);
	$chk = mysql_num_rows($chkquery);
	if ($chk != 0) {
		echo "
			<script>
				alert('มีเลขครุภัณฑ์นี้แล้ว');
				window.location = 'parcel_add.php';
			</script>";
		exit();
	}
}
	//เพิ่มข้อมูล//
	
	$sql = "INSERT INTO parcel";
	$sql .= "(parcel_id,name,parcel_number,type_number,department_number,price,date_buy,date_check,detail)";
	$sql .= "VALUE";
	$sql .= "('".' '."','".$p_name."','".$parcel_number."','".$type_p."','".$departid."','".$price."','".$date_buy."','".$datenow."','".$deta."')";
	
	$chk = mysql_query($sql);
	if (!$chk) {
		echo "
					<script>
						alert('บันทึกไม่สำเร็จ');
						window.location = 'parcel_add.php';
					</script>";
	}else{
		$upload = "insert into upload (user_up,parcel_up,date_up,list_number) values ('$id','$p_name','$datenow','');" ;
	mysql_query($upload);
	}
	if ($_FILES['image_in']['tmp_name'][0] != null && $_FILES['image_in2']['tmp_name'][0] != null && $_FILES['image_in3']['tmp_name'][0] != null && $_FILES['image_in4']['tmp_name'][0] != null && $_FILES['image_in5']['tmp_name'][0] != null) {

		$typ = pathinfo(basename($_FILES['image_in']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['image_in']['tmp_name'],$upload_path);

		$image_name = $name_new;

		$typ2 = pathinfo(basename($_FILES['image_in2']['name']), PATHINFO_EXTENSION);
		$name_new2 = 'img_'.uniqid().".".$typ2;
		$image_path2 = "../images/parcel/";
		$upload_path2 = $image_path2.$name_new2;

		$success2 = move_uploaded_file($_FILES['image_in2']['tmp_name'],$upload_path2);

		$image_name2 = $name_new2;

		$typ3 = pathinfo(basename($_FILES['image_in3']['name']), PATHINFO_EXTENSION);
		$name_new3 = 'img_'.uniqid().".".$typ3;
		$image_path3 = "../images/parcel/";
		$upload_path3 = $image_path3.$name_new3;

		$success3 = move_uploaded_file($_FILES['image_in3']['tmp_name'],$upload_path3);

		$image_name3 = $name_new3;

		$typ4 = pathinfo(basename($_FILES['image_in4']['name']), PATHINFO_EXTENSION);
		$name_new4 = 'img_'.uniqid().".".$typ4;
		$image_path4 = "../images/parcel/";
		$upload_path4 = $image_path.$name_new4;

		$success4 = move_uploaded_file($_FILES['image_in4']['tmp_name'],$upload_path4);

		$image_name4 = $name_new4;

		$typ5 = pathinfo(basename($_FILES['image_in5']['name']), PATHINFO_EXTENSION);
		$name_new5 = 'img_'.uniqid().".".$typ5;
		$image_path5 = "../images/parcel/";
		$upload_path5 = $image_path5.$name_new5;

		$success5 = move_uploaded_file($_FILES['image_in5']['tmp_name'],$upload_path5);

		$image_name5 = $name_new5;

		$sel = "INSERT INTO image_parcel";
		$sel .= "(id_parcel,img_1,img_2,img_3,img_4,img_5)";
		$sel .= "VALUES";
		$sel .= "('".$parcel_number."','".$image_name."','".$image_name2."','".$image_name3."','".$image_name4."','".$image_name5."')";
		$chk = mysql_query($sel);
		if ($chk) {
			$selp = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
			$selpquery = mysql_query($selp);
			$pnmb = mysql_fetch_array($selpquery);
			$pnumber = $pnmb["parcel_id"];

			header("location:add_qr_code.php?pid=".$pnumber."");
		}else{
			echo "
					<script>
						alert('อัปโหลดรูปไม่สำเร็จ');
						window.location = 'parcel_add.php';
					</script>";
		}
	}elseif ($_FILES['image_in']['tmp_name'][0] != null && $_FILES['image_in2']['tmp_name'][0] != null && $_FILES['image_in3']['tmp_name'][0] != null && $_FILES['image_in4']['tmp_name'][0] != null) {

		$typ = pathinfo(basename($_FILES['image_in']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['image_in']['tmp_name'],$upload_path);

		$image_name = $name_new;

		$typ2 = pathinfo(basename($_FILES['image_in2']['name']), PATHINFO_EXTENSION);
		$name_new2 = 'img_'.uniqid().".".$typ2;
		$image_path2 = "../images/parcel/";
		$upload_path2 = $image_path2.$name_new2;

		$success2 = move_uploaded_file($_FILES['image_in2']['tmp_name'],$upload_path2);

		$image_name2 = $name_new2;

		$typ3 = pathinfo(basename($_FILES['image_in3']['name']), PATHINFO_EXTENSION);
		$name_new3 = 'img_'.uniqid().".".$typ3;
		$image_path3 = "../images/parcel/";
		$upload_path3 = $image_path3.$name_new3;

		$success3 = move_uploaded_file($_FILES['image_in3']['tmp_name'],$upload_path3);

		$image_name3 = $name_new3;

		$typ4 = pathinfo(basename($_FILES['image_in4']['name']), PATHINFO_EXTENSION);
		$name_new4 = 'img_'.uniqid().".".$typ4;
		$image_path4 = "../images/parcel/";
		$upload_path4 = $image_path.$name_new4;

		$success4 = move_uploaded_file($_FILES['image_in4']['tmp_name'],$upload_path4);

		$image_name4 = $name_new4;

		$sel = "INSERT INTO image_parcel";
		$sel .= "(id_parcel,img_1,img_2,img_3,img_4,img_5)";
		$sel .= "VALUES";
		$sel .= "('".$parcel_number."','".$image_name."','".$image_name2."','".$image_name3."','".$image_name4."','".' '."')";
		$chk = mysql_query($sel);
		if ($chk) {
			$selp = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
			$selpquery = mysql_query($selp);
			$pnmb = mysql_fetch_array($selpquery);
			$pnumber = $pnmb["parcel_id"];

			header("location:add_qr_code.php?pid=".$pnumber."");
				}
		}elseif ($_FILES['image_in']['tmp_name'][0] != null && $_FILES['image_in2']['tmp_name'][0] != null && $_FILES['image_in3']['tmp_name'][0] != null) {
			
		$typ = pathinfo(basename($_FILES['image_in']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['image_in']['tmp_name'],$upload_path);

		$image_name = $name_new;

		$typ2 = pathinfo(basename($_FILES['image_in2']['name']), PATHINFO_EXTENSION);
		$name_new2 = 'img_'.uniqid().".".$typ2;
		$image_path2 = "../images/parcel/";
		$upload_path2 = $image_path2.$name_new2;

		$success2 = move_uploaded_file($_FILES['image_in2']['tmp_name'],$upload_path2);

		$image_name2 = $name_new2;

		$typ3 = pathinfo(basename($_FILES['image_in3']['name']), PATHINFO_EXTENSION);
		$name_new3 = 'img_'.uniqid().".".$typ3;
		$image_path3 = "../images/parcel/";
		$upload_path3 = $image_path3.$name_new3;

		$success3 = move_uploaded_file($_FILES['image_in3']['tmp_name'],$upload_path3);

		$image_name3 = $name_new3;

		$sel = "INSERT INTO image_parcel";
		$sel .= "(id_parcel,img_1,img_2,img_3,img_4,img_5)";
		$sel .= "VALUES";
		$sel .= "('".$parcel_number."','".$image_name."','".$image_name2."','".$image_name3."','".' '."','".' '."')";
		$chk = mysql_query($sel);
		if ($chk) {
			$selp = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
			$selpquery = mysql_query($selp);
			$pnmb = mysql_fetch_array($selpquery);
			$pnumber = $pnmb["parcel_id"];

			header("location:add_qr_code.php?pid=".$pnumber."");
				}
		}elseif ($_FILES['image_in']['tmp_name'][0] != null && $_FILES['image_in2']['tmp_name'][0] != null) {
			
		$typ = pathinfo(basename($_FILES['image_in']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['image_in']['tmp_name'],$upload_path);

		$image_name = $name_new;

		$typ2 = pathinfo(basename($_FILES['image_in2']['name']), PATHINFO_EXTENSION);
		$name_new2 = 'img_'.uniqid().".".$typ2;
		$image_path2 = "../images/parcel/";
		$upload_path2 = $image_path2.$name_new2;

		$success2 = move_uploaded_file($_FILES['image_in2']['tmp_name'],$upload_path2);

		$image_name2 = $name_new2;

		$sel = "INSERT INTO image_parcel";
		$sel .= "(id_parcel,img_1,img_2,img_3,img_4,img_5)";
		$sel .= "VALUES";
		$sel .= "('".$parcel_number."','".$image_name."','".$image_name2."','".' '."','".' '."','".' '."')";
		$chk = mysql_query($sel);
		if ($chk) {
			$selp = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
			$selpquery = mysql_query($selp);
			$pnmb = mysql_fetch_array($selpquery);
			$pnumber = $pnmb["parcel_id"];

			header("location:add_qr_code.php?pid=".$pnumber."");
				}
		}elseif ($_FILES['image_in']['tmp_name'][0] != null) {
			
		$typ = pathinfo(basename($_FILES['image_in']['name']), PATHINFO_EXTENSION);
		$name_new = 'img_'.uniqid().".".$typ;
		$image_path = "../images/parcel/";
		$upload_path = $image_path.$name_new;

		$success = move_uploaded_file($_FILES['image_in']['tmp_name'],$upload_path);

		$image_name = $name_new;

		$sel = "INSERT INTO image_parcel";
		$sel .= "(id_parcel,img_1,img_2,img_3,img_4,img_5)";
		$sel .= "VALUES";
		$sel .= "('".$parcel_number."','".$image_name."','".' '."','".' '."','".' '."','".' '."')";
		$chk = mysql_query($sel);
		if ($chk) {
			$selp = "SELECT * FROM parcel WHERE parcel_number = '$parcel_number'";
			$selpquery = mysql_query($selp);
			$pnmb = mysql_fetch_array($selpquery);
			$pnumber = $pnmb["parcel_id"];
			
			header("location:add_qr_code.php?pid=".$pnumber."");
				}
		}else{
		echo "
					<script>
						alert('อัปโหลดรูปไม่สำเร็จ');
						window.location = 'parcel_add.php';
					</script>";
	}
?>