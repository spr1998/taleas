
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head> 
    	
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

		<!-- Website CSS style -->
		<link rel="stylesheet" type="text/css" href="view/user/main.css">

		<!-- Website Font style -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

		<title>Sign Up</title>
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
					<form id="mainForm" class="form-horizontal" method="post" action="index.php?controller=user&action=signup" enctype="multipart/form-data"   onsubmit="return validateForm()" required>
			

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Perdoruesi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input  type="text" class="form-control" name="username" id="username"  placeholder="Perdoruesi" required onfocusout="nameValidation()"/>
									
								</div><span id="nameError"></span>
							</div>
						</div>

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
									<input type="password" class="form-control" name="password" id="password"  placeholder="Fjalekalimi" required onkeyup="passValidation()" />
								</div>
								 <span id="passError"></span>
							</div>
						</div>



						

						<div class="form-group ">
							<button type="submit" href="?controller=user&action=signup" name="register" class="btn btn-primary btn-lg btn-block login-button">Regjistrohu</button>
						</div>
					
					</form>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="validation.js"></script>
	</body>
</html>