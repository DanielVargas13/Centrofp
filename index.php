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
    
            function myFunction(val){
                if(val == "Aluno"){
                    document.FORM.action = "Valida-Aluno.php";
                }else if(val == "Comercial"){
                    document.FORM.action = "Valida-Comercial.php";
                }else if(val == "Gerencia"){
                    document.FORM.action = "Valida-Gerente.php";
                }else if(val == "Professor"){
                    document.FORM.action = "Valida-Professor.php";
                }else if(val == "Recepcao"){
                    document.FORM.action = "Valida-Recepcao.php";
                }
            }
            
        </script>
        
        <style>
            body{
                background-image: url("Imagens/Plano-Fundo.jpg");
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
                        <form method="post" action="" name="FORM" id="formCad">
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
                                        <select id="cMySelect" name="tMySelect" onchange="myFunction(this.value)">
                                            <option value="" disabled selected > Selecione o Tipo de Login </option>
                                            <option value="Aluno" OnClick="myFunction('Aluno')"> Aluno </option>
                                            <option value="Comercial" Onclick="myFunction('Comercial')"> Comercial </option>
                                            <option value="Gerencia" Onclick="myFunction('Gerencia')"> Gerência </option>
                                            <option value="Professor" OnClick="myFunction('Professor')"> Professor</option>
                                            <option value="Coordenacao" Onclick="myFunction('Recepcao')"> Recepção </option>
                                        </select>
                                      </div>                                   
                                </div>                                
                            </div>
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
              
    </body>
</html>
