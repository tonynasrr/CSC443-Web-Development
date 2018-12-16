<?php
session_start();
require("include/dbInfo.php");

if(!isset($_POST['date']) || empty($_POST['date']) || !isset($_POST['reason']) || empty($_POST['reason']) || !isset($_POST['type']) || empty($_POST['type']) || !isset($_POST['ammount']) || empty($_POST['ammount'])){
header("Location:balance.php");

}
else if((int)$_POST['ammount'] && $_POST['ammount']<0){
  header("Location:balance.php");

}
else{
$reason=$_POST['reason'];
$date=$_POST['date'];
$type=$_POST['type'];
$ammount=$_POST['ammount'];
$id=$_POST['id'];


$inf=$mysqli->prepare("select balance,Income,expense from users where uid=?");
$inf->bind_param("i",$id);
$inf->execute();
$inf->bind_result($b,$i,$e);
$inf->store_result();
$inf->fetch();
if($type=="income"){
$totalIncome=$i + $ammount;
$totalBalance=$b + $ammount;
$iTotal=$mysqli->prepare("update  users set balance=? , Income=?  where uid=? ");
$iTotal->bind_param("iii",$totalBalance,$totalIncome, $id);
$iTotal->execute();

}


else{
$totalExpense=$e + $ammount;
 $totalBalance=$b - $ammount;
 if($totalBalance<0){
   header("Location:balance.php");
   exit();
 }
 else{
   $iTotal=$mysqli->prepare("update  users set balance=? , expense=?  where uid=? ");
   $iTotal->bind_param("iii",$totalBalance,$totalExpense, $id);
   $iTotal->execute();
 }
}



$input=$mysqli->prepare("insert into money ( date , reason, type, ammount,uid) values(?,?,?,?,?) ");
$input->bind_param("sssii",$date,$reason,$type,$ammount,$id);
$input->execute();





header("Location:balance.php");

}


 ?>
