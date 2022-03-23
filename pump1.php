<?php
$servername ="localhost";
$username = "u997405966_6eresources";
$password = "qwerty12345@V";
$dbname = "u997405966_6estp";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
   die("Connection failed:". $conn->connect_error);
}
$sql = "SELECT * from pumps ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

$print_data = mysqli_fetch_row($result);

echo $print_data[1];
echo $print_data[1];
echo $print_data[2];
echo $print_data[3];
echo $print_data[4];
echo "X";
?>