  <?php 
  require_once('connect.php'); 

  if(isset($_POST["userID"])){
    

   if(isset($_POST["userID"])){ $userID  = $_POST["userID"];}

   if(isset($_POST["email"])){ $email  = $_POST["email"];}
   

   if(isset($_POST["name"])){ $name = $_POST["name"];}
   
   $db = Db::getInstance();

   $result = $db->prepare("SELECT id FROM user WHERE email = ?");
   $result->execute([$email]);
   $user = $result->fetch();

   if($user["id"]){ 
    session_start();
    $_SESSION["id"] = $user["id"];
    echo "success";
    
  } 




  else {
    $result = $db->prepare ("INSERT INTO user(name,email,password,confirm,confirm_code,FBuserID)
      VALUES(:name, :email,' ','0','0',:userID)");
    $result->execute(array('name' => $name, 'email' => $email , 'userID'=> $userID));
    
    $result = $db->prepare("SELECT id FROM user WHERE email = ?");
    $result->execute([$email]);
    $user = $result->fetch();

    if($user["id"]){ 
      session_start();
      $_SESSION["id"] = $user["id"];
      echo "success";
      
    } 
    

  }  

  }



  ?>