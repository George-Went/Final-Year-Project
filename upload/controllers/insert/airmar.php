<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $altitude = mysqli_real_escape_string($connect, $data[1]);
    $roll = mysqli_real_escape_string($connect, $data[2]);  
    $pitch = mysqli_real_escape_string($connect, $data[3]);		
    $heading = mysqli_real_escape_string($connect, $data[4]);
	$speed = mysqli_real_escape_string($connect, $data[5]); 
	$lat = mysqli_real_escape_string($connect, $data[6]); 
    $long = mysqli_real_escape_string($connect, $data[7]);
	$course = mysqli_real_escape_string($connect, $data[8]); 
	
	
$query = "INSERT INTO `airmar` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `altitude`, `roll`, `pitch`, `heading`, `speed`, `lat`, `long`, `course`) VALUES ('$data_date', '$time', '$client', '$altitude', '$roll', '$pitch', '$heading', '$speed', '$lat', '$long', '$course')";


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
$clean ="DELETE FROM `airmar` WHERE `airmar`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>