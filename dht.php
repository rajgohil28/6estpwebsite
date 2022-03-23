<?php
class dht1{
public $link='';
function __construct($temp, $ph, $BOD, $COD, $TSS, $do, $watercons, $Alkalinity, $Ebod, $Etss, $ENH, $ANO, $Eph, $FMLSS,$ADO, $ANH){
$this->connect();
$this->storeInDB($temp, $ph, $BOD, $COD, $TSS, $do, $watercons, $Alkalinity, $Ebod, $Etss, $ENH, $ANO, $Eph, $FMLSS,$ADO, $ANH);
}

function connect(){
$this->link = mysqli_connect('localhost','u997405966_6eresources','qwerty12345@V') or die('Cannot Connect');
mysqli_select_db($this->link,'u997405966_6estp') or die('cannot connect');
}
function storeInDB($temp, $ph, $BOD, $COD, $TSS, $do, $watercons, $Alkalinity, $Ebod, $Etss, $ENH, $ANO, $Eph, $FMLSS, $ADO, $ANH){
$query = "insert into parameters set temp='".$temp."', ph='".$ph."', BOD='".$BOD."', COD='".$COD."', TSS='".$TSS."', 
          do='".$do."', watercons='".$watercons."', Alkalinity='".$Alkalinity."', Ebod='".$Ebod."', Etss='".$Etss."', ENH='".$ENH."', ANO='".$ANO."', Eph='".$Eph."', FMLSS='".$FMLSS."', ADO='".$ADO."', ANH='".$ANH."' ";
$result = mysqli_query($this->link,$query) or die('Errant query:'.$query);
}
}

if($_GET['temp'] != '' and $_GET['ph'] != '' and $_GET['BOD'] != '' and $_GET['COD'] != '' and $_GET['TSS'] != '' and $_GET['do'] != '' and $_GET['watercons'] != '' and $_GET['Alkalinity'] != '' and $_GET['Ebod'] != '' and $_GET['Etss'] != '' and $_GET['ENH'] != '' and $_GET['ANO'] != '' and $_GET['Eph'] != '' and $_GET['FMLSS'] != '' and $_GET['ADO'] != '' and $_GET['ANH'] != '') {
 $parameters=new dht1($_GET['temp'],$_GET['ph'],$_GET['BOD'], $_GET['COD'], $_GET['TSS'], $_GET['do'],$_GET['watercons'],  $_GET['Alkalinity'], $_GET['Ebod'], $_GET['Etss'], $_GET['ENH'], $_GET['ANO'], $_GET['Eph'],
      $_GET['FMLSS'], $_GET['ADO'], $_GET['ANH']);
}
?>