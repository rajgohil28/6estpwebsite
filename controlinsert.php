<?php
class dht1{
public $link='';
function __construct($pump1, $pump2, $pump3, $pump4){
$this->connect();
$this->storeInDB($pump1, $pump2, $pump3, $pump4);
}

function connect(){
$this->link = mysqli_connect('localhost','u997405966_6eresources','qwerty12345@V') or die('Cannot Connect');
mysqli_select_db($this->link,'u997405966_6estp') or die('cannot connect');
}
function storeInDB($pump1, $pump2, $pump3, $pump4){
$query = "insert into pumps set pump1='".$pump1."', pump2='".$pump2."', pump3='".$pump3."',pump4='".$pump4."'";
$result = mysqli_query($this->link,$query) or die('Errant query:'.$query);
}
}

if($_GET['pump1'] != '' and $_GET['pump2'] != '' and $_GET['pump3'] != '' and $_GET['pump4'] != ''){
 $pumps=new dht1($_GET['pump1'],$_GET['pump2'],$_GET['pump3'],$_GET['pump4']);
}
?>