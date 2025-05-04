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