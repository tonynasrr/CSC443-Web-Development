var num=prompt("how many card do u want");
var srcs=[];
for(var i=0;i<Number(num);i++){
  srcs.push((i+1)+".jpg");
}

function shuffle(a) {
  for (let i = a.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [a[i], a[j]] = [a[j], a[i]];
  }
  return a;
}


function c(name){
  shuffle(srcs);
  var cards=[];
  for(var i=0;i<Number(num);i++){

    cards.push(new Card(srcs[i].split(".")[0],srcs[i]));
    cards[i].addEvent();
  }
  var one=document.getElementsByClassName(name)[0];
  for(var i=0;i<Number(num);i++){
    var card=cards[i].imghtml;
    card.addEventListener("opened",function(event){
      console.log(card.src);
    });
    one.appendChild(card);
  }
  cards=[];
}
c("one");
c("two");
var o=document.getElementsByClassName("one")[0];
var t=document.getElementsByClassName("two")[0];
