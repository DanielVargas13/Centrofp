<?php 
    session_start();
    include "Conexao.php";
    $sql_banco = mysqli_query($conn, "SELECT * FROM alunos ORDER BY nome");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerar Contrato</title>
        <meta charset="UTF-8">
        <meta name="discription" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
        
        <script>

       //Proibe E-mails
            function loadProibeEmails(){
                alert('Vá para a tela inicial para enviar um E-mail!');
                return false;
            }

        </script>
        
    </head>
    <body class="grey lighten-2">

        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Recepcionista.php"> Home </a></li>                       
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" onclick="loadProibeEmails()"> E-mails </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav> 
        </div>

        <br><br><br>
               
        <ul id="slide-out" class="side-nav">           
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="Img_Prog/Fundo.jpg">
                    </div>
                    <a href="Recepcionista.php"><img class="circle" src="Img_Prog/<?php  echo $_SESSION['usuarioFoto'] ?>"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Alunos <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Cadastro-Alunos.php"> Cadastro de Alunos </a></li> 
                                <li><a class="waves-effect" href=""> Pesquisar Aluno </a></li>
                                <li><a class="waves-effect" href=""> Desligar Aluno </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>   
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Documentos <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Gerar Contrato para Alunos </a></li>
                                <li><a class="waves-effect" href="Declaracao-Aluno.php"> Gerar Declaração para Alunos </a></li>                               
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            
            <li><div class="divider"></div></li>
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Horários de Aula <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Informática </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>    
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Financeiro <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Registrar Vendas Mensais </a></li> 
                                <li><a class="waves-effect" href=""> Registrar Pagamento </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>          
            <li><div class="divider"></div></li> 
             <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Relatórios <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Dados da matrícula </a></li> 
                                <li><a class="waves-effect" href=""> Vencimentos de parcela </a></li>
                                <li><a class="waves-effect" href=""> Alunos inadimplentes </a></li>                                  
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li> 
        </ul>  
        
        <br><br><br>
            <div class="row">
                <div class="col s10 m6 16 container center z-depth-5 offset-m3 offset-s1">
                <div class="card-panel z-depth-5 ">    

        <table class="bordered highlight">
            <thead>
                <tr>
                   <th>Nº de Matricula</th>
                    <th> Nome </th>
                    <th> Gerar Contrato </th>
                </tr>
            </thead>
            <tbody>
            <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                <tr>
                   <td> <?php echo $l["matricula"]; ?></td>
                    <td> <?php echo $l["nome"]; ?></td>
                    <td><a href="Gerar-Declaracao.php?id=<?php echo $l["id"]; ?>" target="_blank"> <button class='btn-floating waves-effect waves-light green darken-3' type='button' onclick=''>
                        <i class='material-icons right'> border_color </i>    
                </button></a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>   
        <br><br>
         <div class="center"> 
                      <a href="Recepcionista.php">
                      <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Voltar
                          <i class="material-icons right"> send </i>    
                      </button>
                      </a>         
          </div>
            </div>
            </div>
            </div>
            <script
            src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

            <!-- Jquery -->
            <script type="text/javascript"
            accesskey=""src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <!-- Materialize JS -->
            <script src="js/materialize.js"></script>  
            
            <!-- SIDENAV-->
            <script>
                $(document).ready(function(){
                    $("#side").sideNav();
                });
            </script>  
        
    </body>
</html>