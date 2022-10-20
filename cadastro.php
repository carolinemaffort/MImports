<?php

use email\Email;

require __DIR__.'\\class\\Email.class.php';

// Requer o arquivo de autoloading
require_once(__DIR__ . "\\etc\\autoload.php");

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


$emailer = new Email();
$emailer->setFrom("maffort.imports@gmail.com", "Maffort Imports");
$emailer->addTo("$email", "$nome");
$emailer->setSubject("Teste de Email");
$emailer->setMsgTxt("Testandoooo");
$emailer->send_gmail();

?>