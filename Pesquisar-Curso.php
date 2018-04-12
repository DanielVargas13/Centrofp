<?php 
    session_start();
    include "Conexao.php";
$sql_banco = mysqli_query($conn, "SELECT * FROM noticias LIMIT 5");
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
                        input.value = "<?php  echo $_SESSION['usuarioCursoCur'] ?>";
                    }
             }
        function verificaInputProf(){
                var input = document.getElementById('cProf');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioProfCur'] ?>";
                    }
            }
        function verificaInputTurno(){
            var input = document.getElementById('cTurno');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioTurnoCur'] ?>";
                }
        }
        function verificaInputSeg(){
               var input = document.getElementById('divSeg');	
            var dia = document.getElementById('cSeg');
                   if (input.hidden == true){
                       input.hidden = false;
                       if(<?php  echo $_SESSION['usuarioSegCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioSegCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputTer(){
               var input = document.getElementById('divTer');	
            var dia = document.getElementById('cTer');
                   if (input.hidden == true){
                       input.hidden = false;
                       if(<?php  echo $_SESSION['usuarioTerCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioTerCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputQua(){
               var input = document.getElementById('divQua');
            var dia = document.getElementById('cQua');
                   if (input.hidden == true){
                       input.hidden = false;
                  if(<?php  echo $_SESSION['usuarioQuaCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioQuaCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputQui(){
               var input = document.getElementById('divQui');	
            var dia = document.getElementById('cQui');
                   if (input.hidden == true){
                       input.hidden = false;
                   if(<?php  echo $_SESSION['usuarioQuiCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioQuiCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputSex(){
               var input = document.getElementById('divSex');
            var dia = document.getElementById('cSex');
                   if (input.hidden == true){
                       input.hidden = false;
                   if(<?php  echo $_SESSION['usuarioSexCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioSexCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputSab(){
               var input = document.getElementById('divSab');	
                var dia = document.getElementById('cSab');
                   if (input.hidden == true){
                       input.hidden = false;
                   if(<?php  echo $_SESSION['usuarioSabCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }else{
                       input.hidden = true;
                       if(<?php  echo $_SESSION['usuarioSabCur'] ?>==1){
                           dia.checked = true;
                       }else{
                         dia.checked = false;  
                        }
                   }
        }
        function verificaInputHoraI(){
            var input = document.getElementById('cIni');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioHoraIniCur'] ?>";
                }
        }
         function verificaInputHoraT(){
            var input = document.getElementById('cFim');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioHoraTerCur'] ?>";
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
                    input2.value = "<?php  echo $_SESSION['usuarioUnidadeCur'] ?>";
                }
        }
        function verificaTurno(){
            var input = "<?php  echo $_SESSION['usuarioTurnoCur'] ?>";   
            if(document.formCad.tTurno[0].checked == false && document.formCad.tTurno[1].checked == false && document.formCad.tTurno[2].checked == false){
                        if (input=="Manha"){
                           document.formCad.tSexo[0].checked = true; 
                        }else{
                            if(input=="Tarde"){
                            document.formCad.tSexo[1].checked = true;
                        }else{
                            document.formCad.tSexo[2].checked = true;
                        }
                        }
                    }
                    return true;
        }    
        function verificaSeg(){
            var dia = document.getElementById('cSeg');
            var input = document.getElementById('divSeg');	
             if(<?php  echo $_SESSION['usuarioSegCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaTer(){
            var dia = document.getElementById('cTer');
            var input = document.getElementById('divTer');
             if(<?php  echo $_SESSION['usuarioTerCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaQua(){
            var dia = document.getElementById('cQua');
            var input = document.getElementById('divQua');
             if(<?php  echo $_SESSION['usuarioQuaCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaQui(){
            var dia = document.getElementById('cQui');
            var input = document.getElementById('divQui');
             if(<?php  echo $_SESSION['usuarioQuiCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaSex(){
            var dia = document.getElementById('cSex');
            var input = document.getElementById('divSex');
             if(<?php  echo $_SESSION['usuarioSexCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaSab(){
            var dia = document.getElementById('cSab');
            var input = document.getElementById('divSab');
             if(<?php  echo $_SESSION['usuarioSabCur'] ?>==1 && input.hidden==true){
                   dia.checked = true;
               }
        }
        function verificaCampos(){
            verificaSeg();
            verificaTer();
            verificaQua();
            verificaQui();
            verificaSex();
            verificaSab();
            verificaTurno();
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
                    <h3 class="center"> Pesquisar Curso </h3>
                    <div class="row">
                    <form method="post" action="Busca-Curso.php" class="col s12">
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
                <input type="text" value="<?php  echo $_SESSION['usuarioIdCur'] ?>" name="tId" id="cId" hidden/>
               <tr>
                <td>Curso</td>
                <td><?php  echo $_SESSION['usuarioCursoCur'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['usuarioCursoCur'] ?>" name="tCurso" id="cCurso" maxlength="70" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCurso" id="cModCurso" onclick="verificaInputCurso()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td>Professor</td>
                <td><?php  echo $_SESSION['usuarioProfCur'] ?><input class="active validate" type="text" name="tProf" id="cProf" maxlength="50" value="<?php  echo $_SESSION['usuarioProfCur'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModProf" id="cModProf" onclick="verificaInputProf()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Turno</td>
                <td><?php  echo $_SESSION['usuarioTurnoCur'] ?><fieldset id="cTurno" hidden><legend> Turno </legend>
                                        <input type="radio" name="tTurno" id="cMan" value="Manha"><label for="cMan">Manhã</label>
                                        <input type="radio" name="tTurno" id="cTard" value="Tarde"><label for="cTard">Tarde</label>
                                        <input type="radio" name="tTurno" id="cNoit" value="Noite"><label for="cNoit">Noite</label>                                        
                                    </fieldset></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTurno" id="cModTurno" onclick="verificaInputTurno()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td></td>
                <td>Dias de Aula</td>
                <td></td>
              </tr>
              <tr>
                <td>Segunda</td>
                <td><?php  if($_SESSION['usuarioSegCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                        <div id="divSeg" hidden>
                       <input name="tSeg" id="cSeg" value="1" type="checkbox"> <label for="cSeg">Segunda</label>
                        </div>	
                </td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSeg" id="cModSeg" onclick="verificaInputSeg()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Terça</td>
                <td><?php  if($_SESSION['usuarioTerCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                <div id="divTer" hidden>
                       <input name="tTer" id="cTer" value="1" type="checkbox"> <label for="cTer">Terça</label>
                    </div>
                        </td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTer" id="cModTer" onclick="verificaInputTer()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Quarta</td>
                <td><?php  if($_SESSION['usuarioQuaCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                       <div id="divQua" hidden>
                        <input name="tQua" id="cQua" value="1" type="checkbox"><label for="cQua">Quarta</label>
                    </div></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModQua" id="cModQua" onclick="verificaInputQua()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Quinta</td>
                <td><?php  if($_SESSION['usuarioQuiCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                       <div id="divQui" hidden>
                        <input name="tQui" id="cQui" value="1" type="checkbox"><label for="cQui">Quinta</label>
                    </div></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModQui" id="cModQui" onclick="verificaInputQui()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Sexta</td>
                <td><?php  if($_SESSION['usuarioSexCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                       <div id="divSex" hidden>
                        <input name="tSex" id="cSex" value="1" type="checkbox"><label for="cSex">Sexta</label>
                    </div></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSex" id="cModSex" onclick="verificaInputSex()"> 
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Sábado</td>
                <td><?php  if($_SESSION['usuarioSabCur'] == 1){echo "Sim";}else{echo "Não";} ?>
                       <div id="divSab" hidden>
                        <input name="tSab" id="cSab" value="1" type="checkbox"><label for="cSab">Sábado</label>
                    </div></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSab" id="cModSab" onclick="verificaInputSab()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td> 
              </tr>
              <tr>
                <td>Hora Início</td>
                <td><?php  echo $_SESSION['usuarioHoraIniCur'] ?><input type="time" name="start0" id="cIni" class="center" value="<?php  echo $_SESSION['usuarioHoraIniCur'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCurso" id="cModCurso" onclick="verificaInputHoraI()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Hora Término</td>
                <td><?php  echo $_SESSION['usuarioHoraTerCur'] ?><input type="time" name="end0" id="cFim" class="center" value="<?php  echo $_SESSION['usuarioHoraTerCur'] ?>" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModUnidade" id="cModUnidade" onclick="verificaInputHoraT()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Unidade</td>
                <td><?php  echo $_SESSION['usuarioUnidadeCur'] ?><select name="tUnidade"  id="cUnidade" disabled>
                                            <option value="" disabled selected> Selecione a Unidade de Ensino </option>
                                            <option value="Dom Camilo" > Dom Camilo </option>
                                            <option value="Felipe Claudio de Sales" > Felipe Cláudio </option>
                                      </select><input type="hidden" value="<?php  echo $_SESSION['usuarioUnidadeCur'] ?>" name="tIUnidade" id="cIUnidade" /> </td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModUnidade" id="cModUnidade" onclick="verificaInputUnidade()">
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
        
</body>
</html>