<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "cfp";
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexão: " . mysqli_connect_error());
    }else{
        //echo "Conexão realizada com sucesso!";
    }
?>
