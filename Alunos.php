<?php 
    session_start();
    include "Conexao.php";
$sql_banco = mysqli_query($conn, "SELECT * FROM noticias ORDER BY data desc LIMIT 5");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Alunos - Home</title>
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
                        <li><a class="waves-effect waves-light modal-trigger" href="Alunos.php"> Home </a></li>                       
                        <li><a class="waves-effect waves-light modal-trigger" href="#Mensagens" > E-mails </a></li>
                        <li><a class="waves-effect waves-light" href="Sair.php"> Sair </a></li>                    
                        <li><a class="btn waves-effect waves-light red darken-1" id="side" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                    </ul>
                </div>
            </nav> 
        </div>

        <br><br><br>

       <?php while($l = mysqli_fetch_array($sql_banco)){ ?>   
            <div class="row">
              <div class="col s12 m6 offset-m3">
                <div class="card z-depth-4">
                    <div class="card-image">
                        <img src="Img_Noticias/<?php echo $l["imagem"]; ?>">
                        <span class="card-title"> <?php echo $l["titulo"]; ?> </span>
                  </div>
                  <div class="card-content">
                    <p><?php echo $l["descricao"]; ?></p>
                    <h8>[<?php echo date("d/m/Y", strtotime($l['data']));?>]</h8>
                  </div>
                </div>
              </div>
            </div>
        <?php } ?> 
               
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
                    <input class="active validate" value="#" type="email" name="tMail" id="cMail" maxlength="30" hidden> 
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
                        <img src="Imagens/fundo.jpg">
                    </div>
                    <a href="Alunos.php"><img class="circle" src="Imagens/homens.png"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Informações da Turma </a>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>    
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Material Didático </a>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>
            <li class="no-padding"> 
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Horários <i class="material-icons"> arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                <li><a class="waves-effect" href=""> Tabela de Horários </a></li>   
                                <li><a class="waves-effect" href=""> Horários - Informática </a></li>                              
                                </li>
                            </ul>
                        </div>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Documentos </a>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>
                   

        
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
