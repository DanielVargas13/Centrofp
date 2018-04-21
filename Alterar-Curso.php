<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");  
    
    //INICIALIZANDO AS VARIÁVEIS
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $curso = isset($_POST['tCurso'])? $_POST['tCurso']: '';
    $descricao = isset($_POST['tDescricao']) ? $_POST['tDescricao']: '';
    $duracao = isset($_POST['tDuracao'])? $_POST['tDuracao']:'';   
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "UPDATE cursos SET nome='$curso', descricao='$descricao', duracao='$duracao' WHERE id='$id'";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Carrega-Curso.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>