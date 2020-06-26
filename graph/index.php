<?php  
require_once '../script/connection.php';
include '../script/date.php';


?>
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Griffon Hoverworks</title>
  <script src="script/jquery.min.js"></script>  
  <link rel="stylesheet" href="" />
 </head>  
 <body>  
  <h3 align="center">Display DATA</h3><br />
  
  <form id="form" action="action.php" method="POST" enctype="multipart/form-data">
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

<br/> <br/>


<label for="start">Date:</label>
<input type="date" id="data_date" name="data_date" value="<?php echo $today; ?>" />
<input type="time" id="start_time" name="start_time" value="<?php echo $today; ?>" />
<input type="time" id="end_time" name="end_time" value="<?php echo $today; ?>" />
<br/> <br/>
   
    <input type="submit" id="submit" name="submit" value="Import" class="btn btn-success" />
   </div>
  </form>
<br/> <br/> <br/> <br/>
<?
  
 ?>  

<div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='https://www.w3schools.com/jquery/demo_wait.gif' width="64" height="64" /><br>Loading..</div>

<div class="chartContainer" style="height: 400px; width: 100%;"></div>
<div class="airmar_speed" style="height: 400px; width: 100%;"></div>
<div class="airmar" style="height: 400px; width: 100%;"></div>
<div class="engine" style="height: 400px; width: 100%;"></div>
<div class="ballast" style="height: 400px; width: 100%;"></div>
<div class="craft" style="height: 400px; width: 100%;"></div>
<div class="pressure" style="height: 400px; width: 100%;"></div>


 </body>  
</html>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
<script type="text/javascript">

let draw_chart = function(data){
$(function() {
    var chart = $(".chartContainer").CanvasJSChart({
        title: {
            text: "STBD Tachometer vs Port Tachometer"
        },
        axisY: {
            title: "values",
            includeZero: false
        },
         showInLegend: true,
        legendText: "Apples",
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Tachometer: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.stbd,
            showInLegend: true,
            legendText: "STBD_Tachometer",
        },
           {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Tachometer: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.port,
            showInLegend: true,
            legendText: "Port_Tachometer",
        }
        ]
    });

});
}

// chart 3

let draw_chart_chart3 = function(data){
$(function() {
    var chart = $(".airmar").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        // {
        //     type: "line", //try changing to column, area
        //     toolTipContent: "{label}: {y} , Time: {label} ",
        //     axisYIndex: 0, //defaults to 0
        //     dataPoints: data.course,
        //     showInLegend: true,
        //     legendText: "Course",
        // },
        {
            type: "line", //try changing to column, area
            toolTipContent: "Roll: {roll} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.roll,
            showInLegend: true,
            legendText: "Roll",
        },
        // {
        //     type: "line", //try changing to column, area
        //     toolTipContent: "{label}: {y} , Time: {label} ",
        //     axisYIndex: 0, //defaults to 0
        //     dataPoints: data.heading,
        //     showInLegend: true,
        //     legendText: "Heading",
        // },
        {
            type: "line", //try changing to column, area
            toolTipContent: "Pitch: {pitch} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.pitch,
            showInLegend: true,
            legendText: "Pitch",
        }
        ],
         options: {
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        return Number(tooltipItem.yLabel).toFixed(2);
                                    }
                                }
                            },
                            legend: {
                                display: true,
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true,
                                        stepSize: 3.5
                                    },
                                }]
                            },
                        }
    });

});
}

//chart 6


let draw_chart_chart6 = function(data){
$(function() {
    var chart = $(".craft").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Prop_Pitch: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.Port_Prop_Pitch,
            showInLegend: true,
            legendText: "Port_Prop_Pitch",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Prop_Pitch: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.STBD_Prop_Pitch,
            showInLegend: true,
            legendText: "STBD_Prop_Pitch",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Rudder_Angle: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.Port_Rudder_Angle,
            showInLegend: true,
            legendText: "Port_Rudder_Angle",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Rudder_Angle: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.STBD_Rudder_Angle,
            showInLegend: true,
            legendText: "STBD_Rudder_Angle",
        }
        ]
    });

});
}



