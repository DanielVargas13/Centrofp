<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tEmail']))&& (isset($_POST['tSenha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['tEmail']);//TIRA CARACTERES ESPECIAIS
        $senha = mysqli_real_escape_string($conn,$_POST['tSenha']);
        $cargo = mysqli_real_escape_string($conn,$_POST['tICargo']);
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        if($cargo == "Gerencia"){
            $tabela = "gerente";
        }else if($cargo == "Comercial"){
            $tabela = "comercial";
        }else if($cargo == "Professor"){
            $tabela = "professores";
        }else if($cargo == "Recepcao"){
            $tabela = "recepcao";
        }
        
        $sql = "SELECT * FROM $tabela WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(empty($resultado)){
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
        }else if(isset($resultado)){
             $_SESSION['usuarioId'] = $resultado['id'];
            $_SESSION['usuarioNome'] = $resultado['nome'];
            $_SESSION['usuarioFoto'] = $resultado['foto'];
            $_SESSION['usuarioEmail'] = $resultado['email'];
            $_SESSION['usuarioSenha'] = $resultado['senha'];
            if($cargo == "Aluno"){
                header("Location: Alunos.php");
            }else if($cargo == "Gerencia"){
                header("Location: Gerencia.php");
            }else if($cargo == "Comercial"){
                 header("Location: index.php");
            }else if($cargo == "Professor"){
                header("Location: Professores.php");
            }else if($cargo == "Recepcao"){
                 header("Location: Recepcionista.php");
            }
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location: index.php");
        }
        
    }else{
        $_SESSION['LoginErro'] = "Usuário ou Senha Inválido!";
        header("Location: index.php");
    }
?>
