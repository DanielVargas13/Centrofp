<?php 
    session_start();//INICIA A SESSÃO
    include_once("Conexao.php");
    
        $id = intval($_GET['id']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM turmas WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        $curso_id = $resultado['curso_id'];
        $prof_id = $resultado['professor_id'];
        $resultCurso = mysqli_query($conn, "SELECT nome FROM cursos WHERE id='$curso_id'");
        $resultProf = mysqli_query($conn, "SELECT nome FROM professores WHERE id='$prof_id'");
        $curso_bruto = mysqli_fetch_assoc($resultCurso);
        $prof_bruto = mysqli_fetch_assoc($resultProf);
        
        if(isset($resultado)){
            $_SESSION['turmaId'] = $resultado['id'];
            $_SESSION['turmaCurso'] = $curso_bruto['nome'];
            $_SESSION['turmaProfessor'] = $prof_bruto['nome'];
            $_SESSION['turmaTurno'] = $resultado['turno'];
            $_SESSION['turmaSegunda'] = $resultado['segunda'];
            $_SESSION['turmaTerca'] = $resultado['terca'];
            $_SESSION['turmaQuarta'] = $resultado['quarta'];
            $_SESSION['turmaQuinta'] = $resultado['quinta'];
            $_SESSION['turmaSexta'] = $resultado['sexta'];
            $_SESSION['turmaSabado'] = $resultado['sabado'];
            $_SESSION['turmaHoraInicio'] = $resultado['horainicio'];
            $_SESSION['turmaHoraFim'] = $resultado['horafim'];
            $_SESSION['turmaDataInicio'] = $resultado['dataini'];
            $_SESSION['turmaDataFim'] = $resultado['datafim'];
            $_SESSION['turmaQtdAlunos'] = $resultado['nalunos'];
            $_SESSION['turmaUnidade'] = $resultado['unidadeensino'];
            header("Location: Modificar-Turma.php");
        }else{
            $_SESSION['loginErro'] = "Turma Inexistente!";
            header("Location: Modificar-Turma.php");
        }
?>


<!--



    if((isset($_POST['tNome']))){
        $nome = mysqli_real_escape_string($conn, $_POST['tNome']);//TIRA CARACTERES ESPECIAIS
        //$senha = md5($senha);//CRIPTOGRAFA A SENHA
        
        $sql = "SELECT * FROM cursos WHERE descricao = '$nome' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $resultado = mysqli_fetch_assoc($result);
        
        if(isset($resultado)){
            $_SESSION['usuarioIdCur'] = $resultado['id'];
            $_SESSION['usuarioCursoCur'] = $resultado['descricao'];
            $_SESSION['usuarioProfCur'] = $resultado['prof'];
            $_SESSION['usuarioTurnoCur'] = $resultado['turno'];
            $_SESSION['usuarioSegCur'] = $resultado['segunda'];
            $_SESSION['usuarioTerCur'] = $resultado['terca'];
            $_SESSION['usuarioQuaCur'] = $resultado['quarta'];
            $_SESSION['usuarioQuiCur'] = $resultado['quinta'];
            $_SESSION['usuarioSexCur'] = $resultado['sexta'];
            $_SESSION['usuarioSabCur'] = $resultado['sabado'];
            $_SESSION['usuarioHoraIniCur'] = $resultado['horainicio'];
            $_SESSION['usuarioHoraTerCur'] = $resultado['horafim'];
            $_SESSION['usuarioUnidadeCur'] = $resultado['unidadeEnsino'];
            header("Location: Pesquisar-Curso.php");
        }else{
            $_SESSION['loginErro'] = "Curso Inexistente Inexistente";
            header("Location: Pesquisar-Curso.php");
        }
    }


-->