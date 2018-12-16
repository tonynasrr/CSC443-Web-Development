<?php
require("include/dbInfo.php");

if(!isset($_POST['type']) || empty($_POST['type']) || !isset($_POST['ammount']) || empty($_POST['ammount']) || !isset($_POST['id']) || empty($_POST['id']) ){
header("Location:wallet.php");

}
else{

$type=$_POST['type'];
$ammount=(int)$_POST['ammount'];
$id=(int)$_POST['id'];
if($id==0){
  echo "hi";
  exit();
}

if($_POST['ammount'] && $ammount<0){
  echo "hi";
  header("Location:wallet.php");
exit();
}


$inf=$mysqli->prepare("select balance,wallet from users where uid=?");
$inf->bind_param("i",$id);
$inf->execute();
$inf->bind_result($b,$w);
$inf->store_result();
$inf->fetch();

if($type=="add"){

$totalWallet=$w + $ammount;
$totalBalance=$b - $ammount;
if($totalBalance <0){
  header("Location:wallet.php");
  exit();
}
$iTotal=$mysqli->prepare("update  users set balance=? , wallet=?  where uid=? ");
$iTotal->bind_param("iii",$totalBalance,$totalWallet, $id);
$iTotal->execute();

}


else{
  $totalWallet=$w - $ammount;
  $totalBalance=$b + $ammount;
  if($totalWallet <0){
    header("Location:wallet.php");
    exit();
  }
  $iTotal=$mysqli->prepare("update  users set balance=? , wallet=?  where uid=? ");
  $iTotal->bind_param("iii",$totalBalance,$totalWallet, $id);
  $iTotal->execute();
}

header("Location:wallet.php");

}

 ?>
