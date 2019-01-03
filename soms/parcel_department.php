<?php
  session_start();
  include('function/check-user.php');
  include('connect/connection.php');
  date_default_timezone_set('Asia/Bangkok');
  $strSQL = "SELECT * FROM user WHERE username = '".$_SESSION['UserID']."' ";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);

  $idp = $_GET["parcelID"];
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
        width: 250px;
        height: 200px;
        margin: 1px 3px;
}
th , #headta {
   background-color: #57d365;
   border-right: solid 1px;
}
    #thead2  {
        background-color: #57d365;
    }
    #clor {
        background-color: #4169E1; 
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
#red-clor {
    background-color: #f4cdd1;
    color: #555555;
}
    #act {
        color: white;
}
    #act:hover {
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
                            <div class="col-lg-9">
                                <div class="card-header" id="clor" style="width: 135%; height: 70px;">
                                    <form method="post" action="parcel_department.php?parcelID=<?php echo $idp; ?>">
                                        <input type="test" name="searching" class="form-control" style="width: 50%; position: absolute; margin-top: 0;" value="<?php echo $_POST["searching"]; ?>" placeholder="ค้นหา">
                                        <div style="float: left; margin-left: 55%; margin-top: 5px; position: absolute;">
                                            <button type="submit" class="fas fa-search"></button>
                                        </div>
                                        <div style="margin-left: 85%; margin-top: 7px;">
                                                <a href="function/print_report.php?did=<?php echo $idp; ?>" target="_blank" id="act">รายงานประจำปี</a>
                                            </div>
                                    </form>
                                </div>
                                <div class="table-responsive table--no-card m-b-40" style="width: 135%; margin-top: 20px;">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th id="headta"><div align="center">ชื่อครุภัณฑ์</div></th>
                                                <th id="headta"><div align="center">หมายเลขครุภัณฑ์</div></th>
                                                <th id="headta"><div align="center">วันที่ซื้อ</div></th>
                                                <th id="headend"><div align="center">จัดการครุภัณฑ์</div></th>
                                            </tr>
                                        </thead>
                                        <?php
                                            if ($_POST["searching"] == null) {

                                            $perpage = 12;
                                            if (isset($_GET['page'])) {
                                            $page = $_GET['page'];
                                            } else {
                                            $page = 1;
                                            }

                                            $start = ($page - 1) * $perpage;

                                            $sql = "SELECT * FROM parcel LEFT JOIN parcel_type ON type_number = type_id WHERE department_number = '$idp' LIMIT $start , $perpage";
                                            $query = mysql_query($sql);
 
                                            while($show = mysql_fetch_assoc($query))
                                            { 
                                                $date_old = $show["date_buy"];
                                                $dn = date('Y');
                                                $date=date_create($date_old);
                                                $date_o = date_format($date,"Y");
                                                $result = $dn - $date_o;
                                            ?>
                                        <tbody>
                                            <tr>
                                                <?php  
                                                    if ($show["type_number"] == $show["type_id"]) {
                                                        if ($result > $show["parcel_age"]){                 
                                                ?>
                                                <td id="red-clor"><div align="center"><?php echo $show['name']; ?></div id="red-clor"></td>
                                                <td id="red-clor"><div align="center"><?php echo $show['parcel_number']; ?></div></td>
                                                <td id="red-clor"><div align="center"><?php echo date('d-m-Y',strtotime($show['date_buy'])); ?></div></td>
                                                <td id="red-clor"><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>&pid=<?php echo $idp; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>

                                            <?php }else{ ?>

                                                <td><div align="center"><?php echo $show['name']; ?></div></td>
                                                <td><div align="center"><?php echo $show['parcel_number']; ?></div></td>
                                                <td><div align="center"><?php echo date('d-m-Y',strtotime($show['date_buy'])); ?></div></td>
                                                <td><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>&pid=<?php echo $idp; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>

                                            <?php } }else{ ?>

                                                <td><div align="center"><?php echo $show['name']; ?></div></td>
                                                <td><div align="center"><?php echo $show['parcel_number']; ?></div></td>
                                                <td><div align="center"><?php echo date('d-m-Y',strtotime($show['date_buy'])); ?></div></td>
                                                <td><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>&pid=<?php echo $idp; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>     
                                </div>
                            </div>
                    </div>
                    <div>
                        <?php

                            $sql2 = "select * from parcel where department_number = '$idp'";
                            $query2 = mysql_query($sql2);
                            $total_record = mysql_num_rows($query2);
                            $total_page = ceil($total_record / $perpage);
                            ?>

                            <div class="paginations">

                            <?php
                                if ($page == "1") {
                            ?>
                            <a href="parcel_department.php?page=1&parcelID=<?php echo $idp; ?>">&laquo;</a>

                            <?php
                            }else{
                            ?>
                            <a href="parcel_department.php?page=<?php echo $page-1; ?>&parcelID=<?php echo $idp; ?>">&laquo;</a>
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
                            <a href="parcel_department.php?page=<?php echo $total_page; ?>&parcelID=<?php echo $idp; ?>">&raquo;</a>
                            <?php }else{ ?>
                            <a href="parcel_department.php?page=<?php echo $page+1; ?>&parcelID=<?php echo $idp; ?>">&raquo;</a>
                            <?php } ?>
                        <?php }else{ 

                            $data = $_POST["searching"];

                            $sqlstr = "SELECT * FROM parcel WHERE (name LIKE '%".$data."%' or parcel_number LIKE '%".$data."%' ) and department_number = '$idp' ";
                            $qrysql = mysql_query($sqlstr);

                            while ($shw = mysql_fetch_array($qrysql)) {
                                $date_old = $shw["date_buy"];
                                $dn = date('Y');
                                $date=date_create($date_old);
                                $date_o = date_format($date,"Y");
                                $result = $dn - $date_o;
                        ?>
                            <tbody>
                                <tr>
                                    <!-- <td><div align="center"><?php echo $shw['name']; ?></div></td>
                                    <td><div align="center"><?php echo $shw['parcel_number']; ?></div></td>
                                    <td><div align="center"><?php echo $shw['date_buy']; ?></div></td>
                                    <td><div align="center"><a href="function/parcel-delete.php?idp=<?php echo $show['parcel_id']; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a> &nbsp;<a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>" class="fas fa-edit"></a></div></td> -->
                                    <?php  
                                        if ($result >= '5') {
                                    ?>
                                        <td id="red-clor"><div align="center"><?php echo $shw['name']; ?></div id="red-clor"></td>
                                        <td id="red-clor"><div align="center"><?php echo $shw['parcel_number']; ?></div></td>
                                        <td id="red-clor"><div align="center"><?php echo date('d-m-Y',strtotime($shw['date_buy'])); ?></div></td>
                                        <td id="red-clor"><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>&pid=<?php echo $idp; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>
                                        <?php }else{ ?>
                                        <td><div align="center"><?php echo $shw['name']; ?></div></td>
                                        <td><div align="center"><?php echo $shw['parcel_number']; ?></div></td>
                                        <td><div align="center"><?php echo date('d-m-Y',strtotime($shw['date_buy'])); ?></div></td>
                                        <td><div align="center"><a href="show_detail.php?parcelID=<?php echo $show["parcel_id"]; ?>&pid=<?php echo $idp; ?>" class="fas fa-edit"></a> &nbsp;<a href="function/parcel-delete.php?idp=<?php echo $show["parcel_id"]; ?>&departid=<?php echo $idp; ?>" class="fas fa-trash-alt" style="color: red;"></a></div></td>
                                        <?php } ?>
                                </tr>

                            </tbody>
                        <?php } } ?>
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