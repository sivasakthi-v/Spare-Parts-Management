<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:" . DOMAIN . "/");
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
	<script type="text/javascript" src="./js/manage.js"></script>
</head>

<body>
	<!-- Navbar -->
	<!-- <input class="form-control mr-sm-2" type="search" placeholder="Search Products, Invoive.." aria-label="Search">
			<button class="btn btn-outline-success my-2 my-sm-2 mr-sm-3" type="submit">Search</button> -->
	<?php include_once("./templates/brandnv.php"); ?>
	<br /><br />
	<br /><br />

	<div class="container">
		<table class="table table-hover table-bordered">
			<div>
				<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
					<a class="navbar-brand"><span><img src="./images/manage.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>MANAGE BRANDS</b></a>
			</div>
			<thead>
				<tr>
					<th>#</th>
					<th>Brand</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="get_brand">
				<!--<tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-info btn-sm">Edit</a>
		        </td>
		      </tr>-->
			</tbody>
		</table>
	</div>
	<br><br><br><br>

	<?php
	include_once("./templates/update_brand.php");
	?>
	<?php include_once("./templates/footer.php"); ?>


</body>

</html>