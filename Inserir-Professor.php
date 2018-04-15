<?php 
    session_start();
    include "Conexao.php";
    
    //INICIALIZANDO AS VARIÁVEIS
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';
    $senha = isset($_POST['tSenha'])? $_POST['tSenha']: '';
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $foto = $sexo.".png";
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $cargo = isset($_POST['tICargo'])? $_POST['tICargo']:'';
    $unidade = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "INSERT INTO professores(nome, cpf, senha, rg, telcel, telfix, email, sexo, foto, data_nasc, cargo, unidade) VALUES('$nome', '$cpf', '$senha', '$rg', '$telCel', '$telFixo', '$email', '$sexo', '$foto', '$nascimento', '$cargo', '$unidade')";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Cadastro-Funcionario.php");
    }else{
        echo "Erro ao Inserir";
        var_dump($query + $conn);
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>

