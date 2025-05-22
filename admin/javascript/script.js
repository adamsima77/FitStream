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



  function kontrolaVymazaniaKategorie(pocet) {
    if (pocet > 0) {
        return confirm("Táto kategória obsahuje " + pocet + " článkov. Ste si istý, že chcete vymazať?");
    } else {
        return confirm("Ste si istý, že chcete vymazať túto prázdnu kategóriu?");
    }
}


function kontrolaVymazaniaProduktu(pocet) {
  if (pocet > 0) {
      return confirm("Táto kategória obsahuje " + pocet + " produktov. Ste si istý, že chcete vymazať?");
  } else {
      return confirm("Ste si istý, že chcete vymazať túto prázdnu kategóriu?");
  }
}


//TinyMCE editor

   tinymce.init({
      selector: '.popis_mce',
      menubar: true, 
      plugins: 'lists link table code',
      toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | outdent indent | link | code | table',
    });