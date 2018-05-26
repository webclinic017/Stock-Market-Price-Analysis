<?php
session_start();
error_reporting(0);
$x1="2";
$x2="2";
if($_SESSION['day']){
$x1=$_SESSION['day'];
$x2=$_SESSION['day'];
}
include 'excel_reader.php';
$excel = new PhpExcelReader;
$url='stock price database/daily reports/2014-2015-DAILY-REPORT-TCS.xls';
$excel->read($url);
function sheetData($sheet) {
  $x3=$GLOBALS['x1'];
  $x4=$GLOBALS['x2'];  
   $x = $x3;
    $re="";
 while($x <= $x4) {
    $re .= "";
    $y = 1;
 while($y <= $sheet['numCols']) {
      $cell = $sheet['cells'][$x][5].",";
      $re .= $cell;  
      $y++;
      break;
 }  
    $re .= "";
    $x++;
 }

  return $re .'';     
}
$data=sheetData($excel->sheets[0]); 
$value2=explode(",", $data);
array_pop($value2);
$value2=$value2;




function sheetData2($sheet) {
  $x3=$GLOBALS['x1'];
  $x4=$GLOBALS['x2'];  
   $x = $x3;
    $re="";
 while($x <= $x4) {
    $re .= "";
    $y = 1;
 while($y <= $sheet['numCols']) {
      $cell = $sheet['cells'][$x][2].",";
      $re .= $cell;  
      $y++;
      break;
 }  
    $re .= "";
    $x++;
 }

  return $re .'';     
}
$data2=sheetData2($excel->sheets[0]); 
$value3=explode(",", $data2);
array_pop($value3);
$value3 = $value3;
$value2=$value2[0]-$value3[0];
?>

</style>
<script type="text/javascript">
var data1 = '<?php
      echo  $value2;
?>';


var data30 = [data1,];
</script>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Stock Market Price Analysis</title>
  
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 
    <link rel="stylesheet" href="Decorate/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="Decorate/dist/css/AdminLTE.min.css">
   
    <link rel="stylesheet" href="Decorate/dist/css/skins/_all-skins.min.css">

   
  </head>
  <body>
    
          <div class="box box-success">
              <div class="box-header with-border">
                   <h3 class="box-title">COMPANY TCS</h3><br>
                     <b><h3 class="box-title" style="margin-left:80px">2015</h3><br><?php
      echo  $_SESSION['tcsp']=$value2;
?></b>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart" style="width:150px">
                    <canvas id="barChart" style="height:230px;"></canvas>
                   
                  
                    <div id="chartdiv"></div>  
                  </div>
                </div>
              </div>

                    <canvas id="areaChart" style="height:250px; display:none"></canvas>    
                    <canvas id="lineChart" style="height:250px"></canvas>
                   
  
    <script src="Decorate/plugins/jQuery/jQuery-2.1.4.min.js"></script>
   
    <script src="Decorate/bootstrap/js/bootstrap.min.js"></script>
   
    <script src="Decorate/plugins/chartjs/Chart.min.js"></script>
    
    <script src="Decorate/plugins/fastclick/fastclick.min.js"></script>
  
    <script src="Decorate/dist/js/app.min.js"></script>
   
    <script src="Decorate/dist/js/demo.js"></script>
    
    <script>
      $(function () {
       
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        
      var trend_name = "Trend Value";
     
      var areaChart = new Chart(areaChartCanvas);
      var myarray = ["TCS",];
      
        var areaChartData = {
        labels: myarray,
          datasets: [
            {
             
            },
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data:data30
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        
        areaChart.Line(areaChartData, areaChartOptions);

      
        var barChartCanvas = $("#barChart").get(0).getContext("2d");
        var barChart = new Chart(barChartCanvas);
        var barChartData = areaChartData;
        barChartData.datasets[1].fillColor = "#00a65a";
        barChartData.datasets[1].strokeColor = "#00a65a";
        barChartData.datasets[1].pointColor = "#00a65a";
        var barChartOptions = {
          //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
          scaleBeginAtZero: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: true,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - If there is a stroke on each bar
          barShowStroke: true,
          //Number - Pixel width of the bar stroke
          barStrokeWidth: 2,
          //Number - Spacing between each of the X value sets
          barValueSpacing: 5,
          //Number - Spacing between data sets within X values
          barDatasetSpacing: 1,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to make the chart responsive
          responsive: true,
          maintainAspectRatio: true
        };

        barChartOptions.datasetFill = false;
        barChart.Bar(barChartData, barChartOptions);
      });
    </script>

  </body>
</html>


