<?php    

    session_start();
    include('../connect/connection.php');

    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
    //ofcourse we need rights to create temp dir
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
    $filename = $PNG_TEMP_DIR.'test.png';
    
    //processing form input
    //remember to sanitize user input in real-life solution !!!
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
            
        // user data
        $ename = md5($_REQUEST['data'].$errorCorrectionLevel.$matrixPointSize).'.png';
        $filename = $PNG_TEMP_DIR.$ename;
        //insert to database 
        $image_name = $ename;
        $parcelid = $_POST['id'];

        $sql = "insert into myqrcode (parcelid,qrcode) values ('$parcelid','$image_name')";
        $chk = mysql_query($sql);

        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2); 

        $uid = $_GET["idu"];
        $sel = "SELECT * FROM user WHERE list = '$uid' ";
        $selq = mysql_query($sel);
        $shw = mysql_fetch_array($selq);

        $stus = $shw["status"];

        if ($stus == "ADMIN") {
            echo "<script>
                    alert('สำเร็จ');
                    window.location ='../show_detail_after.php?parcelID=".$parcelid."';
                </script>";

        }else{ 
            echo "<script>
                        alert('สำเร็จ');
                        window.location ='../employee/show_detail_after.php?parcelID=".$parcelid."';
                </script>";
         }

        
    } else {    
    
        //default data
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
   // echo '<img src="'.$PNG_WEB_DIR.$filename.'" /><hr/>';  
    // benchmark
    $uid = $_GET["idu"];
    $sel = "SELECT * FROM user WHERE list = '$uid' ";
    $selq = mysql_query($sel);
    $shw = mysql_fetch_array($selq);

    $stus = $shw["status"];

    if ($stus == "ADMIN") {
        echo "<script>
                alert('สำเร็จ');
                window.location ='../show_detail_after.php?parcelID=".$parcelid."';
            </script>";

}else{ 
    echo "<script>
                alert('สำเร็จ');
                window.location ='../employee/show_detail_after.php?parcelID=".$parcelid."';
            </script>";
 } 
 ?>