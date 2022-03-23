<?php 
    $guser=json_decode($_POST['guser'], true);
    print_r($guser[0]);
    $count=count($guser);
    echo $count;
        $connect = mysqli_connect("localhost", "u997405966_admin","232312@Rp","u997405966_users");
        $id=$guser[$count-3];
        $name=$guser[$count-2];
        $email=$guser[$count-1];
        echo $name;
        echo $email;
        $sql = "INSERT INTO users (id,name,email) VALUES('$id','$name','$email')";
        if ($connect->query($sql) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
          
          $connect->close();
        
?>