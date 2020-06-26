<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $port_prop_temp = mysqli_real_escape_string($connect, $data[1]);
    $stbd_prop_temp = mysqli_real_escape_string($connect, $data[2]);  
    $windscreen_heater = mysqli_real_escape_string($connect, $data[3]);		
    $shore_supply = mysqli_real_escape_string($connect, $data[4]);
	$port_pitch = mysqli_real_escape_string($connect, $data[5]); 
	$stbd_pitch = mysqli_real_escape_string($connect, $data[6]); 
    $port_angle = mysqli_real_escape_string($connect, $data[7]);
	$stbd_angle = mysqli_real_escape_string($connect, $data[8]); 
	
	
$query = "INSERT INTO `craft` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `Port_Prop_Pitch_Hydraulic_Temperature`, `STBD_Prop_Pitch_Hydraulic_Temperature`, `Windscreen_Heater`, `Shore_Supply_Connected`, `Port_Prop_Pitch`, `STBD_Prop_Pitch`, `Port_Rudder_Angle`, `STBD_Rudder_Angle`) VALUES ('$data_date', '$time', '$client', '$port_prop_temp', '$stbd_prop_temp', '$windscreen_heater', '$shore_supply', '$port_pitch', '$stbd_pitch', '$port_angle', '$stbd_angle')";



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
$clean ="DELETE FROM `craft` WHERE `craft`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>