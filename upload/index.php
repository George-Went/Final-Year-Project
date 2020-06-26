

<?php  
  require_once '../script/connection.php';
  include '../script/date.php';


if(isset($_POST["data_date"])) // If the date box is not null - 
{
  $data_date = $_REQUEST['data_date'];
  $data_date = mysqli_real_escape_string($connect, $data_date);
}
if(isset($_POST["sensor"])) // If 
{
  $data_type = $_REQUEST['sensor'];
  $data_type = mysqli_real_escape_string($connect, $data_type);
}
  if(isset($_POST["client"])) {
  $client = $_REQUEST['client'];
  $client = mysqli_real_escape_string($connect, $client);
}

/*echo "<script>alert('$data_date');</script>";
echo "<script>alert('$data_type');</script>";
echo "<script>alert('$client');</script>"; */


if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv' || $filename[1] == 'CSV')
  {
   $handle = fopen($_FILES['file']['tmp_name'], "r");

    // SELECT CORRECT INSERT
	if(isset($_POST["sensor"])) {
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























<!DOCTYPE html>  
<html>  
 <head>  
  <title>Griffon Hoverworks</title>
  <script src="../script/jquery.min.js"></script>  
  <link href="../css/dash.css" rel="stylesheet" type="text/css" />
 </head>  
 <body> 
 
 <div class="container">
  <div class="header">
    <p><a href="../index.html"><img src="../img/logo.png" alt="Logo" name="logo" id="logo" display:block;" /> This site is for INTERNAL use only</a> 
      <!-- end .header -->
    </p>
  </div>      
      
  <div class="content"> <br/><br/>
  
  <h3 align="center">Please select CSV and details below</h3><br />
  
  <form method="post" enctype="multipart/form-data">
    <div align="center">
    <!-- Dynamically generated list of hovercrafts -->
    <label for="client">Choose a hovercraft:</label>
    
  <select name="client" id="client">  
    <?php 
      $sqlSelect="SELECT `id`, `name` FROM hover_craft";
      $result = $connect -> query ($sqlSelect);

      while ($row = mysqli_fetch_array($result)) {
          $rows[] = $row;
      }

      foreach ($rows as $row) {
          print "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
      }
    ?>
  </select>
    
    <br/> <br/>
    
<label for="data-sample">Which sensor:</label>

<select name="sensor" id="sensor">
<option value="airmar">Airmar</option>
<option value="ballast">Ballast</option>
<option value="battery">Battery</option>
<option value="bearing">Bearing</option>
<option value="craft">Craft</option>
<option value="engine">Engine</option>
<option value="environment">Environment</option>
<option value="pressure">Pressure</option>
</select>

<br/> <br/>


<label for="start">Date of sample data:</label>
<input type="date" id="data_date" name="data_date" value="<?php echo $today; ?>" />
<br/> <br/>
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br /> <br /> <br />
    <input type="submit" name="submit" value="Import" class="btn btn-success" />
    <br/>  <br/>  <br/>  <br/> 
   </div>
  </form>
<!-- end .content --></div>
  <div class="footer">
    
    <br/>  <br/>  <br/>  <br/>  <br/> 
    
    
    
  <!-- end .footer --></div>
  <!-- end .container --></div>
 </body>  
</html>