<?php 
include "Session.php";
    session();
?>

<!-- --------------------------HTML-------------------------- -->
<!DOCTYPE html>
<html lang="it">
<head>
    <script src="Home.js" defer></script>
    <script src="Barra.js" defer></script>
    <script src="HomeUpdate.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
</head>
<body>

<p class="Titolo">
   Home Blog
</p>
<img src="img/menu.png" id="menuIcon">
<div class="Divisore"></div>
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




