<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="google-signin-client_id" content="988347166446-mnimm923cb9r8tekrbau8hqk64t1gich.apps.googleusercontent.com">
      <script src="https://apis.google.com/js/platform.js" async defer></script>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="jquery-3.2.1.min.js">
     </script>
     <!--<script src="test.js"></script>-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 $(document).ready(function f1(){
  $("#myP").click(function f2(){
    $.post("test.php",
    {
        guser:JSON.stringify(user)
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
 $(document).ready(function f1(){
  $("#out").click(function f2(){
    $.post("test.php",
    {
        guser:JSON.stringify(user)
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});
</script>
    <!--<link rel="stylesheet" href="index.css">-->
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
      background-color: #232412;
      box-shadow: 0px 15px 20px rgba(255, 255, 255, 0.4);
      color: #fff;
      transform: translateY(-7px);
    }
</style>
    <title>Home</title>
</head>

<body style="font-family:poppins-extralight,titillium,poppins,sans-serif; background-color: rgb(255,90,0);">
        
       <div class="wrap"> 
       <div id="content" style="margin-top: 20px; margin-left: 20px; color:white; font-family:serif; font-size:25px;"></div>
       <button class="button" id="myP" style="visibility: hidden;" onclick="myFunction()" >Get Started</button> 
        <button class="button" id="out" style="visibility: hidden;" onclick="signOut()">Sign Out</button>

       </div>


    <div class="container" style = "margin-bottom: 100px; margin-right: 250px; margin-left: 80px;">
      <h1 style="color:white; text-align:left; font-family:serif,poppins-extralight,titillium,poppins,sans-serif; justify-content: flex-start; font-size: 65px;">Remote Monitoring and Optimization of Membrane BioReactor</h1>
      <h2 style="margin-right:600px; justify-content: flex-start; color:white; text-align:left; font-family:serif,poppins-extralight,titillium,poppins,sans-serif; font-size: 32px; letter-spacing: 1px;">Use Data to Get Responsible Solutions for Water Recycling</h2>
    </div>
    <div id="btn" style="margin-top:-55px; margin-left: 75px;" style="font-size:10px;" class="g-signin2" data-onsuccess="onSignIn" data-theme="light"></div>

    
</body>

      <script>
      var user=[];
        function onSignIn(googleUser) {
          // Useful data for your client-side scripts:
          var profile = googleUser.getBasicProfile();
          
          var id=profile.getId();
         user.push(id);
           var name=profile.getName();
           user.push(name);
           var email=profile.getEmail();
            user.push(email);
          console.log("ID: " + profile.getId()); // Don't send this directly to your server!
          console.log('Full Name: ' + profile.getName());
          console.log('Given Name: ' + profile.getGivenName());
          console.log('Family Name: ' + profile.getFamilyName());
          console.log("Image URL: " + profile.getImageUrl());
          console.log("Email: " + profile.getEmail());
          console.log(user);
          
        // The ID token you need to pass to your backend:
          var id_token = googleUser.getAuthResponse().id_token;
          console.log("ID Token: " + id_token);
          
          var element = document.querySelector('#content')
          element.innerText="Welcome, " + profile.getName() + "!";
            document.getElementById("out").style.visibility = "initial";
           document.getElementById("myP").style.visibility = "initial";
           document.getElementById("btn").style.visibility = "hidden";

        }
        
        function myFunction() {
            window.location.assign("http://6eresources.in/dashboard2.php")
            document.getElementById("out").style.visibility = "initial";
           document.getElementById("btn").style.visibility = "hidden";
        }
       
          function signOut(){
              gapi.auth2.getAuthInstance().signOut().then(function(){
                  console.log('user signed out');
                  document.getElementById("btn").style.visibility = "initial";
                  document.getElementById("myP").style.visibility = "hidden";
                document.getElementById("out").style.visibility = "hidden";

              })
        }
        
      </script>
      <script>
//     function mysigninFunction() {
//       location.replace("https://www.6eresources.in/dashboard.php")
//     }
    </script>
</html>