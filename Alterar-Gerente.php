<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $email = isset($_POST['tEmail']) ? $_POST['tEmail']: '';
    $senha = isset($_POST['tSenha'])? $_POST['tSenha']:'';


    $query = "UPDATE gerente SET nome='$nome', email='$email', senha='$senha' WHERE id='$id'";

    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Alterar-Conta.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>