<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
    if((isset($_POST['tBusca']))){
        $nome = mysqli_real_escape_string($conn, $_POST['tBusca']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM alunos WHERE nome = '$nome' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $id = $resultado['turma_id'];
            $turma_b = mysqli_query($conn, "SELECT curso_id,turno,unidade_id FROM turmas WHERE id='$id'");
            $turma = mysqli_fetch_assoc($turma_b);
            $idc = $turma['curso_id'];
            $idt = $turma['unidade_id'];
            
            $curso_b = mysqli_query($conn, "SELECT nome FROM cursos WHERE id='$idc'");
            $curso = mysqli_fetch_assoc($curso_b);
            $uni_b = mysqli_query($conn, "SELECT bairro FROM cursos WHERE id='$idt'");
            $unidade = mysqli_fetch_assoc($unidade_b);

            
            $_SESSION['usuarioIdAlu'] = $resultado['id'];
            $_SESSION['usuarioNomeAlu'] = $resultado['nome'];
            $_SESSION['usuarioMatAlu'] = $resultado['matricula'];
            $_SESSION['usuarioCPFAlu'] = $resultado['cpf'];
            $_SESSION['usuarioRgAlu'] = $resultado['rg'];
            $_SESSION['usuarioEmailAlu'] = $resultado['email'];
            $_SESSION['usuarioTelFAlu'] = $resultado['telFix'];
            $_SESSION['usuarioTelCAlu'] = $resultado['telCel'];
            $_SESSION['usuarioBairroAlu'] = $resultado['bairro'];
            $_SESSION['usuarioRuaAlu'] = $resultado['rua'];
            $_SESSION['usuarioNumAlu'] = $resultado['numero'];
            $_SESSION['usuarioSexoAlu'] = $resultado['sexo'];
            $_SESSION['usuarioDataNAlu'] = $resultado['nascimento'];
            $_SESSION['usuarioIdadeAlu'] = $resultado['idade'];
            $_SESSION['usuarioTurAlu'] = $curso['nome']." - ".$turma['turno']." - ".$unidade['bairro'];
            $_SESSION['usuarioNomeRAlu'] = $resultado['nomeResp'];
            $_SESSION['usuarioTelFRAlu'] = $resultado['fixoResp'];
            $_SESSION['usuarioTelCRAlu'] = $resultado['celResp'];
            $_SESSION['usuarioEmailRAlu'] = $resultado['emailResp'];
            $_SESSION['usuarioParRAlu'] = $resultado['parentesco'];
            $_SESSION['usuarioDataMAlu'] = $resultado['dataMatricula'];
            header("Location: Pesquisar-Aluno.php");
        }else{
            $_SESSION['loginErro'] = "Funcionário Inexistente";
            header("Location: Pesquisar-Aluno.php");
        }
    }
?>