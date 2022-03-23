


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Users</title>
    <style>
        button[name = notif1] {
            background-image: url(green_bell_icon.png);
            background-repeat: no-repeat;
            position: absolute;
            top: -5px;
            left: -90px;
            height: 55px;
            width: 55px;
            border-width: 0px;
        }
        button[name = notif2] {
            background-image: url(green_bell_icon.png);
            background-repeat: no-repeat;
            position: absolute;
            top: -5px;
            left: -90px;
            height: 55px;
            width: 55px;
            border-width: 0px;
        }
        button[name = notif3] {
            background-image: url(green_bell_icon.png);
            background-repeat: no-repeat;
            position: absolute;
            top: -5px;
            left: -90px;
            height: 55px;
            width: 55px;
            border-width: 0px;
        }
    </style>
</head>
<body style="background-color:rgb(204, 204, 204)">
    <div id="rectangle1">
        <span class="dot"></span>
        <button class="btn dashboardbtn" onclick="window.location.href='dashboard2.php'">Dashboard</button>
        <button class="btn controlbtn" onclick="window.location.href='control.php'">Control</button>
        <button class="btn mlbtn" onclick="window.location.href='mltab.php'">ML Insights</button>
        <button class="btn usersbtn">Users</button>
    </div>
    <div id="rectangle2-2">
        <button class="usersbutton">Users</button>
        <button class="pendingbutton">Pending</button>
        
        <div id="rectangle2-2-1">
            <div id="rectangle2-2-2">
                <div id="customer1"><span id="customer1name"></span></div>
                <div id="consumption1"><span id="customer1wc"></span></div>
                <div id="customer1checkbox">
                <label class="switch">
                    <button type="button" id="notify1" name= "notif1"></button>
                   
                  </label>
                </div>  
                </div>
            <div id="rectangle2-2-3">
                <div id="customer1"><span id="customer2name"></span></div>
                <div id="consumption1"><span id="customer2wc"></span></div>
                 <div id="customer2checkbox">
                <label class="switch">
                    
                    <button type="button" onclick="ChangeColor2()" name= "notif2"></button>
                    
                  </label>
                </div> 
            </div>
            <div id="rectangle2-2-4">
                <div id="customer1"><span id="customer3name"></span></div>
                <div id="consumption1"><span id="customer3wc"></span></div>
                <div id="customer3checkbox">
                <label class="switch">
                    <button type="button" onclick="ChangeColor3()" name= "notif3"></button>
                    </label>
                </div> 
            </div>
        </div>
        <div id="rectangle2-3">
        <h3>Total Consumption: 1100L</h3>
        <h3>Total Revenue: Rs. 7,02,349</h3>
        </div>
    </div>
    
</body>

<script>
        var notif1 = document.querySelector('button[name = notif1]');
        var notif2 = document.querySelector('button[name = notif2]');
        var notif3 = document.querySelector('button[name = notif3]');
        var red = 'url("http://6eresources.in/red_bell_icon.png")';
        var green = 'url("http://6eresources.in/green_bell_icon.png")';
        var staticUrl = '/config2.php'
        $.getJSON(staticUrl, function(data){
        var customer1 = data[0].Customers;
        var customer2 = data[1].Customers;
        var customer3 = data[2].Customers;
        var customer1status = data[0].BillPayed;
        var customer2status = data[1].BillPayed;
        var customer3status = data[2].BillPayed;
        var wccustomer1 = data[0].WeeklyConsumption;
        var wccustomer2 = data[1].WeeklyConsumption;
        var wccustomer3 = data[2].WeeklyConsumption;
        var notif1status = (customer1status == "YES") ? green : red ;
        var notif2status = (customer2status == "YES") ? green : red ;
        var notif3status = (customer3status == "YES") ? green : red ;
        notif1.style.setProperty('background-image', notif1status);
        notif2.style.setProperty('background-image', notif2status);
        notif3.style.setProperty('background-image', notif3status);
        
       
        document.getElementById("customer1name").innerHTML = customer1;
        document.getElementById("customer2name").innerHTML = customer2;
        document.getElementById("customer3name").innerHTML = customer3;
        document.getElementById("customer1wc").innerHTML = wccustomer1; 
        document.getElementById("customer2wc").innerHTML = wccustomer2;
        document.getElementById("customer3wc").innerHTML = wccustomer3;
        });
        
        document.getElementById("notify1").addEventListener("click", changeBillPayed);
    
        function changeBillPayed(e)
        {
            console.log(e.target);
            var staticUrl = '/config2.php'
            $.getJSON(staticUrl, function(data){
               
                var customer1status = data[0].BillPayed;
                var customername = data[0].Customers;
                var customer1id = data[0].ID;
                var wccustomer1 = data[0].WeeklyConsumption;
                var xhttp=new XMLHttpRequest();
                xhttp.open('POST','changebillpayed.php',true);
                xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
                var data={BillPayedStatus:customer1status, customerid:customer1id};
                xhttp.send("uptbillpayed="+JSON.stringify(data));
                xhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200)
                    {
                        console.log(this.response);
                        
                        //var a=(JSON.parse(this.response));
                        //console.log(a);
                        console.log(customer1status)
                         var red = 'url("http://6eresources.in/red_bell_icon.png")';
                         var green = 'url("http://6eresources.in/green_bell_icon.png")';
                        var notif1status = (customer1status == "YES") ? green : red ;
                        console.log(notif1status);
                        document.getElementById("notify1").style.background=notif1status
                        document.getElementById("customer1name").innerHTML = customername;
                        document.getElementById("customer1wc").innerHTML = wccustomer1;
                    }
                }
                window.location.reload();
            });
            
        }
        
    </script>
   <script>
       
       var notif1 = document.querySelector('button[name = notif1]');
       var notif2 = document.querySelector('button[name = notif2]');
       var notif3 = document.querySelector('button[name = notif3]');
       
       function ChangeColor1(){
           var value = getComputedStyle(notif1);
           var lvalue = value.backgroundImage;
           var fvalue = lvalue.toString();
           console.log(fvalue);
           if(fvalue == red){
           notif1.style.setProperty('background-image', green);
           console.log("It turned green?");
           }
           if(fvalue == green)
           {
             notif1.style.setProperty('background-image', red); 
             console.log("It turned red?");
           }
       }
       function ChangeColor2(){
           var value = getComputedStyle(notif2);
           var lvalue = value.backgroundImage;
           var fvalue = lvalue.toString();
           console.log(fvalue);
           if(fvalue == red){
           notif2.style.setProperty('background-image', green);
           console.log("It turned green?");
           }
           if(fvalue == green)
           {
             notif2.style.setProperty('background-image', red); 
             console.log("It turned red?");
           }
       }
       function ChangeColor3(){
           var value = getComputedStyle(notif3);
           var lvalue = value.backgroundImage;
           var fvalue = lvalue.toString();
           console.log(fvalue);
           if(fvalue == red){
           notif3.style.setProperty('background-image', green);
           console.log("It turned green?");
           }
           if(fvalue == green)
           {
             notif3.style.setProperty('background-image', red); 
             console.log("It turned red?");
           }
       }
   </script>
</html>