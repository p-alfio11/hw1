<?php 
include "ConnessioneDB.php";
session_start();

if($_SERVER['REQUEST_METHOD'] === 'GET'){
    
    if(isset($_GET["id"])){
        
        $conn=connessione();
        $id=mysqli_real_escape_string($conn,$_GET["id"]);
        $email=mysqli_real_escape_string($conn,$_SESSION['email']);
        
        $query="SELECT * FROM Preferiti WHERE Email='".$email."' AND id='".$id."'";
        
        $risultato=mysqli_query($conn, $query)or die('Query failed: ' . mysql_error());
        mysqli_close($conn);
        
        
        if($risultato){
            echo json_encode(mysqli_fetch_assoc($risultato));
            die;
            if(mysqli_num_rows($risultato)>0){
                echo json_encode(true);
                die;
            }else{
                echo json_encode(false);
                die;
            }
        }
    
    }
    echo json_encode("Errore mancono i dati");
    die;

}

?>