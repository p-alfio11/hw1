<?php 

include "Session.php";
    session();

include "ConnessioneDB.php";

$error = array();
$arrayDiarray=array();
$query="select * from Post";
$conn=connessione();
if($result=mysqli_query($conn,$query)){
  
    while($risultato=mysqli_fetch_assoc($result)){
        $imagePath = $risultato['FileDestinazione'];
        
        // Leggi il contenuto dell'immagine come stringa di byte
        $imageData = file_get_contents($imagePath);
        
        // Codifica i dati dell'immagine in Base64
        $base64Data = base64_encode($imageData);
        
        // Creazione di un array associativo contenente i dati dell'immagine
        $imageArray = array(
            "image" => $base64Data,
            "Utente" => $risultato['Email'],
            "Titolo" =>$risultato['Titolo'],
            "Descrizione"=>$risultato['Descrizione'],
            "id"=>$risultato["Id"]
        );

        $arrayDiarray[]=$imageArray;
    } 
    mysqli_close($conn);

    $jsonData = json_encode($arrayDiarray);
    echo $jsonData;
    die;
}else{
    $error[]="errore";
}



$jsonData = json_encode($error);
echo $jsonData;



?>