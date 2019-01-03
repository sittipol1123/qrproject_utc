<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $idu = $objResult['list'];

  $id = $_GET['parcelID'];


    $strSQL2 = "SELECT * FROM parcel WHERE parcel_id='$id' ";
    $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
    $objResult2 = mysql_fetch_array($objQuery2);

    $par_name = $objResult2["name"];
    $pnumber = $objResult2["parcel_id"];

  $sqlqr = "SELECT * FROM myqrcode WHERE parcelid = '$id'";
  $queryqr = mysql_query($sqlqr);
  $qrresult = mysql_fetch_array($queryqr);
  $qrparcel = $qrresult['parcelid'];
  $qrname = $qrresult['qrcode'];
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
        #clor {
            background-color: skyblue;
        }
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
            .btn-print {
                background-color: #008CBA;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
            #hver {
                background-color: red;
                cursor: pointer;
            }
            #hver:hover {
                background-color: #CD0000;
            }
    </style>
        <script>
            function printImg() {
            var width = $(window).width() * 0.9;
            var height = $(window).height() * 0.9;
            var imagePath = "gen_qrcode/temp/<?php echo $qrname; ?>";
            var pname = '<?php echo $par_name; ?>'
            var content = '<!DOCTYPE html>' + 
                          '<html>' +
                          '<head><title></title><link href="css/config-qrprint.css" rel="stylesheet" media="all"></head>' +
                          '<body onload="window.focus(); window.print(); window.close();" class="config">' + 
                          '<div align="center"><p style="size: 20px;">' + pname + '</p></div>' +
                          '<img src="' + imagePath + '" style="width: 100%;" />' +
                          '</body>' +
                          '</html>';
            var options = "toolbar=no,location=no,directories=no,menubar=no,scrollbars=yes,width=" + width + ",height=" + height;
            var printWindow = window.open('', 'print', options);
            printWindow.document.open();
            printWindow.document.write(content);
            printWindow.document.close();
            printWindow.focus();
}
        </script>

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
                               <!-- <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                    </div>
                                    <div class="noti__item js-item-menu">
                                    </div>
                                    <div class="noti__item js-item-menu">
                                    </div>
                                </div>-->
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #57d365; color: white;">Image</div>
                                    <?php

                                    $typ = $objResult2["type_number"];
                                    $p_num = $objResult2["parcel_number"];

                                    $str = "SELECT * FROM parcel_type WHERE type_id = '$typ'";
                                    $strquery = mysql_query($str);
                                    $shw = mysql_fetch_array($strquery);

                                    $strimg = "SELECT * FROM image_parcel WHERE id_parcel = '$p_num'";
                                    $imgquery = mysql_query($strimg);
                                    $img = mysql_fetch_array($imgquery);

                                    ?>
                                    <div class="card-body">
                                        <img src="images/parcel/<?php echo $img["img_1"]; ?>" id="showimg" width="450" height="400">
                                    </div>
                                    <div class="paginations">
                                        <?php
                                            if ($img['img_1'] != ' ') {
                                        ?>
                                        <a href="#" onclick="shw_img()"><img src="images/parcel/<?php echo $img["img_1"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_2'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img1()"><img src="images/parcel/<?php echo $img["img_2"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_3'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img2()"><img src="images/parcel/<?php echo $img["img_3"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_4'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img3()"><img src="images/parcel/<?php echo $img["img_4"]; ?>" width="100" height="50"></a>
                                        <?php
                                    }
                                            if ($img['img_5'] != ' ') {
                                        ?>
                                            <a href="#" onclick="shw_img4()"><img src="images/parcel/<?php echo $img["img_5"]; ?>" width="100" height="50"></a>
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" style="background-color: #57d365; color: white;">รายละเอียด</div>
                                    <div class="card-body card-block">
                                        <table id="ta-all">
                                            <tr id="tr-ta">
                                                <td id="td-ta">หมายเลขครุภัณฑ์</td>
                                                <td id="td-ta"><?php echo $objResult2["parcel_number"];?></td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">ชื่อครุภัณฑ์</td>
                                                <td id="td-ta"><?php echo $objResult2["name"];?></td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">ราคา</td>
                                                <td id="td-ta"><?php echo number_format($objResult2["price"]);?> บาท</td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">รายละเอียด</td>
                                                <td id="td-ta"><?php echo $objResult2["detail"];?></td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">ประเภท</td>
                                                <td id="td-ta"><?php echo $shw["type_name"]; ?></td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">วันที่ซื้อ</td>
                                                <td id="td-ta"><?php echo $objResult2["date_buy"];?></td>
                                            </tr>
                                            <tr id="tr-ta">
                                                <td id="td-ta">วันที่ตรวจสอบ</td>
                                                <td id="td-ta"><?php echo $objResult2["date_check"];?></td>
                                            </tr>
                                        </table><br>
                                        <?php if ($qrparcel == $objResult2["parcel_id"]) { ?>
                                            <button type="submit" value="Print Image" onclick="printImg()" class="btn btn-lg btn-info btn-block"><i class="fas fa-print"> </i> พิมพ์ QR-Code</button>
                                        <?php }else{
                                        ?>
                                        <form method="post" action="gen_qrcode/index.php?idu=<?php echo $idu; ?>">
                                        <input type="hidden" name="data" value="http://qr.utc.ac.th/soms/shw_detail_mobile.php?parcelID=<?php echo $objResult2["parcel_id"];?>">
                                        <input type="hidden" name="id" value="<?php echo $objResult2["parcel_id"];?>">
                                        <button type="submit" class="btn btn-lg btn-info btn-block">สร้าง QR-Code</button>
                                        </form>
                                        <?php } ?>
                                        <br>
                                        <div style="position: absolute; width: 200px;">
                                            <a href="edit_parcel.php?idp=<?php echo $objResult2["parcel_id"]; ?>" class="btn btn-lg btn-info btn-block" style="width: 100%;">แก้ไขข้อมูล</a>
                                        </div>
                                        <a href="parcel_add.php" class="btn btn-lg btn-info btn-block" style="width: 40%; margin-left: 60%; cursor: pointer;" id="hver">ย้อนกลับ</a>
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
        document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_1"]; ?>";
    }
    function shw_img1() {
        document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_2"]; ?>";
    }
    function shw_img2() {
        document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_3"]; ?>";
    }
    function shw_img3() {
        document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_4"]; ?>";
    }
    function shw_img4() {
        document.getElementById("showimg").src = "images/parcel/<?php echo $img["img_5"]; ?>";
    }
</script>
    </body>
</html>