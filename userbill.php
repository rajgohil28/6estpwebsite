<?php
class dht1{
public $link='';
function __construct($consumption, $charge, $id){
$this->connect();
$this->storeInDB($consumption, $charge, $id);
}

function connect(){
$this->link = mysqli_connect('localhost','u997405966_6eresources','qwerty12345@V') or die('Cannot Connect');
mysqli_select_db($this->link,'u997405966_6estp') or die('cannot connect');
}
function storeInDB($consumption, $charge, $id){
$query = "UPDATE customers SET WeeklyConsumption =".$consumption.", Bill= ".$charge." WHERE id=".$id."";
$result = mysqli_query($this->link,$query) or die('Errant query:'.$query);
}
}

if($_GET['consumption'] != '' and $_GET['charge'] != '' and $_GET['id']){
 $customers=new dht1($_GET['consumption'],$_GET['charge'], $_GET['id']);
}
?>