<?php
  session_start();
  include('../function/check-user.php');
  include('../connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $idu = $objResult['list'];

  $id = $_GET['idp'];


    $strSQL2 = "SELECT * FROM parcel WHERE parcel_id='$id' ";
    $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
    $objResult2 = mysql_fetch_array($objQuery2);
    $dpm = $objResult2["department_number"];
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
    <link rel="stylesheet" type="text/css" href="css/txtstyl.css">
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
.img-size {
    width: 100px;
    height: 64px;
    overflow: hidden;
}
            #hver {
                background-color: red;
                cursor: pointer;
            }
            #hver:hover {
                background-color: #CD0000;
            }
</style>

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
                            <a href="employee.php?page=1">
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
                                            <img src="../images/icon/avatar-01.png" alt="John Doe" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#" id="str-uclor"><?php echo $objResult['firstname'];?> <?php echo $objResult['lastname']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix" id="clor-bck-imguser">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../images/icon/avatar-01.png" alt="John Doe" />
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
                                    <div class="card-header" style="background-color: #57d365; color: white;">Image
                                       &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; <a href="edit_picture.php?pid=<?php echo $id; ?>">แก้ไขรูปภาพ</a>
                                    </div>
                                    <?php

                                    $typ = $objResult2["type_number"];
                                    $p_num = $objResult2["parcel_number"];
                                    $d_number = $objResult2["department_number"];

                                    $str = "SELECT * FROM parcel_type WHERE type_id = '$typ'";
                                    $strquery = mysql_query($str);
                                    $shw = mysql_fetch_array($strquery);

                                    $strimg = "SELECT * FROM image_parcel WHERE id_parcel = '$p_num'";
                                    $imgquery = mysql_query($strimg);
                                    $img = mysql_fetch_array($imgquery);

                                    $depart = "SELECT * FROM department WHERE department_id = '$d_number' ";
                                    $departquery = mysql_query($depart);
                                    $shw_depart = mysql_fetch_array($departquery);
                                    ?>
                                    <div class="card-body">
                                        <img src="../images/parcel/<?php echo $img["img_1"]; ?>" id="showimg" width="450" height="400">
                                    </div>
                                    <div class="paginations">
                                        <?php
                                            if ($img['img_1'] != ' ') {
                                        ?>
                                        <a href="#" onclick="shw_img()"><img src="../images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_2'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img1()"><img src="../images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_3'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img2()"><img src="../images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_4'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img3()"><img src="../images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_5'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img4()"><img src="../images/parcel/<?php echo $img["img_5"]; ?>" width="100" height="50"></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #57d365; color: white;">รายละเอียด</div>
                                    <div class="card-body card-block">
                                       <!-- <p>หมายเลขครุภัณฑ์ : <?php echo $objResult2["parcel_number"];?></p>
                                        <p>ชื่อ : <?php echo $objResult2["name"];?></p>
                                        <p>รายละเอียด : <?php echo $objResult2["detail"]; ?></p>
                                        <p>ประเภท : <?php echo $shw["type_name"]; ?></p>
                                        <p>วันที่ได้รับ : <?php echo $objResult2["date_buy"];?></p>          
                                        <p>วันที่ตรวจสอบ : <?php echo $objResult["date_check"];?></p><br>-->

                                        <form method="post" action="function/edit_parcel_all.php?idp=<?php echo $objResult2["parcel_id"]; ?>">

                                            <label>หมายเลขครุภัณฑ์</label><br>
                                            <label><?php echo $objResult2["parcel_number"]; ?></label><br>

                                            <label>ชื่อครุภัณฑ์</label>
                                            <input type="text" name="p_name" value="<?php echo $objResult2["name"]; ?>" class="form-control">

                                            <label>รายละเอียด</label>
                                            <input type="text" name="p_detail" value="<?php echo $objResult2["detail"]; ?>" class="form-control">

                                            <label>ประเภท</label>
                                            <select class="form-control" style="width: 50%;" name="p_type">
                                                <option style="background-color: #DCDCDC;" value="<?php echo $shw["type_id"]; ?>"><?php echo $shw["type_name"]; ?></option>
                                                <?php  
                                                    $looptyp = "SELECT * FROM parcel_type";
                                                    $query_looptyp = mysql_query($looptyp);
                                                    while ($typloop = mysql_fetch_array($query_looptyp)) {
                                                ?>
                                                <option value="<?php echo $typloop["type_id"]; ?>"><?php echo $typloop["type_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                            <label>แผนก</label>
                                           <!-- <input type="text" name="p_department" value="<?php echo $shw_depart["department_name"]; ?>" class="form-control">-->
                                            <select class="form-control" style="width: 30%;" name="p_depart">
                                                <option style="background-color: #DCDCDC;" value="<?php echo $shw_depart["department_id"]; ?>"><?php echo $shw_depart["department_name"]; ?></option>
                                                <?php  
                                                    $loopdepart = "SELECT * FROM department";
                                                    $query_loop = mysql_query($loopdepart);
                                                    while ($loop = mysql_fetch_array($query_loop)) {
                                                ?>
                                                <option value="<?php echo $loop["department_id"]; ?>"><?php echo $loop["department_name"]; ?></option>
                                                <?php } ?>
                                            </select>
                                            <br>
                                            <div style="position: absolute; width: 200px;">
                                            <button class="btn btn-lg btn-info btn-block" style="width: 100%;">แก้ไขข้อมูล</button>
                                            </div>
                                            <a href="parcel_department.php?parcelID=<?php echo $dpm; ?>" class="btn btn-lg btn-info btn-block" style="width: 40%; margin-left: 60%; cursor: pointer;" id="hver">ยกเลิก</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
function shw_img() {
    document.getElementById("showimg").src = "../images/parcel/<?php echo $img["img_1"]; ?>";
}
function shw_img1() {
    document.getElementById("showimg").src = "../images/parcel/<?php echo $img["img_2"]; ?>";
}
function shw_img2() {
    document.getElementById("showimg").src = "../images/parcel/<?php echo $img["img_3"]; ?>";
}
function shw_img3() {
    document.getElementById("showimg").src = "../images/parcel/<?php echo $img["img_4"]; ?>";
}
function shw_img4() {
    document.getElementById("showimg").src = "../images/parcel/<?php echo $img["img_5"]; ?>";
}
</script>
    </body>
</html>