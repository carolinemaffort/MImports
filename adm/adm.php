<?php

// Requer o arquivo de autoloading
require_once(__DIR__ . "\\..\\etc\\autoload.php");

// Coisa que eu vou receber do formulário html
$email = $_REQUEST["email"];
$senha = $_REQUEST["pwd"];

// Transporta os valores do formulário para o model de login
$model = new LoginModel(0, $email, $senha);

if($email == "maffort.imports@gmail.com" && $senha == "123"){
    header("Location: https://" . $_SERVER["SERVER_NAME"] . "/mimports/gcm.html"); 
}else{
    echo "Tá errado!"; 
    die;
}

//print_r($model);

// Cria um DAO para formular queries com o Id, Email e Senha pegos do model
$dao = new LoginDao(array($model->getId(), $model->getEmail(), $model->getSenha()));
print_r($dao);

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Login no banco de dados
$result = $connection->query($dao->createQuery());

//print_r($dao->createQuery());
// Printa o resultado
echo "Query de inserção: " . $result . "<br>";
?>