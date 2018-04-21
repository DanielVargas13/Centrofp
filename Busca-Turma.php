<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $sql_banco = mysqli_query($conn, "SELECT * FROM turmas WHERE curso = '$nome'");
    $_SESSION['usuarioTur'] = $sql_banco->fetch_all(MYSQLI_ASSOC);
    header("Location: Pesquisar-Turma.php");
?>