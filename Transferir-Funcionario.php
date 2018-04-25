<?php 
    session_start();
    include "Conexao.php";
    
    //INICIALIZANDO AS VARIÁVEIS
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';
    $senha = $_SESSION['usuarioSenhaFunc']; 
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $foto = $sexo.".png";
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $cargo = isset($_POST['tITrabalho'])? $_POST['tITrabalho']:'';
    $unidade = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
    
    $uni_b = mysqli_query($conn, "SELECT id FROM unidades WHERE bairro='$unidade'");
    $uni_id = mysqli_fetch_assoc($uni_b);
    $unidade_id = $uni_id['id'];

    if($cargo == "Comercial"){
        $tabela = "comercial";
    }else if($cargo == "Professor"){
        $tabela = "professores";
    }else if($cargo == "Recepcao"){
        $tabela = "recepcao";
    } 
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "INSERT INTO $tabela(nome, cpf, senha, rg, telcel, telfix, email, sexo, foto, data_nasc, cargo, unidade_id) VALUES('$nome', '$cpf', '$senha', '$rg', '$telCel', '$telFixo', '$email', '$sexo', '$foto', '$nascimento', '$cargo', '$unidade_id')";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        if($_SESSION['usuarioFuncaoFunc']== "Comercial"){
            $tabelaAntiga = "comercial";
        }else if($_SESSION['usuarioFuncaoFunc'] == "Professor"){
            $tabelaAntiga = "professores";
        }else if($_SESSION['usuarioFuncaoFunc'] == "Recepcao"){
            $tabelaAntiga = "recepcao";
        } 
        $query = "DELETE FROM $tabelaAntiga WHERE nome='$nome'";
        if($conn->query($query)=== TRUE){
            header("Location: Carrega-Funcionario.php");
        }else{
            echo "Erro ao Inserir";
            var_dump($query + $conn);
        }
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>