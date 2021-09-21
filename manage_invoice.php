<!--Connection-->

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
	<style>
		.footer {
			position: bottom;
			left: 0;
			bottom: 0;
			width: 100%;
			text-align: center;
		}
	</style>
</head>

<body>
	<?php include_once("./templates/invnv.php"); ?>
	<br><br><br><br>

	<!------------ Search Bar ---------->
	<div class="container">
		<div>
			<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
				<a class="navbar-brand"><span><img src="./images/isearch.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>SEARCH INVOICE </b></a>
		</div>
		<br>
		<form action="" method="GET" id="search-form">
			<input class="form-control mr-sm-2" type="search" placeholder="Enter Customer Name" id="search" aria-label="Search" name="search">
			<button class="btn btn-outline-success my- my-sm-3 mr-sm-3" id="searchbtn">Search</button>
			<button class="btn btn-outline-success rounded-circle" id="search-mic" type="button"><span class="fa fa-microphone"></span></button>

		</form>



		<table class="table table-bordered" id="table-result">
		</table>
	</div>
	<br><br>

	<div class="container">
		<table class="table table-hover table-bordered">
			<div>
				<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
					<a class="navbar-brand"><span><img src="./images/manage.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>MANAGE INVOICE</b></a>
			</div>
			<table class="table table-bordered">
				<tr>
					<th>Invoice no</th>
					<th>Customer Name</th>
					<th>Ordered date</th>
					<th>Price</th>
					<th>GST</th>
					<th>Discount</th>
					<th>Net total</th>
					<th>Paid</th>
					<th>Balance</th>
					<th>Payment Type</th>
				</tr>

				<?php
				$conn   = new mysqli('localhost', 'root', '', 'project_inv');
				$sql    = "SELECT * FROM invoice ";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					while ($row = $result->fetch_assoc()) {
						echo
						"<tr>
			<td>" . $row["invoice_no"] . "</td>
			<td>" . $row["customer_name"] . "</td>
			<td>" . $row["order_date"] . "</td>
			<td>" . $row["sub_total"] . "</td>
			<td>" . $row["gst"] . "</td>
			<td>" . $row["discount"] . "</td>
			<td>" . $row["net_total"] . "</td>
			<td>" . $row["paid"] . "</td>
			<td>" . $row["due"] . "</td>
			<td>" . $row["payment_type"] . "</td>
			</tr>";
					}
				} else {
					echo "Go Fuck Yourself";
				}

				$conn->close();
				?>
			</table>
	</div>
	</div>
	<script src="speechRecog_invoice.js"></script>
</body>
<!--Footer-->
<<br><br><br><br>
	<div class=footer>
		<?php
		include_once("./templates/footer.php");
		?>
	</div>


</html>