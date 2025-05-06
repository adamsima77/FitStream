
let indexSnimky = 1;  
zobrazSnimky(indexSnimky); 


setInterval(function() {
  plusSnimky(1); 
}, 5000); 


function plusSnimky(n) {
  zobrazSnimky(indexSnimky += n);  
}


function aktualnySnimok(n) {
  zobrazSnimky(indexSnimky = n); 
}

function zobrazSnimky(n) {
  let i;
  let snimky = document.getElementsByClassName("fotky");  
  let bodky = document.getElementsByClassName("prepnutie");  

  
  if (n > snimky.length) {indexSnimky = 1} 
  if (n < 1) {indexSnimky = snimky.length}  

  for (i = 0; i < snimky.length; i++) {
    snimky[i].style.display = "none";  
  }


  for (i = 0; i < bodky.length; i++) {
    bodky[i].className = bodky[i].className.replace(" active", "");
  }

  
  snimky[indexSnimky-1].style.display = "block";  


  bodky[indexSnimky-1].className += " active";  
}
