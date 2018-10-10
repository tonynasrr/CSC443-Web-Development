var light=document.getElementsByTagName("img");



light[1].onclick=function(){
		// light[0].classList.toggle("hidden");
		// light[1].classList.toggle("hidden");

		if(light[1].src.includes("off.png"))
			light[1].src="on.jpg";
		else light[1].src="off.png";

	}

	// light[1].onclick=function(){
	// 	light[1].classList.toggle("hidden");
	// 	light[0].classList.toggle("hidden");
	// }




