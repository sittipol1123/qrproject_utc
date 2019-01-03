<?php
	session_start();
  	include('connect/connection.php');

  	$datenow = date("Y-m-d");
	$id = $objResult['list'];
	$p_name = $_POST['name_p'];
	$parcel_number = $_POST['parcel_number'];
	$type_p = $_POST['typ'];
	$price = $_POST['price'];
	$date_buy = date('Y-m-d',strtotime($_POST['date_b']));
	$departid = $_POST['department'];
	$deta = $_POST['detail'];
	$budget_buy = $_POST['budget'];
	$parcel_number1 = $_POST['parcel_number'];

	$date_tw = date('Y',strtotime($date_buy));
	$result_date_p = $date_tw - 1957;

	$sel = "SELECT * FROM parcel WHERE type_number = '$type_p'";
	$selquery = mysql_query($sel);
	$num_p = mysql_num_rows($selquery);

	if ($budget_buy == 'ทุนการศึกษา') {
		$val = '0001';
	}elseif ($budget_buy == 'บริจาค') {
		$val = '0002';
	}elseif ($budget_buy == 'งบประมาณ') {
		$val = '0003';
	}elseif ($budget_buy == 'เงินอุดหนุน') {
		$val = '0004';
	}
	echo $departid;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
</head>
<body>
	<div align="center">
	<form>
		<input type="text" name="parcelnumber" value="<?php echo $result_date_p . $num_p . $type_p . $val; ?>">
		<p>หมายเลขครุภัณฑ์</p>
        <input type="number" name="parcel_number" class="form-control" style="width: 50%;" value="<?php echo $result_date_p . $num_p . $type_p . $val; ?>"><br>
        <p>ชื่อครุภัณฑ์</p>
        <input type="text" name="name_p" class="form-control" style="width: 50%;" value="<?php echo $p_name; ?>"><br>
        <p>รายละเอียด</p>
        <input type="text" name="detail" class="form-control" style="width: 50%;" value="<?php echo $deta; ?>"><br>
        <p>ประเภท</p>
        <?php
        	$select_db = "SELECT * FROM parcel_type";
        	$sel_pquery = mysql_query($select_db);
        ?>
        <select name="typ" class="form-control" style="width: 30%;">
        <?php
        while ($shw_p = mysql_fetch_array($sel_pquery)) {
        ?>
        <option value="<?php echo $shw_p['type_id']; ?>" class="form-control"><?php echo $shw_p['type_name']; ?></option>
        <?php } ?>
        </select><br>
        <p>ราคา</p>
        <input type="text" name="price" class="form-control" style="width: 50%;" value="<?php echo $price; ?>"><br>
        <p>งบที่ใช้ในการจัดซื้อ</p>
        <select name="budget" class="form-control" style="width: 20%;">
        	<option class="form-control" value="<?php echo $budget_buy; ?>"><?php echo $budget_buy; ?></option>
	        <option class="form-control" value="ทุนการศึกษา">ทุนการศึกษา</option>
	        <option class="form-control" value="บริจาค">บริจาค</option>
	        <option class="form-control" value="งบประมาณ">งบประมาณ</option>
	        <option class="form-control" value="เงินอุดหนุน">เงินอุดหนุน</option>
        </select><br>
        <p>ปีที่ซื้อ <label class="c-ment">*14-11-2018</label></p>
        <input type="text" name="date_b" class="form-control" style="width: 50%;" value="<?php echo $date_buy; ?>"><br>
        <p>แผนก</p>
        <?php
        $sel = "SELECT * FROM department";
        $seq = mysql_query($sel);
        ?>
        <select name="department" class="form-control" style="width: 30%;">
        	<option></option>
        <?php
        while ($shw = mysql_fetch_array($seq)) {
        ?>
        <option value="<?php echo $shw['department_id']; ?>" class="form-control"><?php echo $shw['department_name']; ?></option>
        <?php } ?>
        </select><br><br>
	</form>
	</div>
</body>
</html>