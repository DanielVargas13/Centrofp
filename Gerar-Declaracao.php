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
    
    $name = $row_resultado['nome'];
    $matricula = $row_resultado['matricula'];
    
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
         
        <p align='justify'> &nbsp;&nbsp;&nbsp;  Sendo cursado o módulo de CURSO no turno TURNO toda DIAS DA SEMANA a partir das HORÁRIOS com data de programação para termino em DATA DE TÉRMINO DO CURSO no valor total de VALOR DO CURSO.</p>
        
        <p align='justify'> Sem mais a declarar corroboramos os termos descritos acima.</p><br><br>
        
        <p align='center'> Pedro Leopoldo DATA DE HOJE  </p><br><br>
        
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