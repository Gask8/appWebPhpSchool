var creareventosplus=document.querySelectorAll('.checkboxsel');
var y = document.querySelectorAll('#recolector')[0];

for(let i=0; i<creareventosplus.length; i++){
  creareventosplus[i].addEventListener("click", function(){
    addToHidden();
  });
}

function addToHidden(){
  var newValue="";
  for(let i=0; i<creareventosplus.length; i++){
    if(creareventosplus[i].checked){
      if(newValue!=""){
        newValue+=",";
      }
      newValue+=creareventosplus[i].value;
    }
  }
  y.value=newValue;
}
