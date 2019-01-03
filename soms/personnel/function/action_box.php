<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1 style="size: 100px;">ใส่ให้ครบดิไอ้ฟายยยยยยยยยย</h1>

<?php
$fail = $_GET['fail'];
if ($fail == '1') {
?>
<script type="text/JavaScript">
    setTimeout("location.href = '../parcel_add.php';",3000);
</script>
<?php }else{ ?>
<script type="text/JavaScript">
    setTimeout("location.href = '../add_user.php';",3000);
</script>
<?php } ?>
</body>
</html>