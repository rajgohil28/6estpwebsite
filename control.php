<?php
header("Access-Control-Allow-Origin: *");
require_once 'pdoconfig.php';
 
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    if(isset($_POST['parasubmit']))
    {
        $ph = $_POST['PH'];
        $DO = $_POST['DO'];
        var_dump($ph);
        var_dump($do);
        $sql_query = "INSERT INTO parameters (ph,do) VALUES('$ph','$DO')";
        
        $conn->exec($sql_query);
        
    }
    if(isset($_POST['motorsubmit']))
    {
        $pump1 = $_POST['switch1'];
        $pump2 = $_POST['switch2'];
        $pump3 = $_POST['switch3'];
        $pump4 = $_POST['switch4'];
        $sql_query = "INSERT INTO pumps(pump1,pump2,pump3,pump4) VALUES ('$pump1','$pump2','$pump3','$pump4')";
        $conn->exec($sql_query);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="index.css">
    <style>
        .motor1dot{
                position: absolute;
                top: 40px;
                left: 100px;
                height:20px;
                width: 20px;
                border-radius:50%;
                background-color: white;
                }
        .motor2dot{
                position: absolute;
                top: 40px;
                left: 320px;
                height:20px;
                width: 20px;
                border-radius:50%;
                background-color: white;
                }
        .motor3dot{
                position: absolute;
                top: 40px;
                left: 540px;
                height:20px;
                width: 20px;
                border-radius:50%;
                background-color: white;
                }
        .motor4dot{
                position: absolute;
                top: 40px;
                left: 760px;
                height: 20px;
                width: 20px;
                border-radius:50%;
                background-color: white;
                }
    </style>
</head>
    <body style="background-color:rgb(204, 204, 204)">
        <div id="rectangle1">
            <span class="dot"></span>
            <button class="btn dashboardbtn" onclick="window.location.href='dashboard2.php'">Dashboard</button>
            <button class="btn controlbtn">Control</button>
            <button class="btn mlbtn" onclick="window.location.href='mltab.php'">ML Insights</button>
            <button class="btn usersbtn" onclick="window.location.href='users.php'">Users</button>
        </div>
        <div id="rectangle2">
            <div id="pumps">
                <form class="motorform" action="" method="post">
                <span class= "motor1dot"></span>
                <label class="switch">
                    <input type="checkbox" id="switch1" name="switch1" value=1>
                    <span class="slider"></span>
                  </label>
                  <image id="dosingimg" src='/dosing_pump.png'></image>
                
                <span class="motor2dot"></span>
                  <label class="switch" >
                    <input type="checkbox" id="switch2" name="switch2" value=1>
                    <span class="slider"></span>
                  </label>
                  <image id="recirculationimg" src="/recirculation.png"></image>
                
                <span class="motor3dot"></span>
                  <label class="switch">
                    <input type="checkbox" id="switch3" name="switch3" value=1>
                    <span class="slider"></span>
                  </label>
                  <image id="suctionimg" src="/recirculation.png"></image>
              
                <span class="motor4dot"></span>
                  <label class="switch">
                    <input type="checkbox" id="switch4" name="switch4" value=1>
                    <span class="slider"></span>
                  </label>
                  <image id="submersimg" src="/submersible_pump.png"></image>
                  <label class="motorsubmit">
                      <input type="submit" name="motorsubmit">
                  </label>
                  
                  </form>
            </div>
        </div>
        <div id="rectangle3">
            <form class="paraform" action="" method="POST">
                <label for="DO">DO:</label><br>
                <input type="number" id="DO" name="DO" step="0.01" pattern="^\d*(\.\d{0,2})?$"/><br>
                <label for="PH">PH:</label><br>
                <input type="number" id="PH" name="PH"step="0.01"/><br>
                <input type="submit" name="parasubmit">
              </form>
              <span id="DO"></span>
        </div>
        <div id="rectangle4">
          <div id="currentvalue">
               <div style="margin: 10px; color:white; text-align:left; font-family:'Times New Roman', serif; justify-content: flex-start; font-size: 32px;">Current DO: <span id="rudu"></span></div>
              <div style="margin: 10px; color:white; text-align:left; font-family:'Times New Roman', serif; justify-content: flex-start; font-size: 32px;">Current PH: <span id="ph"></span></div>
             
            </div>
        </div>
    </body>
    <script>
        var staticUrl = '/config.php'
        $.getJSON(staticUrl, function(data){
        console.log(data)
        var b = data.length;
        var ph = data[b-1].ph;
        var DO = data[b-1].do;
        document.getElementById("ph").innerHTML = ph;
        document.getElementById("rudu").innerHTML = DO;
        
        }
        );
    </script>
  <script>
  var motor1dot = document.querySelector('.motor1dot');
  var motor2dot = document.querySelector('.motor2dot');
  var motor3dot = document.querySelector('.motor3dot');
  var motor4dot = document.querySelector('.motor4dot');
  
  var otherUrl = '/config3.php'
  $.getJSON(otherUrl, function(data){
      var l = data.length;
      var motor1 = data[l-1].pump1;
      var motor2 = data[l-1].pump2;
      var motor3 = data[l-1].pump3;
      var motor4 = data[l-1].pump4;
      
      var motor1color = (motor1 == 1)? "green" : "red";
      var motor2color = (motor2 == 1)? "green" : "red";
      var motor3color = (motor3 == 1)? "green" : "red";
      var motor4color = (motor4 == 1)? "green" : "red";
      
      motor1dot.style.setProperty('background-color', motor1color);
      motor2dot.style.setProperty('background-color', motor2color);
      motor3dot.style.setProperty('background-color', motor3color);
      motor4dot.style.setProperty('background-color', motor4color);
      
      }
      );
  </script>
</html>