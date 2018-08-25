<?php 

 if(!isset($_SESSION["id"])){  
	/*echo "<script> alert('Ju nuk jeni loguar');</script>";*/
	Header('location: index.php?controller=user&action=showLogin');
	exit();
} 


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
HI THERE 
</body>
</html>