
var inputs=document.getElementsByTagName('input');




document.getElementsByTagName('button')[0].onclick=function(){


if(inputs[0].value==inputs[1].value)
	alert("true");
else{
	inputs[0].value="";
	inputs[1].value="";
	alert("false");
}

}

