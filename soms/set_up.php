<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE list = '".$_SESSION["id"]."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $idus = $objResult['list'];

  $id = $_POST['idu'];
  $uid = $_GET['idu'];
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
                        <strong class="card-title">ข้อมูลส่วนตัว</strong>
                    </div>
                    <div class="card-body" align="left">
                        <?php
                        $sql = "SELECT * FROM user WHERE list = '$idus'";
                        $sqlquery = mysql_query($sql);
                        $shw = mysql_fetch_array($sqlquery);

                        ?>
                        <div style="position: absolute; width: 50%;">
                        <!-- เนื้อหา -->
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
                        <div style="margin-left: 40%; border-left: 1px solid #555555;">
                            <div style="margin-left: 15px;">
                                <p>แก้ไขประเภท</p>
                                <?php 
                                    $sqltype = "SELECT * FROM parcel_type";
                                    $typequery = mysql_query($sqltype);
                                ?>
                                <table id="ta-all">
                                    <tr id="tr-ta">
                                        <th id="td-ta">ประเภท</th>
                                        <th id="td-ta" style="width: 20%;">ค่าเสื่อม</th>
                                        <th id="td-ta" style="width: 20%;">อายุเสื่อม</th>
                                        <th id="td-ta">จัดการ</th>
                                    </tr>
                                    <?php while ($typ = mysql_fetch_array($typequery)) { ?>
                                    <tr id="tr-ta">
                                        <form name="frmtype" method="post" action="function/config_table_type.php?id=<?php echo $typ["type_id"]; ?>&cmd=cfig&userid=<?php echo $idus; ?>" OnSubmit="return chkSubmit();">
                                            <td id="td-ta">
                                                <input type="text" name="type_name" value="<?php echo $typ["type_name"]; ?>" class="form-control"></td>

                                            <td id="td-ta" style="width: 20%;">
                                                <input type="text" name="val" value="<?php echo $typ["depreciate"]; ?>" class="form-control"></td>

                                            <td id="td-ta" style="width: 20%;">
                                                <input type="text" name="age_p" class="form-control" value="<?php echo $typ["parcel_age"]; ?>"></td>

                                            <td id="td-ta">
                                                <button type="submit" style="color: #008fff;">แก้ไข</button> <a href="function/config_table_type.php?id=<?php echo $typ["type_id"]; ?>&cmd=del&userid=<?php echo $idus; ?>">ลบ</a></td>
                                        </form>
                                    </tr>
                                <?php } ?>
                                        <tr class="ta-tr">
                                            <form method="post" action="function/config_table_type.php?&cmd=add&userid=<?php echo $idus; ?>">
                                                <td id="td-ta"><input type="text" name="type_name" class="form-control"></td>
                                                <td id="td-ta" style="width: 30%;"><input type="number" name="val" class="form-control"></td>
                                                <td id="td-ta"><button class="fas fa-plus" type="submit" style="color: #008fff;"> เพิ่ม</button></td>
                                            </form>    
                                        </tr>
                                </table>
                            </div>
                        </div><br>
                        <?php
                            $sql_department = "SELECT * FROM department";
                            $department_query = mysql_query($sql_department);
                        ?>
                        <div class="card-body" style="border-top: 1px solid #555555;"><br>
                            <label>แผนกวิชา</label><br>
                            <table id="ta-all" style="width: 100%;">
                                <tr id="tr-ta">
                                    <th id="td-ta"><div align="center">รูป</div></th>
                                    <th id="td-ta" style="width: 30%;"><div align="center">แผนกวิชา</div></th>
                                    <th id="td-ta"><div align="center">จัดการ</div></th>
                                </tr>
                                <?php  
                                        while ($depart_ment = mysql_fetch_array($department_query)) {
                                    ?>
                                <tr id="tr-ta">
                                    <form method="post" action="function/department_config.php?cmd=edt&id=<?php echo $depart_ment["department_id"] ?>&idu=<?php echo $uid; ?>">
                                        <td id="td-ta"><div align="center"><img src="images/department/<?php echo $depart_ment['image_depart']; ?>" width="250" height="200"></div></td>
                                        <td id="td-ta"><div align="center"><input type="text" name="d_name" value="<?php echo $depart_ment["department_name"]; ?>" class="form-control"></div></td>
                                        <td id="td-ta"><div align="center"><button type="submit" style="color: #008fff;">แก้ไข</button> <a href="function/department_config.php?cmd=del&idu=<?php echo $uid; ?>&id=<?php echo $depart_ment["department_id"] ?>">ลบ</a></div></td>
                                    </form>
                                </tr>
                                <?php } ?>
                                <tr id="tr-ta">
                                    <form method="post" action="function/department_config.php?cmd=ins&idu=<?php echo $id; ?>&idu=<?php echo $uid; ?>" enctype="multipart/form-data">
                                        <td id="td-ta"><div align="center"><input type="file" name="imgno1"></div></td>
                                        <td id="td-ta"><div align="center"><input type="text" name="d_name" class="form-control"></div></td>
                                        <td id="td-ta"><div align="center"><button class="fas fa-plus" type="submit" style="color: #008fff;"> เพิ่ม</button></div></td>
                                    </form>
                                </tr>
                            </table>
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

            function shbox5() {
            var x = document.getElementById("sbox5");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
}
        </script>
        <script language="JavaScript">
            function chkSubmit()
            {
                 if(isNaN(document.frmtype.val.value))
                 {
                    alert('กรุณากรอกข้อมูลเฉพาะตัวเลข!');
                    document.frmtype.val.focus();
                    return false;
                 }
                 if(isNaN(document.frmtype.age_p.value))
                 {
                    alert('กรุณากรอกข้อมูลเฉพาะตัวเลข!');
                    document.frmtype.age_p.focus();
                    return false;
                 }
            }
    </script>
        <script src="js/main.js"></script>
    </body>
</html>