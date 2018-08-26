    <?php
    class PostsController {

      public function index() {
       if(!isset($_SESSION["id"])){  

        header('location: index.php?controller=user&action=showLogin');
        exit();
      }
      $posts = Post::all();
      require_once('view/posts/postime.php');
    }

    public function addPost() {
      require_once('controller/usercontroller.php');

      if(isset($_POST["title"])){
        $title = $_POST["title"];
      }

      if(isset($_POST["content"])){
        $content = $_POST["content"];
      } 

      if($title == '' || $content == ''){
        $_SESSION["error"] = "Please fill all the fields";
        header('location: index.php?controller=posts&action=show'); die;
      }
        

        $file = $_FILES["file"];
      
        $fileName = $file['name']; 
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        $fileExt = explode('.', $fileName);
        $fileType = strtolower(end($fileExt));

        $type = array('jpg', 'jpeg', 'png');

        if(in_array($fileType, $type))
        { 
          if($fileError === 0)
          { 
           
              $fileNewName = uniqid().".".$fileType;
              $fileDestination = 'upload/'.$fileNewName;
              move_uploaded_file($fileTmpName, $fileDestination);
          
          }
          else
          {
            $_SESSION["error"] = "there was an error uploading this file";
            header('location: index.php?controller=posts&action=show'); die;
          }

        }
        else
        {
          $_SESSION["error"] = "you can't upload this type of file";
           header('location: index.php?controller=posts&action=show'); die;
        }

        


      $id = $_SESSION["id"];

      $added = Post::add($title,$content, $id, $fileNewName);

      if($added === true) {

        Post::sendSubscribeMail();

        $posts = Post::all();
      header('location: index.php?controller=posts&action=index');
        exit();

      }

    }


    public function showPost() {

      if(isset($_GET["id"])){

        $id = $_GET["id"]; 
      }

      $posts = Post::lastPost($id);
      require_once('view/posts/postimeSubscribe.php');
    }



    public function subscribeUser() {
     $id = $_SESSION["id"];

     $subscribed = Post::findAndSubscribe($id);
   }



   public function show() {


     if(!isset($_SESSION["id"])){  
      Header('location: index.php?controller=user&action=showLogin');
      exit();
    } 




    require_once('view/posts/show.php');
  }


}
?>