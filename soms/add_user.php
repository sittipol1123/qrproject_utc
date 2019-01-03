<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
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
    <link rel="stylesheet" type="text/css" href="css/txtstyl.css">

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
    <style>
        .custom-select {
        position: relative;
        font-family: Arial;
}
        .custom-select select {
          display: none; /*hide original SELECT element:*/
}
    </style>

</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" id="main-header-clor">
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
            <header class="header-desktop" id="main-header-clor">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input type="hidden" name="search">
                            </form>
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" id="str-uclor"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix" id="clor-bck-imguser">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#" id="str-uclor"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                                    </h5>
                                                    <span class="email" id="str-uclor">Status : <?php echo $objResult['status']; ?></span>
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" id="header-card-clor">ข้อมูลผู้ใช้งาน</div>
                                    <div class="card-body">
                                        <form action="add_on.php" method="post" novalidate="novalidate" name="frmsend" OnSubmit="return chkString();">
                                            <div class="form-group">
                                                <label for="cc-pament" class="control-label mb-1">Username</label>
                                                <input id="cc-pament" name="username" type="text" class="form-control">
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="cc-name" class="control-label mb-1">Password</label>
                                                <input id="cc-name" name="password" type="password" class="form-control" min="4" max="16">
                                            </div>
                                            <div class="form-group">
                                            	<label for="cc-pament" class="control-label mb-1">สถานะผู้ใช้งาน</label><br>
                                            	<select name="status" id="cc-status" class="custom-select">
													<option value="ADMIN">หัวหน้าพัสดุ</option>
													<option value="Employee">เจ้าหน้าที่พัสดุ</option>
													<option value="Personnel">บุคลากร</option>
												</select>
                                            </div>
                                                <div class="form-group">
                                                <label for="street" class=" form-control-label">เบอร์โทรศัพท์</label>
                                                <input type="text" name="tellephone" id="street" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" id="header-card-clor"> ข้อมูลส่วนตัว </div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">ชื่อ</label>
                                            <input type="text" name="fname" id="company" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">นามสกุล</label>
                                            <input type="text" name="lname" id="vat" class="form-control">
                                        </div>
                                        <div class="form-group">
                                                <label for="cc-pament" class="control-label mb-1">แผนก</label><br>
                                                <select name="department" id="cc-status" class="custom-select">
                                                    <?php
                                                        $select = "SELECT * FROM department ";
                                                        $queryselect = mysql_query($select);

                                                        while ($show = mysql_fetch_array($queryselect)) {
                                                    ?>
                                                    <option value="<?php echo $show['department_id'] ?>"><?php echo $show['department_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div><br>
                                        <div>
                                            <button type="submit" class="btn btn-lg btn-info btn-block">
                                            	ยืนยัน
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script type="text/javascript">
        function chkString()
    {
         if(document.frmsend.password.value.length < 4)
         {
            alert('รหัสผ่านต้องมีความยาวมากกว่า 4 ตัวอักษร');
            return false;
         }
    }
    </script>
</body>
</html>