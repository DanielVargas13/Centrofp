<?php 
    session_start();
    include "Conexao.php";
    $sql_banco = mysqli_query($conn, "SELECT * FROM cursos ORDER BY nome");
    $sql_banco_prof = mysqli_query($conn, "SELECT * FROM professores ORDER BY nome");
?>
<!DOCTYPE html>

<html>
    <head>
        
        <title> Cadastro de Turmas </title>
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
                var professor = formCad.tProf.value;
                var unidade = document.getElementById('cUnidade');
                var curso = formCad.tCurso.value;
                
                if(curso == ""){
                    alert('Preencha o nome do curso');
                    formCad.tCurso.focus();
                    return false;
                }else {
                    if(professor == ""){
                        alert('Preencha o nome do Professor!');
                        formCad.tProf.focus();
                        return false;
                    }else{
                        if(!validaRadioTurno()){
                            return false;
                        }else{
                            if(!validaDias()){
                                return false;
                            }else{
                                if(!validaHoras()){
                                    return false;
                                }else{
                                    if(!validaDatas()){
                                    return false;
                                }else{
                                    if(unidade.value == ""){
                                        alert('Selecione uma Unidade!');
                                        return false;
                                    }
                                }
                            }
                        }
                    }
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
            function validaDias(){
                var seg = document.getElementById('cSeg');
                var ter = document.getElementById('cTer');
                var qua = document.getElementById('cQua');
                var qui = document.getElementById('cQui');
                var sex = document.getElementById('cSex');
                var sab = document.getElementById('cSab');
                if(!seg.checked&&!ter.checked&&!qua.checked&&!qui.checked&&!sex.checked&&!sab.checked){
                     alert('Selecione pelo menos um dia da semana!');
                    return false;
                }
                return true;
            }
            function validaHoras(){
                var inicio = document.getElementById('cIni');
                var termino = document.getElementById('cFim');
                if(inicio.value == ""||termino.value == ""){
                     alert('Informe os horários de inicio e termino!');
                    return false;
                }
                return true;
            }
            function validaDatas(){
                var inicio = document.getElementById('cDataIn');
                var termino = document.getElementById('cDataTr');
                if(inicio.value == ""||termino.value == ""){
                     alert('Informe as datas de inicio e termino!');
                    return false;
                }
                return true;
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
                        <li><a class="waves-effect waves-light modal-trigger" href="Alterar-Conta.php" > Conta </a></li>
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
                    <h2 class="center"> Cadastrar Turma </h2>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Inserir-Turma.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> library_books </i>
                                    <label for="cCurso">Curso: </label><input class="active validate autocomplete" type="text" name="tCurso" id="cCurso" maxlength="70" placeholder="Nome do Curso" autocomplete="off" required>
                                </div>
                            </div>                    
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> assignment_ind </i>
                                    <label for="cProf">Professor: </label><input class="active validate autocomplete" type="text" name="tProf" id="cProf" value="" maxlength="50" pattern="[A-Za-z\s]+$" placeholder="Nome do Professor" autocomplete="off" required>
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
                                            <input name="tSeg" id="cSeg" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Seg", "unchecked_text": "Seg"}' type="checkbox" onClick = "verificaSeg()"/>	
                                            <input name="tTer" id="cTer" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Ter", "unchecked_text": "Ter"}' type="checkbox" onClick = "verificaTer()"/>	
                                            <input name="tQua" id="cQua" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Qua", "unchecked_text": "Qua"}' type="checkbox" onClick = "verificaQua()"/>	
                                            <input name="tQui" id="cQui" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Qui", "unchecked_text": "Qui"}' type="checkbox" onClick = "verificaQui()"/>	
                                            <input name="tSex" id="cSex" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Sex", "unchecked_text": "Sex"}' type="checkbox" onClick = "verificaSex()"/>	
                                            <input name="tSab" id="cSab" value="1" class="text-nicelabel" data-nicelabel='{"position_class": "text_checkbox", "checked_text": "Sab", "unchecked_text": "Sab"}' type="checkbox" onClick = "verificaSab()"/>	
                                        </div>   
                                    </fieldset>
                                </div>
                            </div>                             
                            <div class="row"> 
                                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                    <table id="days" class="table table-hover">
                                        <thead>
                                            <tr><th class="center">Hora Início</th><th class="center">Hora Término</th></tr>
                                        </thead>
                                        <tbody>
                                            <td data-name="start"><input type="time" name="start0" id="cIni" class="center"></td><td data-name="end"><input type="time" name="end0" id="cFim" class="center"></td>
                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col s10 offset-s1 m10 offset-m1 l10 offset-l1">
                                    <table id="days" class="table table-hover">
                                        <thead>
                                            <tr><th class="center">Data de Início</th><th class="center">Data de Termino</th></tr>
                                        </thead>
                                        <tbody>
                                            <td data-name="start"><input class="center" type="date" name="tDataIn" id="cDataIn" min="2018-01-01" required></td><td data-name="end"><input class="center" type="date" name="tDataTr" id="cDataTr" min="2018-01-02" required></td>
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
                             <input type="hidden" name="tIUnidade" id="cIUnidade" />
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
                
        <!-- AUTOCOMPLETE NOME DO CURSO-->
        <script>
            $(document).ready(function(){
              $('#cCurso').autocomplete({
                data: {
                    <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                        "<?php echo $l["nome"]; ?>": null,
                    <?php } ?>
                },
              });
            });      
        </script>

        <!-- AUTOCOMPLETE NOME DO PROFESSOR-->
        <script>
            $(document).ready(function(){
              $('#cProf').autocomplete({
                data: {
                    <?php while($l = mysqli_fetch_array($sql_banco_prof)){ ?>
                        "<?php echo $l["nome"]; ?>": null,
                    <?php } ?>
                },
              });
            });      
        </script>        
        
</html>
