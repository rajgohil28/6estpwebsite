 <?php  
$servername ="localhost";
$username = "u997405966_6eresources";
$password = "qwerty12345@V";
$dbname = "u997405966_6estp";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn)
{
    echo "connection success";
}
else
{
    echo "connection failed";
}

@$a=$_POST['status1'];  
@$b=$_POST['status2'];
@$c=$_POST['status3'];
@$d=$_POST['status4'];
if(@$_POST['submit'])  
{  
$s="INSERT INTO pumps (pump1,pump2,pump3,pump4) VALUES('$a','$b','$c','$d')";  
  
mysql_query($s); 
echo "Your Data Inserted";
} 
?>  