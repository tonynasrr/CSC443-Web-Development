class Card{
  constructor(clas, src) {
    this.back=src;
    this.class=clas;

    this.front="7.png";
    this.imghtml=document.createElement("img");
    this.imghtml.src=this.front;
    this.imghtml.classList.add(this.class);
    this.switchCard=this.switchCard.bind(this);
    this.hide=this.hide.bind(this);
    // this.addEvent=this.addEvent.bind(this);
    this.addEvent();
  }
  switchCard(){
    this.imghtml.src=this.back;
    var eventi=new Event("opened");
this.imghtml.dispatchEvent(eventi);

  }

  hide(){
    this.imghtml.src=this.front;


  }
  addEvent(){
    this.imghtml.addEventListener("click",this.switchCard);
  }






}
