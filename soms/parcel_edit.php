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
.paginations {
    display: inline-block;
}

.paginations a , p {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
}

.paginations a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.paginations a:hover:not(.active) {background-color: #ddd;}

th , #headta {
   background-color: #57d365;
   border-right: solid 1px;
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
                                    <div class="account-item clearfix js-item-menu">
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
                            <div class="col-lg-9">
                                <div class="table-responsive table--no-card m-b-40" style="width: 135%;">
                                    <table class="table table-borderless table-striped table-earning">
                                    <?php
                                            $perpage = 12;
                                            if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                            } else {
                                            $page = 1;
                                            }

                                            $start = ($page - 1) * $perpage;

                                    ?>
                                      <?php
                                        $strSQL = "SELECT * FROM parcel LIMIT $start , $perpage";
                                        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                                      ?>
                                        <thead>
                                            <tr>
                                                <th id="headta">รหัสพัสดุ</th>
                                                <th id="headta">ชื่อ</th>
                                                <th id="headta">สภาพ</th>
                                                <th id="headta">วิธีได้มา</th>
                                                <th id="headta">วันที่ตรวจสอบ</th>
                                                <th id="headta">ลบ</th>
                                            </tr>
                                        </thead>
                                        <?php
                                          while($objResult = mysql_fetch_array($objQuery))
                                          {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $objResult['parcel_id']; ?></td>
                                                <td><?php echo $objResult['list']; ?></td>
                                                <td><?php echo $objResult['conditions']; ?></td>
                                                <td><?php echo $objResult['obtain']; ?></td>
                                                <td><?php echo $objResult['survey_date'];?></td>
                                                <td><a href="function/parcel-delete.php?CusID=<?php echo $objResult["id"];?>">Delete</a></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                <!--    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php
                            $sql2 = "select * from parcel ";
                            $query2 = mysql_query($sql2);
                            $total_record = mysql_num_rows($query2);
                            $total_page = ceil($total_record / $perpage);
                            ?>

                            <div class="paginations">

                            <?php
                                if ($page == "1") {
                            ?>
                            <a href="parcel_edit.php?page=1">&laquo;</a>

                            <?php
                            }else{
                            ?>
                            <a href="parcel_edit.php?page=<?php echo $page-1; ?>">&laquo;</a>
                            <?php } ?>
                            <!--
                            <?php
                            for($i=1;$i<=$total_page;$i++){ ?>
                            <a href="admin.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php } ?>-->
                            <p><?php echo $page; ?>/<?php echo $total_page; ?></p>
                            <?php 
                                if ($page == $total_page) {
                            ?>
                            <a href="parcel_edit.php?page=<?php echo $total_page; ?>">&raquo;</a>
                            <?php }else{ ?>
                            <a href="parcel_edit.php?page=<?php echo $page+1; ?>">&raquo;</a>
                            <?php } ?>
                            </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
    </div>
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