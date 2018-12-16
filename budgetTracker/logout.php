<?php
require("include/dbInfo.php");
session_start();
foreach($_SESSION as $key =>$element){
  unset($_SESSION[$key]);
}
header("location:login.php");
exit();

 ?>
