<?php 
    session_start();     
            $_SESSION['usuarioIdAlu'] = null;
            $_SESSION['usuarioNomeAlu'] = null;
            $_SESSION['usuarioMatAlu'] = null;
            $_SESSION['usuarioCPFAlu'] = null;
            $_SESSION['usuarioRgAlu'] = null;
            $_SESSION['usuarioEmailAlu'] = null;
            $_SESSION['usuarioSenhaAlu'] = null;
            $_SESSION['usuarioTelFAlu'] = null;
            $_SESSION['usuarioTelCAlu'] = null;
            $_SESSION['usuarioBairroAlu'] = null;
            $_SESSION['usuarioRuaAlu'] = null;
            $_SESSION['usuarioNumAlu'] = null;
            $_SESSION['usuarioSexoAlu'] = null;
            $_SESSION['usuarioDataNAlu'] = null;
            $_SESSION['usuarioIdadeAlu'] = null;
            $_SESSION['usuarioTurAlu'] = null;
            $_SESSION['usuarioNomeRAlu'] = null;
            $_SESSION['usuarioTelFRAlu'] = null;
            $_SESSION['usuarioTelCRAlu'] = null;
            $_SESSION['usuarioEmailRAlu'] = null;
            $_SESSION['usuarioParRAlu'] = null;
    header("Location: Pesquisar-Aluno.php");
?>