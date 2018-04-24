<?php 
    session_start();
    include "Conexao.php";
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
        function verificaInputNome(){
            var input = document.getElementById('cNome');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioNome'] ?>";
                }
        }
        
        function verificaInputEmail(){
            var input = document.getElementById('cEmail');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioEmail'] ?>";
                }
        }

        function verificaInputSenha(){
            var input = document.getElementById('cSenha');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioSenha'] ?>";
                }
        }
         //VALIDAÇÃO DOS CAMPOS
        function valida(){
            var nome = formCad.tNome.value;
            var senha = document.getElementById('cSenha');
            var email = document.getElementById('cEmail');

            if(nome == ""){
                alert('Preencha o campo Nome!');
                formCad.tNome.focus();
                return false;
            }else{
                if(senha.value.length<8){
                    alert('A senha deve conter no mínimo 8 caracteres!');
                    formCad.tSenha.focus();
                    return false;
                }else{
                    if(email.value == ""){
                    alert('Preencha o campo do E-Mail!');
                    formCad.tEmail.focus();
                    return false;
                    }else{
                        alert('Faça login novamente para validar as alterações');
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
    
        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Gerencia.php"> Home </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#Noticias" onclick="loadProibeNoticias()"> Notícias </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" onclick="loadProibeEmails()"> E-mails </a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="" > Conta </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav>         
        </div>    
    
        <br><br><br>
    <div class="row">
        <form method="post" name="formCad" action="Modificar-Conta.php" class="col s12">
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
                <input type="text" value="<?php  echo $_SESSION['usuarioId'] ?>" name="tId" id="cId" hidden/>
               <tr>
                <td><b>Nome: </b></td>
                <td><?php  echo $_SESSION['usuarioNome'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['usuarioNome'] ?>" name="tNome" id="cNome" maxlength="60" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNome" id="cModNome" onclick="verificaInputNome()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td><b>E-mail: </b></td>
                <td><?php  echo $_SESSION['usuarioEmail'] ?><input class="active validate" type="text" name="tEmail" id="cEmail" maxlength="100" value="<?php  echo $_SESSION['usuarioEmail'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModEmail" id="cModEmail" onclick="verificaInputEmail()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td><b>Senha: </b></td>
                <td><?php  echo $_SESSION['usuarioSenha'] ?><input class="active validate" type="text" name="tSenha" id="cSenha" maxlength="15" value="<?php  echo $_SESSION['usuarioSenha'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSenha" id="cModSenha" onclick="verificaInputSenha()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              
            </tbody>
          </table>
          <br><br>
           <div class="center"> 
           <button class="btn waves-effect waves-light light-blue darken-3" id="btnMod" type="submit" onclick="valida()"> Alterar
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
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
            });
        </script>   
        
</body>
</html>