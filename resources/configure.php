<?php


if ( session_status() == PHP_SESSION_NONE ) { //  PHP >= 5.4.0
    session_start();
}

$path   = array();
$confDB = array();
$smtp   = array();

// Definir caminhos padrões
$path["projectDIR"]     = __DIR__ ;
$path["projectURL"]     = __DIR__ ;
$path["uploadPublic"]   = __DIR__ ."\\upFilesPublic\\";
$path["uploadPrivate"]  = __DIR__ ."\\upFilesPrivate\\";
$path["autoload"]       = __DIR__ ."/autoload.php";
$_SESSION['path']       = $path;

// Definir configurações de Banco de Dados
if ( $_SERVER ['HTTP_HOST'] == 'localhost' ){ // Em localhost
    $confDB['host']     = "localhost";
    $confDB['user']     = "root";
    $confDB['pass']     = "";
    $confDB['schema']   = "mimports";
}else{                                  // Em deploy
    $confDB['host']  = "51.79.72.47";
    $confDB['user']  = "hostdeprojetos_mimports";
    $confDB['pass']  = "pUBN2?U2{;H?";
    $confDB['schema']= "hostdeprojetos_mimports";
}
$_SESSION["confDB"] = $confDB;

// Definir Configurações de SMTP
// $smtp['host']       = 'smtp.gmail.com';
// $smtp['auth']       =  true;
// $smtp['secure']     = 'tls';
// $smtp['username']   = 'maffort.imports@gmail.com';
// $smtp['password']   = 'xoqxctxrvzlslwoe';
// $smtp['port']       =  465;
// $_SESSION["smtp"]   = $smtp;

?>