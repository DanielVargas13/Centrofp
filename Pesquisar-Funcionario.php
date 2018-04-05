<?php 
    session_start();
    include "Conexao.php";
$sql_banco = mysqli_query($conn, "SELECT * FROM noticias LIMIT 5");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Buscar Funcionário</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">

        <!--Materialize CSS -->
        <link rel="stylesheet" href="css/materialize.css">
        <!-- Import Google Icon Font -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
                rel="stylesheet">
    <script>
         //MASCARA PARA CPF
                function formata_cpf(campo_passado, mascara){
                    var campo = campo_passado.value.length;
                    var saida = mascara.substring(0,1);
                    var texto = mascara.substring(campo);
                    if(texto.substring(0,1) != saida){
                        campo_passado.value += texto.substring(0,1);
                    }
                }
                //MASCARA PARA TELELEFONE FIXO
                  function mascara_fixo(telefone){ 
                if(telefone.value.length == 0)
                    telefone.value = '(' + telefone.value; 
                if(telefone.value.length == 3)
                    telefone.value = telefone.value + ') '; 

                if(telefone.value.length == 9)
                    telefone.value = telefone.value + '-'; 

                  }  
                //MASCARA PARA TELELEFONE CELULAR
                     function mascara_cel(telefone){ 
                if(telefone.value.length == 0)
                    telefone.value = '(' + telefone.value; 
                if(telefone.value.length == 3)
                    telefone.value = telefone.value + ') '; 

                if(telefone.value.length == 10)
                    telefone.value = telefone.value + '-'; 

                     }             

                //MASCARA PARA RG
                function formata_rg(campo_passado, mascara){
                    var campo = campo_passado.value.length;
                    var saida = mascara.substring(0,1);
                    var texto = mascara.substring(campo);
                    if(texto.substring(0,1) != saida){
                        campo_passado.value += texto.substring(0,1);
                    }
                }     
        function verificaInputNome(){
                var input = document.getElementById('cNome');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioNomeFunc'] ?>";
                    }
             }
       function verificaInputCPF(){
                var input = document.getElementById('cCPF');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioCPFFunc'] ?>";
                    }
             }
           function verificaInputRg(){
                var input = document.getElementById('cRG');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioRgFunc'] ?>";
                    }
             }
         function verificaInputTelF(){
                var input = document.getElementById('cFixo');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioTelFFunc'] ?>";
                    }
             }
       function verificaInputTelC(){
                var input = document.getElementById('cCel');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioTelCFunc'] ?>";
                    }
             }
           function verificaInputEmail(){
                var input = document.getElementById('cMail');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioEmailFunc'] ?>";
                    }
             }
       function verificaInputSexo(){
                var input = document.getElementById('cSexo');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                    }
             }
       function verificaInputData(){
                var input = document.getElementById('cData');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioDataNFunc'] ?>";
                    }
             }
           function verificaInputFuncao(){
                var input = document.getElementById('cTrabalho');		
                var input2 = document.getElementById('cITrabalho');	
                    if (input.disabled == true){
                  $(input).prop("disabled",false);
                  $('select').material_select();
                    }else{
                        $(input).prop("disabled",true);
                        $('select').material_select();
                        input2.value = "<?php  echo $_SESSION['usuarioFuncaoFunc'] ?>";
                    }
             }
         function verificaInputCurso(){
                var input = document.getElementById('cCursos');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioCursoFunc'] ?>";
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
                        input2.value = "<?php  echo $_SESSION['usuarioUnidadeFunc'] ?>";
                    }
             }
         function verificaSexo(){
                var input = "<?php  echo $_SESSION['usuarioSexoFunc'] ?>";   
                if(document.formCad.tSexo[0].checked == false && document.formCad.tSexo[1].checked == false){
                            if (input=="Masculino"){
                               document.formCad.tSexo[0].checked = true; 
                            }else{
                                document.formCad.tSexo[1].checked = true;
                            }
                        }
                        return true;
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
                                <li><a class="waves-effect" href=""> Cadastro de Curso </a></li> 
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
            <div class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
                <div class="card-panel z-depth-5">
                    <h3 class="center"> Pesquisar Funcionário </h3>
                    <div class="row">
                    <form method="post" action="Busca-Funcionario.php" class="col s12">
			<nav>
                            <div class="nav-wrapper">
				<div class="input-field grey lighten-1">
                                    <input id="search" name="tNome" type="search" placeholder="Digite o Nome Completo" required> 
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
        <form method="post" name="formCad" action="Alterar-Funcionario.php" class="col s12">
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
                <input type="text" value="<?php  echo $_SESSION['usuarioIdFunc'] ?>" name="tId" id="cId" hidden/>
               <tr>
                <td>Nome</td>
                <td><?php  echo $_SESSION['usuarioNomeFunc'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioNomeFunc'] ?>" type="text" name="tNome" id="cNome" maxlength="50"  pattern="[A-Za-z\s]+$" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNome" id="cModNome" onclick="verificaInputNome()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td>CPF</td>
                <td><?php  echo $_SESSION['usuarioCPFFunc'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioCPFFunc'] ?>" type="text" name="tCPF" id="cCPF" maxlength="14" onKeypress="formata_cpf(this,'###.###.###-##');" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCPF" id="cModCPF" onclick="verificaInputCPF()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>RG</td>
                <td><?php  echo $_SESSION['usuarioRgFunc'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioRgFunc'] ?>" type="text" name="tRG" id="cRG" maxlength="13" onKeypress="formata_cpf(this,'##-##.###.###');" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModRg" id="cModRg" onclick="verificaInputRg()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Fixo</td>
                <td><?php  echo $_SESSION['usuarioTelFFunc'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioTelFFunc'] ?>" type="text" name="tFixo" id="cFixo" size="20" maxlength="14" onKeypress="mascara_fixo(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelF" id="cModTelF" onclick="verificaInputTelF()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Celular</td>
                <td><?php  echo $_SESSION['usuarioTelCFunc'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['usuarioTelCFunc'] ?>" name="tCel" id="cCel" size="20" maxlength="15" onKeypress="mascara_cel(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelC" id="cModTelC" onclick="verificaInputTelC()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?php  echo $_SESSION['usuarioEmailFunc'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioEmailFunc'] ?>" type="email" name="tMail" id="cMail" maxlength="30" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModEmail" id="cModEmail" onclick="verificaInputEmail()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Sexo</td>
                <td><?php  echo $_SESSION['usuarioSexoFunc'] ?><fieldset id="cSexo" hidden><legend> Sexo </legend>
                                            <input type="radio" name="tSexo" id="cMasc" value="Masculino"><label for="cMasc">Masculino</label>
                                            <input type="radio" name="tSexo" id="cFem" value="Feminino"><label for="cFem">Feminino</label>
                                        </fieldset></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSexo" id="cModSexo" onclick="verificaInputSexo()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Data de Nascimento</td>
                <td><?php  echo date("d/m/Y", strtotime($_SESSION['usuarioDataNFunc'])); ?><input class="active validate" value="<?php  echo $_SESSION['usuarioDataNFunc'] ?>" type="date" name="tData" id="cData" min="1952-01-01" max="2000-12-31" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModData" id="cModData" onclick="verificaInputData()"> 
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Função</td>
                <td><?php  echo $_SESSION['usuarioFuncaoFunc'] ?><select name="tTrabalho" id="cTrabalho" disabled>
                                            <option value="" disabled selected> Selecione a Função do Funcionário </option>
                                            <option value="Comercial"> Comercial </option>
                                            <option value="Professor" > Professor</option>
                                            <option value="Coordenação"> Recepção </option>
                                      </select><input type="hidden" value="<?php  echo $_SESSION['usuarioFuncaoFunc'] ?>"  name="tITrabalho" id="cITrabalho" /></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModFunc" id="cModFunc" onclick="verificaInputFuncao()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Curso</td>
                <td><?php  echo $_SESSION['usuarioCursoFunc'] ?><input type="text" name="tCursos" id="cCursos" value="<?php  echo $_SESSION['usuarioCursoFunc'] ?>" class="autocomplete" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCurso" id="cModCurso" onclick="verificaInputCurso()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Unidade</td>
                <td><?php  echo $_SESSION['usuarioUnidadeFunc'] ?><select name="tUnidade"  id="cUnidade" disabled>
                                            <option value="" disabled selected> Selecione a Unidade de Ensino </option>
                                            <option value="Dom Camilo" > Dom Camilo </option>
                                            <option value="Felipe Claudio de Sales" > Felipe Cláudio </option>
                                      </select><input type="hidden" value="<?php  echo $_SESSION['usuarioUnidadeFunc'] ?>" name="tIUnidade" id="cIUnidade" /> </td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModUnidade" id="cModUnidade" onclick="verificaInputUnidade()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
            </tbody>
          </table>
          <br><br>
           <div class="center"> 
           <button class="btn waves-effect waves-light light-blue darken-3" id="btnMod" type="submit" onclick="verificaSexo()"> Alterar
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
                $('#cTrabalho').on('change', function() {
                $('#cITrabalho').val($('#cTrabalho').val());
                });
            });
            $(document).ready(function() {
                $('select').material_select();
                $('#cCursos').on('change', function() {
                $('#cICursos').val($('#cCursos').val());
                });
            });
            $(document).ready(function() {
                $('select').material_select();
                $('#cUnidade').on('change', function() {
                $('#cIUnidade').val($('#cUnidade').val());
                });
            });
        </script>

        <script>
            $(document).ready(function () {$('input.autocomplete').autocomplete({
                data: {
                    "Assistente Administrativo": null,
                    "Auto Cad": null,
                    "Windows": null,
                    "Word": null,
                    "Excel": null,
                    "Internet + Antivirus": null,
                    "Power Point": null,
                    "Excel Avançado": null,
                    "Corel Draw": null,
                    "Front Page": null,
                    "PhotoShop": null,
                    "Digitação": null,
                    "AdobeAcrobat": null,
                    "Marketing Pessoal": null,
                    "Treinamento Empresarial": null,
                    "Departamento Pessoal": null,
                    "Contabilidade": null,
                    "Fiscal": null,
                    "Manicure e Pedicure": null,
                    "Maquiagem Profissional": null,
                    "Designer de Sobrancelha": null,
                    "Atendente de Farmácia": null,
                    "Informática Kids": null,
                    "Manutenção de Celular": null,
                    "Fireworks": null,
                    "Montagem e Manutenção de Computadores": null,
                    "Redes de Computadores": null,
                    "Illustrator": null,
                    "InDesign": null,
                    "Fotografia Digital": null,
                    "Inglês": null,
                    "Inglês Kids": null,
                    "Espanhol": null,
                    "Barbeiro Profissional": null,
                    "Reforço Escolar": null,
                    "Maquiagem": null,
            }});});        
        </script> 
        
        <!-- SIDENAV-->
        <script>
            $(document).ready(function(){
                $("#side").sideNav();
            });
        </script>         
        
</body>
</html>