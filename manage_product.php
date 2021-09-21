<?php
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:" . DOMAIN . "/");
}
?>
<?php
$con = mysqli_connect("localhost", "root", "", "project_inv");
if ($con) {
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
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
		google.charts.load('current', {
			'packages': ['corechart']
		});
		google.charts.setOnLoadCallback(drawChart1);
		google.charts.setOnLoadCallback(drawChart2);

		function drawChart1() {

			var data = google.visualization.arrayToDataTable([
				['product_name', 'product_stock'],
				<?php
				$sql = "SELECT * FROM products";
				$fire = mysqli_query($con, $sql);
				while ($result = mysqli_fetch_assoc($fire)) {
					echo "['" . $result['product_name'] . "'," . $result['product_stock'] . "],";
				}

				?>
			]);

			var options = {
				title: 'PRODUCT STOCK CHART'
			};

			var chart = new google.visualization.PieChart(document.getElementById('drawChart1'));

			chart.draw(data, options);
		}
	</script>

</head>

<body>
	<!-- Navbar -->
	<?php include_once("./templates/productnv.php"); ?>
	<br /><br />
	<br /><br />


	<!------------ Search Bar ---------->
	<div class="container">
		<div>
			<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
				<a class="navbar-brand"><span><img src="./images/isearch.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>SEARCH PRODUCTS</b></a>
		</div><br>
		<form action="" method="GET" id="search-form">
			<input class="form-control mr-sm-2" type="search" placeholder="Search Products, Invoive.." id="search" aria-label="Search" name="search">
			<button class="btn btn-outline-success my-2 my-sm-3 mr-sm-3" id="searchbtn">Search</button>
			<button class="btn btn-outline-success rounded-circle" id="search-mic" type="button"><span class="fa fa-microphone"></span></button>
		</form>

		<!------------ Table Data ---------->
		<table id="table-result" class="table table-bordered">
			<!-- <tr>
				<th>#</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Stock</th>
			</tr> -->

		</table>

		<br>
		<br>
		<br>
		<br>

		<div>
			<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
				<a class="navbar-brand"><span><img src="./images/manage.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>MANAGE PRODUCTS</b></a>
		</div><br>
		<div class="container">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>#</th>
						<th>Product</th>
						<th>Category</th>
						<th>Brand</th>
						<th>Price</th>
						<th>Stock</th>
						<th>Added Date</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="get_product">
					<!--<tr>
		        <td>1</td>
		        <td>Electronics</td>
		        <td>Root</td>
		        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
		        <td>
		        	<a href="#" class="btn btn-danger btn-sm">Delete</a>
		        	<a href="#" class="btn btn-info btn-sm">Edit</a>
		        </td>
		      </tr>-->
				</tbody>
			</table>
		</div>
		<br><br><br>
	</div>
	<br><br>
	<div class="container">
		<div>
			<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
				<a class="navbar-brand"><span><img src="./images/pie-chart.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>PRODUCT STOCK CHART</b></a>
		</div>
		<center>
			<div id="drawChart1" style="width: 900px; height: 400px;"></div>
			<table class="columns">
				<tr>
					<td>
						<div id="drawChart1" style="border:1px solid #ccc"></div>
					</td>
				</tr>
			</table>
		</center>
	</div>
	<br><br>

	<?php
	include_once("./templates/update_products.php");

	?>
	<?php include_once("./templates/footer.php"); ?>

	<!-- <script src="grouping.js"></script> -->
	<!-- <script>
		const form = document.getElementById("search-form");
		var code = `
				<tr>
					<th>#</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Stock</th>
				</tr>
				<tr>
					<th>${element.pid}</th>
					<th>${element.product_name}</th>
					<th>${element.product_price}</th>
					<th>${element.product_stock}</th>
				</tr>
		`;
		const grouping = new Grouping("product_search.php", code, "product_name");

		form.addEventListener("submit", (e) => {
			grouping.getData;
			e.preventDefault();
		});
	</script> -->
	<script src="speechRecog_products.js"></script>

</body>

</html>