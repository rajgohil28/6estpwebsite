 
<html>
    <head>
        <title>STP</title>
    </head>
    <body>
        <form>
            <label for="COD">COD:</label><br>
            <input type="text" id="COD" name="COD"><br>
            <label for="PH">PH:</label><br>
            <input type="text" id="PH" name="PH" >
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
<?php
$servername ="localhost";
$username = "u997405966_6eresources";
$password = "qwerty12345@V";
$dbname = "u997405966_6estp";
$conn = new mysqli($servername, $username, $password, $dbname);
$COD = $_POST['COD'];
$PH = $_POST['PH'];
if ($conn->connect_error){
   die("Connection failed:". $conn->connect_error);
}
$sql = "INSERT INTO parameters('COD', 'ph') VALUES ('$COD','$PH')";

$rs = mysqli_query($conn,$sql);
?>