  <?php
  class PagesController {

    public function home() {
      require_once('view/user/home.php');
    }

    public function confirm() {
      require_once('view/pages/confirm.php');
    }

    public function profile(){  
      if(!isset($_SESSION["id"])){  
       
        header('location: index.php?controller=user&action=showLogin');
        exit();
      }
      require_once('view/pages/profile.php');
    }

    public function error() {
      require_once('view/user/error.php');
    }

    public function subscribeMessage(){
      require_once('view/pages/subscribeMessage.php');
    }
  }
  ?>