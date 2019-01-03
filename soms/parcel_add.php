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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/button.css">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
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
        height: 110px;
        margin: 1px 3px;
}
        .upload-btn-wrapper {
        position: relative;
        overflow: hidden;
        display: inline-block;
}

        .btn {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 8px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
}
    .c-ment {
        color: red;
    }
    #clor {
        background-color: #57d365; 
        color: white;"
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
                    <div class="card-header" id="clor">
                        <strong class="card-title">รายการทั้งหมด</strong>
                    </div>
                    <div class="card-body">
                        <?php
                            $se = "SELECT * FROM department";
                            $seq = mysql_query($se);

                            $sel_p = "SELECT * FROM parcel_type";
                            $sel_pquery = mysql_query($sel_p);
                        ?>
                        <form method="POST" action="test_show_parcel_number.php" enctype="multipart/form-data" name="sendform" onSubmit="JavaScript:return fncSubmit();">
                            <p>หมายเลขครุภัณฑ์</p>
                                <input type="number" name="parcel_number" class="form-control" style="width: 50%;"><br>
                            <p>ชื่อครุภัณฑ์</p>
                                <input type="text" name="name_p" class="form-control" style="width: 50%;"><br>
                            <p>รายละเอียด</p>
                                <input type="text" name="detail" class="form-control" style="width: 50%;"><br>
                            <p>ประเภท</p>
                                <select name="typ" class="form-control" style="width: 30%;">
                                <?php
                                    while ($shw_p = mysql_fetch_array($sel_pquery)) {
                                ?>
                                <option value="<?php echo $shw_p['type_id']; ?>" class="form-control"><?php echo $shw_p['type_name']; ?></option>
                            <?php } ?>
                            </select><br>
                            <p>ราคา</p>
                                <input type="text" name="price" class="form-control" style="width: 50%;"><br>
                            <p>งบที่ใช้ในการจัดซื้อ</p>
                                <select name="budget" class="form-control" style="width: 20%;">
                                    <option class="form-control" value="ทุนการศึกษา">ทุนการศึกษา</option>
                                    <option class="form-control" value="บริจาค">บริจาค</option>
                                    <option class="form-control" value="งบประมาณ">งบประมาณ</option>
                                    <option class="form-control" value="เงินอุดหนุน">เงินอุดหนุน</option>
                                </select><br>
                            <p>ปีที่ซื้อ <label class="c-ment">*14-11-2018</label></p>
                                <input type="text" name="date_b" class="form-control" onkeyup="autoTab(this)" style="width: 50%;"><br>
                            <p>แผนก</p>
                            <select name="department" class="form-control" style="width: 30%;">
                                <?php
                                    while ($shw = mysql_fetch_array($seq)) {
                                ?>
                                <option value="<?php echo $shw['department_id']; ?>" class="form-control"><?php echo $shw['department_name']; ?></option>
                            <?php } ?>
                            </select><br><br>
                            <p>รูปที่ 1</p>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image_in" required="" />
                                </div><br>
                            <p>รูปที่ 2</p>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image_in2"/>
                                </div><br>
                            <p>รูปที่ 3</p>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image_in3"/>
                                </div><br>
                            <p>รูปที่ 4</p>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image_in4"/>
                                </div><br>
                            <p>รูปที่ 5</p>
                                <div class="upload-btn-wrapper">
                                    <input type="file" name="image_in5"/>
                                </div><br>
                            <button type="submit" class="add_button" name="id_user" value="<?php echo $objResult['username'];?>">เพิ่ม</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
        <!-- Jquery JS-->
    <script>
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
function fncSubmit()
{
    if(document.sendform.parcel_number.value == "")
    {
        alert('กรอกหมายเลขครุภัณฑ์');
        document.sendform.parcel_number.focus();
        return false;
    }   
    if(document.sendform.name_p.value == "")
    {
        alert('กรอกชื่อครุภัณฑ์');
        document.sendform.name_p.focus();        
        return false;
    }   
    if(document.sendform.price.value == "")
    {
        alert('กรอกราคา');
        document.sendform.price.focus();        
        return false;
    }  
    if(document.sendform.date_b.value == "")
    {
        alert('ระบุปีที่ซื้อ');
        document.sendform.date_b.focus();        
        return false;
    }  
    document.sendform.submit();
}
    </script>
    <script src="js/custom-file-input.js"></script>
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