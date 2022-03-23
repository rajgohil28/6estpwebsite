<?php 
$connect = mysqli_connect("localhost", "u997405966_6eresources","qwerty12345@V","u997405966_6estp");
$query = "SELECT * FROM parameters ";
$result = mysqli_query($connect,$query);
$chart_data = '';
while($row =mysqli_fetch_array($result))
{
    $chart_data .= "['".$row["time"]."',".$row["ph"]."],"; 
    $chart_data2 .= "['".$row["time"]."',".$row["BOD"]."],".$row["color"]."]";
}
?>

<!DOCTYPE html>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart','gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['date','ph'],
          <?php echo $chart_data ?>
        ]);
        var data2 = google.visualization.arrayToDataTable([
        ["time", "Density", { role: "style" } ],
        ["Mon", 8.94, "#b87333"],
        ["Tue", 10.49, "silver"],
        ["Wed", 19.30, "gold"],
        ["Thurs", 21.45, "color: #e5e4e2"]
        ]);
        

        var view = new google.visualization.DataView(data2);
        view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

        var options = {
          title: 'PH',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
        var options2 = {
        title: "BOD, in mg/L",
        width: 450,
        height: 250,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        };
        


        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        var chart2 = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
       
        
        
        chart2.draw(view, options2);
        chart.draw(data, options);
       
        var data3 = google.visualization.arrayToDataTable([
      ['Label', 'Value'],
      ['BOD', 80],
      ['COD', 55],
      ['TSS', 68]
      ]);

      var options3 = {
      width: 400, height: 120,
      redFrom: 90, redTo: 100,
      yellowFrom:75, yellowTo: 90,
      minorTicks: 5
      };

      var chart3 = new google.visualization.Gauge(document.getElementById('chart_div2'));

      chart3.draw(data3, options3);

      setInterval(function() {
      data3.setValue(0, 1, 40 + Math.round(60 * Math.random()));
      chart3.draw(data3, options3);
      }, 13000);
      setInterval(function() {
      data3.setValue(1, 1, 40 + Math.round(60 * Math.random()));
      chart3.draw(data3, options3);
      }, 5000);
      setInterval(function() {
      data3.setValue(2, 1, 60 + Math.round(20 * Math.random()));
      chart3.draw(data3, options3);
      }, 26000);
      }
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="index.css">
    <style>
       .wrap {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-top: 40px;
      margin-right: 40px;
      margin-left: 40px;
    }
    
    .button {
      width: 140px;
      height: 45px;
      margin-top: -20px;
      font-family: 'Roboto', sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 2.5px;
      font-weight: 500;
      color: #000;
      border-radius: 45px;
      background-color: #fff;
      border: none;
      /*border-radius: 45px;*/
      box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease 0s;
      cursor: pointer;
      outline: none;
      }
    
    .button:hover {
      background-color: rgb(255,100,0);
      box-shadow: 0px 15px 20px rgba(255, 255, 255, 0.4);
      color: #fff;
      transform: translateY(-7px);
    }
    </style>
</head>
<body style="background-color:rgb(204, 204, 204)">
    <div class="wrap">
        <button class="button" onclick="window.location.href='index.php'">Home</button>
    </div>

    <div id="rectangle1">
        <span class="dot"></span>
        <button class="btn dashboardbtn">Dashboard</button>
        <button class="btn controlbtn" onclick="window.location.href='control.html'">Control</button>
        <button class="btn mlbtn" onclick="window.location.href='mltab.html'">ML Insights</button>
    </div>
    <div id="rectangle2">
        <button class="bn phbutton">PH</button>
        <button class="bn dobutton" onclick="window.location.href='dobod.php'">DO</button>
        <a href="phrecords.php">
        <div id="curve_chart"></div>
        </a>
    </div>
    <div id="rectangle3">
        <button class="bnn bodbutton">BOD</button>
          <button class="bnn codbutton">COD</button>
      <div id="columnchart_values" style="width: 200px; height: 200px;">
          
      </div>
    </div>
    <div id="rectangle4">
      <div id="chart_div2"></div>
    </div>
    <script>
    function signOut(){
              gapi.auth2.getAuthInstance().signOut().then(function(){
                  console.log('user signed out');
              })
          
        }
    </script>
</body>
</html>