
var p=document.getElementsByTagName("p");
function design(number){
	
	var str="";


for(var i=0;i<number;i++){
	str+=str+"<br>";
	for(var j=1;j<n-i;j++){
		str=str+"&nbsp";
	}
	for(var k=1;k<2*i+1;k++){
		str=str+"*";
	}
}
return str;
}


var number=prompt("enter a number");


p.innerHTML=design(number);
