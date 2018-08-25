
<!DOCTYPE html>
<html lang="en">
    <head> 
    	

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="view/user/login.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Log In</title>
	</head>
	<body>
		<div class="container">

			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">4 Paw Friends</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="index.php?controller=user&action=login" >
						
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">E-mail</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="email" id="email"  placeholder="E-mail" required onfocusout="emailValidation()"/>
								</div>
								 <span id="emailError"></span>
							</div>
						</div>

						

						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Fjalekalimi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Fjalekalimi" required onfocusout="passValidation()"/>
								</div>
								<span id="passError"></span>
							</div>
						</div>

						
						<?php if(isset($_SESSION["errors"])) { echo $_SESSION["errors"]; unset($_SESSION["errors"]); } ?>
						

						<div class="form-group ">
							<button type="submit"  name="login" id="login" class="btn btn-primary btn-lg btn-block login-button">Log In</button>
						</div>

						<div class="form-group ">
							<button type="button"  name="facebook" id="facebook" class="btn btn-primary btn-lg btn-block login-button" onclick="logIn()">Facebook</button>
						</div>

						<a href="index.php?controller=user&action=showResetPassword">Forgot password?</a>
						
					</form>
				</div>
			</div>
		</div>
 	

 <script type="text/javascript" src="assets/js/bootstrap.js"></script>
 <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

<script>

    var person = {userID: "", name: "" ,email: "" };

  function logIn() {
     FB.login(function(response){
        if (response.status=="connected"){
          person.userID = response.authResponse.userID;
            person.accessToken = response.authResponse.accessToken; 

            FB.api('/me?fields=id,name,email',function (userData) {

              person.name= userData.name;
              person.email=userData.email;
             

               $.ajax({
                url: "model/facebook.php",
                method: "POST",
                data: person,
                dataType: "text",
                success: function(serverResponse){
                  if(serverResponse != "success"){
                    window.location.href ='index.php';}
                   else if(serverResponse == "success") {
                  		window.location.href ='index.php?controller=user&action=welcome';
                  }
                 }

                });

              });
        }
      }, {scope: 'public_profile,email'})
    }


  window.fbAsyncInit = function() {
    FB.init({
      appId            : '515443685565022',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.1'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script src="validationLogin.js"></script>

	</body>
</html>