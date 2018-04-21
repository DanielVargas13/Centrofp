<?php 
    //CONECTANDO COM O BANCO DE DADOS
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "cfp";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);
    if($conexao ->connect_error){
        echo "Erro na conexão";
    }else{
        echo "Conectado com sucesso";
    }
                
    //INICIALIZANDO AS VARIÁVEIS
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $descricao = isset($_POST['tDescricao']) ? $_POST['tDescricao']: '';
    $duracao = isset($_POST['tDuracao'])? $_POST['tDuracao']: '';

    
    //ENVIANDO A QUERY DO CURSO PARA O BANCO DE DADOS
    $query = "INSERT INTO cursos(nome, descricao, duracao) VALUES('$nome','$descricao','$duracao')";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Cadastro-Curso.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>
