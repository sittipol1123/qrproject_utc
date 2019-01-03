<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	  <style>
      #showuser {
       font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
       border-collapse: collapse;
       width: 60%;
}

      #showuser td, #showuser th {
       border: 1px solid #ddd;
       padding: 8px;
}

      #showuser tr:nth-child(even){background-color: #F8F8FF;}

      #showuser tr:hover {background-color: #ddd;}

      #showuser th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #FF9900;
        color: white;
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
        $strSQL = "SELECT * FROM register";
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
      ?>
      <table id="showuser" align="center">
        <tr>
          <th> <div align="center">list</div></th>
          <th> <div align="center">firstname</div></th>
          <th> <div align="center">lastname</div></th>
          <th> <div align="center">username</div></th>
          <th> <div align="center">password</div></th>
          <th> <div align="center">status</div></th>
          <th> <div align="center">Delete</div></th>
        </tr>
      <?php
        while($objResult = mysql_fetch_array($objQuery))
      {
      ?>
        <tr>
          <td><div align="center"><?php echo $objResult["list"];?></div></td>
          <td><?php echo $objResult["firstname"];?></td>
          <td><?php echo $objResult["lastname"];?></td>
          <td><div align="center"><?php echo $objResult["username"];?></div></td>
          <td align="right"><?php echo $objResult["password"];?></td>
          <td align="right"><?php echo $objResult["status"];?></td>
          <td align="center"><a href="deletetable.php?CusID=<?php echo $objResult["firstname"];?>">Delete</a></td>
        </tr>
      <?php
      }
      ?>
      </table>
      <?php
      mysql_close($objConnect);
      ?> <br>
        
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