<?php 
    session_start();
    include "Conexao.php";
    
    //INICIALIZANDO AS VARIÁVEIS
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $matricula = isset($_POST['tMatricula'])? $_POST['tMatricula']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';  
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';  
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $senha = isset($_POST['tSenha'])? $_POST['tSenha']: '';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $bairro = isset($_POST['tBairro'])? $_POST['tBairro']:'';
    $rua = isset($_POST['tRua'])? $_POST['tRua']:'';
    $numero = isset($_POST['tNumero'])? $_POST['tNumero']:'';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $foto = $sexo.".png";
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $dataNas = new DateTime($nascimento);
    $idadeData = $dataNas->diff(new DateTime());
    $idade = $idadeData->y;
    $turma = isset($_POST['tTurma'])? $_POST['tTurma']:'';
    $nomeResp = isset($_POST['tNomeResp'])? $_POST['tNomeResp']:'';
    $telFixoResp = isset($_POST['tFixoResp'])? $_POST['tFixoResp']:'';
    $telCelResp = isset($_POST['tCelResp'])? $_POST['tCelResp']:'';
    $emailResp = isset($_POST['tMailResp'])? $_POST['tMailResp']: '';
    $parentesco = isset($_POST['tParentesco'])? $_POST['tParentesco']: '';
    
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "INSERT INTO alunos(nome, matricula, cpf, rg, email, senha, telFix, telCel, bairro, rua, numero, sexo, foto, nascimento, idade, turma, nomeResp, fixoResp, celResp, emailResp, parentesco) VALUES('$nome', '$matricula', '$cpf', '$rg', '$email', '$senha', '$telFixo', '$telCel', '$bairro', '$rua', '$numero', '$sexo', '$foto', '$nascimento', '$idade', '$turma', '$nomeResp', '$telFixoResp', '$telCelResp', '$emailResp', '$parentesco')";
    echo $query;
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Cadastro-Alunos.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>

