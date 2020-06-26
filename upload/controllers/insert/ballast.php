<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $stbd_fwd = mysqli_real_escape_string($connect, $data[1]);
    $port_fuel = mysqli_real_escape_string($connect, $data[2]);  
    $port_fwd = mysqli_real_escape_string($connect, $data[3]);		
    $port_aft = mysqli_real_escape_string($connect, $data[4]);
	$stdb_aft = mysqli_real_escape_string($connect, $data[5]); 
	$stdb_fuel = mysqli_real_escape_string($connect, $data[6]); 

$query = "INSERT INTO `ballast` (`journey_date`, `journey_time`, `hover_crafthull_ID`, `stbd_fwd`, `port_fuel`, `port_fwd`, `port_aft`, `stbd_aft`, `stbd_fuel`) VALUES ('$data_date', '$time', '$client', '$stbd_fwd', '$port_fuel', '$port_fwd', '$port_aft', '$stdb_aft', '$stdb_fuel')";

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
$clean ="DELETE FROM `ballast` WHERE `ballast`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//-------------------------------------------------------------------------------------//
?>