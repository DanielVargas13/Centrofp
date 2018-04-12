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
    $curso = isset($_POST['tCurso'])? $_POST['tCurso']: '';
    $prof = isset($_POST['tProf']) ? $_POST['tProf']: '';
    $turno = isset($_POST['tTurno'])? $_POST['tTurno']: '';
    $seg = isset($_POST['tSeg'])? $_POST['tSeg']: '';
    $ter = isset($_POST['tTer'])? $_POST['tTer']: '';
    $qua = isset($_POST['tQua'])? $_POST['tQua']: '';
    $qui = isset($_POST['tQui'])? $_POST['tQui']: '';
    $sex = isset($_POST['tSex'])? $_POST['tSex']: '';
    $sab = isset($_POST['tSab'])? $_POST['tSab']: '';
    $horaini = isset($_POST['start0'])? $_POST['start0']: '';    
    $horafim = isset($_POST['end0'])? $_POST['end0']: '';  
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
    
    //ENVIANDO A QUERY DO CURSO PARA O BANCO DE DADOS
    $query = "INSERT INTO cursos(descricao, prof, turno, segunda, terca, quarta, quinta, sexta, sabado, horainicio, horafim, unidadeEnsino,funcionario_id, gerente_id) VALUES('$curso','$prof','$turno','$seg','$ter','$qua','$qui','$sex','$sab','$horaini','$horafim','$unidadeEnsino',1,1)";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Cadastro-Curso.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>


