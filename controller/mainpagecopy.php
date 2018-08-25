  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>4 Paw Friends</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <style type="text/css">

   /* .open-button {
    background-color: #555;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    
    bottom: 23px;
    right: 28px;
    width: 280px;
  } */

  /* The popup form - hidden by default */
  .form-popup {
    display: none;
    position: fixed;
    bottom: 35%;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
  }

  /* Add styles to the form container */
  .form-container {
    max-width: 300px;
    padding: 10px;
    background-color: white;
  }

  /* Full-width input fields */
  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }

  /* When the inputs get focus, do something */
  .form-container input[type=text]:focus, .form-container input[type=text]:focus {
    background-color: #ddd;
    outline: none;
  }

  /* Set a style for the submit/login button */
  .form-container .btn {
    background-color: #4CAF50;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }

  /* Add a red background color to the cancel button */
  .form-container .cancel {
    background-color: red;
  }

  /* Add some hover effects to buttons */
  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
  </style>
  <body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">4 Paw Friends</a>
      </div>
      <ul class="nav navbar-nav">

        

        <?php if( $action == 'welcome'): ?>
           <li class="active"><a href="?controller=user&action=welcome"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>
            <?php endif ?>
          

            <?php if( $action != 'welcome' && $action != 'showPost' ): ?>
        <li class="active"><a href="?controller=user&action=home"  <span class="glyphicon glyphicon-home "></span> Kryefaqja</a></li>
        <?php endif ?> 
         
        <li class="active"><a href="?controller=pages&action=profile"  <span class="glyphicon glyphicon-user "></span> Profili </a></li> 
       
      </ul>


      <ul class="nav navbar-nav navbar-right">
      

      
        <?php if(($controller=='user' && $action!='welcome') || $action == 'showLogin' ||$action == 'subscribeMessage' ): ?>
        <li class="dropdown">
          <a class="dropdown-toggle"  data-toggle="dropdown" >
            <span class="glyphicon glyphicon-menu-down"></span> Regjistrohu 
          </a>

          <ul class="dropdown-menu">
            <li>
              <a href="?controller=user&action=showNormalUser">
                <span class="glyphicon glyphicon-user">  </span>    Normal user
              </a>
             </li>
            <li>
              <a  href="?controller=user&action=showVet"> 
                <span class="glyphicon glyphicon-user"> </span> Veteriner
              </a>
            </li>
            <li>
              <a href="?controller=user&action=showStore">
                <span class="glyphicon glyphicon-user"> </span>  Dyqan Kafshesh
              </a>
            </li>
          </ul>
        </li> 
      <?php endif ?>
      <?php 
        $actions = array(
            'showNormalUser',
            'showVet',
            'showStore',
            'subscribeMessage',
            'showNormalUser',
            'showNormalUser',
        );

      ?>
      <?php 
        if(($controller == 'user' && $action != 'welcome') || in_array($action, $actions) ): ?>
        <li><a href="?controller=user&action=showLogin">

        <?php if($controller=='user' && $action=='showNormalUser'): ?> Jeni te regjistruar? <?php endif ?>  <span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
         <?php endif ?>


       
        <li>
          <a href="?controller=posts&action=index">  
            <span class="glyphicon glyphicon-folder-open"></span>  Postime
          </a>
        </li>
        

        <?php 

        if( $action == 'profile'  || $action == 'index'):  ?>
          <li>
            <a href="?controller=posts&action=show">  
              <span class="glyphicon glyphicon-folder-open"></span>  Shto nje postim
            </a>
          </li>
        <?php  endif; ?>


           <?php 
           if( $action == 'profile'): ?>
            <li>
              <a href="?controller=user&action=logout">  
                <span class="glyphicon glyphicon-log-out"></span>  Log Out</a>
            </li>
        <?php endif ?>

        <?php  if($action == 'home' || $action == 'showLogin' || $action == 'showStoreUser' || $action == 'showVetUser' || $action == 'showNormalUser'): ?>
          <li><a type="button" class="open-button" onclick="openForm()"> <span class="glyphicon glyphicon-envelope" > </span>  Abonohu</a></li>
       <?php endif ?>

       <?php if($action == 'welcome'): ?>
       <li>  <a  data-toggle="modal" href='#modal-id'> <span class="glyphicon glyphicon-envelope" > </span>Abonohu</a>
            </li>
       <?php endif ?>
      </ul> 
    </div>




  </nav>
      
      <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Subscribe to get the latest news</h4>
            </div>
            <div class="modal-body">
              subscribe
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-primary" href="index.php?controller=posts&action=subscribeUser">Abonohu</a>
              <a type="button" class="btn btn-default" data-dismiss="modal">Mbyll</a>
              
            </div>
          </div>
        </div>
      </div>
  <!--<a href=''>Posts</a> -->
  <div class="form-popup" id="myForm">
    <form method="POST" action="index.php?controller=user&action=subscribe" class="form-container">
      <h1>Abonohu!</h1>

      <label for="name"><b>Emri</b></label>
      <input type="text" placeholder="  Emri" name="name" required>

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="  Email" name="email" required>

      <button type="submit" class="btn">Abonohu</button>
      <button type="submit" class="btn cancel" onclick="closeForm()">Mbyll</button>
    </form>
  </div>

   </body>
  <?php require_once('routes.php'); ?> 


    <script>
  function openForm() {
      document.getElementById("myForm").style.display = "block";
  }

  function closeForm() {
      document.getElementById("myForm").style.display = "none";
  }
  </script>


  </body>
  </html>












