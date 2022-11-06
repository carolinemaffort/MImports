<?php

// Requer o arquivo de autoloading
require_once(__DIR__ . "/etc/autoload.php");

// Coisa que eu vou receber do formulário html
$message = $_REQUEST["message"];

// Transporta os valores do formulário para o model de feedback
$model = new FeedbackModel(0, $message);


// Cria um DAO para formular queries com o Id e a Mensagem pegos do model
$dao = new FeedbackDao(array($model->getId(), $model->getMessage()));
print_r($dao);

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Feedback no banco de dados
$result = $connection->query($dao->createQuery());

// Printa o resultado para teste
echo "Query de inserção: " . $result . "<br>";


?>