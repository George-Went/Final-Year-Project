<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $stbd_fuel = mysqli_real_escape_string($connect, $data[1]);
    $port_fuel = mysqli_real_escape_string($connect, $data[2]);  
    $stbd_load = mysqli_real_escape_string($connect, $data[3]);		
    $port_load = mysqli_real_escape_string($connect, $data[4]);
	$stbd_torque = mysqli_real_escape_string($connect, $data[5]); 
	$port_torque = mysqli_real_escape_string($connect, $data[6]); 
    $stbd_tachometer = mysqli_real_escape_string($connect, $data[7]);
	$port_tachometer = mysqli_real_escape_string($connect, $data[8]); 
	
	
$query = "INSERT INTO `engine` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `STBD Fuel Rate`, `Port Fuel Rate`, `STBD Percent Load`, `Port Percent Load`, `STBD Percent Torque`, `Port Percent Torque`, `STBD_Tachometer`, `Port_Tachometer`) VALUES ('$data_date', '$time', '$client', '$stbd_fuel', '$port_fuel', '$stbd_load', '$port_load', '$stbd_torque', '$port_torque', '$stbd_tachometer', '$port_tachometer')";



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
$clean ="DELETE FROM `engine` WHERE `engine`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>