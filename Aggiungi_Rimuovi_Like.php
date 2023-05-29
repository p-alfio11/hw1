<?php 
include "ConnessioneDB.php";
session_start();

        
        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            
            if(isset($_GET["id"])){
                $conn=connessione();
                $id=mysqli_real_escape_string($conn,$_GET["id"]);
                $email=mysqli_real_escape_string($conn,$_SESSION['email']);
                
                $query="SELECT * FROM Piace WHERE Email='".$email."' AND id='".$id."'";
                $risultato=mysqli_query($conn, $query)or die('Query failed: ' . mysql_error());
                if(mysqli_num_rows($risultato)>0){
                    $query="DELETE FROM Piace WHERE Email='" . $email . "' AND id='" . $id . "'";;
                }else{
                    $query="INSERT INTO Piace VALUES('$email','$id')";
                }
            
                mysqli_query($conn, $query)or die('Query failed: ' . mysql_error());
                echo json_encode(true);
                mysqli_close($conn);
            }   
        }
?>
