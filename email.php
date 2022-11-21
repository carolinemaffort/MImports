<?php 

include('class/connection/DatabaseConnection.class.php');

$connection = new DatabaseConnection();

$email = $connection->query("SELECT email from cadastro");



function enviarEmail( $to, $from, $replyTo, $subject, $message ) {
    $headers =  'From: '       .$from .    "\r\n" .
        'Reply-To: '   .$replyTo . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    $mail_enviado =   mail($to, $subject, $message, $headers);
    // A função mail() retorna true ou false pro envio
    if ( $mail_enviado ){
        echo ("Email enviado com sucesso!");
        return (true);
    }else{
        echo ("Falha ao Enviar Email! \n<br> Verifique suas configurações smtp no php.ini");
        return (false);
    }
    
}

$mailTo      = $email; // Destinário do Email
$mailFrom    = 'maffort.imports@gmail.com'; // Remetente do Email
$mailReplyTo = 'naoresponda@gmail.com';  // Em caso de Resposta enviar pra quem?
$mailSubject = 'Título do Email';       // Título do Email
$mailMessage = 'Corpo do Email';        // Corpo do Email

enviarEmail($mailTo, $mailFrom, $mailReplyTo, $mailSubject, $mailMessage);

#$emailer = new Email();
#$emailer->setFrom("maffort.imports@gmail.com", "Maffort Imports");
#$emailer->addTo("$email", "$nome");
#$emailer->setSubject("Teste de Email");
#$emailer->setMsgTxt("Testandoooo");
#$emailer->send_gmail();



?>