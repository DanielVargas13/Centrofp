<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tCPF']))&& (isset($_POST['tSenha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['tCPF']);//TIRA CARACTERES ESPECIAIS
        $senha = mysqli_real_escape_string($conn,$_POST['tSenha']);
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM funcionarios WHERE cpf = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(empty($resultado)){
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: Index.php");
        }else if(isset($resultado)){
            $_SESSION['usuarioNome'] = $resultado['nome'];
            header("Location: Professores.php");
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: Index.php");
        }
        
    }else{
        $_SESSION['LoginErro'] = "Usuário ou Senha Inválido!";
        header("Location: Index.php");
    }
?>