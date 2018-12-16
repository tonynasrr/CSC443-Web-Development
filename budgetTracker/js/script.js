
var reason=document.getElementById("reason");

reason.addEventListener("change",function(){
  reason.value=reason.value.replace("<script>", "");
    reason.value=reason.value.replace("</script>", "");
  console.log(reason.value);

});
