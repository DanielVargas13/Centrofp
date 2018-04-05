<?php 
    session_start();    
    $_SESSION['usuarioNomeFunc'] = null;
    $_SESSION['usuarioCPFFunc'] =  null;
    $_SESSION['usuarioRgFunc'] =  null;
    $_SESSION['usuarioTelFFunc'] =  null;
    $_SESSION['usuarioTelCFunc'] =  null;
    $_SESSION['usuarioEmailFunc'] =  null;
    $_SESSION['usuarioSexoFunc'] =  null;
    $_SESSION['usuarioDataNFunc'] =  null;
    $_SESSION['usuarioFuncaoFunc'] =  null;
    $_SESSION['usuarioCursoFunc'] =  null;
    $_SESSION['usuarioUnidadeFunc'] =  null;
    header("Location: Pesquisar-Funcionario.php");
    
?>