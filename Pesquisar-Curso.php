<?php 
    session_start();
    include "Conexao.php";
        $sql_banco = mysqli_query($conn, "SELECT * FROM cursos ORDER BY nome");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Curso</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">

        <!--Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.css">
        <!-- Import Google Icon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
                rel="stylesheet">
    <script>
        function verificaInputCurso(){
            var input = document.getElementById('cCurso');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['cursoNome'] ?>";
                }
        }
        
        function verificaInputDescricao(){
            var input = document.getElementById('cDescricao');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['cursoDescricao'] ?>";
                }
        }

        function verificaInputDuracao(){
            var input = document.getElementById('cDuracao');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['cursoDuracao'] ?>";
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
                                <li><a class="waves-effect" href="####">  Remover Turma </a></li>  

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
            <div class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
                <div class="card-panel z-depth-5">
                    <h3 class="center"> Pesquisar Curso </h3>
                    <div class="row">
                    <form method="post" action="Busca-Curso.php" class="col s12">
			<nav>
                            <div class="nav-wrapper">
				<div class="input-field grey lighten-1">
                                    <input id="search" name="tNome" type="search" placeholder="Digite o Nome do Curso" autocomplete="off" required> 
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
        <form method="post" name="formCad" action="Alterar-Curso.php" class="col s12">
            <div id="resultado" class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
            <div class="card-panel z-depth-5">
                    <table class="bordered striped">
        <thead>
          <tr>
              <th></th>
              <th> Informações </th>
              <th> Editar </th>
          </tr>
        </thead>                        
            <tbody>
                <input type="text" value="<?php  echo $_SESSION['cursoId'] ?>" name="tId" id="cId" hidden/>
               <tr>
                <td><b>Nome do Curso: </b></td>
                <td><?php  echo $_SESSION['cursoNome'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['cursoNome'] ?>" name="tCurso" id="cCurso" maxlength="70" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCurso" id="cModCurso" onclick="verificaInputCurso()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td><b>Descrição do Curso: </b></td>
                <td><?php  echo $_SESSION['cursoDescricao'] ?><input class="active validate" type="text" name="tDescricao" id="cDescricao" maxlength="200" value="<?php  echo $_SESSION['cursoDescricao'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModDescricao" id="cModDescricao" onclick="verificaInputDescricao()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td><b>Duração do Curso: </b></td>
                <td><?php  echo $_SESSION['cursoDuracao'] ?><input class="active validate" type="text" name="tDuracao" id="cDuracao" maxlength="50" value="<?php  echo $_SESSION['cursoDuracao'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModDuracao" id="cModDuracao" onclick="verificaInputDuracao()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              
            </tbody>
          </table>
          <br><br>
           <div class="center"> 
           <button class="btn waves-effect waves-light light-blue darken-3" id="btnMod" type="submit" onclick="verificaCampos()"> Alterar
                                    <i class="material-icons right"> edit </i>    
                                </button> 
            </div>
            </div>
            </div>
        </form>  
        </div>
        
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

	<!-- Jquery -->
	<script type="text/javascript"
		src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- Materialize JS -->
	<script src="js/materialize.js"></script>
	<script>
            $(document).ready(function() {
              $('select').material_select();
            });
        </script>
                
        <!-- INICIALIZA OS HIDDEN DOS SELECTS -->
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $('#cUnidade').on('change', function() {
                $('#cIUnidade').val($('#cUnidade').val());
                });
            });
        </script>
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
            });
        </script>   
        
        <!-- AUTOCOMPLETE NOME DO CURSO-->
        <script>
            $(document).ready(function(){
              $('#search').autocomplete({
                data: {
                    <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                        "<?php echo $l["nome"]; ?>": null,
                    <?php } ?>
                },
              });
            });      
        </script>
        
</body>
</html>