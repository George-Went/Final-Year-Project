<?php
require_once '../script/connection.php';
include '../script/date.php';


if (isset($_POST["data_date"])) // If the sample data box is not null - 
{
  $data_date = $_REQUEST['data_date'];    // requests form date data
  $data_date = mysqli_real_escape_string($connect, $data_date); // sanitise
}

if (isset($_POST["sensor"]))         // If sensor is not null 
{
  $data_type = $_REQUEST['sensor']; // gets chosen sensor 
  $data_type = mysqli_real_escape_string($connect, $data_type); // sanitise
}

if (isset($_POST["client"]))         // If hovercraft chosen is not null
{
  $client = $_REQUEST['client'];  // gets selected hovercraft
  $client = mysqli_real_escape_string($connect, $client); // sanitise
}

/*echo "<script>alert('$data_date');</script>";
echo "<script>alert('$data_type');</script>";
echo "<script>alert('$client');</script>"; */




if (isset($_POST["submit"])) {
  if ($_FILES['file']['name']) {
    $filename = explode(".", $_FILES['file']['name']);
    if ($filename[1] == 'csv' || $filename[1] == 'CSV') // if file is a csv (or CSV)
    {
      $handle = fopen($_FILES['file']['tmp_name'], "r");

      // Based on the selected sensor, the controller php file is chosen
      if (isset($_POST["sensor"])) {       // if sensor is set assign to sensor_type
        $sensor_type = $_REQUEST['sensor'];
      }

      switch ($sensor_type) {
        case "airmar":
          include 'controllers/insert/airmar.php';
          break;
        case "ballast":
          include 'controllers/insert/ballast.php';
          break;
        case "battery":
          include 'controllers/insert/battery.php';
          break;
        case "bearing":
          include 'controllers/insert/bearing.php';
          break;
        case "craft":
          include 'controllers/insert/craft.php';
          break;
        case "engine":
          include 'controllers/insert/engine.php';
          break;
        case "environment":
          include 'controllers/insert/environment.php';
          break;
        case "pressure":
          include 'controllers/insert/pressure.php';
          break;
      }

      fclose($handle);
      echo "<script>alert ('You have successfully uploaded information to the ' + '$sensor_type' + ' table on '+ '$data_date');</script>";
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <title>Starter Template · Bootstrap</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/starter-template/">

  <!-- Bootstrap core CSS -->
  <link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
  <link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
  <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

</head>

<body>
  <?php require "../templates/nav.php" ?>


  <main role="main" class="container">
    <div class="mx-auto" style="margin-top: 10%;">


      <form>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Select a hovercraft</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <?php
              // Select hovercraft names from table
              $sqlSelect = "SELECT `id`, `name` FROM hover_craft";
              $result = $connect->query($sqlSelect);
    
              $rows=[];

              while ($row = mysqli_fetch_array($result)) {
                $rows[] = $row;
              }

              foreach ($rows as $row) {
                print "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlSelect1">Select a sensor</label>
          <select class="form-control" id="exampleFormControlSelect1">
            <option value="bearing">Bearing</option>
            <option value="craft">Craft</option>
            <option value="engine">Engine</option>
            <option value="environment">Environment</option>
            <option value="pressure">Pressure</option>
          </select>
        </div>

        <div class="form-group">
          <label for="date">Date of sample data</label>
          <input type="date" id="date" class="form-control" />
        </div>

        <div class="form-group">
          <label for="file">File Upload</label>
          <input type="file" id="file" class="form-control-file" />
        </div>

        <input type="submit" name="submit" value="Import" class="btn btn-primary" />

      </form>


    </div>
  </main>
  <!-- /.container -->


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
</body>

</html>