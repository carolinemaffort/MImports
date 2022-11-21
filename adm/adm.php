<!DOCTYPE html>
<html lang="en">
<head>
  <title>Maffort Imports</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="../assets/images/logo.png">
</head>
<body>

</body>
</html>

<?php


// Requer o arquivo de autoloading
require_once(__DIR__ . "/../etc/autoload.php");
require_once(__DIR__ . "/../etc/conf.php");
include('../class/model/LoginModel.class.php');
include('../class/connection/DatabaseConnection.class.php');

//print_r($_REQUEST);

// Coisa que eu vou receber do formulário html
$email = $_REQUEST["email"];
$senha = $_REQUEST["pwd"];

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Transporta os valores do formulário para o model de login
$model = new LoginModel(0, $email, $senha);
print_r($model);

if(isset($email, $senha)){
    
    // Fazer uma query de criar um Feedback no banco de dados
    $result = $connection->query("SELECT id FROM login WHERE email ='$email' AND senha = '$senha'");

    if (count($result) == 1) {
        $_SESSION['email'] = $email;
        header ("Location: gcm.php");
    } else {
        echo 'nor';
    }
}

//se o get tem a variável erro, ele cria a var erro
//e notifica o problema
if(isset($_GET['erro'])){
    $erro = "Você não tem permissão para acessar essa página";
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
//echo "Query de inserção: " . $result . "<br>";
?>

<!--interface da notificação de erro-->
<div style="background-color:coral; margin:10px">
    <?php echo $erro ?? '' ?>
</div>
<br><a href="logout.php">Logout</a>