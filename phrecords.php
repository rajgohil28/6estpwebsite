 <?php
                        
                            
                            if(isset($_GET['from_date']) && isset($_GET['to_date']))
                            {
                                $from_date = $_GET['from_date'];
                                $to_date = $_GET['to_date'];
                    
                                $con = mysqli_connect("localhost", "u997405966_6eresources", "qwerty12345@V","u997405966_6estp");
                                
                                $query = "SELECT * FROM parameters WHERE time BETWEEN '$from_date' AND '$to_date'";
                                $result = mysqli_query($con,$query);
                                $chart_data = '';
                                
                                while($row =mysqli_fetch_array($result))
                                {
                                
                                   
                                    $chart_data .= "['".$row["time"]."',".$row["ph"]."],";
                            
                                    echo "<br>";
                                }
                                $chart_data = substr($chart_data, 0, -2);
                               
                                
                            }
                             
                           
                            //echo $chart_data;
                              //  exit;
                                ?>
<html>
<head>
</head>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['date','PH'],
          <?php echo "$chart_data]"?>
        ]);

        var options = {
          title: 'PH',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <title>records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="bg-dark">
    
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>PH records</h5>
                        
                    </div>
                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">To Date</label>
                                        <input type="date" name="to_date" class="form-control" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">  
                                        <button type="submit" class="btn btn-primary">Check Records</button>
                                    </div>
                                </div>
                            </div>
                     </div>  
                    </div>
                </div>
                
                
                
                <div id="curve_chart" style="width: 1500px; height: 500px"></div>
                <h1><?php echo $chart_data?></h1>

                
                
                <div class="card mt-3">
                    <div class="card-body">
                        <h6>Records</h6>
                        <hr>
                        <table class="table table-borded table-striped">
                            <thread>
                                <tr>
                                    <th>ID</th>
                                    <th>time</th>
                                    <th>BOD</th>
                                </tr>
                            </thread>
                            <tbody>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>
