<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $fwd_c = mysqli_real_escape_string($connect, $data[1]);
    $aft_c = mysqli_real_escape_string($connect, $data[2]);  
    $aft_b = mysqli_real_escape_string($connect, $data[3]);		
    $port_b = mysqli_real_escape_string($connect, $data[4]);
	$stbc_b = mysqli_real_escape_string($connect, $data[5]); 
	$fwd_b = mysqli_real_escape_string($connect, $data[6]); 

$query = "INSERT INTO `pressure` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `fwd C`, `aft C`, `aft B`, `port B`, `stbd B`, `fwd B`) VALUES ('$data_date', '$time', '$client', '$fwd_c', '$aft_c', '$aft_b', '$port_b', '$stbc_b', '$fwd_b')";

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
$clean ="DELETE FROM `pressure` WHERE `pressure`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>