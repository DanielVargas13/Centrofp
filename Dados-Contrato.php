<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
        $id = intval($_GET['id']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM alunos WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row_resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $_SESSION['turmaId'] = $resultado['id'];
            $_SESSION['nomeAluno'] = $resultado['nome'];
            $_SESSION['matriculaAluno'] = $resultado['matricula'];
            $_SESSION['cpfAluno'] = $resultado['cpf'];
            $_SESSION['rgAluno'] = $resultado['rg'];
            $_SESSION['emailAluno'] = $resultado['email'];
            $_SESSION['senhaAluno'] = $resultado['senha'];
            $_SESSION['telFixAluno'] = $resultado['telFix'];
            $_SESSION['telCelAluno'] = $resultado['telCel'];
            $_SESSION['bairroAluno'] = $resultado['bairro'];
            $_SESSION['ruaAluno'] = $resultado['rua'];
            $_SESSION['numeroAluno'] = $resultado['numero'];
            $_SESSION['sexoAluno'] = $resultado['sexo'];
            $_SESSION['nascimentoAluno'] = $resultado['nascimento'];
            $_SESSION['idadeAluno'] = $resultado['idade'];
            $_SESSION['turmaAluno'] = $resultado['turma'];
            $_SESSION['nomeRespAluno'] = $resultado['nomeResp'];
            $_SESSION['fixoRespAluno'] = $resultado['fixoResp'];
            $_SESSION['celRespAluno'] = $resultado['celResp'];
            $_SESSION['emailRespAluno'] = $resultado['emailResp'];       
            $_SESSION['parentescoAluno'] = $resultado['parentesco'];
            $_SESSION['dataMatriculaAluno']= $resultado['dataMatricula'];
            header("Location: Gerar-Contrato.php");
        }else{
            $_SESSION['loginErro'] = "Contrato Inexistente!";
            header("Location: Gerar-Contrato.php");
        }
?>