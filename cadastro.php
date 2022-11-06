<?php

// use email\Email;

// require __DIR__.'/class/Email.class.php';

// Requer o arquivo de autoloading
require_once(__DIR__ . "/etc/autoload.php");

// Recebe os dados do formulário
$email = $_REQUEST["email"];
$nome = $_REQUEST["name"];

// Transporta os valores do formulário para o model de cadastro
$model = new CadastroModel(0, $email,  $nome);

//print_r($model);

// Cria um DAO para formular queries com o Id, Email e Nome pegos do model
$dao = new CadastroDao(array($model->getId(), $model->getEmail(), $model->getNome()));
print_r($dao);

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Cadastro no banco de dados
$result = $connection->query($dao->createQuery());

//print_r($dao->createQuery());
// Printa o resultado
echo "Query de inserção: " . $result . "<br>";



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