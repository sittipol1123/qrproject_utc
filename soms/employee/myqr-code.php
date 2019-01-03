<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background-color: #BEBEBE; width: 100%; height: 100%;">
<header class="head">
<img src="css/image/menu.png" width="40" height="40" onclick="myFunction2()" class="dropbtn">
  <div id="myDropdown2" class="dropdown-content">
    <a href="admin.php" class="cursur">หน้าแรก</a>
    <a href="add_user.php" class="cursur">เพิ่มผู้ใช้งาน</a>
    <a href="delete.php" class="cursur">จัดการผู้ใช้</a>
    <a href="parcel.php" class="cursur">เพิ่มข้อมูลพัสดุ</a>
    <a href="show_parcel.php" class="cursur">ข้อมูลพัสดุ</a>
    <a href="parcel_edit.php" class="cursur">ลบพัสดุ</a>
  </div>
<img src="css/image/user.png" width="40" height="40" style="margin-right: 10px;" align="right" onclick="myFunction()" class="dropbtn">
  <div id="myDropdown" class="dropdown-content" style="right: 0;">
    <a href="function/logout.php" class="cursur">Logout</a>
  </div>
</header>
<!--ส่วนเนื้อหาต่างๆ-->
<nav>
  <div class="display" align="center" style="height: 80%;">
    <?php
    $id = $_GET['parID'];
    include('connect/connection.php');
    $strSQL = "SELECT * FROM parcel WHERE parcel_id='$id' ";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    $objResult = mysql_fetch_array($objQuery);
    ?>
    <table id="showuser" align="center">
        <tr>
          <th> <div align="center">หมายเลข<br>พัสดุ</div></th>
          <th> <div align="center">ชื่อรายการ</div></th>
          <th> <div align="center">วิธีได้มา</div></th>
          <th> <div align="center">สถานที่</div></th>
          <th> <div align="center">วันที่ได้มา</div></th>
          <th> <div align="center">สภาพ</div></th>
          <th> <div align="center">สถานะ</div></th>
          <th> <div align="center">วันที่ตรวจสอบ</div></th>
          <th> <div align="center">รูปภาพ</div></th>
        </tr>
        <tr>
          <td><div align="center"><?php echo $objResult["parcel_id"];?></div></td>
            <td><div align="center"><?php echo $objResult["list"];?></div></td>
          <td><div align="center"><?php echo $objResult["obtain"];?></div></td>
          <td><div align="center"><?php echo $objResult["obtain_date"];?></div></div></td>
          <td><div align="center"><?php echo $objResult["location"];?></div></td>
          <td><div align="center"><?php echo $objResult["conditions"];?></div></td>
          <td><div align="center"><?php echo $objResult["status"];?></div></td>
          <td><div align="center"><?php echo $objResult["survey_date"];?></div></td>
          <td><div align="center"><img src="image/parcel/<?php echo $objResult["image"];?>" width="100" height="100"></div></td>
        </tr>
      </table>
  </div>
    <form method="post" action="php_qrcode/index.php">
      <button name="GENERATE" value="<?php echo $objResult["parcel_id"];?>" >สร้าง QR_Code</button>
    </form>
</nav>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>