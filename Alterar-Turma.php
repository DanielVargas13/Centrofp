<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS

    $curso = isset($_POST['tCurso'])? $_POST['tCurso']: '';
    $prof = isset($_POST['tProf']) ? $_POST['tProf']: '';
    $resultCurso = mysqli_query($conn, "SELECT id FROM cursos WHERE nome='$curso'");
    $resultProf = mysqli_query($conn, "SELECT id FROM professores WHERE nome='$prof'");
    $curso_bruto = mysqli_fetch_assoc($resultCurso);
    $prof_bruto = mysqli_fetch_assoc($resultProf);
    $curso_id = $curso_bruto['id'];
    $prof_id = $prof_bruto['id'];

    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $turno = isset($_POST['tTurno'])? $_POST['tTurno']:'';
    $horaini = isset($_POST['tHoraIni'])? $_POST['tHoraIni']:'';
    $horater = isset($_POST['tHoraTer'])? $_POST['tHoraTer']:'';
    $dataini = isset($_POST['tDataIn'])? $_POST['tDataIn']:'';
    $datater = isset($_POST['tDataTr'])? $_POST['tDataTr']: '';
    $unidadeEnsino = isset($_POST['tIUnidade'])? $_POST['tIUnidade']:'';


    $query = "UPDATE turmas SET turno='$turno', horainicio='$horaini', horafim='$horater', dataini='$dataini', datafim='$datater', unidadeensino='$unidadeEnsino',curso_id='$curso_id',professor_id='$prof_id' WHERE id='$id'";

    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
        header("Location: Carrega-Turma.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>