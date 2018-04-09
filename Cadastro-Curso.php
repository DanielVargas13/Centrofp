<?php 
    session_start();
    include "Conexao.php";
    $sql_banco = mysqli_query($conn, "SELECT * FROM noticias LIMIT 5");
?>
<!DOCTYPE html>

<html>
    <head>
        
        <title> Cadastro de Cursos </title>
        <meta charset="UTF-8">
        <meta name="discription" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
         
        <!-- JQUERY CHECKBOX-->
        <link href="./nicelabel/css/jquery-nicelabel.css" rel="stylesheet" type="text/css" />
	<script src="./nicelabel/js/jquery.min.js"></script>
	<style>
            .clearfix{clear:both;}
            .rect-checkbox{float:left;margin-left:20px;}
            .rect-radio{float:left;margin-left:20px;}
            .circle-checkbox{float:left;margin-left:20px;}
            .circle-radio{float:left;margin-left:20px;}
            .text_checkbox{float:left;margin-left:20px;}
            .text_radio{float:left;margin-left:20px;}
	</style> 
        
        <script language="JavaScript">
            //VALIDA CAMPOS DO FORMULÁRIO
            function valida(){
                var curso = formCad.tCurso.value;
                var professor = formCad.tProf.value;
                var unidade = document.getElementById('cUnidade');
                
                if(curso == ""){
                    alert('Preencha o nome do Curso!');
                    formCad.tCurso.focus();
                    return false;
                }else{
                    if(professor == ""){
                        alert('Preencha o nome do Professor!');
                        formCad.tProf.focus();
                        return false;
                    }else{
                        if(!validaRadioTurno()){
                            return false;
                        }else{
                            
                        }
                }
            }
            
                 
            function validaRadioTurno(){
                if(document.formCad1.tTurno[0].checked == false && document.formCad1.tTurno[1].checked == false && document.formCad1.tTurno[2].checked == false){
                    alert('Selecione o Turno!');
                    return false;
                }
                return true;
            }

        </script>
        
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
                                <li><a class="waves-effect" href=""> Cadastro de Turma </a></li>
                                <li><a class="waves-effect" href=""> Pesquisa de Curso </a></li>  
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
                    <h2 class="center"> Cadastrar Curso </h2>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Inserir-Curso.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> library_books </i>
                                    <label for="cNome">Curso: </label><input class="active validate" type="text" name="tCurso" id="cCurso" maxlength="70" placeholder="Nome do Curso"  required>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> assignment_ind </i>
                                    <label>Professor: </label><input class="active validate" type="text" name="tProf" id="cProf" value="" maxlength="50" pattern="[A-Za-z\s]+$" placeholder="Nome do Professor" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 offset-s3 m8 offset-m2 l6 offset-l3">
                                    <fieldset id="turno"><legend> Turno </legend>
                                        <input type="radio" name="tTurno" id="cMan" value="Manha"><label for="cMan">Manhã</label>
                                        <input type="radio" name="tTurno" id="cTard" value="Tarde"><label for="cTard">Tarde</label>
                                        <input type="radio" name="tTurno" id="cNoit" value="Noite"><label for="cNoit">Noite</label>                                        
                                    </fieldset>
                                </div>
                            </div>

                            <div class="row"> 
                                <div class="col s10 offset-s1 m10 offset-m1 l6 offset-l3">
                                    <fieldset id="Dias"><legend> Dias da Semana </legend>
                                        <div id="text-checkbox">
                                            <input name="tSegnda" id="cSeg" value="Segunda-Feira" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Seg", "unchecked_text": "Seg"}' type="checkbox"/>	
                                            <input name="tTerca" id="cTer" value="Terça-Feira" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Ter", "unchecked_text": "Ter"}' type="checkbox"/>	
                                            <input name="tQauta" id="cQua" value="Quarta-Feira" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Qua", "unchecked_text": "Qua"}' type="checkbox"/>	
                                            <input name="tQuinta" id="cQui" value="Quinta-Feira" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Qui", "unchecked_text": "Qui"}' type="checkbox"/>	
                                            <input name="tSexta" id="cSex" value="Sexta-Feira" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Sex", "unchecked_text": "Sex"}' type="checkbox"/>	
                                            <input name="tSabado" id="cSab" value="Sábado" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Sab", "unchecked_text": "Sab"}' type="checkbox"/>	
                                        </div>   
                                    </fieldset>
                                </div>
                            </div>                             
                            <div class="row"> 
                                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                    <table id="days" class="table table-hover">
                                        <thead>
                                            <tr><th class="center">Hora Início</th><th class="center">Hora Término</th><th></th></tr>
                                        </thead>
                                        <tbody>
                                            <td data-name="start"><input type="time" name="start0" id="cIni" class="center"></td><td data-name="end"><input type="time" name="end0" id="cFim" class="center"></td>
                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                            <div class="row center">
                                <div class="input-field col s10 offset-s2">
                                   <div class="col s2">
                                        <i class="material-icons prefix left"> contacts </i>                             
                                   </div>
                                   <div class="col s6 m6">
                                    <select name="tUnidade" id="cUnidade">
                                        <option value="" disabled selected> Selecione a Unidade </option>                                        
                                        <option value="Felipe Claudio de Sales" > Felipe Cláudio </option>
                                        <option value="Lagoa" > Lagoa </option>
                                  </select>
                                    </div>                                   
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
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
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

        <!-- JQUERY CHECKBOX-->
	<script src="./nicelabel/js/jquery.nicelabel.js"></script>
	<script>
	$(function(){
            $('#rect-checkbox > input').nicelabel();
            $('#circle-checkbox > input').nicelabel();
            $('#text-checkbox > input').nicelabel();
	});
	</script>

</html>
