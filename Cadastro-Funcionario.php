<?php 
    session_start();
    include "Conexao.php";
$sql_banco = mysqli_query($conn, "SELECT * FROM noticias LIMIT 5");
?>

<!DOCTYPE html>

<html>
    <head>
        
        <title> CFP - Cadastro de Funcionários</title>
        <meta charset="UTF-8">
        <meta name="discription" content="CFP">
        <meta name="keywords" content="">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
          <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
        
        <script>
            
            //VALIDAÇÃO DOS CAMPOS
            function valida(){
                var nome = formCad.tNome.value;
                var cpf = document.getElementById('cCPF');
                var senha = document.getElementById('cSenha');
                var email = document.getElementById('cMail');
                var rg = document.getElementById('cRG');
                var unidade = document.getElementById('cUnidade');
                var trabalho = document.getElementById('cTrabalho');
                var curso = document.getElementById('cCursos');
                
                if(nome == ""){
                    alert('Preencha o campo Nome!');
                    formCad.tNome.focus();
                    return false;
                }else{
                    if(!validarCPF(cpf.value)){
                        return false;
                    }else{
                        if(senha.value.length<8){
                            alert('A senha deve conter no mínimo 8 caracteres!');
                            formCad.tSenha.focus();
                            return false;
                        }else{
                            if(rg.value.length<13){
                            alert('RG incorreto!');
                            formCad.tRG.focus();
                            return false;
                            }else{
                                if(!validatelefone()){
                                return false;  
                                }else{
                                    if(email.value == ""){
                                    alert('Preencha o campo do E-Mail!');
                                    formCad.tMail.focus();
                                    return false;
                                    }else{
                                        if(!validaRadioSexo()){
                                            return false;
                                            }else{
                                                if(trabalho.value==""){
                                                    alert('Selecione uma Função!');
                                                    return false;
                                                }else{
                                                    if(curso.value=="" && curso.disabled == false){
                                                        alert('Selecione um curso');
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
                    }
                }
            }
            
            //VALIDAÇÃO DO CPF
            function validarCPF(cpf) {
		cpf = cpf.replace(/[^\d]+/g, '');
		//Verifica se o Campo está vazio
                if (cpf === '') {
                    alert('Preencha o Campo CPF!');
                    return false;
		}
		// Elimina CPFs invalidos conhecidos    
		if (cpf.length !== 11 || cpf === "00000000000" || cpf === "11111111111"
                        || cpf === "22222222222" || cpf === "33333333333"
                        || cpf === "44444444444" || cpf === "55555555555"
			|| cpf === "66666666666" || cpf === "77777777777"
			|| cpf === "88888888888" || cpf === "99999999999") {
                    alert('CPF INVÁLIDO!');
                    return false;
		}
		// Valida 1o digito 
		add = 0;
		for (i = 0; i < 9; i++) {
                    add += parseInt(cpf.charAt(i)) * (10 - i);
                    rev = 11 - (add % 11);
		}
		if (rev === 10 || rev === 11) {
                    rev = 0;
		}
		if (rev !== parseInt(cpf.charAt(9))) {
                    alert('CPF Inválido');
                    return false;
		}
		// Valida 2o digito 
		add = 0;
		for (i = 0; i < 10; i++) {
                    add += parseInt(cpf.charAt(i)) * (11 - i);
                    rev = 11 - (add % 11);
		}
		if (rev === 10 || rev === 11) {
                    rev = 0;
		}
		if (rev !== parseInt(cpf.charAt(10))) {
                    alert('CPF Inválido');
                    return false;
		}
		return true;
            }
            
            //VALIDA RADIO SEXO
                function validaRadioSexo(){
                    if(document.formCad1.tSexo[0].checked == false && document.formCad1.tSexo[1].checked == false){
                        alert('Selecione o Sexo!');
                        return false;
                    }
                    return true;
                }
                
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

        //CHECKED TELEFONE FIXO    
        function verificaFixo(){
            var face_chk = document.getElementById('cFixo');
            var face = document.getElementById('cFixoChk');		
		if (face_chk.checked == true){
                    face.disabled = false;
		}else{
                    face.value = "";
                    face.disabled = true;
                }
         }
        
        //CHECKED TELEFONE CELULAR        
        function verificaCel(){
            var insta_chk = document.getElementById('cCel');
            var insta = document.getElementById('cCelChk');			
		if (insta_chk.checked == true){
                    insta.disabled = false;
		}else{
                    insta.value = "";
                    insta.disabled = true;
		}
         }
         
         //VALIDA TELEFONE
         function validatelefone(){
            var fixo = document.getElementById('cFixoChk');
            var cel = document.getElementById('cCelChk');
            if((fixo.disabled==true && cel.disabled==true) || (fixo.disabled==false && fixo.value=="") || (cel.disabled==false && cel.value=="")){
                alert('Informe o Telefone de Contato!');
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
                    <h3 class="center"> Cadastro </h3>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Inserir-Funcionario.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> account_box </i>
                                    <label for="cNome">Nome: </label><input class="active validate" type="text" name="tNome" id="cNome" maxlength="50" placeholder="Nome Completo" pattern="[A-Za-z\s]+$" required>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> assignment_ind </i>
                                    <label>CPF: </label><input class="active validate" type="text" name="tCPF" id="cCPF" value="" maxlength="14" onKeypress="formata_cpf(this,'###.###.###-##');" required>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <label>Senha: </label><input class="active validate" type="password" name="tSenha" id="cSenha" maxlength="15" required>
                                </div>
                                    
                            </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">call_to_action</i>
                                    <label>RG: </label><input class="active validate" type="text" name="tRG" id="cRG" maxlength="13" onKeypress="formata_cpf(this,'##-##.###.###');" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col s6 offset-s3">
                                    <fieldset id="redes_sociais"><legend> Telefone de Contato </legend><br>
                                        <input onClick="verificaFixo()" type="checkbox" name="tRSoc" id="cFixo"><label for="cFixo"> Fixo </label> <input class="active validate" type="text" value="" name="tFixo" id="cFixoChk" size="20" maxlength="14" placeholder="Telefone Fixo" disabled="" onKeypress="mascara_fixo(this);"><br>
                                        <input onClick="verificaCel()" type="checkbox" name="tRSoc" id="cCel"><label for="cCel"> Celular </label> <input class="active validate" type="text" value="" name="tCel" id="cCelChk" size="20" maxlength="15" placeholder="Telefone Celular" disabled="" onKeypress="mascara_cel(this);"><br>
                                    </fieldset><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> email </i>
                                    <label> E-mail: </label><input class="active validate" type="email" name="tMail" id="cMail" maxlength="30" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s6 offset-s3">
                                    <fieldset id="sexo"><legend> Sexo </legend>
                                        <input type="radio" name="tSexo" id="cMasc" value="Masculino"><label for="cMasc">Masculino</label>
                                        <input type="radio" name="tSexo" id="cFem" value="Feminino"><label for="cFem">Feminino</label>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                     <br><i class="material-icons prefix">date_range</i>
                                   <label> Data de Nascimento: </label><input class="active validate" type="date" name="tData" id="cData" min="1952-01-01" max="2000-12-31" required>    
                                </div>
                            </div>
                            <div class="row center">
                                <div class="input-field col s10 offset-s2">
                                   <div class="col s2">
                                        <i class="material-icons prefix left"> contacts </i>                             
                                   </div>
                                   <div class="col s6 m6">
                                        <select name="tTrabalho" id="cTrabalho">
                                            <option value="" disabled selected> Selecione o Cargo </option>
                                            <option value="Comercial"> Comercial </option>
                                            <option value="Professor" > Professor</option>
                                            <option value="Coordenação"> Recepção </option>
                                      </select>
                                    </div>                                   
                                </div>                                
                            </div>                    
                            <div class="row">
                                <input type="hidden"  name="tITrabalho" id="cITrabalho" />
                                    <div class="col s12">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">library_books </i>
                                                <input type="text" id="cCursos" class="autocomplete" disabled>
                                                <label for="autocomplete-input"> Selecione o Curso do Funcionário </label>
                                            </div>
                                    </div>            
                            </div> 
                            <div class="row center">
                                <div class="input-field col s10 offset-s2">
                                   <div class="col s2">
                                        <i class="material-icons prefix left"> business </i>                             
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
        
         <script>
            $(document).ready(function() {
              $('select').material_select();
            });
        </script>
        
        <script>
            $('#cTrabalho').change(function() {
              if($('#cTrabalho').val()== "Professor"){
                  $('#cCursos').prop("disabled",false);
              }else{
                  $('#cCursos').prop("disabled",true);
              }
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