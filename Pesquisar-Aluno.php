<?php 
    session_start();
    include "Conexao.php";
$sql_banco = mysqli_query($conn, "SELECT * FROM turmas ORDER BY curso");
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
                        input.value = "<?php  echo $_SESSION['usuarioNomeAlu'] ?>";
                    }
             }
        function verificaInputMat(){
                var input = document.getElementById('cMat');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioMatAlu'] ?>";
                    }
             }
        function verificaInputCPF(){
                var input = document.getElementById('cCPF');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioCPFAlu'] ?>";
                    }
            }
        function verificaInputRg(){
            var input = document.getElementById('cRG');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioRgAlu'] ?>";
                }
        }
        function verificaInputEmail(){
                var input = document.getElementById('cMail');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioEmailAlu'] ?>";
                    }
        }
        function verificaInputTelF(){
               var input = document.getElementById('cFixo');		
                   if (input.hidden == true){
                       input.hidden = false;
                   }else{
                       input.hidden = true;
                       input.value = "<?php  echo $_SESSION['usuarioTelFAlu'] ?>";
                   }
        }
        function verificaInputTelC(){
                var input = document.getElementById('cCel');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioTelCAlu'] ?>";
                    }
        }
        function verificaInputBairro(){
               var input = document.getElementById('cBairro');		
                   if (input.hidden == true){
                       input.hidden = false;
                   }else{
                       input.hidden = true;
                       input.value = "<?php  echo $_SESSION['usuarioBairroAlu'] ?>";
                   }
        }
        function verificaInputRua(){
                var input = document.getElementById('cRua');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioRuaAlu'] ?>";
                    }
        }
        function verificaInputNum(){
                var input = document.getElementById('cNumero');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioNumAlu'] ?>";
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
                        input.value = "<?php  echo $_SESSION['usuarioDataNAlu'] ?>";
                    }
        }
      function verificaInputTur(){
            var input = document.getElementById('search');		
                if (input.hidden == true){
                    input.hidden = false;
                }else{
                    input.hidden = true;
                    input.value = "<?php  echo $_SESSION['usuarioTurAlu'] ?>";
                }
        }
         function verificaInputNomeR(){
                var input = document.getElementById('cNomeR');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioNomeRAlu'] ?>";
                    }
             }
        function verificaInputTelFR(){
               var input = document.getElementById('cFixoR');		
                   if (input.hidden == true){
                       input.hidden = false;
                   }else{
                       input.hidden = true;
                       input.value = "<?php  echo $_SESSION['usuarioTelFRAlu'] ?>";
                   }
        }
       function verificaInputTelCR(){
                var input = document.getElementById('cCelR');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioTelCRAlu'] ?>";
                    }
        }
        function verificaInputEmailR(){
                var input = document.getElementById('cMailR');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioEmailRAlu'] ?>";
                    }
        }
        
         function verificaInputPar(){
                var input = document.getElementById('cPar');		
                    if (input.hidden == true){
                        input.hidden = false;
                    }else{
                        input.hidden = true;
                        input.value = "<?php  echo $_SESSION['usuarioParRAlu'] ?>";
                    }
        }
        function verificaSexo(){
            var input = "<?php  echo $_SESSION['usuarioSexoAlu'] ?>";   
            if(document.formCad.tSexo[0].checked == false && document.formCad.tSexo[1].checked == false){
                        if (input=="Masculino"){
                           document.formCad.tSexo[0].checked = true; 
                        }else{
                            document.formCad.tSexo[1].checked = true;
                        }
                    }
                    return true;
        }     
        
        //Proibe E-mails
        function loadProibeEmails(){
            alert('Vá para a tela inicial para enviar um E-mail!');
            return false;
        }
        </script>
    </head>

