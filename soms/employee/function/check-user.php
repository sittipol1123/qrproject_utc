<?php
if($_SESSION['UserID'] == "")
  {
    echo "Please Login!";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script>
		$("#timedelay").fadeOut(4000)
              .delay(6000)
              .html($("#productPage" + pageNum).html())
              .fadeIn(4000); 
	</script>
</head>
<body>
<div align="center">
	<h1>Warning!!!!!</h1>
</div>
<div id="timedelay">
	<?php header("location:index.html"); ?>
</div>
</body>
</html>
<?php
    exit();
  }
?>