<?php 
require_once '../script/connection.php';

?>
<?php 

if(isset($_POST["data_date"])) {
$data_date = $_POST['data_date'];
$data_date = mysqli_real_escape_string($connect, $data_date);
}
if(isset($_POST["client"])) {
$client = $_POST['client'];
$client = mysqli_real_escape_string($connect, $client);
}
$start_time = '00:00:00';
if(isset($_POST["start_time"]) && $_POST["start_time"] !='') {
  $start_time = $_POST['start_time'];
  $start_time = mysqli_real_escape_string($connect, $start_time);
   $start_time  = date("H:i:s", strtotime($start_time));
}

$end_time = '23:59:59';
if(isset($_POST["end_time"]) && $_POST["end_time"] !='') {
  $end_time = $_POST['end_time'];
  $end_time = mysqli_real_escape_string($connect, $end_time);
  $end_time  = date("H:i:s", strtotime($end_time));
  }

 

  

  $response=null;

      $date = date("Y-m-d", strtotime($_POST['data_date']));  

      $chart1_query = 'SELECT
 *
FROM
  `engine`
  INNER JOIN hover_craft on hover_craft.id = engine.hover_crafthull_ID
WHERE 
  engine.journey_date = "'.$data_date.'"
  AND engine.hover_crafthull_ID = "'.$_POST['client'].'"
  AND engine.journey_time >= "'.$start_time.'"
  AND engine.journey_time <= "'.$end_time.'"
order by
  engine.journey_time
';

      $data = mysqli_query($connect , $chart1_query);

      $count=0;
    if ($data) {
       while ($row = mysqli_fetch_assoc($data)) {
          $temp = explode(':', $row['journey_time']);
          if($temp[2] % 3 ==0){

              $response['chart1'][$count]['journey_date'] =  $row['journey_date'];
              $response['chart1'][$count]['STBD_Tachometer'] =  $row['STBD_Tachometer'];
              $response['chart1'][$count]['Port_Tachometer'] =  $row['Port_Tachometer'];
              $response['chart1'][$count]['journey_time'] =  $row['journey_time'];
              $count++;

          } 
      }
    }
// chart 2 code
        $chart2_query = 'SELECT
           *
          FROM
            `airmar`
            INNER JOIN hover_craft on hover_craft.id = airmar.hover_crafthull_ID
          WHERE 
            airmar.journey_date = "'.$data_date.'"
            AND airmar.hover_crafthull_ID = "'.$_POST['client'].'"
            AND airmar.journey_time >= "'.$start_time.'"
            AND airmar.journey_time <= "'.$end_time.'"
          order by
            airmar.journey_time
          ';
      $data = mysqli_query($connect , $chart2_query);
      $count=0;
          if ($data) {
           while ($row = mysqli_fetch_assoc($data)) {
              $temp = explode(':', $row['journey_time']);
              if($temp[2] % 3 ==0){

                  $response['chart2'][$count]['journey_date'] =  $row['journey_date'];
                  $response['chart2'][$count]['speed'] =  $row['speed'];
                  $response['chart2'][$count]['journey_time'] =  $row['journey_time'];
                  $count++;

              } 
          }
        }

// chart 3
        $chart3_query = 'SELECT
                   *
                  FROM
                    `airmar`
                    INNER JOIN hover_craft on hover_craft.id = airmar.hover_crafthull_ID
                  WHERE 
                    airmar.journey_date = "'.$data_date.'"
                    AND airmar.hover_crafthull_ID = "'.$_POST['client'].'"
                    AND airmar.journey_time >= "'.$start_time.'"
                    AND airmar.journey_time <= "'.$end_time.'"
                  order by
                    airmar.journey_time
                  ';
              $data = mysqli_query($connect , $chart3_query);
              $count=0;
                  if ($data) {
                   while ($row = mysqli_fetch_assoc($data)) {
                      $temp = explode(':', $row['journey_time']);
                      if($temp[2] % 3 ==0){

                          $response['chart3'][$count]['journey_date'] =  $row['journey_date'];
                          $response['chart3'][$count]['speed'] =  $row['speed'];

                          $response['chart3'][$count]['roll'] = $row['roll'];

                          $response['chart3'][$count]['pitch'] = $row['pitch'];

                          $response['chart3'][$count]['heading'] = $row['heading'];

                          $response['chart3'][$count]['course'] = $row['course'];

                          $response['chart3'][$count]['journey_time'] =  $row['journey_time'];
                          $count++;

                      } 
                  }
                }

