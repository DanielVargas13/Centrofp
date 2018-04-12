<?php 
    session_start();    
     $_SESSION['usuarioIdCur'] = null;
    $_SESSION['usuarioCursoCur'] = null;
    $_SESSION['usuarioProfCur'] = null;
    $_SESSION['usuarioTurnoCur'] = null;
    $_SESSION['usuarioSegCur'] = null;
    $_SESSION['usuarioTerCur'] = null;
    $_SESSION['usuarioQuaCur'] = null;
    $_SESSION['usuarioQuiCur'] = null;
    $_SESSION['usuarioSexCur'] = null;
    $_SESSION['usuarioSabCur'] = null;
    $_SESSION['usuarioHoraIniCur'] = null;
    $_SESSION['usuarioHoraTerCur'] = null;
    $_SESSION['usuarioUnidadeCur'] = null;
    header("Location: Pesquisar-Curso.php");
    
?>