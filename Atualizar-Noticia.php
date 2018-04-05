<?php 
    session_start();
    include "Conexao.php";
    $id = intval($_GET['id']);
$sql_banco = mysqli_query($conn, "SELECT * FROM noticias WHERE id='$id' LIMIT 1");
 $r = mysqli_fetch_assoc($sql_banco);
?>
<!DOCTYPE html>

<html>
    <head>
        
        <title>Atuailzar Notícia</title>
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
        
        <div class="row">
            <div class="col s10 offset-s1 m8 offset-m2 l6 offset-l3">
                <div class="card-panel z-depth-5 ">
                    <h2 class="center"> Atualizar Notícia </h2>
                    <div class="row">
                        <form method="POST" name="formCad1" id="formCad" action="Alterar-Noticia.php" enctype="multipart/form-data">
                             <input type="text" value="<?php  echo $id ?>" name="tId" id="cId" hidden/>
                             <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> account_box </i>
                            <label for="cTitulo">Titulo: </label><input class="active validate" value="<?php echo $r["titulo"]; ?>" type="text" name="tTitulo" id="cTitulo" maxlength="50" placeholder="Titulo da notícia" pattern="[A-Za-z\s]+$" required>
                        </div>
                    </div>         
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix"> message </i>
                            <textarea id="cDescricao" name="tDescricao" class="materialize-textarea active validate" placeholder="Mensagem a ser Enviada" maxlength="500" required><?php echo $r["descricao"]; ?></textarea>
                            <label for="cMensagem"> Mensagem </label>
                        </div>
                    </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span> Foto </span>
                                        <input type="file" name="arquivo" required>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="center">
                                           <a href="Gerencia.php">
                                    <button class="btn waves-effect waves-light" type="button"> Voltar
                                        <i class="material-icons right"> send </i>    
                                    </button>  </a>
                                    <button class="btn waves-effect waves-light" type="submit" onclick=""> Alterar
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
        
</body>
</html>
