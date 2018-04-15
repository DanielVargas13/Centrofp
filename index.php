<!DOCTYPE html>
<html>
    <head>
        <title> Login - CFP </title>
        <meta charset="UTF-8">
        <meta name="discription" content="Centro de Formação Profissional que oferece diversos cursos profissionalizantes em quase todas as áreas.">
        <meta name="keywords" content="CFP, Centro de Formação Profissional, cfp, Cursos Profissionalizantes, cursos, cfp Pedro Leopoldo, Pedro Leopoldo">
        <meta name="author" content="Dalila Mylena Vieira, Daniel Henrique Vargas, Davi Brandão Saldanha, Fernando Jean Silva Rocha, Otávio Felipe Celani e Silva">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Materialize CSS-->
        <link rel="stylesheet" href="css/materialize.min.css">
        
        <script>
            function valida(){
                var email = document.getElementById('cEmail');
                var senha = document.getElementById('cSenha');
                var seleciona = document.getElementById('cMySelect');
                
                if(email.value == ''){
                    alert('Informe o e-mail!');
                    formCad.tEmail.focus();
                    return false;
                }else{
                    if(senha.value.length<8){
                        alert('A senha deve conter no mínimo 8 caracteres!');
                        formCad.tSenha.focus();
                        return false;
                    }else if(seleciona.value == ''){
                        alert('Selecione o Login de Direcionamento!');
                        return false;
                    }
                }
            }
            
        </script>
        
        <style>
            body{
                background-image: url("Img_Prog/Plano-Fundo-Index.jpg");
                background-repeat: no-repeat;
                background-size: cover;
                background-attachment: fixed;
            }
        </style>
        
    </head>
    <body class="container grey lighten-4"> 
        <br><br><br><br><br>
        <div class="row">  
            <div class="col s10 m10 16 container center z-depth-5 offset-s1 offset-m1">
                <div class="card-panel z-depth-5"> 
                    <h3 class="center"> Login</h3>
                    <div class="row">
                        <form method="post" action="Valida-Login.php" name="FORM" id="formCad">
                            <div class="row">
                                <div class="input-field col s10 offset-s1">
                                    <i class="material-icons prefix"> email </i>
                                    <label>E-mail: </label><input class="active validate" type="email" name="tEmail" id="cEmail" value="" maxlength="30" required>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="input-field col s10 offset-s1">
                                    <i class="material-icons prefix">vpn_key</i>
                                    <label>Senha: </label><input class="active validate" type="password" name="tSenha" id="cSenha" maxlength="15" required>
                                </div>
                            </div>
                            <div class="row center">
                                <div class="input-field col s10 offset-s2">
                                   <div class="col s2">
                                        <i class="material-icons prefix left"> contacts </i>                             
                                   </div>
                                   <div class="col s6">
                                        <select id="cCargo" name="tCargo">
                                            <option value="" disabled selected > Selecione o Tipo de Login </option>
                                            <option value="Aluno"> Aluno </option>
                                            <option value="Comercial"> Comercial </option>
                                            <option value="Gerencia"> Gerência </option>
                                            <option value="Professor"> Professor</option>
                                            <option value="Recepcao"> Recepção </option>
                                        </select>
                                      </div>                                   
                                </div>                                
                            </div>
                            <input type="hidden" name="tICargo" id="cICargo" /> 
                            <div class="row">
                                <div class="center">   
                                    <button class="btn waves-effect waves-light  light-blue darken-3" type="submit" onclick="return valida()"> Login 
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
        
        <!-- INICIALIZA OS HIDDEN DOS SELECTS -->
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $('#cCargo').on('change', function() {
                $('#cICargo').val($('#cCargo').val());
                });
            });
            $(document).ready(function() {
                $('select').material_select();
                $('#cUnidade').on('change', function() {
                $('#cIUnidade').val($('#cUnidade').val());
                });
            });
        </script> 
              
    </body>
</html>