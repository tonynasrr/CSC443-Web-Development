var text=document.getElementById("text");

document.getElementsByTagName('p')[0].onclick=function(){
var text=document.getElementById("text");
text.innerHTML="this is a text";
}
document.getElementsByTagName('img')[0].onmouseover=function(){
var image=document.getElementById("image");
image.innerHTML="this is an image";
}
document.getElementsByTagName('table')[0].onmouseenter=function(){
var table=document.getElementById("table");
table.innerHTML="this is a table";
}


