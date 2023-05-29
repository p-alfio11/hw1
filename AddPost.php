<?php 
include "ConnessioneDB.php";

session_start();

$error = array();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    
   
    if (count($error) == 0) { 
      
      if ($_FILES["image"]["size"]!= 0) {
          $file = $_FILES["image"];
          $type = exif_imagetype($file["tmp_name"]);
          $allowedExt = array(IMAGETYPE_PNG => 'png', IMAGETYPE_JPEG => 'jpg', IMAGETYPE_GIF => 'gif');
          if (isset($allowedExt[$type])) {
              if ($file["error"] === 0) {
                  if ($file["size"] < 7000000) {
                      $fileNameNew = uniqid('', true).".".$allowedExt[$type];
                      $fileDestination = "nas/".$fileNameNew;
                      move_uploaded_file($file["tmp_name"], $fileDestination);
                  } else {
                      $error[] = "L'immagine non deve avere dimensioni maggiori di 7MB";
                  }
              } else {
                  $error[] = "Errore nel carimento del file";
              }
          } else {
              $error[] = "I formati consentiti sono .png, .jpeg, .jpg e .gif";
          }
      }else{
          echo "Non hai caricato nessuna immagine";
      }
  }
  

      # REGISTRAZIONE NEL DATABASE
      if (count($error) == 0) {
        $conn=connessione();
        $email = mysqli_real_escape_string($conn, $_SESSION['email']);
        $Titolo=mysqli_real_escape_string($conn,$_POST['titolo']);
        $Descrizione=mysqli_real_escape_string($conn,$_POST['descrizione']);
        
         //echo"i dati inseriti sono  :".$email.$fileDestination.$Titolo.$Descrizione;
         
         $query = "INSERT INTO Post (Email, FileDestinazione, Titolo, Descrizione) VALUES ('$email', '$fileDestination', '$Titolo', '$Descrizione')";
        // echo"i dati inseriti sono:".$email.$Titolo.$Descrizione." la wuer y      ".$query ;
          if (mysqli_query($conn, $query)or die('Query failed: ' . mysql_error())) {
              
              mysqli_close($conn);
              header("Location: home.php");
            
              die;
          } else {
            
              $error[] = "Errore di connessione al Database";
          }
      }
      echo $error;

      mysqli_close($conn);
    }


?>

<!-- --------------------------HTML-------------------------- -->
<!DOCTYPE html>
<html lang="it">
<head>
    <script src="AddPost.js" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Home.css">
    <title>Home</title>
    
</head>
<body>
<div class="upload">
<h1 class="Title">Aggiungi Post</h1>
  <form action="AddPost.php" id="postForm" class="uploadForm" enctype="multipart/form-data" method="post">
    <label for="uname" ><h2>Titolo</h2></label>
    <input type="text" name="titolo" id="titleInput" placeholder="Titolo">
    <label for="uname" ><h2>Descrizione</h2></label>
    <textarea id="Descrizione" placeholder="Descrizione" rows="4" name="descrizione"></textarea>
    <input type="file" name="image" accept='.jpg, .jpeg, image/gif, image/png' id="imageInput">
    

    <h2>Anteprima Immagine</h2>
    <img id="previewImage" src="#" alt="Anteprima">
    <button type="submit"><img src="img/up.png"></button>
    <?php if(isset($error)) {
                    foreach($error as $err) {
                        echo "<div class='errorj'><img src='./assets/close.svg'/><span>".$err."</span></div>";
                    }
                } ?>
  </form>

  
  </div>
<img src="img/menu.png" id="menuIcon">

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




