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
			position: fixed;
			left: 0;
			bottom: 0;
			width: 100%;
			text-align: center;
		}
	</style>
</head>

<body>

	<?php include_once("./templates/usnav.php"); ?>
	<br><br><br><br>
	<div class="container">

		<div>
			<nav class="navbar navbar-dark bg-dark" style=" color:#fff;">
				<a class="navbar-brand"><span><img src="./images/manage.png" style="width: 6%;"></span>&nbsp;&nbsp;&nbsp;<b>MANAGE USERS</b></a>
		</div>
		<table class="table table-bordered" title="USERS">
			<tr>

				<th>ID</th>
				<th>User Name</th>
				<th>E-mail</th>
				<th>User type</th>
				<th>Register Date </th>
				<th>Last Login </th>
			</tr>
	</div>

	<?php
	$conn   = new mysqli('localhost', 'root', '', 'project_inv');
	$sql    = "SELECT * FROM user ";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo
			"<tr>
			<td>" . $row["id"] . "</td>
			<td>" . $row["username"] . "</td>
			<td>" . $row["email"] . "</td>
			<td>" . $row["usertype"] . "</td>
			<td>" . $row["register_date"] . "</td>
			<td>" . $row["last_login"] . "</td>
		
			</tr>";
		}
	} else {
		echo "Oolalala";
	}
	$conn->close();
	?>
	</table>
	</div>

	<div class=footer>
		<?php
		include_once("./templates/footer.php");
		?>
	</div>
</body>

</html>