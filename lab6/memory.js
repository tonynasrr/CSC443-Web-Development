class Card{
  constructor(clas, src) {
     this.back=src;
     this.class=clas;
     this.front="7.png";
     this.imghtml=document.createElement("img");
this.imghtml.src=this.front;
this.switchCard=this.switchCard.bind(this);
// this.addEvent=this.addEvent.bind(this);
this.addEvent();
   }

 switchCard(){
    if(this.imghtml.src==this.back)
    this.imghtml.src=this.front;
    else{
      this.imghtml.src=this.back;
    }
   }

addEvent(){
this.imghtml.addEventListener("click",this.switchCard);
}



}
