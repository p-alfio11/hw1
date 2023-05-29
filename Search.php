<?php 
include "Session.php";
    session();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <script src="Search.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Search.css">
    <script src="Barra.js" defer></script>
    <title>Home</title>
</head>
<body>

<div class="Conteiner" id="RicercaD" >
   <form  class="search" id="Ricerca" >
    <input type="text" placeholder="Marca" id="nome" name="Marca">
    <input type="text" placeholder="Modello" id="modello" name="Modello">
    <button type="submit"><img src="img/search.png" alt=""></button>
   </form>
</div>
<img src="img/menu.png" id="menuIcon">

    <div id="homepage">
        
            
    </div>
  
<div class="menu-box" id="menuBox">
    <ul>
         <li><a href="Home.php">Home</a></li> 
         <li><a href="Search.php">Scopri di più su un aereo</a></li> 
         <li><a href="Preferiti.php">Preferiti</a></li>
         <li><a href="AddPost.php">Inserisci Post</a></li>
         <li><a href="Logout.php">Logout</a></li>
       
    </ul>
</div>
</body>

</html>




