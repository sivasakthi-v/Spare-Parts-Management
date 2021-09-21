<?php
include_once("./database/constants.php");
if (isset($_SESSION["userid"])) {
	header("location:" . DOMAIN . "/dashboard.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./includes/style.css">
	<script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
	<script>
		function showPassword() {
			var x = document.getElementById("log_password");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		
		
	</script>
	
</head>

<body style="background-color:#211F1F;">

	<!-- Dark : #211F1F-->
	<br /><br />
	<div class="container">
		<?php
		if (isset($_GET["msg"]) and !empty($_GET["msg"])) {
		?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?php echo $_GET["msg"]; ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php
		}
		?>
		<div class="card mx-auto" style="width: 25rem; margin-top: 50px;">
			<img class="card-img-top mx-auto" style="width:40%; padding-top:20px;" src="./images/reg-log.png" alt="Login Icon">
			<div class="card-body">
				<form id="form_login" onsubmit="return false">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" name="log_email" id="log_email" placeholder="Enter email">
						<small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group">
						<label for=" exampleInputPassword1">Password</label>
						<input type="password" class="form-control" name="log_password" id="log_password" placeholder="Password">
						<input type="checkbox" onclick="showPassword()"> Show Password
						<br />
						<small id="p_error" class="form-text text-muted"></small>
					</div>

					<button type="submit" class="btn btn-dark"><i class="fa fa-lock">&nbsp;</i>Login</button>
					&nbsp;
					<span>(or) If You Are New Here <a href="register.php"> Register</a></span>
				</form>
			</div>
			
 

</body>

</html>