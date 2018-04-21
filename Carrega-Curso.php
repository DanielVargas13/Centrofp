<?php 
    session_start();    
    $_SESSION['cursoNome'] = null;
    $_SESSION['cursoDescricao'] = null;
    $_SESSION['cursoDuracao'] = null;
    header("Location: Pesquisar-Curso.php");
?>