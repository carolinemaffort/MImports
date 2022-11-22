<?php

//use PHPMailer\PHPMailer\Exception;

// use email\Email;

// require __DIR__.'/class/Email.class.php';

// Requer o arquivo de autoloading
require_once(__DIR__ . "/etc/autoload.php");
require_once(__DIR__ . "/etc/conf.php");
include('class/model/CadastroModel.class.php');
include('class/dao/CadastroDao.class.php');
include('class/connection/DatabaseConnection.class.php');

// Recebe os dados do formulário
$email = $_REQUEST["email"];
$nome = $_REQUEST["name"];
$message = $_REQUEST["message"];
//print_r($email);
/**/
$connection = new DatabaseConnection();
//print_r($connection);

// Transporta os valores do formulário para o model de cadastro
$model = new CadastroModel(0, $email, $nome, $message);
print_r($model);

// Cria um DAO para formular queries com o Id, Email e Nome pegos do model
$dao = new CadastroDao(array($model->getId(), $model->getEmail(), $model->getNome(), $model->getMessage()));
print_r($dao);

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Cadastro no banco de dados
$result = $connection->query($dao->createQuery());
//print_r($result);

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
$mailSubject = 'Email Cadastrado';       // Título do Email
$mailMessage = 'Seu email foi cadastrado com sucesso! Muito obrigada e aguarde as próximas novidades.' . "</br>" . 'Att. Equipe Maffort Imports' ; // Corpo do Email

enviarEmail($mailTo, $mailFrom, $mailReplyTo, $mailSubject, $mailMessage);

// Printa o resultado
//echo "Query de inserção: " . $result . "<br>";

/*

// Transporta os valores do formulário para o model de login


if(isset($email, $nome)){
    
    // Fazer uma query de criar um Feedback no banco de dados
    $result = $connection->query("SELECT id FROM cadastro WHERE email ='$email' AND nome = '$nome'");
    
    if (count($result) == 1) {
        $_SESSION['email'] = $email;
        header ("Location: email.php");
    } else {
        echo 'nor';
    }
}*/



?>
