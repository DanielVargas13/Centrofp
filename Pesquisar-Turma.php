<?php 
    session_start();
    include "Conexao.php";
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
                        <img src="Imagens/fundo.jpg">
                    </div>
                    <a href="Gerencia.php"><img class="circle" src="Imagens/homens.png"></a>
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
                        <li><a class="waves-effect waves-light modal-trigger" href="#Noticias"> Notícias </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" > E-mails </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav>         
        </div>        
        
      <br><br><br>
    
        <div class="row">
            <div class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
                <div class="card-panel z-depth-5">
                    <h3 class="center"> Pesquisar Turmas </h3>
                    <div class="row">
                    <form method="post" action="Busca-Turma.php" class="col s12">
			<nav>
                            <div class="nav-wrapper">
				<div class="input-field grey lighten-1">
                                    <input id="search" name="tNome" type="search" placeholder="Digite o Nome do Curso" required> 
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label> 
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
			</nav><br><br>
                        <div class="center"> 
                            <a href="Gerencia.php">
                            <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Voltar
                                <i class="material-icons right"> send </i>    
                            </button>&nbsp;&nbsp;&nbsp;  
                            </a>
                            <button class="btn waves-effect waves-light light-blue darken-3" id="btnBusca" type="submit" onclick="MostraTabela()"> Pesquisar
                                <i class="material-icons right"> send </i>    
                            </button>   
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>    
           
           <br><br>
            <div class="row">
                <div class="col s10 m6 16 container center z-depth-5 offset-m3 offset-s1">
                <div class="card-panel z-depth-5 ">    

        <table class="bordered highlight">
            <thead>
                <tr>
                    <th> Curso </th>
                    <th> Professor </th>
                    <th> Turno </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($_SESSION['usuarioTur'] as &$l){ ?>
                <tr>
                    <td> <?php echo $l["curso"]; ?></td>
                    <td> <?php echo $l["prof"]; ?></td>
                    <td> <?php echo $l["turno"]; ?></td>
                   <td><a href="Seleciona-Turma.php?id=<?php echo $l["id"]; ?>"> <button class='btn-floating waves-effect waves-light light-blue darken-3' type='button' onclick=''>
                        <i class='material-icons right'> edit </i>    
            </button></a></td>
                </tr>
                <?php }?>
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