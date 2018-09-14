
var inputs=document.getElementsByTagName('input');

var label=document.getElementsByTagName('label')[0];


document.getElementsByTagName('button')[0].onclick=function(){


if(inputs[0].value==inputs[1].value){
label.innerHTML="this is a matching pass";
label.style.backgroundColor="steelblue";
	
}
else{
	inputs[0].value="";
	inputs[1].value="";
	label.innerHTML="these pass are not matched";
	label.style.backgroundColor="red";
}

}

