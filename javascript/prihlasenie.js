function ukaz_heslo() {
    var x = document.getElementById("heslo_1");
  
   
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  
  
  
  }