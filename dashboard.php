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
	<script type="text/javascript" src="./js/main.js"></script>
	<link rel="stylesheet" type="text/css" href="dtstyle.css">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

</head>

<body style="background-color:#fff;">
	<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
		<a class="navbar-brand"><b>SPAREPARTS INVENTORY SYSTEM - Dashboard</b></a>
		<form class="form-inline">
			<div class="dropdown">
				<button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Account
				</button>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="index.php">Home</a>
					<a class="dropdown-item" href="manage_categories.php">Categories</a>
					<a class="dropdown-item" href="manage_brand.php">Brands</a>
					<a class="dropdown-item" href="manage_invoice.php">Invoices</a>
					<a class="dropdown-item" href="new_order.php">New order</a>
					<?php
					if (isset($_SESSION["userid"])) {
					?>
						<a class="dropdown-item" href="logout.php">Logout</a>
					<?php
					}
					?>
				</div>
			</div>
		</form>
	</nav>


	<br /><br />



	<div class=" container" style="padding-top: 50px;">
		<div class="row">
			<div class="col-md-4">
				<div class=" card mx-auto" style="padding-bottom: 30%;">
					<img class="card-img-top mx-auto" style="width:50%;" src="./images/users.png" alt="Card image cap"><br>
					<div class="card-body" style="text-align: center; padding-top:0px;">
						<!--<h4 class="card-title"></h4><br>-->
						<p class="card-text">Add, Manage, and Update Stocks</p>
						<p class="card-text"> Have a Great Day!</p>
						<!--<p class="card-text"><i class="fa fa-user">&nbsp;</i></p>
						<p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
						<p class="card-text">Last Login : xxxx-xx-xx</p>-->
					</div>
				</div>
			</div>
			<div class="col-md-8" style="padding-bottom: 3%;">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome Admin,</h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe width='272' height='166' style='padding:0!important;margin:0!important;border:none!important;background:none!important;background:transparent!important' marginheight='0' marginwidth='0' frameborder='0' scrolling='no' comment='/*defined*/' src='https://dayspedia.com/widgets/digit/?v=1&iframe=eyJ3LTEyIjp0cnVlLCJ3LTExIjp0cnVlLCJ3LTEzIjp0cnVlLCJ3LTE0IjpmYWxzZSwidy0xNSI6ZmFsc2UsInctMTEwIjpmYWxzZSwidy13aWR0aC0wIjp0cnVlLCJ3LXdpZHRoLTEiOmZhbHNlLCJ3LXdpZHRoLTIiOmZhbHNlLCJ3LTE2IjoiMjRweCIsInctMTkiOiI0OCIsInctMTciOiIxNiIsInctMjEiOnRydWUsImJnaW1hZ2UiOi0yLCJiZ2ltYWdlU2V0IjpmYWxzZSwidy0yMWMwIjoiIzZkZTY0MSIsInctMCI6dHJ1ZSwidy0zIjp0cnVlLCJ3LTNjMCI6IiMzNDM0MzQiLCJ3LTNiMCI6IjEiLCJ3LTYiOiIjMzQzNDM0Iiwidy0yMCI6dHJ1ZSwidy00IjoiI2ZmZmZmZiIsInctMTgiOmZhbHNlLCJ3LXdpZHRoLTJjLTAiOiIzMDAifQ==&lang=en&cityid=185'></iframe>
						</div>
						<div class="col-sm-6">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">New Orders</h4>
									<p class="card-text">Place new orders and generate invoices</p>
									<a href="new_order.php" class="btn btn-dark">New Orders</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/catimg.jpg" style="Width: 10%" ;> Categories</h4>
						<p class="card-text">Here you can manage your categories and you add new parent and sub categories</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-light" style="background-color:#78DD2C;">Add</a>
						<a href="manage_categories.php" class="btn btn-dark">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/brandimg.jpg" style="Width: 10%" ;> Brands</h4>
						<p class="card-text">Here you can manage your brand and you add new brand</p>
						<a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-light" style="background-color:#78DD2C;">Add</a>
						<a href="manage_brand.php" class="btn btn-dark">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="padding-bottom:150px;">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/prodimg.jpg" style="Width: 10%" ;> Products</h4>
						<p class="card-text">Here you can manage your products and you add new products</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-light" style="background-color:#78DD2C;">Add</a>
						<a href="manage_product.php" class="btn btn-dark">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="padding-bottom:150px;">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/invicon.jpg" style="Width: 10%" ;> Invoice Details</h4>
						<p class="card-text">Here you can manage your Sales and invoices</p>
						<a href="new_order.php" class="btn btn-light" style="background-color:#78DD2C;">New Order</a>
						<a href="manage_invoice.php" class="btn btn-dark">Manage</a>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="height:auto;">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/usericon.jpg" style="Width: 12%" ;> User Details</h4>
						<p class="card-text">Here you can manage number of users last login and other details</p>
						<a href="usersdt.php" class="btn btn-dark">View</a>
					</div>
				</div>
			</div>
			<div class="col-md-4" style="height:auto;">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title"><img src="./images/sales.jpg" style="Width: 12%" ;> Sales report</h4>
						<p class="card-text">View daily sales by tables and bar charts</p>
						<a href="salesreport.php" class="btn btn-dark">View</a>
					</div>
				</div>
			</div>
			<!--
			<div class="col-md-4" style ="height=auto;">
				<div class="card" >
					<div class="card-body" >
						<h4 class="card-title" style=" color:#E5301E;">Help </h4><h3> India to </h3><h4><div style=" color:#21C506;">Overcome this pandemic</h4>
						<p class="card-text">Your 1 Rupee matters here</p>
						<a href="https://ereceipt.tn.gov.in/cmprf/Interface/CMPRF/CMPRF_EntryForm" class="btn btn-dark">Click here</a>
					</div>
				</div>
			</div>
			-->

		</div>
	</div>
	<div>

	</div>
	<?php
	include_once("./templates/category.php");
	?>
	<?php
	include_once("./templates/brand.php");
	?>
	<?php
	include_once("./templates/products.php");
	?>

	<?php include_once("./templates/footer.php"); ?>
</body>

</html>