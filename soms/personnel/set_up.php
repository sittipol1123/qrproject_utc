<?php
  session_start();
  include('../function/check-user.php');
  include('../connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE list = '".$_SESSION["id"]."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $id = $objResult["list"];
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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo" style="background-color: #4267b2;">
                <a href="#">
                    <img src="../images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="personnel.php?page=1">
                                <i class="fas fa-home"></i>หน้าแรก</a>
                        </li>
                        <li>
                            <a href="parcel_show.php">
                                <i class="fas fa-book"></i>ครุภัณฑ์ทั้งหมด</a>
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
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../images/icon/avatar-01.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" style="color: white;"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix" style="background-color: #a18de0;">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../images/icon/avatar-01.png" alt="John Doe" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                                    </h5>
                                                    <span class="email">Status : <?php echo $objResult['status']; ?></span>
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
                        <strong class="card-title"></strong>
                    </div>
                    <div class="card-body" align="left">
                        <!-- เนื้อหา -->
                        <?php
                            $sel = "SELECT * FROM user WHERE list = '$id' ";
                            $selquery = mysql_query($sel);
                            $shw = mysql_fetch_array($selquery);

                            $idus = $shw['list'];
                        ?>
                        <p>ชื่อ : <?php echo $shw['firstname']; ?> <a href="#" onclick="shbox()">แก้ไข</a></p>
                            <div id="sbox" style="display: none;">
                                <form method="post" action="function/edit_profile.php?idu=<?php echo $idus; ?>&cmd=fn">
                                    <input type="text" name="sdt" class="form-control" style="width: 50%;" value="<?php echo $shw['firstname']; ?>">
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div><br>

                        <p>นามสกุล : <?php echo $shw['lastname']; ?> <a href="#" onclick="shbox1()">แก้ไข</a></p>
                            <div id="sbox1" style="display: none;">
                                <form method="post" action="function/edit_profile.php?idu=<?php echo $idus; ?>&cmd=ln">
                                    <input type="text" name="sdt" class="form-control" style="width: 50%;" value="<?php echo $shw['lastname']; ?>">
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div><br>

                        <p>เบอร์โทรศัพท์ : <?php echo $shw['tel']; ?> <a href="#" onclick="shbox2()">แก้ไข</a></p>
                            <div id="sbox2" style="display: none;">
                                <form method="post" action="function/edit_profile.php?idu=<?php echo $idus; ?>&cmd=tel">
                                    <input type="text" name="sdt" class="form-control" style="width: 50%;" value="<?php echo $shw['tel']; ?>">
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div><br>

                        <p>Username : <?php echo $shw['username']; ?> <a href="#" onclick="shbox3()">แก้ไข</a></p>
                            <div id="sbox3" style="display: none;">
                                <form method="post" action="function/edit_profile.php?idu=<?php echo $idus; ?>&cmd=usn">
                                    <input type="text" name="sdt" class="form-control" style="width: 50%;" value="<?php echo $shw['username']; ?>">
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div><br>

                        <p>รหัสผ่าน <a href="#" onclick="shbox4()">แก้ไข</a></p>
                            <div id="sbox4" style="display: none;">
                                <form method="post" action="function/edit_profile.php?idu=<?php echo $idus; ?>&cmd=psw">
                                    <input type="text" name="sdt" class="form-control" style="width: 50%;" value="<?php echo $shw['password']; ?>">
                                    <button type="submit">บันทึก</button>
                                </form>
                            </div>
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
        <script>
            function shbox() {
            var x = document.getElementById("sbox");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script>
            function shbox1() {
            var x = document.getElementById("sbox1");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script>
            function shbox2() {
            var x = document.getElementById("sbox2");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script>
            function shbox3() {
            var x = document.getElementById("sbox3");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script>
            function shbox4() {
            var x = document.getElementById("sbox4");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script src="js/main.js"></script>
    </body>
</html>