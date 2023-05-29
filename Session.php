<?php 
function session()
{
    session_start();

    $tempoMin = 30;
    
    if (!isset($_SESSION['start_time'])) {
        
        $_SESSION['start_time'] = time();
      }

    if (isset($_SESSION['email'])) {
      
      if (time() - $_SESSION['start_time'] > ($tempoMin * 60)) {
        
        session_destroy();
        header("Location: hw1_login.php");
      }
    } else {
        header("Location: hw1_login.php");
    }
    
}
