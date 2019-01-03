<?php
  include("connect/connection.php");

  $idu = $_GET['idu'];
 ?>
<!DOCTYPE html>
<html>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" type="text/css" href="css/button.css">
<link rel="stylesheet" type="css" href="css/res-mobile.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
.logout_button {
	    background-color: #EE0000; /* Green */
	    border: none;
	    color: white;
	    padding: 15px 32px;
	    text-align: center;
	    text-decoration: none;
	    display: inline-block;
	    font-size: 14px;
	    border-radius: 12px;
	}
.logout_button:hover {
	    background-color: #8B0000;
	}
.line-bck {
	border: 1px solid black;

}
#ta-all #tr-ta #td-ta {
        border: 1px solid #ddd;
        text-align: left;
}
#ta-all {
        border-collapse: collapse;
        width: 100%;
}
#tr-ta #td-ta {
        padding: 10px;
}
</style>
<body>
<?php  
  if (!isset($idu)) {
	  $pid = $_GET['parcelID'];
	  $sel = "SELECT * FROM parcel LEFT JOIN parcel_type ON type_number = type_id LEFT JOIN department ON department_number = department_id WHERE parcel_id = '$pid'";
	  $selq = mysql_query($sel);
	  $shw = mysql_fetch_array($selq);

	  $pnumber = $shw["parcel_number"];

	  $strimg = "SELECT * FROM image_parcel WHERE id_parcel = '$pnumber'";
	  $imgquery = mysql_query($strimg);
	  $img = mysql_fetch_array($imgquery);

	  $date_now = date("Y-m-d");
	  echo $date_now;

	  $up_date = "UPDATE parcel SET date_check = '$date_now' WHERE parcel_id = '$pid'";
	  $query_up = mysql_query($up_date);

  ?>
<!-- !PAGE CONTENT! -->
<div style="max-width:1200px; margin-top: 0;">
<div class="w3-top" style="margin-top: 0;background-color: #4267b2;">
  <div style="max-width:1200px; height: 50px;background-color: #4267b2; margin-top: 0;">
  		<div align="center" style="margin-top: 20px"><h1>QR-UTC</h1></div>
  </div>
</div>
  <!-- First Photo Grid-->
  <div class="w3-row-padding w3-padding-16 w3-center" id="food" style="margin-top: 100px">
    <div class="w3-quarter">
    	<div align="center">
    		<img src="images/parcel/<?php echo $img["img_1"]; ?>" id="showimg" width="300" height="300">
    	</div><br>
      <?php
       	if ($img['img_2'] != ' ' && $img['img_3'] != ' ' && $img['img_4'] != ' ' && $img['img_5'] != ' ' ) {
        ?>
			<a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img3()"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img4()"><img src="images/parcel/<?php echo $img["img_5"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_5'] == ' ' && $img['img_4'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img3()"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_4'] == ' ' && $img['img_3'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_3'] == ' ' && $img['img_2'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <?php }else{ ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <?php } ?>
      <!-- <h3><?php echo $shw['list']; ?></h3>
      <p>หมายเลขครุภัณฑ์ : <?php echo $shw["parcel_number"];?></p>
      <p>วันที่ได้รับ : <?php echo $shw["date_buy"];?></p>
      <p>วันที่ตรวจสอบ : <?php echo $shw["date_check"];?></p><br><br>
      <p>เข้าสู่ระบบเพื่อแก้ไข : <a href="login_edt.php?idp=<?php echo $pid; ?>">เข้าสู่ระบบ</a></p>
     -->
     	<div style="margin-top: 20px;" align="center">
     		<table id="ta-all">
				<tr id="tr-ta">
					<td id="td-ta">หมายเลขครุภัณฑ์</td>
					<td id="td-ta"><?php echo $shw["parcel_number"]; ?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">ชื่อครุภัณฑ์</td>
					<td id="td-ta"><?php echo $shw["name"];?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">รายละเอียด</td>
					<td id="td-ta"><?php echo $shw["detail"];?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">แผนกวิชา</td>
					<td id="td-ta"><?php echo $shw["department_name"]; ?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">ประเภท</td>
					<td id="td-ta"><?php echo $shw["type_name"]; ?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">วันที่ซื้อ</td>
					<td id="td-ta"><?php echo date("d-m-Y",strtotime($shw["date_buy"]));?></td>
				</tr>
				<tr id="tr-ta">
					<td id="td-ta">วันที่ตรวจสอบ</td>
					<td id="td-ta"><?php echo date("d-m-Y",strtotime($shw["date_check"]));?></td>
				</tr>
			</table>
	    </div>
 	</div>
   </div>
   <?php
}else{
	  $pid = $_GET['pid'];
	  $sel = "SELECT * FROM parcel LEFT JOIN parcel_type ON type_number = type_id WHERE parcel_id = '$pid'";
	  $selq = mysql_query($sel);
	  $shw = mysql_fetch_array($selq);

	  $pnumber = $shw["parcel_number"];

	  $strimg = "SELECT * FROM image_parcel WHERE id_parcel = '$pnumber'";
	  $imgquery = mysql_query($strimg);
	  $img = mysql_fetch_array($imgquery);

	  $selu = "SELECT * FROM user WHERE id = '$idu' ";
	  $seluq = mysql_query($selu);
	  $shwu = mysql_fetch_array($seluq);
?>
<div style="max-width:1200px; margin-top: 0;">
<div class="w3-top" style="margin-top: 0;background-color: #4267b2;">
  <div style="max-width:1200px; height: 50px;background-color: #4267b2; margin-top: 0;">
  		<div align="center" style="margin-top: 20px"><h1>QR-UTC</h1></div>
  </div>
</div>
	<div class="w3-row-padding w3-padding-16 w3-center" id="food" style="margin-top: 100px">
    <div class="w3-quarter">
      <div align="center">
    		<img src="images/parcel/<?php echo $img["img_1"]; ?>" id="showimg" width="300" height="300">
    	</div>
      <?php
       	if ($img['img_2'] != ' ' && $img['img_3'] != ' ' && $img['img_4'] != ' ' && $img['img_5'] != ' ' ) {
        ?>
			<a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img3()"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img4()"><img src="images/parcel/<?php echo $img["img_5"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_5'] == ' ' && $img['img_4'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img3()"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_4'] == ' ' && $img['img_3'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
            <?php }elseif ($img['img_3'] == ' ' && $img['img_2'] != ' ') { ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
            <?php }else{ ?>
            <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
            <?php } ?>
      <h3><?php echo $shw['list']; ?></h3>

      <p>หมายเลขครุภัณฑ์ : <?php echo $shw["parcel_number"];?>
      <p>ชื่อครุภัณฑ์ : <?php echo $shw["name"]; ?> : <a href="#" onclick="shbox2()">แก้ไข</a></p>
      <div id="sbox2" style="display: none;">
			<form method="post" action="function/add_qr_edit.php?act=allp&id=<?php echo $shw["parcel_id"];?>&uid=<?php echo $shwu["id"];?>">
				<input type="text" name="data" class="form-control" style="width: 50%;" value="<?php echo $shw["name"]; ?>">
				<button type="submit" class="add_button_mb">บันทึก</button>
			</form>
		</div>

      <p>รายละเอียด : <?php echo $shw["detail"]; ?> : <a href="#" onclick="shbox3()">แก้ไข</a></p>
      <div id="sbox3" style="display: none;">
			<form method="post" action="function/add_qr_edit.php?act=goodp&id=<?php echo $shw["parcel_id"];?>&uid=<?php echo $shwu["id"];?>">
				<input type="text" name="data" class="form-control" style="width: 50%;" value="<?php echo $shw["detail"]; ?>">
				<button type="submit" class="add_button_mb">บันทึก</button>
			</form>
		</div>

      <p>ประเภท : <?php echo $shw["type_name"]; ?> : <a href="#" onclick="shbox4()">แก้ไข</a></p>
      <div id="sbox4" style="display: none;">
			<form method="post" action="function/add_qr_edit.php?act=notp&id=<?php echo $shw["parcel_id"];?>&uid=<?php echo $shwu["id"];?>">
				<select name="data">
					<?php
						$id_type = $shw["type_number"];
						$seltype = "SELECT * FROM parcel_type";
						$type_query = mysql_query($seltype);
						while ($type_shw = mysql_fetch_array($type_query)) {
					?>
					<option value="<?php echo $type_shw["type_id"] ?>"><?php echo $type_shw["type_name"]; ?></option>
					<?php } ?>
				</select>
				<button type="submit" class="add_button_mb">บันทึก</button>
			</form>
		</div><br>
		<a class="logout_button" href="function/mobile_lgout.php?idp=<?php echo $shw["parcel_id"]; ?>">Logout</a>
    </div>
   </div>
<?php } ?>
  <hr id="about">
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
}

function shbox() {
	var x = document.getElementById("sbox");
		if (x.style.display === "block") {
		x.style.display = "none";
		} else {
		x.style.display = "block";
		}
	}
function shbox2() {
	var x = document.getElementById("sbox2");
		if (x.style.display === "block") {
		x.style.display = "none";
		} else {
		x.style.display = "block";
		}
	}
function shbox3() {
	var x = document.getElementById("sbox3");
		if (x.style.display === "block") {
		x.style.display = "none";
		} else {
		x.style.display = "block";
		}
	}
function shbox4() {
	var x = document.getElementById("sbox4");
		if (x.style.display === "block") {
		x.style.display = "none";
		} else {
		x.style.display = "block";
		}
	}
	
function shw_img() {
    document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_1"]; ?>";
}
function shw_img1() {
    document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_2"]; ?>";
}
function shw_img2() {
    document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_3"]; ?>";
}
function shw_img3() {
    document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_4"]; ?>";
}
function shw_img4() {
    document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_5"]; ?>";
}	
        </script>

</body>
</html>