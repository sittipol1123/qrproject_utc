<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/button.css">
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
  </div>
<img src="css/image/user.png" width="40" height="40" style="margin-right: 10px;" align="right" onclick="myFunction()" class="dropbtn">
  <div id="myDropdown" class="dropdown-content" style="right: 0;">
    <a href="function/logout.php" class="cursur">Logout</a>
  </div>
</header>
<nav>
	<div class="display" align="center" style="height: 90%;">
		<div align="center">
			<form method="POST" action="addparcel.php" enctype="multipart/form-data">
				<p>หมายเลขครุภัณฑ์</p>
				<input type="text" name="parcelid" class="input_type1">
				<input type="text" name="lis" class="input_type1"><br>
				<p>วิธีได้มา</p>
				<input type="text" name="obtains" class="input_type1">
				<input type="text" name="obtaindate" class="input_type1" onkeyup="autoTab(this)"><br>
				<p>สถานที่</p>
				<input type="text" name="locations" class="input_type1"><br>
				<p>สภาพ</p>
				<select name="condition">
					<option value="ดี">ดี</option>
					<option value="ชำรุด">ชำรุด</option>
				</select><br>
				<p>สถานะ</p>
				<select name="status">
					<option value="ใช้งานได้">ใช้งานได้</option>
					<option value="ไม่สามารถใช้งานได้">ไม่สามารถใช้งานได้</option>
				</select><br>
				<p>วันที่สำรวจ</p>
				<input type="text" name="surveydate" class="input_type1" onkeyup="autoTab(this)"><br>
				<p>รูปภาพที่เกี่ยวข้อง</p>
				<input type="file" name="image_in"><br>
				<button type="submit" class="add_button">send</button>
			</form>
		</div>
	</div>
</nav>
<script>
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
function autoTab(obj){
        var pattern=new String("__-__-____"); // กำหนดรูปแบบในนี้
        var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
</script>
</body>
</html>