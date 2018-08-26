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
					<?php if(isset($_GET["token"])){ $token = $_GET["token"];} ?>
					<form class="form-horizontal" method="post" action="index.php?controller=user&action=resetPassword&token=<?php echo $token ?>" >
						
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Fjalekalimi</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password" id="password"  placeholder="Fjalekalimi" required onkeyup="passValidation()"/>
								</div>
								 <span id="passError"></span>
							</div>
						</div>

						

						<div class="form-group">
							<label for="password1" class="cols-sm-2 control-label"> Konfirmo fjalekalimin</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input type="password" class="form-control" name="password1" id="password1"  placeholder="Konfirmo fjalekalimin" required onketup="passValidation()"/>
								</div>
								<span id="passError"></span>
							</div>
						</div>

						
						<?php if(isset($_SESSION["error"])) { echo $_SESSION["error"]; unset($_SESSION["error"]); } ?>
						

						<div class="form-group ">
							<button type="submit"  name="reset" id="reset" class="btn btn-primary btn-lg btn-block login-button">Reset</button>
						</div>

						
						
					</form>
				</div>
			</div>
		</div>
		<script src="validationReset.js"></script>
	</body>
	</html>
