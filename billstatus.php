<?php
$connect = mysqli_connect("localhost", "u997405966_6eresources","qwerty12345@V","u997405966_6estp");
$query = "SELECT * FROM customers ";
$result = mysqli_query($connect,$query);

$status = '';

while($row =mysqli_fetch_array($result))
{
    $status .= "".$row["BillPayed"].",";
}

echo $status

?>
