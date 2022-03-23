<?php 
header("Access-Control-Allow-Origin: *");
$connect = mysqli_connect("localhost", "u997405966_6eresources","qwerty12345@V","u997405966_6estp");
$query = "SELECT * FROM ml_table ";
$result = mysqli_query($connect,$query);
$linearray = '';
$time = '';
$chart_data = '';
while($row =mysqli_fetch_array($result))
{
    $pboddata .= "".$row["predicted_BOD"].",";
    $boddata .= "".$row["BOD"].",";
    $coddata .= "".$row["COD"].",";
    $dodata .= "".$row["DO"].",";
    $phdata .= "".$row["ph"].",";
    $time .= "'".$row["time"]."',";
    
}
echo json_encode($linearray);
echo json_encode($bararray);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@2.0.0/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs-vis@1.0.2/dist/tfjs-vis.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/
jquery/3.3.1/jquery.min.js"></script>
    <title>Document</title>
    <style>
        #phChart{
            position: absolute;
            top: 30px;
            width: 400px;
            height 250px;
        }
        #bodChart
        {
            position: absolute;
            width: 200px;
            height: 100px;
        }
        #doChart
        {
            position: absolute;
            width: 200px;
            height: 100px;
        }
        #tempChart{
            position: absolute;
            width: 200px;
            height: 100px;
        }
    </style>
    
    <link rel="stylesheet" href="index.css">
   
</head>
<body style="background-color:rgb(204, 204, 204)">
    <div id="rectangle1">
        <span class="dot"></span>
        <button class="btn dashboardbtn" onclick="window.location.href='dashboard2.php'">Dashboard</button>
        <button class="btn controlbtn" onclick="window.location.href='control.php'">Control</button>
        <button class="btn mlbtn" onclick="window.location.href='mltab.php'">ML Insights</button>
        <button class="btn usersbtn" onclick="window.location.href='users.php'">Users</button>
    </div>
    <div id="rectangle2-1">
        <div id="graphcontainer">
        <canvas id="phChart"></canvas>
        
        </div>
    </div>
    
    <div id="rectangle3">
        <div id="bodcontainer">
        <canvas id="bodChart"></canvas>
        </div>
    </div>
    <div id="rectangle4">
        <div id="codcontainer">
        <canvas id="doChart"></canvas>
        </div>
    </div>
    <div id="rectangle5">
        <div id="tsscontainer">
        <canvas id="tempChart"></canvas>
         </div>
    </div>
</body>
<script>
            const bodlabels = ['Jan', 'Feb', 'March', 'Apr', 'May', 'June', 'July'];
            
            
            const data = {
                labels: bodlabels,
                datasets: [{
                    label: 'PH',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(255, 171, 15)',
                    borderColor: 'rgb(255, 171, 15)',
                    data: [1,2,3,4,3,2,4],
                },
                {
                    label: 'Predicted PH',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(239, 215, 107)',
                    borderColor: 'rgb(239, 215, 107)',
                    data: [1,1,3,3,3,2,3],
                }]
            };
            
            const data2 = {
                labels: bodlabels,
                datasets: [{
                    label: 'BOD',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(255, 71, 15)',
                    borderColor: 'rgb(255, 71, 15)',
                    data: [<?php echo $boddata ?>],
                },
                {
                    label: 'Predicted BOD',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(239, 164, 107)',
                    borderColor: 'rgb(239, 164, 107)',
                    data: [<?php echo $pboddata; ?>],
                }]
            }
            
            const data3 = {
                labels: bodlabels,
                datasets: [{
                    label: 'DO',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(252, 161, 3)',
                    borderColor: 'rgb(252, 161, 3)',
                    data: [3,2,1,1,4,2,1],
                },
                {
                    label: 'Predicted DO',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(252, 185, 70)',
                    borderColor: 'rgb(252, 185, 70)',
                    data: [3,2,1,1,4,2,2],
                }]
            }
            const data4 = {
                labels: bodlabels,
                datasets: [{
                    label: 'Temp',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(179, 101, 0)',
                    borderColor: 'rgb(179, 101, 0)',
                    data: [1,2,2,1,4,3,1],
                },
                {
                    label: 'Predicted Temp',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(196, 158, 92)',
                    borderColor: 'rgb(196, 158, 92)',
                    data: [1,2,4,3,2,3,3],
                }]
            }
            
          const config = {
                type: 'line',
                data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    }
            };
            const config2 =  {
                type: 'line',
                data2,
                options: {
                    scales:{
                        yAxes: [{
                            ticks:{
                                suggestedMax: 8
                            }
                        }]
                    },
                    
                    maintainAspectRatio: false
                    }
            };
            
            
            
            var ctx2 = document.getElementById('bodChart');
            var ctx = document.getElementById('phChart');
            var ctx3 = document.getElementById('doChart');
            var ctx4 = document.getElementById('tempChart');
            
            var myChart = new Chart(
             ctx ,
             config
             );
            var bodChart = new Chart(ctx2 , {
                type: 'line',
                data: data2,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    }
            });
            var doChart = new Chart(ctx3, {
                type: 'line',
                data: data3,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    }
            });
            var tempChart = new Chart(ctx4, {
                type: 'line',
                data: data4,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    }
            });
            
</script>

</html>