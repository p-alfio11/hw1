<?php
include "ConnessioneDB.php";

session_start();

$error = array();
if($_SERVER['REQUEST_METHOD'] === 'GET'){
if(isset($_GET["commento"])&&isset($_GET["id"])){

    $conn=connessione();
    $id=mysqli_real_escape_string($conn,$_GET["id"]);
    $commento=mysqli_real_escape_string($conn,$_GET["commento"]);
    $email=mysqli_real_escape_string($conn,$_SESSION['email']);
    $query="INSERT INTO Commenti(id, Commento, Email)VALUES('$id','$commento','$email')";
  
     mysqli_query($conn, $query)or die('Query failed: ' . mysql_error());
    
    mysqli_close($conn);

}
}
echo json_encode($error);

?>