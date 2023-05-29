<?php

include "P11Libry.php";
  $nl="<br />";
  //metodo di ricezione dati 
   session_start();
 if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
   
   
  if(isset($_POST['login']))
   {
    
    
       $conn = @mysqli_connect("localhost","root");
       //gestione dell'errore
       if(!$conn)
       {
        
          echo "Connessione al server fallita. Impossibile procedere. Contattare ...";
          die;
       // <a href="login.html">Riprova</a>
       }
       
       //2 selezionare il db con cui lavorare
       if ( @mysqli_select_db($conn, "hw1") )
       {       
        $email =  mysqli_real_escape_string($conn,$_POST['email']);
        $psw = mysqli_real_escape_string($conn,$_POST['password']);
        $comandoSQL ="SELECT `Pass` from `Utenti` WHERE Email ='".$email."'";
        $risultato = mysqli_query($conn, $comandoSQL);
        
         if ($risultato)
         {
          
           //3 elaborare il risultato
           if ($riga = mysqli_fetch_assoc($risultato) ) //trovato, confrontiamo psw
           {
              
              if(password_verify($psw, $riga['Pass']))
              {
              	$autenticato=true;
              	$_SESSION['email'] = $email;

              }
              else{
                
                $autenticato=false;
              }
           }
           else
           {
            
           	$autenticato = false;
           }
         
               
           //4 chiudere la/le connessione/i
           mysqli_close($conn);
  
         }
         else //fallita mysqli_query
         {
          echo "1".mysqli_sqlstate($conn ) . $nl;
          echo "2".mysqli_errno( $conn ) . $nl;
          echo "3".mysqli_error( $conn ) . $nl;            
          
         }
       }
       else //fallita mysqli_select_db ...
       {
          echo "1".mysqli_sqlstate( $conn ) . $nl;
          echo "2".mysqli_errno( $conn ) . $nl;
          echo "3".mysqli_error( $conn ) . $nl;
        
       }
    
   }
   else
    {
   
    }
	 }
      else
    {
   
   
    }
    
?>


<!DOCTYPE html>
<html>
<head>
  <title>Flight runs through your veins</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="hw1_Login_Registrazione.css">

</head>
<body>

  <h2 class="Title">Flight runs through your veins</h2>




<div class="container">
  <form action="hw1_login.php" method="post" class="log">
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
    <label style="color:red;">
    <?php if($autenticato){
      header("Location: Home.php");
      }
      if($autenticato==false && isset($autenticato)){
        echo"Email o password errati, ricontrollare";
      }?></label>
   
    <button type="submit" name="login">Login</button>
  </form>

    <form action="Html_Registrazione.php" method="post"class="log">
    <button type="submit">Registrazione</button>
    </form>
  
</div>
</body>
</html>
