<?php
	session_start();
	include('check-user.php');
  	include('../connect/connection.php');

	$id = $_GET["did"];
  	$datenow = date("Y");
  	$date_th = $datenow + 543;
  	$sel = "SELECT * FROM parcel LEFT JOIN department ON department_number = department_id WHERE department_number = '$id'";
  	$aa = mysql_query($sel);

  	$departm = mysql_fetch_array($aa);

  	$num = 1;
  	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#ta-all #tr-ta #td-ta {
                border: 1px solid black;
                text-align: left;
            }
            #ta-all {
                border-collapse: collapse;
                width: 95%;
            }
            #tr-ta #td-ta {
                padding: 10px;
            }
            .hidden-btn {
			  background-color: #4CAF50; 
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
			.hidden-btn:hover {
				background-color: #43CD80;
				color: white;
			}
            @media print{
            	.hidden-btn {
            		display: none;
            	}
            }
	</style>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
<div>
	<div style="position: absolute;">
		<p>&ensp; วิทยาลัยเทคนิคอุบลราชธานี</p>
	</div>
	<div align="center">
		<p><b>บัญชีรายละเอียดการสำรวจครุภัณฑ์</b></p>
	</div>
	<div style="position: absolute;">
		<p>&ensp; ประจำปีการศึกษา <?php echo $date_th; ?></p>
	</div>
	<div align="right" style="margin-right: 30%;">
		<p>ของแผนกวิชา <?php echo $departm["department_name"]; ?></p>
	</div>
</div><br>
<div align="center">
	<table id="ta-all">
		<tr id="tr-ta">
			<th id="td-ta" style="width: 50px;"><div align="center">ที่</div></th>
			<th id="td-ta"><div align="center">หมายเลขครุภัณฑ์</div></th>
			<th id="td-ta"><div align="center">รายการ</div></th>
			<th id="td-ta" style="width: 70px;"><div align="center">จำนวน</div></th>
			<th id="td-ta" style="width: 120px;"><div align="center">ราคาต่อหน่วย</div></th>
			<th id="td-ta" style="width: 120px;"><div align="center">ใช้ประจำที่</div></th>
		</tr>
		<?php
			while ($show = mysql_fetch_array($aa)) {
		?>
		<tr id="tr-ta">
			<td id="td-ta"><div align="center"><?php echo $num; ?></div></td>
			<td id="td-ta"><div align="center" onkeydown="autoTab()"><?php echo $show["parcel_number"]; ?></div></td>
			<td id="td-ta"><div align="center"><?php echo $show["name"]; ?></div></td>
			<td id="td-ta"><div align="center">1 หน่วย</div></td>
			<td id="td-ta"><div align="center"><?php echo number_format($show["price"]); ?> บาท</div></td>
			<td id="td-ta"><div align="center"><?php echo $show["department_name"]; ?></div></td>
		</tr>
		<?php
			$num++;
		}
		?>
	</table>
</div><br>
<div align="center">
	<button type="submit" onclick="printing();" class="hidden-btn" ><i class="fas fa-print">พิมพ์</i></button>
</div>
<script type="text/javascript">
	
	window.print();

	function printing(){
		window.print();
	}
</script>
</body>
</html>