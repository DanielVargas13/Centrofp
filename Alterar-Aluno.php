<?php 
    session_start();
    include "Conexao.php";
                
    //INICIALIZANDO AS VARIÁVEIS
    $turma_bruto = isset($_POST['tTurma'])? $_POST['tTurma']:'';
    list($curso,$turno,$unidade) = explode(" - ",$turma_bruto);
    $curso_b = mysqli_query($conn, "SELECT id FROM cursos WHERE nome='$curso'");
    $curso_id = mysqli_fetch_assoc($curso_b);
    $id = $curso_id['id'];
    $turma_b = mysqli_query($conn, "SELECT id FROM turmas WHERE curso_id='$id' AND turno='$turno' AND unidadeensino='$unidade'");
    $turma = mysqli_fetch_assoc($turma_b);
    $turma_id = $turma['id'];

    $id = isset($_POST['tId'])? $_POST['tId']: '';
    $nome = isset($_POST['tNome'])? $_POST['tNome']: '';
    $mat = isset($_POST['tMat'])? $_POST['tMat']: '';
    $cpf = isset($_POST['tCPF']) ? $_POST['tCPF']: '';
    $rg = isset($_POST['tRG'])? $_POST['tRG']:'';
    $email = isset($_POST['tMail'])? $_POST['tMail']: '';
    $telFixo = isset($_POST['tFixo'])? $_POST['tFixo']:'';
    $telCel = isset($_POST['tCel'])? $_POST['tCel']:'';
    $bairro = isset($_POST['tBairro'])? $_POST['tBairro']: '';
    $rua = isset($_POST['tRua'])? $_POST['tRua']:'';
    $numero = isset($_POST['tNumero'])? $_POST['tNumero']:'';
    $sexo = isset($_POST['tSexo'])? $_POST['tSexo']: '';
    $nascimento = isset($_POST['tData'])? $_POST['tData']: '';
    $dataNas = new DateTime($nascimento);
    $idadeData = $dataNas->diff(new DateTime());
    $idade = $idadeData->y;
    $nomeR = isset($_POST['tNomeR'])? $_POST['tNomeR']: '';
    $telFixoR = isset($_POST['tFixoR'])? $_POST['tFixoR']:'';
    $telCelR = isset($_POST['tCelR'])? $_POST['tCelR']:'';
    $emailR = isset($_POST['tMailR'])? $_POST['tMailR']: '';
    $parentesco = isset($_POST['tPar'])? $_POST['tPar']:'';
    

    $query = "UPDATE alunos SET nome='$nome',matricula='$mat',cpf='$cpf',rg='$rg', email='$email', telFix='$telFixo', telCel='$telCel',bairro='$bairro',rua='$rua',numero='$numero', sexo='$sexo', nascimento='$nascimento',idade='$idade', nomeResp='$nomeR',fixoResp='$telFixoR',celResp='$telCelR',emailResp='$emailR',parentesco='$parentesco',turma_id='$turma_id' WHERE id='$id'";

    //VERIFICANDO SE OS DADOS FORAM INSERIDOS COM SUCESSO
    if($conn->query($query)=== TRUE){
       header("Location: Carrega-Aluno.php");
    }else{
        echo "Erro ao Inserir";
    }

    //ENCERRANDO A CONEXÃO
    $conn->close();
?>