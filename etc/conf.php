<?php
git commit -m "Adding some code"

// Inicia ou resume uma sessão
session_start();


// Verifica qual é o local em que o código está sendo executado
if ($_SERVER["HTTP_HOST"] == "localhost") {
    // Seta o host para conexão com BD
    $_SESSION["CONNECTION"]["HOSTNAME"] = "localhost";
    // Seta o usuário para conexão com BD
    $_SESSION["CONNECTION"]["USERNAME"] = "root";
    // Seta a senha para conexão com BD
    $_SESSION["CONNECTION"]["PASSWORD"] = "";
    // Seta o banco de dados para conexão
    $_SESSION["CONNECTION"]["DATABASE"]["NAME"] = "mimports";
} else {
    // Seta o host para conexão com BD
    $_SESSION["CONNECTION"]["HOSTNAME"] = "51.79.72.47";
    // Seta o usuário para conexão com BD
    $_SESSION["CONNECTION"]["USERNAME"] = "hostdeprojetos_mimports";
    // Seta a senha para conexão com BD
    $_SESSION["CONNECTION"]["PASSWORD"] = "pUBN2?U2{;H?";
    // Seta o banco de dados para conexão
    $_SESSION["CONNECTION"]["DATABASE"]["NAME"] = "hostdeprojetos_mimports";
}

// Seta a tabela de feedback e seus campos
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["FEEDBACKS"]["NAME"] = "feedbacks";
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["FEEDBACKS"]["FIELDS"] = array("id", "mensagem");

 
//Seta a tabela de cadastro e seus campos 
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["CADASTRO"]["NAME"] = "cadastro";
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["CADASTRO"]["FIELDS"] = array("id", "email", "nome");

//Checar se isso aqui tá certo mesmo 
//Seta a tabela de cadastro e seus campos 
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["LOGIN"]["NAME"] = "login";
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["LOGIN"]["FIELDS"] = array("id", "email", "senha");

//$_SESSION["SMTP"]["HOSTNAME"] = 'smtp.gmail.com';
//$_SESSION["SMTP"]["AUTH"] = true;
//$_SESSION["SMTP"]["SECURE"] = 'tls';
//$_SESSION["SMTP"]["USERNAME"] = 'maffort.imports@gmail.com';
//$_SESSION["SMTP"]["PASSWORD"] = 'mrygzubpthgpgwex';
//$_SESSION["SMTP"]["PORT"] = 465;

?>
