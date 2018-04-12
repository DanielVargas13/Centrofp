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
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $nome = isset($_POST['tCurso'])? $_POST['tCurso']: '';
    $prof = isset($_POST['tProf']) ? $_POST['tProf']: '';
    $turno = isset($_POST['tTurno'])? $_POST['tTurno']:'';
    $segunda = isset($_POST['tSeg'])? $_POST['tSeg']:'';
    $terca = isset($_POST['tTer'])? $_POST['tTer']:'';
    $quarta = isset($_POST['tQua'])? $_POST['tQua']: '';
    $quinta = isset($_POST['tQui'])? $_POST['tQui']: '';
    $sexta = isset($_POST['tSex'])? $_POST['tSex']: '';
    $sabado = isset($_POST['tSab'])? $_POST['tSab']: '';
    $horai = isset($_POST['start0'])? $_POST['start0']:'';
    $horaf = isset($_POST['end0'])? $_POST['end0']:'';
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';
    
                
    //ENVIANDO A QUERY PARA O BANCO DE DADOS
    $query = "UPDATE cursos SET descricao='$nome',prof='$prof',turno='$turno', segunda='$segunda', terca='$terca', quarta='$quarta', quinta='$quinta', sexta='$sexta', sabado='$sabado', horainicio='$horai', horafim='$horaf', unidadeEnsino='$unidadeEnsino' WHERE id='$id'";
    
    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conexao->query($query)=== TRUE){
        header("Location: Carrega-Curso.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conexao->close();
?>