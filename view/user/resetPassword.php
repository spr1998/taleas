<!DOCTYPE html>
<html>

<head>
	<title>Confirm your email</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <
  <link rel="stylesheet" type="text/css" href="view/user/login.css">
</head>


</style>


<body id="page">

<div class="container">

      <div class="row main">
        <div class="panel-heading">
                 <div class="panel-title text-center">
                    <h1 class="title">4 Paw Friends</h1>
                    <hr />
                  </div>
              </div> 
        <div class="main-login main-center">
          <form class="form-horizontal" method="post" action="index.php?controller=user&action=sendMailPassword" >
            
            <h4>Please enter your email!</h4>
            

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


            <div class="form-group ">
              <button type="submit"  name="login" id="login" class="btn btn-primary btn-lg btn-block login-button">Send reset email</button>
            </div>

            
            
</form>
    <script src="validationReset.js"></script>

</body>
</html>