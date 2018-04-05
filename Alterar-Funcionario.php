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
    $cursoFuncionario = isset($_POST['tCursos'])? $_POST['tCursos']:'';
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
    
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "UPDATE funcionarios SET nome='$nome',cpf='$cpf',rg='$rg', tfixo='$telFixo', tcell='$telCel', email='$email', sexo='$sexo', datanascimento='$nascimento', funcao='$funcFuncionario', curso='$cursoFuncionario', unidade='$unidadeEnsino' WHERE id='$id'";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Carrega-Funcionario.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>