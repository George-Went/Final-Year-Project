<?php 
//------------------ Selection of the correct table for CSV file insertion -----------------------------//
while($data = fgetcsv($handle))
   {
    $time = mysqli_real_escape_string($connect, $data[0]);  
    $a1 = mysqli_real_escape_string($connect, $data[1]);
    $a2 = mysqli_real_escape_string($connect, $data[2]);  
    $a3 = mysqli_real_escape_string($connect, $data[3]);		
    $a4 = mysqli_real_escape_string($connect, $data[4]);
	$a5 = mysqli_real_escape_string($connect, $data[5]); 
	$a6 = mysqli_real_escape_string($connect, $data[6]); 
    $a7 = mysqli_real_escape_string($connect, $data[7]);
	$a8 = mysqli_real_escape_string($connect, $data[8]); 
    $a9 = mysqli_real_escape_string($connect, $data[9]);
    $a10 = mysqli_real_escape_string($connect, $data[10]);  
    $a11 = mysqli_real_escape_string($connect, $data[11]);		
    $a12 = mysqli_real_escape_string($connect, $data[12]);
	$a13 = mysqli_real_escape_string($connect, $data[13]); 
	$a14 = mysqli_real_escape_string($connect, $data[14]); 
    $a15 = mysqli_real_escape_string($connect, $data[15]);
	$a16 = mysqli_real_escape_string($connect, $data[16]); 
    $a17 = mysqli_real_escape_string($connect, $data[17]);
    $a18 = mysqli_real_escape_string($connect, $data[18]);  
    $a19 = mysqli_real_escape_string($connect, $data[19]);		
    $a20 = mysqli_real_escape_string($connect, $data[20]);
	$a21 = mysqli_real_escape_string($connect, $data[21]); 
	$a22 = mysqli_real_escape_string($connect, $data[22]); 
    $a23 = mysqli_real_escape_string($connect, $data[23]);
	$a24 = mysqli_real_escape_string($connect, $data[24]); 
    $a25 = mysqli_real_escape_string($connect, $data[25]);
    $a26 = mysqli_real_escape_string($connect, $data[26]);  
    $a27 = mysqli_real_escape_string($connect, $data[27]);		
    $a28 = mysqli_real_escape_string($connect, $data[28]);
	$a29 = mysqli_real_escape_string($connect, $data[29]); 
	$a30 = mysqli_real_escape_string($connect, $data[30]); 
    $a31 = mysqli_real_escape_string($connect, $data[31]);
	$a32 = mysqli_real_escape_string($connect, $data[32]); 
	$a33 = mysqli_real_escape_string($connect, $data[33]); 
    $a34 = mysqli_real_escape_string($connect, $data[34]);
	$a35 = mysqli_real_escape_string($connect, $data[35]); 
    $a36 = mysqli_real_escape_string($connect, $data[36]);
    $a37 = mysqli_real_escape_string($connect, $data[37]);  
    $a38 = mysqli_real_escape_string($connect, $data[38]);		
    $a39 = mysqli_real_escape_string($connect, $data[39]);
	$a40 = mysqli_real_escape_string($connect, $data[40]); 
	$a41 = mysqli_real_escape_string($connect, $data[41]); 
    $a42 = mysqli_real_escape_string($connect, $data[42]);
	$a43 = mysqli_real_escape_string($connect, $data[43]); 
    $a44 = mysqli_real_escape_string($connect, $data[44]);
    $a45 = mysqli_real_escape_string($connect, $data[45]);  
    $a46 = mysqli_real_escape_string($connect, $data[46]);		
    $a47 = mysqli_real_escape_string($connect, $data[47]);
	$a48 = mysqli_real_escape_string($connect, $data[48]);
	
$query = "INSERT INTO `bearing` (`journey_date`, `journey_time`, `hover_crafthull-ID`, `Port b/cage lower Fwd Vel`, `Port b/cage lower Fwd Temp`, `Port b/cage lower Aft Vel`, `Port b/cage lower Aft Temp`, `Stbd b/cage lower Fwd Vel`, `Stbd b/cage lower Fwd Temp`, `Stbd b/cage lower Aft Vel`, `Stbd b/cage lower Aft Temp`, `Port b/cage top Fwd Vel`, `Port b/cage top Fwd Temp`, `Port b/cage top Aft Vel`, `Port b/cage top Aft Temp`, `Stbd b/cage top Fwd Vel`, `Stbd b/cage top Fwd Temp`, `Stbd b/cage top Aft bearing Vel`, `Stbd b/cage top Aft bearing Temp`, `Port b/cage o/b Fwd Vel`, `Port b/cage o/b Fwd Temp`, `Port b/cage o/b Aft Vel`, `Port b/cage o/b Aft Temp`, `Stbd b/cage o/b Fwd Vel`, `Stbd b/cage o/b Fwd Temp`, `Stbd b/cage o/b Aft Vel`, `Stbd b/cage o/b Aft Temp`, `Port prop housing Vel`, `Port prop housing Temp`, `Stbd prop housing Vel`, `Stbd prop housing Temp`, `Port lift fan Fwd Vel`, `Port lift fan Fwd Temp`, `Port lift fan Aft Vel`, `Port lift fan Aft Temp`, `Stbd lift fan Fwd Vel`, `Stbd lift fan Fwd Temp`, `Stbd lift fan Aft Vel`, `Stbd lift fan Aft Temp`, `Port aux drive Vel`, `Port aux drive Temp`, `Stbd aux drive Vel`, `Stbd aux drive Temp`, `Port aux gen Vel`, `Port aux gen Temp`, `Stbd aux gen Vel`, `Stbd aux gen Temp`, `Port B-thruster Vel`, `Port B-thruster Temp`, `Stbd B-thruster Vel`, `Stbd B-thruster Temp`) VALUES ('$data_date', '$time', '$client', '$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7', '$a8', '$a9', '$a10', '$a11', '$a12', '$a13', '$a14', '$a15', '$a16', '$a17', '$a18', '$a19', '$a20', '$a21', '$a22', '$a23', '$a24', '$a25', '$a26', '$a27', '$a28', '$a29', '$a30', '$a31', '$a32', '$a33', '$a34', '$a35', '$a36', '$a37', '$a38', '$a39', '$a40', '$a41', '$a42', '$a43', '$a44', '$a45', '$a46', '$a47', '$a48')";

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
*/			
 
//------------------ clean removes headings from csv file/database -----------------------------//
$clean ="DELETE FROM `bearing` WHERE `bearing`.`journey_time` = '00:00:00'";
mysqli_query($connect, $clean);
//----------------------------------------------------------------------------------------------//

?>