let draw_chart_chart4 = function(data){
$(function() {
    var chart = $(".engine").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Fuel_Rate: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.Port_Fuel_Rate,
            showInLegend: true,
            legendText: "Port_Fuel_Rate",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Percent_Load: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.Port_Percent_Load,
            showInLegend: true,
            legendText: "Port_Percent_Load",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "Port_Percent_Torque: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.Port_Percent_Torque,
            showInLegend: true,
            legendText: "Port_Percent_Torque",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Fuel_Rate: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.STBD_Fuel_Rate,
            showInLegend: true,
            legendText: "STBD_Fuel_Rate",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Percent_Load: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.STBD_Percent_Load,
            showInLegend: true,
            legendText: "STBD_Percent_Load",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "STBD_Percent_Torque: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.STBD_Percent_Torque,
            showInLegend: true,
            legendText: "STBD_Percent_Torque",
        }
        ]
    });

});
}
//chart 7
let draw_chart_chart7 = function(data){
$(function() {
    var chart = $(".pressure").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "fwd_C: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.fwd_C,
            showInLegend: true,
            legendText: "fwd_C",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "aft_C: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.aft_C,
            showInLegend: true,
            legendText: "aft_C",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "aft_B: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.aft_B,
            showInLegend: true,
            legendText: "aft_B",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "port_B: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.port_B,
            showInLegend: true,
            legendText: "port_B",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "stbd_B: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.stbd_B,
            showInLegend: true,
            legendText: "stbd_B",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "fwd_B: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.fwd_B,
            showInLegend: true,
            legendText: "fwd_B",
        }
        ]
    });

});
}



let draw_chart_chart5 = function(data){
$(function() {
    var chart = $(".ballast").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "stbd_fwd: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.stbd_fwd,
             showInLegend: true,
            legendText: "stbd_fwd",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "port_fuel: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.port_fuel,
             showInLegend: true,
            legendText: "port_fuel",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "port_fwd: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.port_fwd,
             showInLegend: true,
            legendText: "port_fwd",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "port_aft: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.port_aft,
             showInLegend: true,
            legendText: "port_aft",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "stbd_aft: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.stbd_aft,
             showInLegend: true,
            legendText: "stbd_aft",
        },
        {
            type: "line", //try changing to column, area
            toolTipContent: "stbd_fuel: {y} , Time: {label} ",
            axisYIndex: 1, //defaults to 0
            dataPoints: data.stbd_fuel,
            showInLegend: true,
            legendText: "stbd_fuel",
        }
        ]
    });

});
}








let draw_chart_single = function(data){
$(function() {
    var chart = $(".airmar_speed").CanvasJSChart({
        title: {
            text: data.title
        },
        axisY: {
            title: "values",
            includeZero: false
        },
        axisX: {
            interval: 80
        },
        data: [
        {
            type: "line", //try changing to column, area
            toolTipContent: "Speed: {y} , Time: {label} ",
            axisYIndex: 0, //defaults to 0
            dataPoints: data.value,
            showInLegend: true,
            legendText: "Speed",
        }
        ]
    });

});
}

