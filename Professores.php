<?php 
    session_start();
    include "Conexao.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Gerência - Home</title>
        <meta charset="UTF-8">
        <meta name="discription" content="Simple">
        <meta name="keywords" content="Simple">
        <meta name="author" content="Fernando Jean">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
        
    </head>
    <body class="grey lighten-4">
        
        <?php 
            $sql_pegadados = mysqli_query($conn, "SELECT * FROM gerente");
            while($ln = mysqli_fetch_array($sql_pegadados)){
                $nome = $ln['nome'];
            }
        ?>
        
        <nav class="blue">
            <div class="nav-wrapper">
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="waves-effect" href="#"> Notícias </a></li>
                    <li><a class="waves-effect" href="#"> Grade de Horários </a></li>
                    <li><a class="waves-effect" href="#"> Calendário </a></li>
                    <li><a class="waves-effect" href="#"> Mensagens </a></li>
                    <li><a class="waves-effect" href="Sair.php"> Sair </a></li>                    
                    <li><a class="btn waves-effect blue" data-activates="slide-out"><i class="material-icons"> menu </i></a></li>
                </ul>
            </div>
        </nav>
        
        <ul id="slide-out" class="side-nav">
            
            <li>
                <div class="user-view">
                    <div class="background">
                        <img src="Imagens/fundo.jpg">
                    </div>
                    <a href=""><img class="circle" src="Imagens/homens.png"></a>
                    <a href=""><span class="white-text"> <?php  echo $_SESSION['usuarioNome'] ?></a>
                </div>
            </li>       
            
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header" href="Cadastro-Funcionario.php"> Cadastro de Funcionários </a>
                    </li>   
                </ul>
            </li>
            <li><div class="divider"></div></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li><a class="waves-effect collapsible-header " href="#"> Gerência de Cursos </a>
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

        
        <!-- Jquery-->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!--Materialize JS-->
        <script src="js/materialize.min.js"></script>
    
        <script>
            $(document).ready(function(){
                $(".btn").sideNav();
            });
        </script>

    </body>
</html>
