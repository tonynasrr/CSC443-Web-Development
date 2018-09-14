
function palindrom(pal){
	
		for(var i=0;i<pal.length;i++){
			
		if(i>=pal.length/2)
			return true;
		if(pal.charAt(i)!=pal.charAt(pal.length-1-i))
			return false;
		

	}
		return true;
}
var pal=prompt("enter a palindrom");

while(palindrom(pal)==false){
	pal=prompt("enter a palindrom");

	

}