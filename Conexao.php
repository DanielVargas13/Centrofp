<?php 
    $servidor = "centrofpserv.mysql.database.azure.com";
    $usuario = "cfpadmin@centrofpserv";
    $senha = "914161Tis";
    $dbname = "cfp";
    
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    
    if(!$conn){
        die("Falha na conexão: " . mysqli_connect_error());
    }else{
        //echo "Conexão realizada com sucesso!";
    }
?>