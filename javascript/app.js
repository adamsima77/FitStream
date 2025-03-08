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
  var x = document.getElementById("heslo");
  var z = document.getElementById("zop_hes");
  var y = document.getElementById("hes");
 
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

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

function ukaz_hes() {

  var z = document.getElementById("zop_hes");
  var y = document.getElementById("hes");
 

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

let indexSnímky = 1;  
zobrazSnímky(indexSnímky); // Zobrazí obrázok na základe indexu

// Automatická zmena obrázkov
setInterval(function() {
  plusSnímky(1); 
}, 5000); //5 sekúnd


// Zmena obrázku na ďaľśí
function plusSnímky(n) {
  zobrazSnímky(indexSnímky += n);  
}

// Zobrazenie aktuálneho obrázku
function aktuálnySnímok(n) {
  zobrazSnímky(indexSnímky = n); 
}

function zobrazSnímky(n) {
  let i;
  let snímky = document.getElementsByClassName("fotky");  
  let bodky = document.getElementsByClassName("prepnutie");  

  // Kontrola či index nie je väčší dĺžka slideshow ak áno nastávi ho na obrázok 1
  if (n > snímky.length) {indexSnímky = 1} 
  if (n < 1) {indexSnímky = snímky.length}  // Nastaví obrázok na posledný obrázok

  // Display none pre všetky obrázky
  for (i = 0; i < snímky.length; i++) {
    snímky[i].style.display = "none";  
  }

  // Odstránenie triedy active zo všetkých bodiek
  for (i = 0; i < bodky.length; i++) {
    bodky[i].className = bodky[i].className.replace(" active", "");
  }

  // Zobrazenie aktuálneho obrázku
  snímky[indexSnímky-1].style.display = "block";  

  // Pridanie triedy active k aktuálnej bodke
  bodky[indexSnímky-1].className += " active";  
}

