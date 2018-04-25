<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $funcFuncionario = isset($_POST['tITrabalho'])? $_POST['tITrabalho']:'';
    $unidade = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
    
    $uni_b = mysqli_query($conn, "SELECT id FROM unidades WHERE bairro='$unidade'");
    $uni_id = mysqli_fetch_assoc($uni_b);
    $unidade_id = $uni_id['id'];
    
    if($funcFuncionario == "Comercial"){
        $tabela = "comercial";
    }else if($funcFuncionario == "Professor"){
        $tabela = "professores";
    }else if($funcFuncionario == "Recepcao"){
        $tabela = "recepcao";
    }  
    
   
    
    $query = "UPDATE $tabela SET nome='$nome',cpf='$cpf',rg='$rg', telfix='$telFixo', telcel='$telCel', email='$email', sexo='$sexo', data_nasc='$nascimento', cargo='$funcFuncionario', unidade_id='$unidade_id' WHERE id='$id'";

    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Carrega-Funcionario.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>