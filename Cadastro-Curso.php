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
        
        <script>
            
            //VALIDA CAMPOS DO FORMULÁRIO
            function valida(){               
                var nome = formCad.tNome.value;
                var descricao = formCad.tDescricao.value;
                var duracao = formCad.tDuracao.value;
                
                if(nome == ""){
                    alert('Preencha o nome do curso!');
                    formCad.tNome.focus();
                    return false;                    
                }else {
                    if(descricao == ""){
                        alert('Digite uma descrição do curso!');
                        formCad.tDescricao.focus();
                        return false;    
                    }else {
                        if(duracao == ""){
                            alert('Digite a duração do curso!');
                            formCad.tDuracao.focus();
                            return false;
                        }
                    }
                }
            }
            
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
        
        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Gerencia.php"> Home </a></li>                       
                        <li><a class="waves-effect waves-light modal-trigger" href="#Noticias" onclick="loadProibeNoticias()"> Notícias </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" onclick="loadProibeEmails()"> E-mails </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="Alterar-Conta.php" > Conta </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav> 
        </div>
    
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
                                <li><a class="waves-effect" href="Desligar-Curso.php">  Remover Curso </a></li>  
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>

            <li><div class="divider"></div></li>
            
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Turmas <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Cadastro-Turma.php"> Cadastro de Turma </a></li> 
                                <li><a class="waves-effect" href="Carrega-Turma.php"> Pesquisa de Turma </a></li>

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
        
        <br><br><br>
        
        <div class="row">
            <div class="col s10 m6 16 container center z-depth-5 offset-s1 offset-m3">
                <div class="card-panel z-depth-5 ">
                    <h2 class="center"> Cadastrar Curso </h2>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Inserir-Curso.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> library_books </i>
                                    <label for="cNome">Nome: </label><input class="active validate" type="text" name="tNome" id="cNome" maxlength="70" placeholder="Nome do Curso"  required>
                                </div>
                            </div>                    
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> assignment </i>
                                    <textarea id="cDescricao" name="tDescricao" class="materialize-textarea active validate" placeholder="Descrição do Curso" required></textarea>
                                    <label for="textarea1"> Descrição </label>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> timelapse </i>
                                    <label for="cDuracao">Duração: </label><input class="active validate" type="text" name="tDuracao" id="cDuracao" maxlength="20" placeholder="Tempo de duração do curso"  required>
                                </div>
                            </div>                             
                            <div class="row">
                                <div class="center"> 
                                    <a href="Gerencia.php">
                                    <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Home
                                        <i class="material-icons right"> send </i>    
                                    </button>&nbsp;&nbsp;&nbsp;  
                                    <button class="btn waves-effect waves-light light-blue darken-3" type="submit" onclick="return valida()"> Cadastrar
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
          
        
        <!-- MODALS -->
        <script>
            $(document).ready(function(){
                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
                $('.modal').modal();
             });       
        </script>  
        <script>   
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            }); 
        </script>
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
            });
        </script>
        
        <!-- INICIALIZA BTN-FLOATING-->
        <script>
            var elem = document.querySelector('.fixed-action-btn');
            var instance = M.FloatingActionButton.init(elem, {
              direction: 'left',
              hoverEnabled: false
            });     
        </script>
        
    </body>
</html>