// A $( document ).ready() block.
$( document ).ready(function() {

//function for getting params from URL0
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

  let data_request = {};
  try{
     data_request = {
    data_date: getUrlParameter('data_date'),
    client: getUrlParameter('client'),
    start_time: getUrlParameter('start_time'),
    end_time: getUrlParameter('end_time')
  }
  }catch(error){
      console.log()
  }


  $('#form').on('submit', function (e){
    e.preventDefault();
$("#wait").css("display", "block");

  $.post("action.php",
  $(this).serialize()
  ,
  function(data, status){
    if(data == 0){
      alert('Nothing Found');
       $("#wait").css("display", "none");
      return;
    }
     $("#wait").css("display", "none");
    let all_data = JSON.parse(data);
    let data_parsed = JSON.parse(data);
   
    data_parsed = data_parsed['chart1'] ? data_parsed['chart1'] : '';
    let chart_stbd = [];
    let chart_port = [];

    // chart 1
if(data_parsed){
      data_parsed.forEach((row)=>{
        chart_stbd.push(
            {
               y: parseInt(row['STBD_Tachometer']),
               label: ` ${row['journey_time']}`
            }
        );
        chart_port.push(
            {
               y: parseInt(row['Port_Tachometer']),
               label: ` ${row['journey_time']}`
            }
        );

    });
    let final_data = {stbd: chart_stbd, port: chart_port}


    draw_chart(final_data);
    // console.log(final_data);
}
  


// chart 2
    let data_airmar_speed = all_data['chart2'] ? all_data['chart2'] : '' ;
    let airmar_speed = [];
    if(data_airmar_speed)
    {
         data_airmar_speed.forEach((row)=>{
        airmar_speed.push(
            {
               y: parseInt(row['speed']),
               label: ` ${row['journey_time']}`
            }
        );
    });
       let final_data_airmar_speed = {value: airmar_speed, title:'Airmar Speed'}
      draw_chart_single(final_data_airmar_speed);
    }
     

// chart 3

let chart3_AIRMAR_TABLE = all_data['chart3'] ? all_data['chart3'] : '' ;
    
   // let chart3_AIRMAR_TABLE_course = [];
    let chart3_AIRMAR_TABLE_roll = [];
   // let chart3_AIRMAR_TABLE_heading = [];
    let chart3_AIRMAR_TABLE_pitch = [];
    if(chart3_AIRMAR_TABLE)
    {
         chart3_AIRMAR_TABLE.forEach((row)=>{

        // chart3_AIRMAR_TABLE_course.push(
        //     {
        //        y: parseInt(row['course']),
        //        label: ` ${row['journey_time']}`
        //     }
        // );
        chart3_AIRMAR_TABLE_roll.push(
            {
               y: parseInt(row['roll']),
               label: ` ${row['journey_time']}`,
               roll: `${row['roll']}` 
            }
        );
        // chart3_AIRMAR_TABLE_heading.push(
        //     {
        //        y: parseInt(row['heading']),
        //        label: ` ${row['journey_time']}`
        //     }
        // );

        chart3_AIRMAR_TABLE_pitch.push(
            {
               y: parseInt(row['pitch']),
               label: ` ${row['journey_time']}`,
               pitch: `${row['pitch']}` 
            }
        );

        
    });
       let final_data_chart3_AIRMAR_values = {
                                      //  course:chart3_AIRMAR_TABLE_course,
                                        roll:chart3_AIRMAR_TABLE_roll,
                                      //  heading:chart3_AIRMAR_TABLE_heading,
                                        pitch:chart3_AIRMAR_TABLE_pitch, title:'AIRMAR'}
      draw_chart_chart3(final_data_chart3_AIRMAR_values);
    }
     


  //chart 4

let chart3_Engine_TABLE = all_data['chart4'] ? all_data['chart4'] : '' ;
    
      let chart3_Port_Fuel_Rate = [];
      let chart3_Port_Percent_Load = [];
      let chart3_Port_Percent_Torque = [];
      let chart3_STBD_Fuel_Rate = [];
      let chart3_STBD_Percent_Load = [];
      let chart3_STBD_Percent_Torque = [];

      if(chart3_Engine_TABLE)
      {
           chart3_Engine_TABLE.forEach((row)=>{

        chart3_Port_Fuel_Rate.push(
            {
               y: parseInt(row['Port_Fuel_Rate']),
               label: ` ${row['journey_time']}`
            }
        );
        chart3_Port_Percent_Load.push(
            {
               y: parseInt(row['Port_Percent_Load']),
               label: ` ${row['journey_time']}`
            }
        );
        chart3_Port_Percent_Torque.push(
            {
               y: parseInt(row['Port_Percent_Torque']),
               label: ` ${row['journey_time']}`
            }
        );

        chart3_STBD_Fuel_Rate.push(
            {
               y: parseInt(row['STBD_Fuel_Rate']),
               label: ` ${row['journey_time']}`
            }
        );
        chart3_STBD_Percent_Load.push(
            {
               y: parseInt(row['STBD_Percent_Load']),
               label: ` ${row['journey_time']}`
            }
        );
        chart3_STBD_Percent_Torque.push(
            {
               y: parseInt(row['STBD_Percent_Torque']),
               label: ` ${row['journey_time']}`
            }
        );

        
    });
       let final_data_chart3_Engine_values = {
                                        Port_Fuel_Rate: chart3_Port_Fuel_Rate,
                                        Port_Percent_Load: chart3_Port_Percent_Load,
                                        Port_Percent_Torque: chart3_Port_Percent_Torque,
                                        STBD_Fuel_Rate: chart3_STBD_Fuel_Rate,
                                        STBD_Percent_Load: chart3_STBD_Percent_Load,
                                        STBD_Percent_Torque: chart3_STBD_Percent_Torque,
                                         title:'Engine'}
      draw_chart_chart4(final_data_chart3_Engine_values);
      }
   


     

// chart 5

let chart5_ballast_TABLE = all_data['chart5'] ? all_data['chart5'] : '' ;
    
      let chart5_stbd_fwd = [];
      let chart5_port_fuel = [];
      let chart5_port_fwd = [];
      let chart5_port_aft = [];
      let chart5_stbd_aft = [];
      let chart5_stbd_fuel = [];

      if (chart5_ballast_TABLE) {
         chart5_ballast_TABLE.forEach((row)=>{

        chart5_stbd_fwd.push(
            {
               y: parseInt(row['stbd_fwd']),
               label: ` ${row['journey_time']}`
            }
        );
        chart5_port_fuel.push(
            {
               y: parseInt(row['port_fuel']),
               label: ` ${row['journey_time']}`
            }
        );
        chart5_port_fwd.push(
            {
               y: parseInt(row['port_fwd']),
               label: ` ${row['journey_time']}`
            }
        );

        chart5_port_aft.push(
            {
               y: parseInt(row['port_aft']),
               label: ` ${row['journey_time']}`
            }
        );
        chart5_stbd_aft.push(
            {
               y: parseInt(row['stbd_aft']),
               label: ` ${row['journey_time']}`
            }
        );
        chart5_stbd_fuel.push(
            {
               y: parseInt(row['stbd_fuel']),
               label: ` ${row['journey_time']}`
            }
        );

        
    });
       let final_data_chart5_ballast_values = {
                                        stbd_fwd: chart5_stbd_fwd,
                                        port_fuel: chart5_port_fuel,
                                        port_fwd: chart5_port_fwd,
                                        port_aft: chart5_port_aft,
                                        stbd_aft: chart5_stbd_aft,
                                        stbd_fuel: chart5_stbd_fuel,
                                         title:'Ballast'}
      draw_chart_chart5(final_data_chart5_ballast_values);
      }
          



//chart 6

let chart6_craft_TABLE = all_data['chart6'] ? all_data['chart6'] : '' ;
    
    let chart6_Port_Prop_Pitch = [];
    let chart6_STBD_Prop_Pitch = [];
    let chart6_Port_Rudder_Angle = [];
    let chart6_STBD_Rudder_Angle = [];

    if (chart6_craft_TABLE) {
         chart6_craft_TABLE.forEach((row)=>{

        chart6_Port_Prop_Pitch.push(
            {
               y: parseInt(row['Port_Prop_Pitch']),
               label: ` ${row['journey_time']}`
            }
        );
        chart6_STBD_Prop_Pitch.push(
            {
               y: parseInt(row['STBD_Prop_Pitch']),
               label: ` ${row['journey_time']}`
            }
        );
        chart6_Port_Rudder_Angle.push(
            {
               y: parseInt(row['Port_Rudder_Angle']),
               label: ` ${row['journey_time']}`
            }
        );

        chart6_STBD_Rudder_Angle.push(
            {
               y: parseInt(row['STBD_Rudder_Angle']),
               label: ` ${row['journey_time']}`
            }
        );

        
    });
       let final_data_chart6_craft_values = {
                                        Port_Prop_Pitch:chart6_Port_Prop_Pitch,
                                        STBD_Prop_Pitch:chart6_STBD_Prop_Pitch,
                                        Port_Rudder_Angle:chart6_Port_Rudder_Angle,
                                        STBD_Rudder_Angle:chart6_STBD_Rudder_Angle, title:'Craft'}
      draw_chart_chart6(final_data_chart6_craft_values);
    }
     



//chart 7


let chart7_pressure_data = all_data['chart7'] ? all_data['chart7'] : '' ;
    
      let chart7_fwd_C = [];
      let chart7_aft_C = [];
      let chart7_aft_B = [];
      let chart7_port_B = [];
      let chart7_stbd_B = [];
      let chart7_fwd_B = [];

      if (chart7_pressure_data) {
         chart7_pressure_data.forEach((row)=>{

        chart7_fwd_C.push(
            {
               y: parseInt(row['fwd_C']),
               label: ` ${row['journey_time']}`
            }
        );
        chart7_aft_C.push(
            {
               y: parseInt(row['aft_C']),
               label: ` ${row['journey_time']}`
            }
        );
        chart7_aft_B.push(
            {
               y: parseInt(row['aft_B']),
               label: ` ${row['journey_time']}`
            }
        );

        chart7_port_B.push(
            {
               y: parseInt(row['port_B']),
               label: ` ${row['journey_time']}`
            }
        );
        chart7_stbd_B.push(
            {
               y: parseInt(row['stbd_B']),
               label: ` ${row['journey_time']}`
            }
        );
        chart7_fwd_B.push(
            {
               y: parseInt(row['fwd_B']),
               label: ` ${row['journey_time']}`
            }
        );

        
    });
       let final_data_chart7_pressure_values = {
                                        fwd_C: chart7_fwd_C,

                                        aft_C: chart7_aft_C,

                                        aft_B: chart7_aft_B,

                                        port_B: chart7_port_B,

                                        stbd_B: chart7_stbd_B,

                                        fwd_B: chart7_fwd_B,

                                         title:'Pressure'}
      draw_chart_chart7(final_data_chart7_pressure_values);    

      }
     








  });// end oof chartes response from api
  });



});


</script>