<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS
    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $curso = isset($_POST['tCurso'])? $_POST['tCurso']: '';
    $prof = isset($_POST['tProf']) ? $_POST['tProf']: '';
    $horaini = isset($_POST['tHoraIni'])? $_POST['tHoraIni']:'';
    $horater = isset($_POST['tHoraTer'])? $_POST['tHoraTer']:'';
    $dataini = isset($_POST['tDataIn'])? $_POST['tDataIn']:'';
    $datater = isset($_POST['tDataTr'])? $_POST['tDataTr']: '';
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';


    $query = "UPDATE turmas SET curso='$curso',prof='$prof',horainicio='$horaini', horafim='$horater', dataini='$dataini', datafim='$datater', unidadeEnsino='$unidadeEnsino' WHERE id='$id'";

    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Carrega-Turma.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>