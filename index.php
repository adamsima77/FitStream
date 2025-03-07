<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>FitStream</title>
</head>

<?php include 'parts/navbar.php';?>




<div class="slideshow">     
            <div class="fotky">
              <a href="/jedalnicky.html"><img src="img/proteiny.jpg"></a>
             
            </div>
            <div class="fotky">
                <a href="/Recepty.html"><img src="img/proteiny.jpg"></a>
                
            </div>
            <div class="fotky">
                <a href="/nastavenie_stravy.html"><img src="img/proteiny.jpg"></a>
              
            </div>

            <div class = "prepnutie_fotiek">
                <span class="prepnutie" onclick="aktuálnySnímok(1)"></span> 
                <span class="prepnutie" onclick="aktuálnySnímok(2)"></span> 
                <span class="prepnutie" onclick="aktuálnySnímok(3)"></span> 
              </div>
            
            </div>
    <h1 class = "produkty">Produkty</h1>



    <h1 class = "blog">Blog</h1>





<script src="javascript/app.js" type="text/javascript"></script>
<?php include 'parts/footer.php';?>
    
</body>
</html>