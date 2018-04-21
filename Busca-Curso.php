<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tNome']))){
        $nome = mysqli_real_escape_string($conn, $_POST['tNome']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM cursos WHERE nome = '$nome' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $_SESSION['cursoId'] = $resultado['id'];
            $_SESSION['cursoNome'] = $resultado['nome'];
            $_SESSION['cursoDescricao'] = $resultado['descricao'];
            $_SESSION['cursoDuracao'] = $resultado['duracao'];
            header("Location: Pesquisar-Curso.php");
        }else{
            $_SESSION['loginErro'] = "Curso Inexistente!";
            header("Location: Pesquisar-Curso.php");
        }
    }
?>