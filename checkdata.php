<?php

require_once('model/connect.php');

if(isset($_POST["email"])){

	$email = $_POST["email"]; 

	$db = Db::getInstance();

	$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

			$result1 = $db->prepare("SELECT * FROM prof WHERE email = ?");
			$result1->execute([$email]);
			$user1 = $result1->fetch();

			$result2 = $db->prepare("SELECT * FROM store WHERE email = ?");
			$result2->execute([$email]);
			$user2 = $result2->fetch();

	if ($user["id"] >'0' || $user1["id"] > '0' || $user2["id"] > '0'  ) {

   		echo "Yes";
	}
	else { 
		echo "No";
	}

}
	


 ?>