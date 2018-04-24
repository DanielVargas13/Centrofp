<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $resultCurso = mysqli_query($conn, "SELECT id FROM cursos WHERE nome='$nome'");
    $curso_bruto = mysqli_fetch_assoc($resultCurso);
    $curso_id = $curso_bruto['id'];
    $sql_banco = mysqli_query($conn, "SELECT * FROM turmas WHERE curso_id = '$curso_id'");
    $_SESSION['usuarioTur'] = $sql_banco->fetch_all(MYSQLI_ASSOC);
    header("Location: Pesquisar-Turma.php");
?>