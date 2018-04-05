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
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';
    $senha = isset($_POST['tSenha'])? $_POST['tSenha']: '';
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $funcFuncionario = isset($_POST['tITrabalho'])? $_POST['tITrabalho']:'';
    $cursoFuncionario = isset($_POST['tICursos'])? $_POST['tICursos']:'';
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "INSERT INTO funcionarios(nome,cpf, senha,rg, tfixo, tcell, email, sexo, datanascimento, funcao, curso, unidade ) VALUES('$nome','$cpf','$senha','$rg','$telFixo','$telCel','$email','$sexo','$nascimento','$funcFuncionario','$cursoFuncionario','$unidadeEnsino')";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Cadastro-Funcionario.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>




