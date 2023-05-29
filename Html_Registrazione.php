
<!DOCTYPE html>
<html>
<head>
  <title>Flight runs through your veins</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="hw1_Login_Registrazione.css">
<script src="Registrazione.js" defer></script>
</head>
<body>
 

<h2 class="Title">Flight runs through your veins</h2>
<div class="container">
    <form id="Registrazione" action="hw1_Registrazione.php" method="post" class="log">

  
    <label for="uname" ><b>Email</b></label>
    <input id="email" type="email" placeholder="Enter email" name='email' required>
    <label for="psw" id="emailerr"></label>
    <label for="psw"><b>Password</b></label>
    <input id="password" type="password" placeholder="Enter Password" name='password' required>
    <label for="psw" id="requisiti"></label>
    
    <label for="pswv"><b>Conferma Password</b></label>
    <input id="confpassword" type="password" placeholder="Enter Password" name='confpassword' required>
    <label for="psw" id="confrequisiti"></label>
    <label for="uname"><b>Nome</b></label>

    <input type="text" placeholder="Name" name='Nome' required>
    
    <label for="uname"><b>Cognome</b></label>
    <input type="text" placeholder="Cognome" name='Cognome' required>
        
        <label for="uname"><b>Telefono</b></label>
    <input type="text" placeholder="Telefono" name='Telefono' required>
    
    <button id="RegistrazioneButton" type="submit">Registrati</button>
    <label id="erroreRegistrazione"></label>
    </form>
    <form action="hw1_login.php" method="post" class="log">
      <button type="submit">login</button>
    </form>
</div>


</body>