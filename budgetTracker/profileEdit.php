<?php

require("include/dbInfo.php");

if(!isset($_POST["fullName"]) || empty($_POST["fullName"]) ||  !isset($_POST["email"]) || empty($_POST["email"])     ){
  header("location:profile.php");
  exit();
}
else if(isset($_FILES["image"]["size"]) && !empty($_FILES["image"]["size"]) && isset($_POST["pass"]) && !empty($_POST["pass"])  ){

  $fullName=$mysqli->real_escape_string($_POST["fullName"]);
  $email=$mysqli->real_escape_string($_POST["email"]);
    $pass=$mysqli->real_escape_string(hash("sha256",$_POST["pass"]));
    $currentDir = getcwd();
        $uploadDirectory = "./images/";

        $errors = []; // Store all foreseen and unforseen errors here


        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTmpName  = $_FILES['image']['tmp_name'];
        $fileType = $_FILES['image']['type'];

        $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

            if (empty($errors)) {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

                if ($didUpload) {
                    echo "The file " . basename($fileName) . " has been uploaded";
                    $path="./images/".$fileName;
                    $in=$mysqli->prepare("update users set password=?, email=? , fullName=? , image=? where email=?");
                    $in->bind_param("ssss",$pass,$email,$fullName,$path,$email);
                    $in->execute();
                    header("location:profile.php");
                    exit();
                } else {
                    echo "An error occurred somewhere. Try again or contact the admin";
                    header("location:profile.php");
                    exit();
                }
            } else {
                foreach ($errors as $error) {
                    echo $error . "These are the errors" . "\n";
                }
                header("location:profile.php");
                exit();
            }

}
else if(isset($_FILES["image"]["size"]) && !empty($_FILES["image"]["size"])){

$fullName=$mysqli->real_escape_string($_POST["fullName"]);
$email=$mysqli->real_escape_string($_POST["email"]);
  $currentDir = getcwd();
      $uploadDirectory = "./images/";

      $errors = []; // Store all foreseen and unforseen errors here


      $fileName = $_FILES['image']['name'];
      $fileSize = $_FILES['image']['size'];
      $fileTmpName  = $_FILES['image']['tmp_name'];
      $fileType = $_FILES['image']['type'];
echo $fileTmpName;
      $uploadPath = $currentDir . $uploadDirectory . basename($fileName);

          if (empty($errors)) {
              $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

              if ($didUpload) {
                  echo "The file " . basename($fileName) . " has been uploaded";
                  $path="./images/".$fileName;
                  $in=$mysqli->prepare("update users set email=? , fullName=? , image=? where email=?");
                  $in->bind_param("ssss",$email,$fullName,$path,$email);
                  $in->execute();
                  header("location:profile.php");
                  exit();
              } else {
                  echo "An error occurred somewhere. Try again or contact the admin";
                  header("location:profile.php");
                  exit();
              }
          } else {
              foreach ($errors as $error) {
                  echo $error . "These are the errors" . "\n";
              }
              header("location:profile.php");
              exit();
          }

}
else if(isset($_POST["pass"]) && !empty($_POST["pass"])){
  // echo "1";
  $fullName=$mysqli->real_escape_string($_POST["fullName"]);
  $email=$mysqli->real_escape_string($_POST["email"]);
    $pass=$mysqli->real_escape_string(hash("sha256",$_POST["pass"]));
    $in=$mysqli->prepare("update users set password=? , email=? , fullName=?  where email=?");
    $in->bind_param("ssss",$pass,$email,$fullName,$email);
    $in->execute();

    header("location:profile.php");
    exit();
}
else{

  $fullName=$mysqli->real_escape_string($_POST["fullName"]);
  $email=$mysqli->real_escape_string($_POST["email"]);
  $in=$mysqli->prepare("update users set  email=? , fullName=?  where email=?");
  $in->bind_param("sss",$email,$fullName,$email);
  $in->execute();
  header("location:profile.php");
  exit();
}

 ?>
