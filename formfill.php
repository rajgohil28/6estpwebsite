<?php

require_once 'pdoconfig.php';
 

 

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    if(isset($_POST['submit']))
    {
        $ph = $_POST['ph'];
        $COD = $_POST['COD'];
        echo $ph;
        echo $COD;
        var_dump($ph);
        var_dump($COD);
        $sql_query = "INSERT INTO parameters (ph,COD) VALUES('$ph','$COD')";
        echo $sql_query;
        $conn->exec($sql_query);
        
        //$result = mysqli_query($conn,$sql_query);
        echo $result;

    }
    else
    {
        echo "no";
    }

?>