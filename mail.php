<?php 
    
    //RECUPERAR OS DADOS ENVIADOS PELO FORMULÁRIO
    $GetPost = filter_input_array(INPUT_POST,FILTER_DEFAULT);
    
    //VARIÁVEIS LOCAIS
    $Erro = true;
    $Nome = $GetPost['tNome'];
    $Email = $GetPost['tMail'];
    $Assunto = $GetPost['tAssunto'];
    $Mensagem = $GetPost['tMensagem'];
    /*
    
    //var_dump($GetPost); RETORNAS AS INFORMAÇÕES PEGADAS    
    
    //INCLUIR A CLASSE PHPMAILER
    include_once 'PHPMailer/class.smtp.php';
    include_once 'PHPMailer/class.phpmailer.php';
    
    //ENVIANDO E-MAIL UTILIZANDO A CLASSE PHPMAIL
    $Mailer = new PHPMailer;
    $Mailer->Charset = "uft8";
    $Mailer->SMTPDebug = 3;
    $Mailer->IsSMTP();
    $Mailer->Host = "localholst"; //HOST DA HOSPEDAGEM (MODIFICAR)
    $Mailer->SMTPAuth = true;
    $Mailer->Username = "fernandojean23@gmail.com"; //EMAIL JÁ EXISTENTE NA HOSPEDAGEM
    $Mailer->Password = "914161fj"; 
    $Mailer->SMTPSecure = "tls";
    $Mailer->Port = 587;
    $Mailer->FromName = "{$Nome}";
    $Mailer->From = "fernandojean23@gmail.com"; //O MESMO EMAIL DO USERNAME HOST
    $Mailer->AddAddress("fernandojean23@gmail.com"); //PODE SER OUTRO EMAIL
    $Mailer->IsHTML(true);
    $Mailer->Subject = "Novo contato - {$Nome}".date("H:i")." - ".date("d/m/Y");
    $Mailer->Body = "E-mail enviado por {$Nome}"; //PODE USAR HTML AQUI PARA ESTRUTURAR A MENSAGEM

    //VERIFICAÇÃO DE ENVIO DE EMAIL
    if($Mailer->Send()){
        $Erro = false;
    }
    var_dump($Erro);
    */

    // send email
    mail($Email, $Assunto,$Mensagem);
?>
