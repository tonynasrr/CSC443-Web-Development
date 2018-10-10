<?php
require("connection/db.php");
if(isset($_POST["id"])){// eza fname weslet, fname hiye l name bel html
$id=$mysqli->real_escape_string($_POST["id"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method


}
else{
  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}
if(isset($_POST["name"])){// eza fname weslet, fname hiye l name bel html
$name=$mysqli->real_escape_string($_POST["name"]);//eza bado yhet php mahal l name, bi chayek bi le2e eno fi name, byusal 3al code w fi ya3mol l bado ye
//rea_escape_string bet chil l (.) wel ("") so eza bado ya3mol  injection la php ,a bet3ud tezbat ma3o
//  -> this is how to call a method


}
else{
  die("DONT TRY TO MESS ARROUND BROOOO"); //metel return aw break;
}






$query=$mysqli->prepare("UPDATE product  SET name=? where id=$id");//? ye3ne expext menne a define_syslog_variables
//prepare ye3ne betrou7 3al server la tet2akad eno he huwe l query l 3am bi ruh , w expext a parameters
$query->bind_param("s",$name );//sss  eno string string string, eza integer men het i
//bind_param la yhet l values bi aleb l queries li rah
$query->execute(); //la ymache l query


$query->close();
$mysqli->close();


 ?>