// chart 4 

                      $chart4_query = 'SELECT
                         *
                        FROM
                          `engine`
                          INNER JOIN hover_craft on hover_craft.id = engine.hover_crafthull_ID
                        WHERE 
                          engine.journey_date = "'.$data_date.'"
                          AND engine.hover_crafthull_ID = "'.$_POST['client'].'"
                          AND engine.journey_time >= "'.$start_time.'"
                          AND engine.journey_time <= "'.$end_time.'"
                        order by
                          engine.journey_time
                        ';

                              $data = mysqli_query($connect , $chart4_query);

                              $count=0;
                            if ($data) {
                               while ($row = mysqli_fetch_assoc($data)) {
                                  $temp = explode(':', $row['journey_time']);
                                  if($temp[2] % 3 ==0){
                                    
                                    $response['chart4'][$count]['STBD_Fuel_Rate'] = $row['STBD Fuel Rate'];

                                    $response['chart4'][$count]['Port_Fuel_Rate'] = $row['Port Fuel Rate'];

                                    $response['chart4'][$count]['STBD_Percent_Load'] = $row['STBD Percent Load'];

                                    $response['chart4'][$count]['Port_Percent_Load'] = $row['Port Percent Load'];

                                    $response['chart4'][$count]['STBD_Percent_Torque'] = $row['STBD Percent Torque'];

                                    $response['chart4'][$count]['Port_Percent_Torque'] = $row['Port Percent Torque'];

                                    $response['chart4'][$count]['journey_date'] =  $row['journey_date'];

                                    $response['chart4'][$count]['journey_time'] =  $row['journey_time'];

                                    $count++;

                                  } 
                              }
                            }

                      $chart5_query = 'SELECT
                         *
                        FROM
                          `ballast`
                          INNER JOIN hover_craft on hover_craft.id = ballast.hover_crafthull_ID
                        WHERE 
                          ballast.journey_date = "'.$data_date.'"
                          AND ballast.hover_crafthull_ID = "'.$_POST['client'].'"
                          AND ballast.journey_time >= "'.$start_time.'"
                          AND ballast.journey_time <= "'.$end_time.'"
                        order by
                          ballast.journey_time
                        ';

                              $data = mysqli_query($connect , $chart5_query);

                              $count=0;
                            if ($data) {
                               while ($row = mysqli_fetch_assoc($data)) {
                                  $temp = explode(':', $row['journey_time']);
                                  if($temp[2] % 3 ==0){
                                    
                                    if($row['stbd_fwd'] !=0 )
                                    {
                                     $response['chart5'][$count]['stbd_fwd'] = $row['stbd_fwd']; 
                                    }
                                    

                                    if($row['port_fuel'] !=0 )
                                    {
                                     $response['chart5'][$count]['port_fuel'] = $row['port_fuel']; 
                                    }
                                    

                                    if($row['port_fwd'] !=0 )
                                    {
                                     $response['chart5'][$count]['port_fwd'] = $row['port_fwd']; 
                                    }
                                    

                                    if($row['port_aft'] !=0)
                                    {
                                     $response['chart5'][$count]['port_aft'] = $row['port_aft']; 
                                    }
                                    

                                    if($row['stbd_aft'] !=0 )
                                    {
                                     $response['chart5'][$count]['stbd_aft'] = $row['stbd_aft']; 
                                    }
                                    

                                    if($row['stbd_fuel'] !=0)
                                    {
                                     $response['chart5'][$count]['stbd_fuel'] = $row['stbd_fuel']; 
                                    }
                                    

                                    $response['chart5'][$count]['journey_date'] =  $row['journey_date'];

                                    $response['chart5'][$count]['journey_time'] =  $row['journey_time'];

                                    $count++;

                                  } 
                              }
                            }

                 $chart6_query = 'SELECT
                         *
                        FROM
                          `craft`
                          INNER JOIN hover_craft on hover_craft.id = craft.hover_crafthull_ID
                        WHERE 
                          craft.journey_date = "'.$data_date.'"
                          AND craft.hover_crafthull_ID = "'.$_POST['client'].'"
                          AND craft.journey_time >= "'.$start_time.'"
                          AND craft.journey_time <= "'.$end_time.'"
                        order by
                          craft.journey_time
                        ';

                              $data = mysqli_query($connect , $chart6_query);
                              $count=0;
                            if ($data) {
                               while ($row = mysqli_fetch_assoc($data)) {
                                  $temp = explode(':', $row['journey_time']);
                                  if($temp[2] % 3 ==0){
                                
                                    if($row['Port_Prop_Pitch'] !=0)
                                    {
                                       $response['chart6'][$count]['Port_Prop_Pitch'] = $row['Port_Prop_Pitch'];
                                    }
                                    if($row['STBD_Prop_Pitch'] !=0)
                                    {
                                        $response['chart6'][$count]['STBD_Prop_Pitch'] = $row['STBD_Prop_Pitch'];
                                    }
                                    if($row['Port_Rudder_Angle'] !=0)
                                    {
                                       $response['chart6'][$count]['Port_Rudder_Angle'] = $row['Port_Rudder_Angle'];
                                    }
                                    if($row['STBD_Rudder_Angle'] !=0)
                                    {
                                       $response['chart6'][$count]['STBD_Rudder_Angle'] = $row['STBD_Rudder_Angle'];
                                    }

                                    $response['chart6'][$count]['journey_date'] =  $row['journey_date'];

                                    $response['chart6'][$count]['journey_time'] =  $row['journey_time'];

                                    $count++;

                                  } 
                              }
                            }
                $chart7_query = 'SELECT
                         *
                        FROM
                          `pressure`
                          INNER JOIN hover_craft on hover_craft.id = pressure.hover_crafthull_ID
                        WHERE 
                          pressure.journey_date = "'.$data_date.'"
                          AND pressure.hover_crafthull_ID = "'.$_POST['client'].'"
                          AND pressure.journey_time >= "'.$start_time.'"
                          AND pressure.journey_time <= "'.$end_time.'"
                        order by
                          pressure.journey_time
                        ';
                       
                              $data = mysqli_query($connect , $chart7_query);
                              $count=0;
                            if ($data) {
                               while ($row = mysqli_fetch_assoc($data)) {
                                  $temp = explode(':', $row['journey_time']);
                                  if($temp[2] % 1 ==0){
                                    
                                $response['chart7'][$count]['fwd_C'] = $row['fwd C'];
                                $response['chart7'][$count]['aft_C'] = $row['aft C'];
                                $response['chart7'][$count]['aft_B'] = $row['aft B'];
                                $response['chart7'][$count]['port_B'] = $row['port B'];

                                    $response['chart7'][$count]['stbd_B'] =  $row['stbd B'];

                                    $response['chart7'][$count]['fwd_B'] =  $row['fwd B'];
                                    $response['chart7'][$count]['journey_date'] =  $row['journey_date'];

                                    $response['chart7'][$count]['journey_time'] =  $row['journey_time'];

                                    $count++;

                                  } 
                              }
                            }

              echo json_encode($response ? $response : 0);
              //print json_encode($data);

?>