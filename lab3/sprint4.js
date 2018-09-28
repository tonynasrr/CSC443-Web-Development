var text=document.getElementById("text");

var p=document.getElementsByTagName('p')[0];


p.addEventListener("click",function(){  //eventlistener
var text=document.getElementById("text");
text.innerHTML="this is a text";	
});


p.onclick=function(){ //event handler
var text=document.getElementById("text");
text.innerHTML="this is a text";
}
document.getElementsByTagName('img')[0].onmouseover=function(){
var image=document.getElementById("image");
image.innerHTML="this is an image";

}
document.getElementsByTagName('img')[0].onmouseout=function(){
var image=document.getElementById("image");
image.innerHTML="";
}
document.getElementsByTagName('table')[0].onmouseenter=function(){
var table=document.getElementById("table");
table.innerHTML="this is a table";
}


