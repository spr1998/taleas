<?php
	require_once('controller/usercontroller.php');
	if(isset($_SESSION["id"])){
		Header('location: index.php?controller=user&action=welcome');
		exit();
	}


	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Home</title>
	</head>
	<body>



	</body>
	</html>