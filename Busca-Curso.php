<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tNome']))){
        $nome = mysqli_real_escape_string($conn, $_POST['tNome']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM cursos WHERE descricao = '$nome' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $_SESSION['usuarioIdCur'] = $resultado['id'];
            $_SESSION['usuarioCursoCur'] = $resultado['descricao'];
            $_SESSION['usuarioProfCur'] = $resultado['prof'];
            $_SESSION['usuarioTurnoCur'] = $resultado['turno'];
            $_SESSION['usuarioSegCur'] = $resultado['segunda'];
            $_SESSION['usuarioTerCur'] = $resultado['terca'];
            $_SESSION['usuarioQuaCur'] = $resultado['quarta'];
            $_SESSION['usuarioQuiCur'] = $resultado['quinta'];
            $_SESSION['usuarioSexCur'] = $resultado['sexta'];
            $_SESSION['usuarioSabCur'] = $resultado['sabado'];
            $_SESSION['usuarioHoraIniCur'] = $resultado['horainicio'];
            $_SESSION['usuarioHoraTerCur'] = $resultado['horafim'];
            $_SESSION['usuarioUnidadeCur'] = $resultado['unidadeEnsino'];
            header("Location: Pesquisar-Curso.php");
        }else{
            $_SESSION['loginErro'] = "Curso Inexistente Inexistente";
            header("Location: Pesquisar-Curso.php");
        }
    }
?>