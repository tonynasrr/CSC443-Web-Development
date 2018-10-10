<?php
require("connection/db.php");
if(isset($_POST["name"])){// eza fname weslet, fname hiye l name bel html
$name=$mysqli->real_escape_string($_POST["name"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method


}
else{

  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}
if(isset($_POST["price"])){// eza fname weslet
$price=$mysqli->real_escape_string($_POST["price"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method


}
else{

  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}
if(isset($_POST["excerpts"])){// eza fname weslet
$excerpts=$mysqli->real_escape_string($_POST["excerpts"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method


}
else{

  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}
if(isset($_POST["description"])){// eza fname weslet
$description=$mysqli->real_escape_string($_POST["description"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method
//cha256 la mghayer l pass w nheto hashed
}
else{

  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}

$create_at=date("y/m/d");


$query=$mysqli->prepare("INSERT INTO product(name , price, excerpts,description,create_at) VALUE (?,?,?,?,?)");//? ye3ne expext menne a define_syslog_variables
//prepare ye3ne betrou7 3al server la tet2akad eno he huwe l query l 3am bi ruh , w expext a parameters
$query->bind_param("sisss",$name , $price , $excerpts,$description,$create_at );//sss  eno string string string, eza integer men het i
//bind_param la yhet l values bi aleb l queries li rah
$query->execute(); //la ymache l query


$query->close();
$mysqli->close();


 ?>
