<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $stbd_amps = mysqli_real_escape_string($connect, $data[1]);
    $port_amps = mysqli_real_escape_string($connect, $data[2]);  
    $stbd_volts = mysqli_real_escape_string($connect, $data[3]);		
    $port_volts = mysqli_real_escape_string($connect, $data[4]);  
		
$query = "INSERT INTO `battery` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `stbd dc_current`, `port dc_current`, `stbd dc_volts`, `port dc_voltage`) VALUES ('$data_date', '$time', '$client', '$stbd_amps', '$port_amps', '$stbd_volts', '$port_volts')"; 

mysqli_query($connect, $query);   
   }
//-------------------------------------------------------------------------------------//

//------------------ output any error during devlopment -----------------------------//
/*
if(mysqli_query($connect, $query)){
    echo "Records inserted successfully. <br/>";
	echo $time . "<br/> <br/>";
} else{
    echo "ERROR: Could not able to execute" . mysqli_error($connect);
} 
//-------------------------------------------------------------------------------------//
*/			

//------------------ clean removes headings from csv file/database -----------------------------//
$clean ="DELETE FROM `battery` WHERE `battery`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//

?>