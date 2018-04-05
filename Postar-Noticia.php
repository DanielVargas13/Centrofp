<?php 
    //CONECTANDO COM O BANCO DE DADOS
    $servidor = "centrofpserv.mysql.database.azure.com";
    $usuario = "cfpadmin@centrofpserv";
    $senha = "914161Tis";
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
        $diretorio = "Imagens/";            
        move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$novo_nome);            
    }
                
    //INICIALIZANDO AS VARIÁVEIS
    $titulo = isset($_POST['tTitulo'])? $_POST['tTitulo']: '';
    $descricao = isset($_POST['tDescricao']) ? $_POST['tDescricao']: '';
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "INSERT INTO noticias(titulo,descricao,imagem,data) VALUES('$titulo','$descricao','$novo_nome', NOW())";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Gerencia.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>




