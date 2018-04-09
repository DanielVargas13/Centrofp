<?php 
    
    //RECUPERAR OS DADOS ENVIADOS PELO FORMULÁRIO
    $GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    
    //VARIÁVEIS LOCAIS
    $Erro = true;
    $Nome = $GetPost['tNome'];
    $Email = $GetPost['tMail'];
    $Assunto = $GetPost['tAssunto'];
    $Mensagem = $GetPost['tMensagem'];
    mail($Email, $Assunto,$Mensagem);
?>
