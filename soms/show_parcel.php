<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  $strSQL = "SELECT * FROM register WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css">
  <style type="text/css">
    .section-pro {
    float: left;
    width: 310px;
    height: 110px;
    margin: 1px 3px;
  }
  .div-summary {
    float: left;
    width: 200px;
    text-align: left;
    font-size: 14px;
  }
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<nav>
	<div class="display" align="center" style="height: 500px;">
		<?php
        include('connect/connection.php');
        $strSQL = "SELECT * FROM parcel";
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
      ?>
      <form method="POST" action="show_detail.php">
	      <?php
	        while($objResult = mysql_fetch_array($objQuery))
	      {
	      ?> 
            <section class="section-pro">
      	         <div align="center"><br>
      	          	<a href="show_detail.php?parcelID=<?php echo $objResult["id"];?>" >
      	          	<img src="image/parcel/<?php echo $objResult["image"];?>" width="100" height="100" >
      	      		  </a>
      	          </div>
            </section>
	      <?php
	      }
	      ?>
	      </form>
	      <?php
	      mysql_close($objConnect);
	      ?> 
	</div>
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