<?php 
    $servidor = "dados.000webhost.com";
    $usuario = "id5393392_cfpadmin";
    $senha = "914161tis";
    $dbname = "id5393392_cfp";
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexão: " . mysqli_connect_error());
    }else{
        //echo "Conexão realizada com sucesso!";
    }
?>
