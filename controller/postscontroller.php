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

      $id = $_SESSION["id"];

      $added = Post::add($title,$content, $id);

      if($added > 0) {

        Post::sendSubscribeMail($added);

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