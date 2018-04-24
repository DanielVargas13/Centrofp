<?php 
    session_start();
    include "Conexao.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Professores - Turmas</title>
        <meta charset="UTF-8">
        <meta name="discription" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
        
    </head>
    <body class="grey lighten-4">
        
        <div class="navbar-fixed">
            <nav class="light-blue darken-3">
                <div class="nav-content">
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light modal-trigger" href="Professores.php"> Home </a></li>                       
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" > E-mails </a></li>
                         <li><a class="waves-effect waves-light modal-trigger" href="Alterar-Conta.php" > Conta </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav> 
        </div>
               
        <div class="modal modal-fixed-footer" id="Mensagens">
            <div class="modal-content">
                <h4> Envio de E-mail </h4><br>
                <form name="EnvioEmail" method="post" action="Mail.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> account_box </i>
                            <label for="cNome">Nome: </label><input class="active validate" type="text" name="tNome" id="cNome" maxlength="50" placeholder="Seu nome completo" pattern="[A-Za-z\s]+$" required>
                        </div>
                    </div>         
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> email </i>
                            <label> E-mail: </label><input class="active validate" type="email" name="tMail" id="cMail" maxlength="30" placeholder="E-mail do destinatário" required>
                        </div>
                    </div>  
                    <div class="row">
                     <div class="input-field col s12">
                            <i class="material-icons prefix"> chat </i>
                            <label for="cAssunto">Assunto: </label><input class="active validate" type="text" name="tAssunto" id="cAssunto" maxlength="100" placeholder="Assunto da mensagem" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> message </i>
                            <textarea id="cMensagem" name="tMensagem" class="materialize-textarea active validate" placeholder="Mensagem a ser Enviada" required></textarea>
                            <label for="textarea1"> Mensagem </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn waves-effect waves-light light-blue darken-3">
                                <span> Arquivos </span>
                                <input type="file"  multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload de Arquivos">
                            </div>
                        </div> 
                    </div>

                    <button class="btn waves-effect waves-light light-blue darken-3 right" type="submit" onclick="return valida()"> Enviar
                        <i class="material-icons right"> send </i>    
                    </button> 
                </form>    
            </div>

            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat"> Sair </a>
            </div>
        </div>   
               
        <ul id="slide-out" class="side-nav">           
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="Img_Prog/Fundo.jpg">
                    </div>
                    <a href="Professores.php"><img class="circle"  src="Img_Prog/<?php  echo $_SESSION['usuarioFoto'] ?>"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       
            
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Acesso as Turmas <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href="Professor-Turmas.php"> Turma de Programação </a></li>                               
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>    
        </ul>
        
    <br><br>  
    
    
    <div class="container">
        <div class="row">
            <div class="col s12 m12 112 container center z-depth-5">
                <div class="card-panel z-depth-5">
                    <nav class="nav-extended light-blue darken-1">
                        <div class="nav-content">
                            <ul class="tabs tabs-transparent">
                                <li class="tab"><a class="active" href="#presenca"> Presença </a></li>
                                <li class="tab"><a href="#notas"> Notas </a></li>
                                <li class="tab"><a href="#materialDidatico"> Material Didático </a></li>
                                <li class="tab"><a href="#alunos"> Alunos </a></li>
                                <li class="tab"><a href="#aulas"> Aulas </a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div id="presenca" class="col s12">
                            <table class="striped">
                                <thead>
                                  <tr>
                                      <th> Nome </th>
                                      <th> Presente </th>
                                      <th> Ausente </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td> Fernando Jean Silva Rocha </td>
                                    <td>                                                                              
                                        <input class="with-gap" type="radio" name="tPresenca" id="cPresente" value="Presente"><label for="cPresente"> P </label>                       
                                    </td>
                                    <td>
                                        <input class="with-gap" type="radio" name="tPresenca" id="cAusente" value="Ausente"><label for="cAusente"> A </label>          
                                    </td>
                                  </tr>
                                </tbody>
                            </table>         
                        </div>
                        
                    <div class="row">
                        <div id="notas" class="col s12 m12 l12">
                            <table class="striped">
                                <thead>
                                  <tr>
                                      <th> Nome </th>
                                      <th> Nota Total </th>
                                      <th> Adicionar Nota </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td> Fernando Jean Silva Rocha </td>
                                    <td>                                                                              
                                        <input class="col s4 m4 l4" type="number" name="tTotal" id="cTotal" value="88" disabled>                    
                                    </td>
                                    <td>
                                        <input class="col s4 m4 l4" type="number" name="tAdiciona" id="cAdiciona" value="">         
                                    </td>
                                  </tr>
                                </tbody>
                            </table>    
                            <br>
                            <button class="btn waves-effect waves-light light-blue darken-3" type="submit" onclick="return valida()"> Atualizar
                                <i class="material-icons right"> send </i>    
                            </button>        
                        </div>
                    </div>
                        
                    <div clas="row">
                        <div id="materialDidatico" class="col s12 m12 l12">
                            <table class="striped">
                                <thead>
                                  <tr>
                                      <th> Material Didático </th>
                                      <th> Data de Publicação </th>
                                      <th> Remover </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>  
                                        <a href="download/acme-doc-2.0.1.txt" download="Acme Documentation (ver. 2.0.1).txt"> Topologia de Redes </a> 
                                    </td>
                                    <td>                                                                              
                                        <h8>[11/08/2017]</h8>                        
                                    </td>
                                    <td>
                                        <a href="javascript: if(confirm('Tem certeza que deseja remover este Material Didático  <?php echo $l["nome"]; ?> ?')) location.href='Desliga.php?id=<?php echo $l["id"]; ?>';"> 
                                            <button class='btn-floating waves-effect waves-light red darken-2' type='button' onclick=''>
                                                <i class='material-icons right'> close </i>    
                                            </button>
                                        </a>          
                                    </td>
                                  </tr>
                                </tbody>
                            </table>    
                            <br>
                                <a class="btn-floating waves-effect waves-light light-blue darken-3 modal-trigger" href="#Adicionar" ><i class="material-icons right"> cloud_upload </i> </a>
                        </div>    
                    </div>
                        
                    <div class="row">    
                        <div id="alunos" class="col s12 m12 l12">
                            <table class="striped">
                                <thead>
                                    <tr>
                                        <th> Nome </th>
                                        <th> Nota Total </th>
                                        <th> Frequência </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> Fernando Jean Silva Rocha </td>
                                        <td>
                                            <input class="col s4 m4 l4" type="number" name="tTotal" id="cTotal" value="85.50" disabled>  
                                        </td>
                                        <td>
                                            <input class="col s4 m4 l4" type="text" name="tTotal" id="cTotal" value="98.5%" disabled>    
                                        </td>
                                    </tr>

                                </tbody>
                            </table>  
                        </div> 
                    </div> 
                    <div class="row">
                        <div id="aulas" class="col s12">
                            <table class="striped">
                                <thead>
                                  <tr>
                                      <th> Nome </th>
                                      <th> Presente </th>
                                      <th> Ausente </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td> Fernando Jean Silva Rocha </td>
                                    <td>                                                                              
                                        <input class="with-gap" type="radio" name="tPresenca" id="cPresente" value="Presente"><label for="cPresente"> P </label>                       
                                    </td>
                                    <td>
                                        <input class="with-gap" type="radio" name="tPresenca" id="cAusente" value="Ausente"><label for="cAusente"> A </label>          
                                    </td>
                                  </tr>
                                </tbody>
                            </table>         
                        </div>
                        
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div> 
    
    <!-- MODALS PARA REALIZAR UPLOAD DE UM ARQUIVO-->
        <div class="modal" id="Adicionar">
            <div class="modal-content">
                <h4 class="center"> Upload de Material Didático </h4><br>
                <form name="EnvioEmail" method="post" action="#######">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> library_books </i>
                            <label for="cNome">Nome: </label><input class="active validate" type="text" name="tNome" id="cNome" maxlength="50" placeholder="Nome do Arquivo" pattern="[A-Za-z\s]+$" required>
                        </div>
                    </div>         
                    <div class="row">
                        <div class="file-field input-field">
                            <div class="btn waves-effect waves-light light-blue darken-3">
                                <span> Arquivos </span>
                                <input type="file"  multiple>
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Upload do Arquivo">
                            </div>
                        </div> 
                    </div>
                    
                    <button class="btn waves-effect waves-light light-blue darken-3 right" type="submit" onclick="return valida()"> Publicar
                        <i class="material-icons right"> send </i>    
                    </button> 
                </form>    
            </div>
            <br>
        
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat rigth"> Sair </a>
            </div>
        </div>
    
  
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="js/materialize.min.js"></script>
    
        <!--SIDENAV-->
        <script>
            $(document).ready(function(){
                $(".btn").sideNav();
            });
        </script>
        
        <!-- MODALS -->
        <script>
            $(document).ready(function(){
                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
                $('.modal').modal();
             });       
        </script>  
        <script>   
            $(document).ready(function(){
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modal-trigger').leanModal();
            }); 
        </script>        

    </body>
</html>
