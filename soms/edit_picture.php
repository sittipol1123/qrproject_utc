<?php
	session_start();
	include('function/check-user.php');
  	include('connect/connection.php');
	$strSQL = "SELECT * FROM user WHERE list = '".$_SESSION["id"]."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

	$pid = $_GET["pid"];
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title></title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <style type="text/css">
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
.ta-tr {
	padding: 10px;
}
.button-smt {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 27px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button-smt:hover {
	background-color: #3e8e41;
}
.button-del {
  background-color: #FF0000;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button-del:hover {
	background-color: #CD0000;
	color: white;
}
</style>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" style="background-color: #4267b2;">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="admin.php?page=1">
                                <i class="fas fa-home"></i>หน้าแรก</a>
                        </li>
                        <li>
                            <a href="parcel_add.php">
                                <i class="fas fa-plus-square"></i>เพิ่มข้อมูลครุภัณฑ์</a>
                        </li>
                        <li>
                            <a href="parcel_show.php">
                                <i class="fas fa-book"></i>ครุภัณฑ์ทั้งหมด</a>
                        </li>
                        <li>
                            <a href="add_user.php">
                                <i <i class="fas fa-users"></i>เพิ่มผู้ใช้งาน</a>
                        </li>
                        <li>
                            <a href="delete_user.php">
                                <i class="fas fa-users-cog"></i>จัดการผู้ใช้</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="background-color: #4267b2;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input type="hidden" name="search">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu" align="">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" style="color: white;"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix" style="background-color: #a18de0;">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#" style="color: white;"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                                    </h5>
                                                    <span class="email" style="color: white;">Status : <?php echo $objResult['status']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="set_up.php?idu=<?php echo $objResult['id']; ?>">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="function/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #57d365; color: white;">
                        <strong class="card-title">แก้ไขรูปภาพ</strong>
                    </div>
                    <div class="card-body">
                    	<?php
                    		$sel_img = "SELECT * FROM parcel LEFT JOIN image_parcel ON parcel_number = id_parcel WHERE parcel_id = '$pid'";
                    		$sel_query = mysql_query($sel_img);
                    		$img = mysql_fetch_array($sel_query);
                    		if ($img["img_1"] != ' ') {
                    	?>
                    	<div align="center"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="450" height="400"></div>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=p1">
                    		<div>
                    			<label>เปลี่ยนรูปครุภัณฑ์</label><br>
                    			<input type="file" name="imgno1" required="">
                    		</div>
                    		<div style="position: absolute; margin-left: 120px;">
                    			<a href="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=del1" class="button-del">ลบรูปภาพ</a>
                    		</div>
                    		<button type="submit" class="button-smt">บันทึก</button>
                    	</form>
                    	<?php
                    }
                    	if ($img["img_2"] != ' ') {
                    	?>
                    	<div align="center"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="450" height="400"></div>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=p2">
                    		<div>
                    			<label>เปลี่ยนรูปครุภัณฑ์</label><br>
                    			<input type="file" name="imgno1">
                    		</div>
                    		<div style="position: absolute; margin-left: 120px;">
                    			<a href="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=del2" class="button-del">ลบรูปภาพ</a>
                    		</div>
                    		<button type="submit" class="button-smt">บันทึก</button>
                    	</form>
                    	<?php
                    }
                    	if ($img["img_3"] != ' ') {
                    	?>
                    	<div align="center"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="450" height="400"></div>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=p3">
                    		<div>
                    			<label>เปลี่ยนรูปครุภัณฑ์</label><br>
                    			<input type="file" name="imgno1">
                    		</div>
                    		<div style="position: absolute; margin-left: 120px;">
                    			<a href="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=del3" class="button-del">ลบรูปภาพ</a>
                    		</div>
                    		<button type="submit" class="button-smt">บันทึก</button>
                    	</form>
                    	<?php
                    }
                    	if ($img["img_4"] != ' ') {
                    	?>
                    	<div align="center"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="450" height="400"></div>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=p4">
                    		<div>
                    			<label>เปลี่ยนรูปครุภัณฑ์</label><br>
                    			<input type="file" name="imgno1">
                    		</div>
                    		<div style="position: absolute; margin-left: 120px;">
                    			<a href="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=del4" class="button-del">ลบรูปภาพ</a>
                    		</div>
                    		<button type="submit" class="button-smt">บันทึก</button>
                    	</form>
                    	<?php
                    }
                    	if ($img["img_5"] != ' ') {
                    	?>
                    	<div align="center"><img src="images/parcel/<?php echo $img["img_5"]; ?>" width="450" height="400"></div>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=p5">
                    		<div>
                    			<label>เปลี่ยนรูปครุภัณฑ์</label><br>
                    			<input type="file" name="imgno1">
                    		</div>
                    		<div style="position: absolute; margin-left: 120px;">
                    			<a href="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=del5" class="button-del">ลบรูปภาพ</a>
                    		</div>
                    		<button type="submit" class="button-smt">บันทึก</button>
                    	</form>
                    <?php } 
                    	if ($img["img_5"] == ' ') {
                    ?><br>
                    	<form method="post" enctype="multipart/form-data" action="function/add_edit_picture.php?idp=<?php echo $pid; ?>&cmd=add">
                    		<input type="file" name="imgno1" required=""><br>
                    		<div style="position: absolute;">
                    			<button type="submit" class="button-smt">เพิ่มรูปภาพ</button>
                    		</div>
                    		<div style="margin-left: 150px;">
                    			<a href="edit_parcel.php?idp=<?php echo $pid; ?>" class="button-del">ยกเลิก</a>
                    		</div>
                    	</form>
                    <?php } ?>
                    </div>
                </div>
              </div>
        </div>
    </div>       
            <!-- END MAIN CONTENT-->
            <!-- Jquery JS-->
        <script src="vendor/jquery-3.2.1.min.js"></script>
        <!-- Bootstrap JS-->
        <script src="vendor/bootstrap-4.1/popper.min.js"></script>
        <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
        <!-- Vendor JS       -->
        <script src="vendor/slick/slick.min.js">
        </script>
        <script src="vendor/wow/wow.min.js"></script>
        <script src="vendor/animsition/animsition.min.js"></script>
        <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
        </script>
        <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
        <script src="vendor/counter-up/jquery.counterup.min.js">
        </script>
        <script src="vendor/circle-progress/circle-progress.min.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
        <script src="vendor/chartjs/Chart.bundle.min.js"></script>
        <script src="vendor/select2/select2.min.js">
        </script>

        <!-- Main JS-->
        <script src="js/main.js"></script>
    </body>
</html>