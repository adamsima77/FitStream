
let indexSnímky = 1;  
zobrazSnímky(indexSnímky); 


setInterval(function() {
  plusSnímky(1); 
}, 5000); 


function plusSnímky(n) {
  zobrazSnímky(indexSnímky += n);  
}


function aktuálnySnímok(n) {
  zobrazSnímky(indexSnímky = n); 
}

function zobrazSnímky(n) {
  let i;
  let snímky = document.getElementsByClassName("fotky");  
  let bodky = document.getElementsByClassName("prepnutie");  

  
  if (n > snímky.length) {indexSnímky = 1} 
  if (n < 1) {indexSnímky = snímky.length}  

  for (i = 0; i < snímky.length; i++) {
    snímky[i].style.display = "none";  
  }


  for (i = 0; i < bodky.length; i++) {
    bodky[i].className = bodky[i].className.replace(" active", "");
  }

  
  snímky[indexSnímky-1].style.display = "block";  


  bodky[indexSnímky-1].className += " active";  
}
