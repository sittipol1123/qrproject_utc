<?php
  session_start();
  include('../function/check-user.php');
  include('../connect/connection.php');
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
        .section-pro {
        float: left;
        width: 270px;
        height: 220px;
        margin: 1px 3px;
}
        #clor {
        background-color: #57d365; 
        color: white;
}
th , #headta {
   background-color: #57d365;
   border-right: solid 1px;
}
    #thead2  {
        background-color: #57d365;
    }
    #clor {
        background-color: #57d365; 
        color: white;"
    }
    #headend {
        background-color: #57d365;
    }
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
    <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <!-- <div class="card-header" style="background-color: #57d365; color: white;">
                    <strong class="card-title">แผนกวิชา</strong>
                  </div> -->
                  <?php 
                    $selsql = "SELECT * FROM parcel_type";
                    $type_query = mysql_query($selsql);

                  ?>
                  <div class="card-header" id="clor">
                        <form method="get" action="parcel_show.php">
                            <input type="test" name="searching" class="form-control" style="width: 30%; position: absolute;" value="<?php echo $_GET["searching"]; ?>" placeholder="ค้นหา">
                            <div style="float: left; margin-left: 30%;">
                                <select name="type_p" class="form-control" style="width: 50%;">
                                    <option value="0">ประเภท</option>
                                    <?php
                                        while ($shwtyp = mysql_fetch_array($type_query)) {
                                    ?>
                                        <option value="<?php echo $shwtyp["type_id"]; ?>"><?php echo $shwtyp["type_name"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div style="float: left; margin-left: 45%; margin-top: 7px; position: absolute;">
                            <button type="submit" class="fas fa-search"></button>
                            </div>
                        </form>
                    </div>
                <?php
                    if ($_GET["searching"] == '' && $_GET["type_p"] == '') {
                    $strSQL = "SELECT * FROM department";
                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                ?>
                  <div class="card-body">
                    <?php
                            while ($show = mysql_fetch_array($objQuery)) {
                        ?>
                            <section class="section-pro">
                                 <div align="center"><br>
                                    <a href="parcel_department.php?parcelID=<?php echo $show['department_id'];?>">
                                    <img src="../images/department/<?php echo $show['image_depart']; ?>" width="250" height="200">
                                      </a>
                                  </div>
                            </section>
<!-- /////////////////////////////////////////รับค่าแล้ว/////////////////////////////////////////////////////// -->
                        <?php } }else{

                            $data = $_GET["searching"];
                            $tdata = $_GET["type_p"];
                            if ($tdata == 0) {
                                $sqlstr = "SELECT * FROM parcel WHERE (parcel_number LIKE '%".$data."%' or date_buy LIKE '%".$data."%')";
                                $qrysql = mysql_query($sqlstr);
                                if (!$qrysql) {
                                   $sqlstr = "SELECT * FROM parcel WHERE (name LIKE '%".$data."%')";
                                   $qrysql = mysql_query($sqlstr);
                                }
                            }else {
                                $sqlstr = "SELECT * FROM parcel WHERE (type_number LIKE '%".$tdata."%')";
                                $qrysql = mysql_query($sqlstr);
                            }

                            // $idparcel = $shw_idp["parcel_id"];

                            $perpage = 12;
                            if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            } else {
                            $page = 1;
                            }
                            $start = ($page - 1) * $perpage;

                            $selsql = "SELECT * FROM parcel_type";
                            $type_query = mysql_query($selsql);
                        ?>
                        <div class="table-responsive table--no-card m-b-40" style="width: 100%; margin-top: 20px;">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th id="headta"><div align="center">ชื่อครุภัณฑ์</div></th>
                                                <th id="headta"><div align="center">หมายเลขครุภัณฑ์</div></th>
                                                <th id="headta"><div align="center">วันที่ซื้อ</div></th>
                                                <th id="headta"><div align="center">แผนก</div></th>
                                                <th id="headend"><div align="center">จัดการครุภัณฑ์</div></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($show = mysql_fetch_array($qrysql))
                                                //$deprt_id = $show['department_number'];

                                                // $stedepart = "SELECT * FROM department WHERE department_id = ".$show['department_number']." ";
                                                // $departquery = mysql_query($stedepart);
                                                // $dpm = mysql_fetch_array($departquery);
                                            { 
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td><div align="center"><?php echo $show['name']; ?></div></td>
                                                <td><div align="center"><?php echo $show['parcel_number']; ?></div></td>
                                                <td><div align="center"><?php echo $show['date_buy']; ?></div></td>
                                                <?php
                                                $deprt_id = $show['department_number'];

                                                 $stedepart = "SELECT * FROM department WHERE department_id = ".$show['department_number']." ";
                                                 $departquery = mysql_query($stedepart);
                                                 $dpm = mysql_fetch_array($departquery);?>
                                                <td><div align="center"><?php echo $dpm['department_name']; ?></div></td>
                                                <td><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>     
                                </div>
                            </div>
                            <?php

                            $sql2 = "select * from parcel where department_number = '$idp' ";
                            $query2 = mysql_query($sql2);
                            $total_record = mysql_num_rows($query2);
                            $total_page = ceil($total_record / $perpage);
                            ?>

                            <div class="paginations">

                            <?php
                                if ($page == "1") {
                            ?>
                            <a href="parcel_show.php?page=1&searching=<?php echo $data; ?>&type_p=<?php echo $tdata; ?>">&laquo;</a>

                            <?php
                            }else{
                            ?>
                            <a href="parcel_show.php?page=<?php echo $page-1; ?>&searching=<?php echo $data; ?>&type_p=<?php echo $tdata; ?>">&laquo;</a>
                            <?php } ?>
        
                            <p><?php echo $page; ?>/<?php echo $total_page; ?></p>
                            <?php 
                                if ($page == $total_page) {
                            ?>
                            <a href="parcel_show.php?page=<?php echo $total_page; ?>&searching=<?php echo $data; ?>&type_p=<?php echo $tdata; ?>">&raquo;</a>
                            <?php }else{ ?>
                            <a href="parcel_show.php?page=<?php echo $page+1; ?>&searching=<?php echo $data; ?>&type_p=<?php echo $tdata; ?>">&raquo;</a>
                            <?php } } ?>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
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