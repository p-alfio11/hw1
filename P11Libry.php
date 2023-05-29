<?php
$errore=array();
$errore;
include "ConnessioneDB.php";
session_start();
function validazionemail($email)
{
    
    $conn=connessione();
    $email=mysqli_real_escape_string($conn,$email);
    $comandoSQL ="select * from Utenti where Email='".$email."'";
    $risultato = mysqli_query($conn,$comandoSQL);

    if(mysqli_num_rows($risultato) > 0){
       return true;
    }else {
        return false;
    }
    mysqli_close($conn);
    
    
}


    if (isset($_GET["funzione"])) 
    {
            $dati=array();
            $dati=validazionemail($_GET["email"]);
            $json=json_encode($dati);
            echo json_encode($json);      
        die;
    }   
    if(isset($_POST["Nome"])&&isset($_POST["Cognome"])&&isset($_POST["Telefono"])&&isset($_POST["email"])&&isset($_POST["password"])){
        $conn=connessione();
        $email =mysqli_real_escape_string($conn,$_POST['email']);
        $psw =mysqli_real_escape_string($conn,$_POST['password']);
        $pswCrypt = password_hash($psw, PASSWORD_BCRYPT);
        $confpsw= mysqli_real_escape_string($conn,$_POST['confpassword']);
        $nome= mysqli_real_escape_string($conn,$_POST['Nome']);
        $cognome=mysqli_real_escape_string($conn,$_POST['Cognome']);
        $telefono=mysqli_real_escape_string($conn,$_POST['Telefono']);
        $sqlinserimento= "INSERT INTO Utenti VALUES ('$email','$pswCrypt','$nome','$cognome','$telefono')";
        if($psw===$confpsw && !validazionemail($email)){
            mysqli_query($conn,$sqlinserimento)or die('Query failed: ' . mysql_error()); 
            $_SESSION['email']=$email;
            $errore=0;
        }else{
            $errore=1;
        }
        echo json_encode($errore);
        mysqli_close($conn);
        die;
    }

?>
