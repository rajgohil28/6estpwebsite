var script = document.createElement('script');
script.src = 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);
var user=[];
function onSignIn(googleUser,user)
        {
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
          
          var element = document.querySelector('#content');
          element.innerText=profile.getName();
          
            // $.post("test.php",
            // {
            //     guser:JSON.stringify(user)
            // },
            // function(data,status){
            //   alert("Data: " + data + "\nStatus: " + status);
            // });
  
        //   window.location.assign("http://6eresources.in/dashboard.php")
        }
          function signOut(){
              gapi.auth2.getAuthInstance().signOut().then(function(){
                  console.log('user signed out');
              });
          
        }
$(document).ready(function f1(){
  $("button").click(function f2(){
    $.post("test.php",
    {
        guser:JSON.stringify(user)
    },
    function(data,status){
      alert("Data: " + data + "\nStatus: " + status);
    });
  });
});