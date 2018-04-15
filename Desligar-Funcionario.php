<?php 
    session_start();
    include "Conexao.php";
    $sql_banco = mysqli_query($conn, "SELECT * FROM professores UNION ALL SELECT * FROM comercial UNION ALL SELECT * FROM recepcao ORDER BY nome");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerência - Home</title>
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
            
        //Proibe Noticias
        function loadProibeNoticias(){
            alert('Vá para a tela inicial para postar uma Notícia!');
            return false;
        }
        
        //Proibe E-mails
        function loadProibeEmails(){
            alert('Vá para a tela inicial para enviar um E-mail!');
            return false;
        }        
        
        </script>
        
    </head>
    <body class="grey lighten-2">

        <?php 
            $sql_pegadados = mysqli_query($conn, "SELECT * FROM gerente");
            while($ln = mysqli_fetch_array($sql_pegadados)){
                $nome = $ln['nome'];
            }
        ?>
        
        <ul id="slide-out" class="side-nav">           
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="Img_Prog/Fundo.jpg">
                    </div>
                    <a href="Gerencia.php"><img class="circle" src="Img_Prog/Masculino.png"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       
            
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Funcionários <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Cadastro-Funcionario.php"> Cadastro de Funcionários </a></li> 
                                <li><a class="waves-effect" href="Carrega-Funcionario.php"> Pesquisar Funcionário </a></li>
                                <li><a class="waves-effect" href="Desligar-Funcionario.php"> Desligar Funcionário </a></li>                                  
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            
            <li><div class="divider"></div></li>
            
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Cursos <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Cadastro-Curso.php"> Cadastro de Curso </a></li> 
                                <li><a class="waves-effect" href="Carrega-Curso.php"> Pesquisa de Curso </a></li>
                                <li><a class="waves-effect" href="Desligar-Curso.php"> Desligar Funcionário </a></li>  
                                <li><a class="waves-effect" href=""> Cadastro de Turma </a></li>
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            
            <li><div class="divider"></div></li>            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Relatórios </a>
                    </li>   
                </ul>
            </li> 
            <li><div class="divider"></div></li>            
        </ul>
        
        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Gerencia.php"> Home </a></li>                        
                        <li><a class="waves-effect waves-light modal-trigger" href="#Noticias" onclick="loadProibeNoticias()"> Notícias </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" onclick="loadProibeEmails()"> E-mails </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav>         
        </div>        
        
        <br><br><br>
            <div class="row">
                <div class="col s10 m6 16 container center z-depth-5 offset-m3 offset-s1">
                <div class="card-panel z-depth-5 ">    

        <table class="bordered highlight">
            <thead>
                <tr>
                    <th> Nome </th>
                    <th> Cargo </th>
                    <th> Desligar </th>
                </tr>
            </thead>
            <tbody>
            <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                <tr>
                    <td> <?php echo $l["nome"]; ?></td>
                     <td> <?php echo $l["cargo"]; ?></td>
                    <td><a href="javascript: if(confirm('Tem certeza que deseja desligar o funcionário <?php echo $l["nome"]; ?> ?')) location.href='Desliga-Funcionario.php?id=<?php echo $l["id"]; ?>&cargo=<?php echo $l["cargo"]; ?>';"> <button class='btn-floating waves-effect waves-light light-blue darken-3' type='button' onclick=''>
                        <i class='material-icons right'> close </i>    
            </button></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>   
        <br><br>
         <div class="center"> 
                      <a href="Gerencia.php">
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
