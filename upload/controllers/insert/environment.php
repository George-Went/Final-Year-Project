<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $bar = mysqli_real_escape_string($connect, $data[1]);
    $t_wind_angle = mysqli_real_escape_string($connect, $data[2]);  
    $a_wind_angle = mysqli_real_escape_string($connect, $data[3]);		
    $t_wind_speed = mysqli_real_escape_string($connect, $data[4]);
	$a_wind_speed = mysqli_real_escape_string($connect, $data[5]);

$query = "INSERT INTO `environment` (`journey_date`, `journey_time`, `hover_crafthull-ID`, `bar`, `True Wind Angle`, `Apparent Wind Angle`, `True Wind Speed`, `Apparent Wind Speed`) VALUES ('$data_date', '$time', '$client', '$bar', '$t_wind_angle', '$a_wind_angle', '$t_wind_speed', '$a_wind_speed')";

mysqli_query($connect, $query);


//-------------------------------------------------------------------------------------//


//------------------ output any error during devlopment -----------------------------//

/*if(mysqli_query($connect, $query)){
    echo "Records inserted successfully. <br/>";
	echo $time . "<br/> <br/>";
} else{
    echo "ERROR: Could not able to execute" . mysqli_error($connect);
} */
			
   }
//------------------ clean removes headings from csv file/database -----------------------------//
$clean ="DELETE FROM `environment` WHERE `environment`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>