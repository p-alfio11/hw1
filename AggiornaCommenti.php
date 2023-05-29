<?php

session_start();

include "ConnessioneDB.php";
$error = array();
$arrayDiarray=array();
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET["id"])){
        $conn=connessione();
      
        $id=mysqli_real_escape_string($conn,$_GET["id"]);
        $query="SELECT * FROM Commenti WHERE id='".$id."' ORDER BY Data";
        $risultato = mysqli_query($conn, $query);
        if ($risultato->num_rows > 0) {
            // Scorrere i risultati
          
            while ($row = $risultato->fetch_assoc()) {
                // Utilizzare i dati della riga corrente
                
                $commento = $row["Commento"];
                $Data=$row["Data"];
                $email=$row["Email"];
                $campo=array(
                    "commento"=> $commento,
                    "data"=>$Data,
                    "email"=>$email
                );
                $arrayDiarray[]=$campo;
                
            }
            
            
        }else{
            $error[]="Nessun risultato trovato.";
            echo json_encode($error);
            mysqli_close($conn);
            
        } 
        mysqli_close($conn);
        echo json_encode($arrayDiarray);
 }
    
}
?>