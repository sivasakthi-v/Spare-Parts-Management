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

<html>

<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {
      packages: ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['DATE', 'TOTAL SALES', 'PAID'],
        <?php
        $sql = "SELECT * FROM invoice GROUP BY order_date";
        $fire = mysqli_query($con, $sql);
        while ($result = mysqli_fetch_assoc($fire)) {
          echo "['" . $result['order_date'] . "'," . $result['net_total'] . "," . $result['paid'] . "],";
        }

        ?>
      ]);

      var options = {
        chart: {
          title: 'Company Performance',
          subtitle: 'Sales and Profit: 2021',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };




      var chart = new google.charts.Bar(document.getElementById('barchart_material'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  </script>
</head>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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

<?php include_once("./templates/report_nav.php");
?>


<br><br><br>
<center>

  <div id="barchart_material" style="width: 1100px; height: 600px;"></div>
</center>
<br><br><br>
<?php
include_once("./templates/footer.php");
?>
</body>


</html>