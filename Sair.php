<?php 
    session_start();
    session_destroy();
    
    unset(
        $_SESSION['usuarioNome']
    );
    
    header("Location: Index.php");
    
?>