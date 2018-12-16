<?php
	session_start();
	require('include/dbInfo.php');
$emailErr="";
	if (!isset($_POST["email"]) || empty($_POST["email"])) {
		$_SESSION['created'] = false;
		header('Location:register.php');
		exit();
	 } else {
	    $email = $_POST["email"];
	    // check if e-mail address is well-formed
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['created'] = false;
				header('Location:register.php');
				exit();
		    }
	  }



  if(isset($_POST['name']) && isset($_POST['validate']) && isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['name']) && !empty($_POST['validate']) && !empty($_POST['email']) && !empty($_POST['password']) &&  $_POST['password']==$_POST['validate'] ){
	$name = $_POST['name'];
  	$validate = $_POST['validate'];
	$email = $_POST['email'];
	$expenses = 0;
	$balance = 0;
	$wallet = 0;
	$income = 0;
	$password = hash("sha256", $_POST['password']);


$check=$mysqli->prepare("select email from users where email= ?");
$check->bind_param("s",$email);
$check->execute();
$check->store_result();
$check->bind_result($e);
$check->fetch();

if($e==$email){
	$_SESSION["email"]=$email;
	header("Location:register.php");
	exit();
}


	$x = $mysqli->prepare('Insert INTO users(fullName,email,password,balance,wallet,Income,expense,image) VALUES(?,?,?,?,?,?,?,"./images/default.png")');

  $x->bind_param('sssiiii', $name, $email, $password,$balance,$wallet,$income,$expenses);
	$x->execute();

	$_SESSION['created'] = true;
  $_SESSION["email"]=$email;
	header('Location:index.php');
}
else {
  	$_SESSION['created'] = false;
  	header('Location:register.php');
}
?>
