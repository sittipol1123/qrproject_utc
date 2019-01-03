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
    <a href="#contact" class="cursur">ข้อมูลพัสดุ</a>
  </div>
<img src="css/image/user.png" width="40" height="40" style="margin-right: 10px;" align="right" onclick="myFunction()" class="dropbtn">
  <div id="myDropdown" class="dropdown-content" style="right: 0;">
    <a href="function/logout.php" class="cursur">Logout</a>
  </div>
</header>

<nav>
	<div class="display" align="center">
      
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