<body class="grey lighten-2">
    
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
                                <li><a class="waves-effect" href=""> Desligar Aluno </a></li>                                 
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
                                <li><a class="waves-effect" href=""> Gerar Declaração para Alunos </a></li>
                                <li><a class="waves-effect" href=""> Gerar contrato para Alunos </a></li> 
                                <li><a class="waves-effect" href=""> Consultar contratos </a></li>                                 
                                </li>
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
    
        <br><br><br>
    
        <div class="row">
            <div class="col s10 m8 16 container center z-depth-5 offset-s1 offset-m2">
                <div class="card-panel z-depth-5">
                    <h3 class="center"> Pesquisar Aluno </h3>
                    <div class="row">
                    <form method="post" action="Busca-Aluno.php" class="col s12">
			<nav>
                            <div class="nav-wrapper">
				<div class="input-field grey lighten-1">
                                    <input id="cBusca" name="tBusca" type="search" placeholder="Digite o Nome Completo" required> 
                                    <label class="label-icon" for="cBusca"><i class="material-icons">search</i></label> 
                                    <i class="material-icons">close</i>
                                </div>
                            </div>
			</nav><br><br>
                        <div class="center"> 
                            <a href="Recepcionista.php">
                            <button class="btn waves-effect waves-light light-blue darken-3" type="button"> Voltar
                                <i class="material-icons right"> send </i>    
                            </button>&nbsp;&nbsp;&nbsp;  
                            </a>
                            <button class="btn waves-effect waves-light light-blue darken-3" id="btnBusca" type="submit"> Pesquisar
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
        <form method="post" name="formCad" action="Alterar-Aluno.php" class="col s12">
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
                <input type="text" value="<?php  echo $_SESSION['usuarioIdAlu'] ?>" name="tId" id="cId" hidden/>
               <tr>
                <td>Nome</td>
                <td><?php  echo $_SESSION['usuarioNomeAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioNomeAlu'] ?>" type="text" name="tNome" id="cNome" maxlength="70" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNome" id="cModNome" onclick="verificaInputNome()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
               <tr>
                <td>Matrícula</td>
                <td><?php  echo $_SESSION['usuarioMatAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioMatAlu'] ?>" type="text" name="tMat" id="cMat" maxlength="6" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModMat" id="cModMat" onclick="verificaInputMat()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
             <tr>
                <td>CPF</td>
                <td><?php  echo $_SESSION['usuarioCPFAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioCPFAlu'] ?>" type="text" name="tCPF" id="cCPF" maxlength="14" onKeypress="formata_cpf(this,'###.###.###-##');" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModCPF" id="cModCPF" onclick="verificaInputCPF()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>RG</td>
                <td><?php  echo $_SESSION['usuarioRgAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioRgAlu'] ?>" type="text" name="tRG" id="cRG" maxlength="13" onKeypress="formata_cpf(this,'##-##.###.###');" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModRg" id="cModRg" onclick="verificaInputRg()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
               <tr>
                <td>Email</td>
                <td><?php  echo $_SESSION['usuarioEmailAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioEmailAlu'] ?>" type="email" name="tMail" id="cMail" maxlength="30" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModEmail" id="cModEmail" onclick="verificaInputEmail()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Fixo</td>
                <td><?php  echo $_SESSION['usuarioTelFAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioTelFAlu'] ?>" type="text" name="tFixo" id="cFixo" size="20" maxlength="14" onKeypress="mascara_fixo(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelF" id="cModTelF" onclick="verificaInputTelF()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Celular</td>
                <td><?php  echo $_SESSION['usuarioTelCAlu'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['usuarioTelCAlu'] ?>" name="tCel" id="cCel" size="20" maxlength="15" onKeypress="mascara_cel(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelC" id="cModTelC" onclick="verificaInputTelC()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Bairro</td>
                <td><?php  echo $_SESSION['usuarioBairroAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioBairroAlu'] ?>" type="text" name="tBairro" id="cBairro" maxlength="50" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModBairro" id="cModBairro" onclick="verificaInputBairro()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Rua</td>
                <td><?php  echo $_SESSION['usuarioRuaAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioRuaAlu'] ?>" type="text" name="tRua" id="cRua" maxlength="50" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModRua" id="cModRua" onclick="verificaInputRua()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Número</td>
                <td><?php  echo $_SESSION['usuarioNumAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioNumAlu'] ?>" type="number" name="tNumero" id="cNumero" maxlength="4" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNumero" id="cModNumero" onclick="verificaInputNum()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Sexo</td>
                <td><?php  echo $_SESSION['usuarioSexoAlu'] ?><fieldset id="cSexo" hidden><legend> Sexo </legend>
                                            <input type="radio" name="tSexo" id="cMasc" value="Masculino"><label for="cMasc">Masculino</label>
                                            <input type="radio" name="tSexo" id="cFem" value="Feminino"><label for="cFem">Feminino</label>
                                        </fieldset></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModSexo" id="cModSexo" onclick="verificaInputSexo()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Data de Nascimento</td>
                <td><?php  echo $_SESSION['usuarioDataNAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioDataNAlu'] ?>" type="date" name="tData" id="cData" min="1952-01-01" max="2000-12-31" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModData" id="cModData" onclick="verificaInputData()"> 
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Idade</td>
                <td><?php  echo $_SESSION['usuarioIdadeAlu']." anos" ?></td>
              </tr>
              <tr>
                <td>Turma</td>
                <td><?php  echo $_SESSION['usuarioTurAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioTurAlu'] ?>" type="text" name="tTurma" id="search" maxlength="50" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTur" id="cModTur" onclick="verificaInputTur()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
              <tr>
                  <td></td>
                  <td>Responsável</td>
                  <td></td>
              </tr>
              <tr>
                <td>Nome</td>
                <td><?php  echo $_SESSION['usuarioNomeRAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioNomeRAlu'] ?>" type="text" name="tNomeR" id="cNomeR" maxlength="70" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNome" id="cModNome" onclick="verificaInputNomeR()">
                                    <i class="material-icons right"> edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Fixo</td>
                <td><?php  echo $_SESSION['usuarioTelFRAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioTelFRAlu'] ?>" type="text" name="tFixoR" id="cFixoR" size="20" maxlength="14" onKeypress="mascara_fixo(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelF" id="cModTelF" onclick="verificaInputTelFR()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Telefone Celular</td>
                <td><?php  echo $_SESSION['usuarioTelCRAlu'] ?><input class="active validate" type="text" value="<?php  echo $_SESSION['usuarioTelCRAlu'] ?>" name="tCelR" id="cCelR" size="20" maxlength="15" onKeypress="mascara_cel(this);" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModTelC" id="cModTelC" onclick="verificaInputTelCR()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
               <tr>
                <td>Email</td>
                <td><?php  echo $_SESSION['usuarioEmailRAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioEmailRAlu'] ?>" type="email" name="tMailR" id="cMailR" maxlength="30" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModEmail" id="cModEmail" onclick="verificaInputEmailR()">
                                    <i class="material-icons right">  edit </i>    
                                </button></td>
              </tr>
              <tr>
                <td>Parentesco</td>
                <td><?php  echo $_SESSION['usuarioParRAlu'] ?><input class="active validate" value="<?php  echo $_SESSION['usuarioParRAlu'] ?>" type="text" name="tPar" id="cPar" maxlength="70" hidden></td>
                <td><button class="btn-floating waves-effect waves-light light-blue darken-3" type="button" name="tModNome" id="cModNome" onclick="verificaInputPar()">
                                    <i class="material-icons right"> edit </i>    
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
<!-- AUTOCOMPLETE NOME DO CURSO-->
        <script>
            $(document).ready(function(){
              $('#search').autocomplete({
                data: {
                    <?php while($l = mysqli_fetch_array($sql_banco)){ ?>
                        "<?php echo $l["curso"]; echo " - "; echo $l["turno"]; echo " - "; echo $l["unidadeEnsino"] ?>": null,
                    <?php } ?>
                },
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