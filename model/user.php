		<?php
		
		class User{

			
			public function __construct(){}

			public static function createNormalUser($name,$email,$password){

				try { $confirm_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
				$confirm_code=str_shuffle($confirm_code);
				$confirm_code = substr($confirm_code,0,12);

				
				

				$db = Db::getInstance();

				$confirm = $FBuserID = 0;

				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);

				$result = $db->prepare("INSERT INTO user(name,email,password,confirm,confirm_code,FBuserID) VALUES (:name, :email,:hashed_pass,:confirm,:confirm_code,:FBuserID)");

				
				$result->execute(array('name' => $name, 'email' => $email , 'hashed_pass' => $hashed_pass , 'confirm' =>$confirm ,'confirm_code'=> $confirm_code, 'FBuserID'=> $FBuserID));
				

				return $confirm_code;
				

				
			}
			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}	
		}


		public function createStoreUser($fname,$lname,$username,$phone,$location,$email,$password){

			try{
				$confirm_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
				$confirm_code=str_shuffle($confirm_code);
				$confirm_code = substr($confirm_code,0,12);

				$db = Db::getInstance();

				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);

				$confirm = $FBuserID = 0;
				$name = $fname.' '.$lname;
				$type = 'store';
				
				$result = $db->prepare("INSERT INTO user(name,email,password,confirm,confirm_code,FBuserID,type) VALUES (:name, :email,:hashed_pass,:confirm,:confirm_code,:FBuserID,:type)");

				
				$result->execute(array('name' => $name, 'email' => $email , 'hashed_pass' => $hashed_pass , 'confirm' =>$confirm ,'confirm_code'=> $confirm_code, 'FBuserID'=> $FBuserID, 'type'=> $type));

				$result = $db->prepare("SELECT id FROM user WHERE email = ?");
				$result->execute([$email]);
				$user = $result->fetch();
				$id = $user["id"];

				 $result = $db->prepare("INSERT INTO information(id,location,username,phone) VALUES (:id,:location,:username,:phone)");

				$result->execute(array('id' => $id, 'location' =>$location ,'phone' => $phone ,  'username'=>$username));

				return $confirm_code;

			}

			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}


		}



		public function createVetUser($fname,$lname,$username,$phone,$location,$email,$password){

			try{
				$confirm_code='qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM123456789!()';
				$confirm_code=str_shuffle($confirm_code);
				$confirm_code = substr($confirm_code,0,12);

				$db = Db::getInstance();

				$hashed_pass=password_hash($password, PASSWORD_DEFAULT);
				$confirm = $FBuserID = 0;
				$name = $fname.' '.$lname;
				$type = 'vet';
				
				$result = $db->prepare("INSERT INTO user(name,email,password,confirm,confirm_code,FBuserID,type) VALUES (:name, :email,:hashed_pass,:confirm,:confirm_code,:FBuserID,:type)");

				
				$result->execute(array('name' => $name, 'email' => $email , 'hashed_pass' => $hashed_pass , 'confirm' =>$confirm ,'confirm_code'=> $confirm_code, 'FBuserID'=> $FBuserID, 'type'=> $type));

				$result = $db->prepare("SELECT id FROM user WHERE email = ?");
				$result->execute([$email]);
				$user = $result->fetch();
				$id = $user["id"];

				 $result = $db->prepare("INSERT INTO information(id,location,username,phone) VALUES (:id,:location,:username,:phone)");

				$result->execute(array('id' => $id, 'location' =>$location ,'phone' => $phone ,  'username'=>$username));

				return $confirm_code;

			}

			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}


		}


		public function findUser($email, $password){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

			// $result1 = $db->prepare("SELECT * FROM prof WHERE email = ?");
			// $result1->execute([$email]);
			// $user1 = $result1->fetch();

			// $result2 = $db->prepare("SELECT * FROM store WHERE email = ?");
			// $result2->execute([$email]);
			// $user2 = $result2->fetch();

			if($user != '' ){

				if ($user && password_verify($password, $user['password']))
				{
					return $user['confirm'];
				} else {
					return false;
				}
			}
		}

			// else{


			// 	if($user1 != '' ){

			// 		if ($user1 && password_verify($password, $user1['password']))
			// 		{
			// 			return $user1['confirm'];
			// 		} else {
			// 			return false;
			// 		}
			// 	}
			// 	else{

			// 		if($user2 != '' ){

			// 			if ($user2 && password_verify($password, $user2['password']))
			// 			{
			// 				return $user2['confirm'];
			// 			} else {
			// 				return false;
			// 			}
			// 		}
			// 	}
			// }

			


		


		public function confirmation($email, $confirm_code){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT confirm_code FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

			// $result1 = $db->prepare("SELECT confirm_code FROM prof WHERE email = ?");
			// $result1->execute([$email]);
			// $user1 = $result1->fetch();

			// $result2 = $db->prepare("SELECT confirm_code FROM store WHERE email = ?");
			// $result2->execute([$email]);
			// $user2 = $result2->fetch();


			if($user["confirm_code"] == $confirm_code){

				$result = $db->prepare("UPDATE user SET confirm = 1 WHERE email = ?");
				$result->execute([$email]);

				$result = $db->prepare("UPDATE user SET confirm_code = 0 WHERE email = ?");
				$result->execute([$email]);
				
				return true;
			} 
			// else if($user1["confirm_code"] == $confirm_code){

			// 	$result1 = $db->prepare("UPDATE prof SET confirm = 1 WHERE email = ?");
			// 	$result1->execute([$email]);

			// 	$result1 = $db->prepare("UPDATE prof SET confirm_code = 0 WHERE email = ?");
			// 	$result1->execute([$email]);
				
			// 	return true;
			// } 

			// else if($user2["confirm_code"] == $confirm_code){

			// 	$result2 = $db->prepare("UPDATE store SET confirm = 1 WHERE email = ?");
			// 	$result2->execute([$email]);

			// 	$result2 = $db->prepare("UPDATE store SET confirm_code = 0 WHERE email = ?");
			// 	$result2->execute([$email]);
				
			// 	return true;
			// }
			else return false;

		}

		public function reset($password,$email){
			$db = Db::getInstance();

			$result = $db->prepare("SELECT id FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();

			// $result1 = $db->prepare("SELECT id FROM prof WHERE email = ?");
			// $result1->execute([$email]);
			// $user1 = $result1->fetch();

			// $result2 = $db->prepare("SELECT id FROM store WHERE email = ?");
			// $result2->execute([$email]);
			// $user2 = $result2->fetch();

			$password = password_hash($password, PASSWORD_DEFAULT);

			if($user["id"] > 0){

				$result = $db->prepare("UPDATE user SET password = :password WHERE email = :email ");

				$result->execute(array(':password' => $password ,':email' => $email ));
				return true;

			}
			// else if($user1["id"] > 0){

			// 	$result = $db->prepare("UPDATE prof SET password = :password WHERE email = :email ");

			// 	$result->execute(array(':password' => $password ,':email' => $email ));
			// 	return true;

			// } 
			// else if($user1["id"] > 0){


			// 	$result = $db->prepare("UPDATE store SET password = :password WHERE email = :email ");

			// 	$result->execute(array(':password' => $password ,':email' => $email ));
			// 	return true;

			// }

		}


		public function createSubscribeUser($name,$email){


			try { 

				
				

				$db = Db::getInstance();


				

				$result = $db->prepare("INSERT INTO subscribe(name,email) VALUES (:name, :email)");

				
				$result->execute(array('name' => $name, 'email' => $email ));
				

				return true;
				

				
			}
			catch (PDOException $e) {
				echo "The user could not be added.<br>".$e->getMessage();
			}	


		}


		public function exists($email){

			$db = Db::getInstance();

			$result = $db->prepare("SELECT * FROM user WHERE email = ?");
			$result->execute([$email]);
			$user = $result->fetch();


			if($user != '' ){
				return true;
			} else return false;
			

		}






	}





	?>