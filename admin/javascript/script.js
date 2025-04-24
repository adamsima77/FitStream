//Hamburger menu
function toggleMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('visible');
  }
  
  //Event listener pre klik na ikonu hamburger menu
  const hamburgerIcon = document.getElementById('hamburger');
  hamburgerIcon.addEventListener('click', toggleMenu);


  function zatvorit_sidebar(){
  
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.remove("visible")
  
  }
  
  //Kontrola či chce admin vymazať položku
  function kontrolaVymazania(){


    return confirm("Naozaj chcete vymazať položku ?");

  }