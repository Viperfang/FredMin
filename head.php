<html>

<head>
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="config/style.php" type="text/css">

	<title>
		<?php echo "$controlname - $pagename"; ?>
	</title>

</head>

<body>

<div class='header'>
	<a href='index.php'><img class="logo" src='images/header.png'></a>
	<p class='pagetitle'>Welcome to <?php echo $controlname ?>
</div>

<div class='menu'>
	<?php include ('config/stats.php'); ?>
</div>

<div class='content'>