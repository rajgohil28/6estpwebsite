<?php 
$connect = mysqli_connect("localhost", "u997405966_6eresources","qwerty12345@V","u997405966_6estp");
$query = "SELECT * FROM parameters ";
$result = mysqli_query($connect,$query);
$linearray = '';
$time = '';
$chart_data = '';
while($row =mysqli_fetch_array($result))
{
    $linearray .= "".$row["do"].",";
    $bararray .= "".$row["watercons"].",";
    $time .= "'".$row["time"]."',";
    $chart_data .= "['".$row["time"]."',".$row["ph"]."],"; 
    $chart_data2 .= "['".$row["time"]."',".$row["watercons."]."],";
    
    
}

?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/
jquery/3.3.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        
        #graphcontainer
        {
            position: absolute;
            width: 900px;
            height: 250px;
            top: 35px;
            left:35px;
        }
         #doindicator
        {
            position: absolute;
            width: 200px;
            height: 200px;
            top: 0px;
            left: 0px;
        }
        #codindicator
        {
          position: absolute;
            width: 200px;
            height: 200px;
            top: 0px;
            left: 250px;
        }
    </style>
    <link rel="stylesheet" href="index.css">
</head>
<body style="background-color:rgb(204, 204, 204)">
<script src="js/bar.js"></script>
    
    <div id="rectangle1">
        <span class="dot"></span>
        <button class="btn dashboardbtn">Dashboard</button>
        <button class="btn controlbtn" onclick="window.location.href='control.php'">Control</button>
        <button class="btn mlbtn" onclick="window.location.href='mltab.php'">ML Insights</button>
        <button class="btn usersbtn" onclick="window.location.href='users.php'">Users</button>
    </div>
    <div id="rectangle2" >
        <button class="bn phbutton2" onclick="window.location.href='dashboard2.php'">PH</button>
        <button class="bn dobutton2" >DO</button>
        <a href="phrecords.php">
            <div id="graphcontainer">
                <canvas id="myChart">
                </canvas>
            </div>
        </a>
    </div>
    <div id="rectangle3">
        <button class="bnn bodbutton" onclick="window.location.href='dashboard4.php'">BOD</button>
          <button class="bnn codbutton" onclick="window.location.href='dashboard5.php'">COD</button>
          <button class="bnn waterconbutton" style="background-image: url(https://www.zastavki.com/pictures/640x480/2015/Backgrounds_Orange_gradient_background_096901_29.jpg); color: rgb(255, 255, 255);">CONSUMPTION</button>
        <canvas id= "myChart2"></canvas>
          
      </div>
    
    <div id="rectangle4">
      <div id="doindicator">
        <canvas id="do_indicator"></canvas>
        </div>
        <div id="codindicator">
            <canvas id="cod_indicator"></canvas>
        </div>
    </div>
</body>
<script>
         
           /*const labels = [
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June'
            ];*/
            const labels = [<?php echo $time ?>];
            const data = {
                labels: labels,
                datasets: [{
                    label: 'DO',
                    lineTension: 0.5,
                    backgroundColor: 'rgb(255, 171, 15)',
                    borderColor: 'rgb(255, 171, 15)',
                    data: [<?php echo $linearray; ?>],
                }]
            };
            
          const config = {
                type: 'line',
                data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                    }
            };
            
            

           
            var myChart = new Chart(
             document.getElementById('myChart'),
             config
             );
            
      </script>
     <script>
 const data2 = {
  labels: [<?php echo $time?>],
  datasets: [{
    label: 'Water Cons.',
    data: [<?php echo $bararray ?>],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

const config2 = {
  type: 'bar',
  data: data2,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
var ctx = document.getElementById('myChart2').getContext('2d');
var myBarChart = new Chart(ctx, config2);
</script>
<script>
const data3 = {
  labels: [
    'DO',
    ''
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [21, 100-21],
    backgroundColor: [
      'rgb(255, 94, 14)',
      'rgb(0,0,0)'
    ],
    hoverOffset: 4,
    borderWidth: 1,
    weight: 4
     }]
    };

const config3 = {
        type: 'doughnut',
        data: data3
        };
var myChart3 = new Chart(
             document.getElementById('do_indicator'),
             config3
             );
</script>
<script>
const data4 = {
  labels: [
    'COD',
    ''
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [20*100/50 , 100-20*100/50],
    backgroundColor: [
      'rgb(245, 118, 26)',
      'rgb(0,0,0)'
    ],
    hoverOffset: 4
     }]
    };

const config4 = {
        type: 'doughnut',
        data: data4,
        };
var myChart4 = new Chart(
             document.getElementById('cod_indicator'),
             config4
             );
</script>
</html>