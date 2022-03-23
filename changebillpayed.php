<?php

$data=json_decode($_POST['uptbillpayed']);

var_dump($data);
$billpayedstatus=$data->BillPayedStatus;
$customerid=$data->customerid;

$newstatus=($billpayedstatus=="YES")? "NO" : "YES";


$con = mysqli_connect("localhost", "u997405966_6eresources", "qwerty12345@V","u997405966_6estp");
$sql="update customers set BillPayed='$newstatus' where ID='$customerid'";
$update=mysqli_query($con,$sql);
if($update)
{
    echo "data updated Successfully";
    return json_encode($newstatus);
}
else
{
    echo "data did not updated";
    return json_encode($newstatus);
}