<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS
    $id = intval($_GET['id']);
    
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "DELETE FROM professores WHERE id='$id'";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Desligar-Funcionario.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>