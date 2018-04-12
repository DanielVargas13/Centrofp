<?php 
    session_start();
    include "Conexao.php";
    $id = intval($_GET['id']);
    $sql_banco = mysqli_query($conn, "SELECT * FROM noticias WHERE id='$id' LIMIT 1");
    $r = mysqli_fetch_assoc($sql_banco);
?>
<!DOCTYPE html>

<html>
    <head>
        
        <title>Atuailzar Notícia</title>
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
    <body class="grey lighten-4">
        
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
            <div class="col s10 m6 16 container center z-depth-5 offset-s1 offset-m3">
                <div class="card-panel z-depth-5 ">
                    <h2 class="center"> Atualizar Notícia </h2>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Alterar-Noticia.php" enctype="multipart/form-data">
                             <input type="text" value="<?php  echo $id ?>" name="tId" id="cId" hidden/>
                             <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> account_box </i>
                            <label for="cTitulo">Titulo: </label><input class="active validate" value="<?php echo $r["titulo"]; ?>" type="text" name="tTitulo" id="cTitulo" maxlength="50" placeholder="Titulo da notícia" pattern="[A-Za-z\s]+$" required>
                        </div>
                    </div>         
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> message </i>
                            <textarea id="cDescricao" name="tDescricao" class="materialize-textarea active validate" placeholder="Mensagem a ser Enviada" maxlength="500" required><?php echo $r["descricao"]; ?></textarea>
                            <label for="cMensagem"> Mensagem </label>
                        </div>
                    </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn waves-effect waves-light light-blue darken-3">
                                        <span> Foto </span>
                                        <input type="file" name="arquivo" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="center">
                                           <a href="Gerencia.php">
                                    <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Voltar
                                        <i class="material-icons right"> send </i>    
                                    </button>  </a> &nbsp;&nbsp;
                                    <button class="btn waves-effect waves-light light-blue darken-3" type="submit" onclick=""> Alterar
                                        <i class="material-icons right"> send </i>    
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
      
   
        
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="js/materialize.min.js"></script>
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
            });
        </script> 
        
</body>
</html>
