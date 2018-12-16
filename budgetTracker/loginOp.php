<?php
session_start();

require("include/dbInfo.php");

if(!isset($_POST['email']) || !isset($_POST['password']) || empty($_POST['email']) || empty($_POST['password'])){
  $_SESSION["loggedIn"]=false;
header("Location:login.php");

}
else{
  $pass=hash("sha256",$_POST['password']);
  $email=$_POST['email'];

$info=$mysqli->prepare("select email, password from users where email=? and password=?");
//stringify
$info->bind_param("ss",$email,$pass);
$info->execute();
$info->bind_result($mail,$pas);
$info->store_result();
$info->fetch();

if($mail==$email  && $pas==$pass){
  $_SESSION["loggedIn"]=true;
  $_SESSION["email"]=$email;
  header("Location:index.php");
}
else{
  header("Location:login.php");
    $_SESSION["loggedIn"]=false;

}



}

 ?>
