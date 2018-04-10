<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tEmail']))&& (isset($_POST['tSenha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['tEmail']);//TIRA CARACTERES ESPECIAIS
        $senha = mysqli_real_escape_string($conn,$_POST['tSenha']);
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM gerente WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(empty($resultado)){
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
        }else if(isset($resultado)){
            $_SESSION['usuarioNome'] = $resultado['nome'];
            header("Location: Gerencia.php");
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
        }
        
    }else{
        $_SESSION['LoginErro'] = "Usuário ou Senha Inválido!";
        header("Location: index.php");
    }
?>
