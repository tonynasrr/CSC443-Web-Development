<?php
require("include/dbInfo.php");

$uid=$mysqli->real_escape_string($_POST["uid"]);
$money=$mysqli->prepare("select ammount , date , type from money where uid=?");
$money->bind_param("i",$uid);
$money->execute();
$money->store_result();
$money->bind_result($ammount,$date,$type);
$income=array(0,0,0,0,0,0,0,0,0,0,0,0);
$expense=array(0,0,0,0,0,0,0,0,0,0,0,0);

$curYear = date('Y');
while($money->fetch()){
// print_r($d);
$d=explode("/",$date);
if($type=="income"  && $d[2]==$curYear){
  switch($d[0] ){
    case 1: $income[0]+=$ammount;break;
    case 2: $income[1]+=$ammount;break;
    case 3: $income[2]+=$ammount;break;
    case 4: $income[3]+=$ammount;break;
    case 5: $income[4]+=$ammount;break;
    case 6: $income[5]+=$ammount;break;
    case 7: $income[6]+=$ammount;break;
    case 8: $income[7]+=$ammount;break;
    case 9: $income[8]+=$ammount;break;
    case 10: $income[9]+=$ammount;break;
    case 11: $income[10]+=$ammount;break;
    case 12: $income[11]+=$ammount;break;
  }
}
else if($type=="expense"  && $d[2]==$curYear){
  switch($d[0]){
    case 1: $expense[0]+=$ammount;break;
    case 2: $expense[1]+=$ammount;break;
    case 3: $expense[2]+=$ammount;break;
    case 4: $expense[3]+=$ammount;break;
    case 5: $expense[4]+=$ammount;break;
    case 6: $expense[5]+=$ammount;break;
    case 7: $expense[6]+=$ammount;break;
    case 8: $expense[7]+=$ammount;break;
    case 9: $expense[8]+=$ammount;break;
    case 10: $expense[9]+=$ammount;break;
    case 11: $expense[10]+=$ammount;break;
    case 12: $expense[11]+=$ammount;break;
  }
}

}




$obj=new stdClass();
  $obj->expense=$expense;
  $obj->income=$income;

$j=json_encode($obj);
echo $j;


 ?>
