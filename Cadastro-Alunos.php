<?php 
    session_start();
    include "Conexao.php";
        $sql_banco = mysqli_query($conn, "SELECT * FROM turmas ORDER BY curso_id");
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Cadastro de Alunos </title>
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
            
            function valida(){
                 var nome = formCad.tNome.value;
                var cpf = document.getElementById('cCPF');
                var senha = document.getElementById('cSenha');
                var email = document.getElementById('cMail');
                var rg = document.getElementById('cRG');
                var matricula = document.getElementById('cMatricula');
                var bairro = document.getElementById('cBairro');
                var rua = document.getElementById('cRua');
                var numero = document.getElementById('cNumero');
                var turma = document.getElementById('search');
                
                if(nome == ""){
                    alert('Preencha o campo Nome!');
                    formCad.tNome.focus();
                    return false;
                }else{
                    if(matricula.value.length<6){
                            alert('A mátricula deve conter no mínimo 6 caracteres!');
                            formCad.tMatricula.focus();
                            return false;
                    }else{
                    if(!validarCPF(cpf.value)){
                        return false;
                    }else{
                        if(rg.value.length<13){
                            alert('RG incorreto!');
                            formCad.tRG.focus();
                            return false;
                        }else{
                            if(email.value == ""){
                                    alert('Preencha o campo do E-Mail!');
                                    formCad.tMail.focus();
                                    return false;
                            }else{
                                    if(senha.value.length<8){
                                        alert('A senha deve conter no mínimo 8 caracteres!');
                                        formCad.tSenha.focus();
                                        return false;
                                }else{
                                    if(!validatelefone()){
                                return false;      
                                    }else{
                                                if(bairro.value==""){
                                                    alert('Informe o bairro!');
                                                    formCad.tBairro.focus();
                                                    return false;
                                                }else{
                                                    if(rua.value==""){
                                                        alert('Informe a rua');
                                                        formCad.tRua.focus();
                                                        return false;
                                                    }else{
                                                        if(numero.value == ""){
                                                            alert('Informe o número!');
                                                            formCad.tNumero.focus();
                                                            return false;
                                                    }else{
                                                        if(!validaRadioSexo()){
                                                        return false;
                                                    }else{
                                                        if(turma.value == ""){
                                                            alert('Selecione um curso!');
                                                            formCad.tTurma.focus();
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
            }
            }
    
            //Proibe E-mails
            function loadProibeEmails(){
                alert('Vá para a tela inicial para enviar um E-mail!');
                return false;
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

            //MASCARA PARA RG
            function formata_rg(campo_passado, mascara){
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
        
            //CHECKED TELEFONE FIXO RESPONSÁVEL  
            function verificaFixoResp(){
                var face_chkResp = document.getElementById('cFixoResp');
                var faceResp = document.getElementById('cFixoChkResp');		
                    if (face_chkResp.checked == true){
                        faceResp.disabled = false;
                    }else{
                        faceResp.value = "";
                        faceResp.disabled = true;
                    }
            }
        
        //CHECKED TELEFONE CELULAR RESPONSÁVEL
        function verificaCelResp(){
            var insta_chkResp = document.getElementById('cCelResp');
            var instaResp = document.getElementById('cCelChkResp');			
		if (insta_chkResp.checked == true){
                    instaResp.disabled = false;
		}else{
                    instaResp.value = "";
                    instaResp.disabled = true;
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
        
        </script>
        
        
    </head>
    <body class="grey lighten-4">
        
        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Recepcionista.php"> Home </a></li>                       
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" onclick="loadProibeEmails()"> E-mails </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav> 
        </div>

        <br><br><br>
               
        <ul id="slide-out" class="side-nav">           
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="Img_Prog/Fundo.jpg">
                    </div>
                    <a href="Recepcionista.php"><img class="circle" src="Img_Prog/<?php  echo $_SESSION['usuarioFoto'] ?>"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Alunos <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Cadastro-Alunos.php"> Cadastro de Alunos </a></li> 
                                <li><a class="waves-effect" href=""> Pesquisar Aluno </a></li>
                                <li><a class="waves-effect" href="Desligar-Aluno.php"> Desligar Aluno </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>   
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Documentos <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                 <li><a class="waves-effect" href=""> Gerar Contrato para Alunos </a></li>
                                <li><a class="waves-effect" href="Declaracao-Aluno.php"> Gerar Declaração para Alunos </a></li>                   </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            
            <li><div class="divider"></div></li>
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Horários de Aula <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Informática </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>    
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Financeiro <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Registrar Vendas Mensais </a></li> 
                                <li><a class="waves-effect" href=""> Registrar Pagamento </a></li>                                 
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>          
            <li><div class="divider"></div></li> 
             <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Relatórios <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Dados da matrícula </a></li> 
                                <li><a class="waves-effect" href=""> Vencimentos de parcela </a></li>
                                <li><a class="waves-effect" href=""> Alunos inadimplentes </a></li>                                  
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li> 
        </ul>    
        
        <div class="row">
            <div class="col s10 m6 16 container center z-depth-5 offset-s1 offset-m3">
                <div class="card-panel z-depth-5 ">
                    <h3 class="center"> Cadastro </h3>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Inserir-Aluno.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> account_box </i>
                                    <label for="cNome">Nome: </label><input class="active validate" type="text" name="tNome" id="cNome" maxlength="50" placeholder="Nome Completo do Aluno" required>
                                </div>
                            </div>    
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> account_circle </i>
                                    <label for="cNome">Matricula: </label><input class="active validate" type="text" name="tMatricula" id="cMatricula" maxlength="6" placeholder="Digite o número de Matrícula do Aluno" required>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> assignment_ind </i>
                                    <label>CPF: </label><input class="active validate" type="text" name="tCPF" id="cCPF" value="" maxlength="14" placeholder="CPF do aluno ou responsável" onKeypress="formata_cpf(this,'###.###.###-##');" required>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">call_to_action</i>
                                    <label>RG: </label><input class="active validate" type="text" name="tRG" id="cRG" maxlength="13" placeholder="RG do aluno ou responsável" onKeypress="formata_cpf(this,'##-##.###.###');" required>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> email </i>
                                    <label> E-mail: </label><input class="active validate" type="email" name="tMail" id="cMail" maxlength="30" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <label>Senha: </label><input class="active validate" type="password" name="tSenha" id="cSenha" maxlength="15" required>
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
                                    <i class="material-icons prefix"> directions </i>
                                    <label for="cNome">Bairro: </label><input class="active validate" type="text" name="tBairro" id="cBairro" maxlength="50" required>
                                </div>
                                <div class="input-field col s8">
                                    <i class="material-icons prefix"> directions </i>
                                    <label for="cNome">Rua: </label><input class="active validate" type="text" name="tRua" id="cRua" maxlength="50" required>
                                </div>                 
                                <div class="input-field col s4">
                                    <i class="material-icons prefix"> location_on </i>
                                    <label for="cNome">Número: </label><input class="active validate" type="number" name="tNumero" id="cNumero" maxlength="4" required>
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
                            <div class="row">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix"> library_books </i>
                                    <label for="cTurma">Turma: </label><input class="active validate" type="text" name="tTurma" id="search" maxlength="50" autocomplete="off" placeholder="Nome do Curso/Turma" required>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col s10 offset-s1">
                                    <fieldset id="redes_sociais"><legend> Responsável </legend><br>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix"> account_box </i>
                                                <label for="cNomeResp">Nome: </label><input class="active validate" type="text" name="tNomeResp" id="cNomeResp" maxlength="50" placeholder="Nome Completo do Responsável">
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col s10 offset-s1">
                                                <fieldset id="redes_sociais"><legend> Telefone de Contato </legend><br>
                                                    <input onClick="verificaFixoResp()" type="checkbox" name="tRSocResp" id="cFixoResp"><label for="cFixoResp"> Fixo </label> <input class="active validate" type="text" value="" name="tFixoResp" id="cFixoChkResp" size="20" maxlength="14" placeholder="Telefone Fixo" disabled="" onKeypress="mascara_fixo(this);"><br>
                                                    <input onClick="verificaCelResp()" type="checkbox" name="tRSocResp" id="cCelResp"><label for="cCelResp"> Celular </label> <input class="active validate" type="text" value="" name="tCelResp" id="cCelChkResp" size="20" maxlength="15" placeholder="Telefone Celular" disabled="" onKeypress="mascara_cel(this);"><br>
                                                </fieldset><br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix"> email </i>
                                                <label> E-mail: </label><input class="active validate" type="email" name="tMailResp" id="cMailResp" maxlength="30">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix"> person_add </i>
                                                <label for="cParentesco">Parentesco: </label><input class="active validate" type="text" name="tParentesco" id="cParentesco" maxlength="50" placeholder="Parentesco">
                                            </div>
                                        </div> 
                                    </fieldset><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="center"> 
                                    <a href="Recepcionista.php">
                                    <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Home
                                        <i class="material-icons right"> send </i>    
                                        </button></a>&nbsp;&nbsp;&nbsp;  
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
        
        <!-- AUTOCOMPLETE NOME DO CURSO-->
        <script>
            $(document).ready(function(){
              $('#search').autocomplete({
                data: {
                    <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                        "<?php $id = $l["curso_id"]; $curso_bruto = mysqli_query($conn,"SELECT nome FROM cursos WHERE id='$id'"); $curso = mysqli_fetch_assoc($curso_bruto); echo $curso["nome"];  echo " - "; echo $l["turno"]; echo " - "; echo $l["unidadeensino"] ?>": null,
                    <?php } ?>
                },
              });
            });      
        </script>         
    
        <!--SIDENAV-->
        <script>
            $(document).ready(function(){
                $('#side').sideNav();
            });
        </script>

    </body>
</html>
