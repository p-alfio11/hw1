<?php 
function connessione()
{
    $conn=mysqli_connect("localhost","root");
   mysqli_select_db($conn,"hw1") or die ("impossibile trovare il data base");
    return $conn;
}
?>
