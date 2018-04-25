<?php	
    session_start();
    include_once("Conexao.php");

    //REFERENCIA O DOMPDF COM NAMESPACE
    use Dompdf\Dompdf;

    //INCLUDE AUTOLOADER
    require_once("dompdf/autoload.inc.php");
    

    //CRIA A INSTANCIA
    $dompdf = new DOMPDF();
    
    $id = intval($_GET['id']);//TIRA CARACTERES ESPECIAIS
    //$senha = md5($senha);//CRIPTOGRAFA A SENHA

    $sql = "SELECT * FROM alunos WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row_resultado = mysqli_fetch_assoc($result);
    
    //INICIALIZANDO VARIÁVEIS DO ALUNO
    $name = $row_resultado['nome'];
    $matricula = $row_resultado['matricula'];
    $dataAtual = date('d/m/y');
    //PEGANDO ID DA TURMA QUE O ALUNO ESTÁ
    $idTurma = $row_resultado['turma_id'];
    
    //CHAMANDO DADOS DA TURMA PELO ID
    $sql = "SELECT * FROM turmas WHERE id = '$idTurma'";
    $resp = mysqli_query($conn, $sql);
    $row_result = mysqli_fetch_assoc($resp);
    
    $turno = $row_result['turno'];
    $segunda = $row_result['segunda'];
    $terca = $row_result['terca'];
    $quarta = $row_result['quarta'];
    $quinta = $row_result['quinta'];
    $sexta = $row_result['sexta'];
    $sabado = $row_result['sabado'];
    $hora = $row_result['horainicio'];
    $fim = $row_result['datafim'];
    $curso = $row_result['curso_id'];


    if($segunda == 1){
        $s = "Segunda-Feira,";
    }else{
        $s = "";
    }
    if($terca == 1){
        $t = "Terça-Feira,";
    }else{
        $t = "";
    }
    if($quarta == 1){
        $qua = "Quarta-Feira,";
    }else{
        $qua = "";
    }
    if($quinta == 1){
        $qui = "Quinta-Feira,";
    }else{
        $qui = "";
    }
    if($sexta == 1){
        $sex = "Sexta-Feira,";
    }else{
        $sex = "";
    }
    if($sabado == 1){
        $sab = "Sábado.";
    }else{
        $sab = "";
    }
    
    //CHAMANDO DADOS DA CURSO PELO ID
    $sql = "SELECT * FROM cursos WHERE id = '$curso'";
    $res = mysqli_query($conn, $sql);
    $row_resul = mysqli_fetch_assoc($res);  
    
    $cursoNome = $row_resul['nome'];
    
    //CARREGA O HTML
    $dompdf->load_html("


        <style>
            img{
                max-width:200px;
                max-height:150px;
                width: auto;
                height: auto; 
            }
        </style>
      
        <div align='center'><img src='Img_Prog/Logo.jpg'></div>
        
        <h2 style='text-align: center;'> Declaração </h2>
                    
        <p align='justify'> &nbsp;&nbsp;&nbsp; Declaramos para os fins que se fizerem necessários que ". $name ." está devidamente matriculada ao Centro de Formação Profissional sob á matricula de nº ". $matricula .", formalizada junto à instituição em DATA DA MATRICULA.</p>
         
        <p align='justify'> &nbsp;&nbsp;&nbsp;  Sendo cursado o módulo de ".$cursoNome." no turno ".$turno." nos dias de ".$s." ".$t." ".$qua." ".$qui." ".$sex." ".$sab." a partir das ".$hora.", com data de programação para termino em ".date_format(new DateTime($fim),'d/m/Y').".</p>
        
        <p align='center'> Sem mais a declarar corroboramos os termos descritos acima.</p><br><br>
        
        <p align='center'> Pedro Leopoldo ". $dataAtual ."  </p><br><br>
        
        <p align='center'> ________________________________________________ </p>
        </p>
    ");

    //RENDERIZA O HTML
    $dompdf->render();

    //EXIBE A PÁGINA
    $dompdf->stream(
            "Declaração.pdf", 
            array(
                    "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
?>