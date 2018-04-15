<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tNome']))){
        $nome = mysqli_real_escape_string($conn, $_POST['tNome']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM professores WHERE nome = '$nome' UNION ALL SELECT * FROM comercial WHERE nome = '$nome' UNION ALL SELECT * FROM recepcao WHERE nome = '$nome' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $_SESSION['usuarioIdFunc'] = $resultado['id'];
            $_SESSION['usuarioNomeFunc'] = $resultado['nome'];
            $_SESSION['usuarioCPFFunc'] = $resultado['cpf'];
            $_SESSION['usuarioSenhaFunc'] = $resultado['senha'];
            $_SESSION['usuarioRgFunc'] = $resultado['rg'];
            $_SESSION['usuarioTelFFunc'] = $resultado['telfix'];
            $_SESSION['usuarioTelCFunc'] = $resultado['telcel'];
            $_SESSION['usuarioEmailFunc'] = $resultado['email'];
            $_SESSION['usuarioSexoFunc'] = $resultado['sexo'];
            $_SESSION['usuarioDataNFunc'] = $resultado['data_nasc'];
            $_SESSION['usuarioFuncaoFunc'] = $resultado['cargo'];
            $_SESSION['usuarioUnidadeFunc'] = $resultado['unidade'];
            header("Location: Pesquisar-Funcionario.php");
        }else{
            $_SESSION['loginErro'] = "Funcionário Inexistente";
            header("Location: Pesquisar-Funcionario.php");
        }
    }
?>