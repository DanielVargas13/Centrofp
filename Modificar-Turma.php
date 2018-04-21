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
        function verificaInputCurso(){
            var input = document.getElementById('cCurso');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['turmaCurso'] ?>";
                }
        }
        
        function verificaInputProfessor(){
            var input = document.getElementById('cProf');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['turmaProfessor'] ?>";
                }
        }
        function verificaInputHora(){
        var input = document.getElementById('cHoraIni');
             var input2 = document.getElementById('cHoraTer');
            if (input.hidden == true && input2.hidden == true){
                input.hidden = false;
                input2.hidden = false;
            }else{
                input.hidden = true;
                input.value = "<?php  echo $_SESSION['turmaHoraInicio']; ?>";
                input2.hidden = true;
                input2.value = "<?php  echo $_SESSION['turmaHoraFim'] ?>";
            }
        }
            function verificaInputData(){
        var input = document.getElementById('cDataIn');
             var input2 = document.getElementById('cDataTr');
            if (input.hidden == true && input2.hidden == true){
                input.hidden = false;
                input2.hidden = false;
            }else{
                input.hidden = true;
                input.value = "<?php  echo $_SESSION['turmaDataInicio']; ?>";
                input2.hidden = true;
                input2.value = "<?php  echo $_SESSION['turmaDataFim'] ?>";
            }
        }
             function verificaInputUnidade(){
            var input = document.getElementById('cUnidade');
            var input2 = document.getElementById('cIUnidade');	
                if (input.disabled == true){
             $(input).prop("disabled",false);
              $('select').material_select();
                }else{
                    $(input).prop("disabled",true);
                    $('select').material_select();
                    input2.value = "<?php  echo $_SESSION['turmaUnidade'] ?>";
                }
        }
        
        function verificaInputAlunos(){
            alert('Não é possível modificar o número de Alunos!');
            return false;
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
        <form method="post" name="formCad" action="Alterar-Turma.php" class="col s12">
            <div id="resultado" class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
            <div class="card-panel z-depth-5">
                <table class="bordered highlight">
                    <thead>
                        <tr>
                            <th> </th>
                            <th> Informações </th>
                            <th> Editar </th>
                        </tr>
                    </thead>
                    <tbody>
                        <input type="text" value="<?php  echo $_SESSION['turmaId'] ?>" name="tId" id="cId" hidden/>
                        <tr>
                            <td><b>Curso: </b></td>
                            <td><?php  echo $_SESSION['turmaCurso'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['turmaCurso'] ?>" name="tCurso" id="cCurso" maxlength="70" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCurso" id="cModCurso" onclick="verificaInputCurso()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Professor: </b></td>
                            <td><?php  echo $_SESSION['turmaProfessor'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['turmaProfessor'] ?>" name="tProf" id="cProf" maxlength="70" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModProf" id="cModProf" onclick="verificaInputProfessor()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Dias da Semana: </b></td>
                            <td><?php if($_SESSION['turmaSegunda'] == 1){echo "Segunda-Feira; ";} if($_SESSION['turmaTerca'] == 1){echo "Terça-Feira; ";} if($_SESSION['turmaQuarta'] == 1){echo "Quarta-Feira; ";} if($_SESSION['turmaQuinta'] == 1){echo "Quinta-Feira; ";} if($_SESSION['turmaSexta'] == 1){echo "Sexta-Feira; ";} if($_SESSION['turmaSabado'] == 1){echo "Sábado. ";}   ?><input class="active validate" type="text" value="<?php  echo $_SESSION['turmaSegunda'], $_SESSION['turmaTerca'],$_SESSION['turmaQuarta'], $_SESSION['turmaQuinta'], $_SESSION['turmaSexta'],$_SESSION['turmaSabado'] ?>" name="tSemana" id="cSemana" maxlength="70" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSemana" id="cModSemana" onclick="verificaInputSemana()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Horario: </b></td>
                            <td><?php  echo "Inicio: "; echo $_SESSION['turmaHoraInicio']; echo "   ---   Termino: "; echo $_SESSION['turmaHoraFim'] ?><input class="center" type="time" value="<?php  echo $_SESSION['turmaHoraInicio'] ?>" name="tHoraIni" id="cHoraIni" hidden><input class="center" type="time" value="<?php  echo $_SESSION['turmaHoraFim'] ?>" name="tHoraTer" id="cHoraTer" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModHora" id="cModHora" onclick="verificaInputHora()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Duração: </b></td>
                            <td><?php  echo "Inicio: "; echo date('d/m/Y', strtotime($_SESSION['turmaDataInicio']));  echo "   ---   Termino: "; echo date('d/m/Y', strtotime($_SESSION['turmaDataFim']))  ?><input class="center" type="date" name="tDataIn" id="cDataIn" value="<?php  echo $_SESSION['turmaDataInicio'] ?>"  min="2018-01-01" hidden><input class="center" type="date" name="tDataTr" id="cDataTr"  value="<?php  echo $_SESSION['turmaDataFim'] ?>"  min="2018-01-02" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModData" id="cModData" onclick="verificaInputData()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Unidade: </b></td>
                            <td><?php  echo $_SESSION['turmaUnidade'] ?><select name="tUnidade"  id="cUnidade" disabled>
                                            <option value="" disabled selected> Selecione a Unidade de Ensino </option>
                                            <option value="Dom Camilo" > Dom Camilo </option>
                                            <option value="Felipe Claudio de Sales" > Felipe Cláudio </option>
                                      </select><input type="hidden" value="<?php  echo $_SESSION['turmaUnidade'] ?>" name="tIUnidade" id="cIUnidade" /> </td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModUnidade" id="cModUnidade" onclick="verificaInputUnidade()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
                        </tr>
                        <tr>
                            <td><b>Número de Alunos: </b></td>
                            <td><?php  echo $_SESSION['turmaQtdAlunos'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['turmaQtdAlunos'] ?>" name="tAlunos" id="cAlunos" maxlength="70" hidden></td>
                            <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModAlunos" id="cModAlunos" onclick="verificaInputAlunos()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
                        </tr>
                    </tbody>
                </table>   
          <br><br>
           <div class="center"> 
           <a href="Pesquisar-Turma.php">
                <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Voltar
                    <i class="material-icons right"> send </i>    
                </button>&nbsp;&nbsp;&nbsp;  
                </a>
           <button class="btn waves-effect waves-light light-blue darken-3" id="btnMod" type="submit" onclick="verificaCampos()"> Alterar
                                    <i class="material-icons right"> edit </i>    
                                </button> 
            </div>
            </div>
            </div>
        </form>  
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
        
    </body>
</html>