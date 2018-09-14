



var rows = prompt ("enter the number of rows");

for(var i =1 ; i <= rows ; i++) {

		for(var k = 0 ; k<rows-i; k++) {

		document.write("&nbsp;");
	}

	for(var j =0; j<i ; j++) {

		document.write("*")
	}



	document.write("<br/>");
}
