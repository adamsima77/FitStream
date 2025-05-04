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