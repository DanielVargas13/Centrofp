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
        
    //PEGANDO IMAGEM DO FORMULÁRIO E COLOCANDO EM UM DIRETÓRIO
     if(isset($_FILES['arquivo'])){
        $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));//PEGA O TIPO DO ARQUIVO DO NOME COMO POR EXEMPLO .JPG OU .PNG
        $novo_nome = md5(time()).$extensao;//NOME CRIPTOGRAFADO
        $diretorio = "Img_Noticias/";            
        move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$novo_nome);            
    }
                
    //INICIALIZANDO AS VARIÁVEIS
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $titulo = isset($_POST['tTitulo'])? $_POST['tTitulo']: '';
    $descricao = isset($_POST['tDescricao']) ? $_POST['tDescricao']: '';
    
     //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "UPDATE noticias SET titulo='$titulo',descricao='$descricao',data=NOW(),imagem='$novo_nome' WHERE id='$id'";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Gerencia.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>