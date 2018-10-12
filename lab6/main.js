var num=prompt("how many card do u want");
var srcs=[];

function shuffle(a) {
  for (let i = a.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [a[i], a[j]] = [a[j], a[i]];
  }
  return a;
}



for(var i=0;i<Number(num);i++){
  srcs.push((i+1)+".jpg");
}

shuffle(srcs);
var cards=[];
for(var i=0;i<Number(num);i++){
  cards.push(new Card((i+1),srcs[i]));
cards[i].addEvent();
  // cards[i].imghtml.src=cards[i].front;
}

  var one=document.getElementsByClassName("one")[0];
for(var i=0;i<Number(num);i++){
  var card=cards[i].imghtml;
  one.appendChild(card);
}
