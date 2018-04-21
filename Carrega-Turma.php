<?php 
    session_start();     
            $_SESSION['usuarioTur'] = null;
            $_SESSION['turmaId'] = null;
            $_SESSION['turmaCurso'] = null;
            $_SESSION['turmaProfessor'] = null;
            $_SESSION['turmaTurno'] = null;
            $_SESSION['turmaSegunda'] = null;
            $_SESSION['turmaTerca'] = null;
            $_SESSION['turmaQuarta'] = null;
            $_SESSION['turmaQuinta'] = null;
            $_SESSION['turmaSexta'] = null;
            $_SESSION['turmaSabado'] = null;
            $_SESSION['turmaHoraInicio'] = null;
            $_SESSION['turmaHoraFim'] = null;
            $_SESSION['turmaDataInicio'] = null;
            $_SESSION['turmaDataFim'] = null;
            $_SESSION['turmaQtdAlunos'] = null;
            $_SESSION['turmaUnidade'] = null;
    header("Location: Pesquisar-Turma.php");
?>