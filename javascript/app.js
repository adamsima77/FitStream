//Hamburger menu
function toggleMenu() {
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.toggle('visible');
}

//Event listener pre klik na ikonu hamburger menu
const hamburgerIcon = document.getElementById('hamburger');
hamburgerIcon.addEventListener('click', toggleMenu);

//Zatvorenie Sidebaru
function closeSidebar(){
const sidebar = document.getElementById('sidebar');
sidebar.classList.remove("visible")

}



//Ukazanie hesla v prihlaseni

function ukaz_heslo() {
  var x = document.getElementById("heslo_1");

 
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }



}

function ukaz_hes() {

  var z = document.getElementById("zopakovanie_hesla");
  var y = document.getElementById("heslo");
 

  if (y.type === "password") {
    y.type = "text";
  } else {
    y.type = "password";
  }  
  
  if (z.type === "password") {
    z.type = "text";
  } else {
    z.type = "password";
  }

}

function zatvorit_sidebar(){
  
  const sidebar = document.getElementById('sidebar');
  sidebar.classList.remove("visible")

}




/*Akordeón*/

var akordeon = document.getElementsByClassName("akordeon");
var i;

for (i = 0; i < akordeon.length; i++) {
  akordeon[i].addEventListener("click", function() {
 
    this.classList.toggle("active");

    var popis_akordeon = this.nextElementSibling;
    if (popis_akordeon.style.display === "flex") {

      popis_akordeon.style.display = "none";
    } else {
      popis_akordeon.style.display = "flex";
    }
  });
}


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
