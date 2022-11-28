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
include ('../class/model/InserirModel.class.php');
include ('../class/dao/InserirDao.class.php');
include ('../class/connection/DatabaseConnection.class.php');

// Recebe os dados do formulário
$tmpName = $_FILES['foto']['tmp_name'];
//$time = (new \DateTime())->format('YmdHisu');
$pathFile = '../assets/images/' . $_FILES['foto']['name'];
move_uploaded_file($tmpName, $pathFile);
$titulo = $_REQUEST["titulo"];
$preco = $_REQUEST["preco"];
$descricao = $_REQUEST["desc"];


// Transporta os valores do formulário para o model de cadastro
$model = new InserirModel(0, $_FILES['foto']['name'],  $titulo, $preco, $descricao);

//print_r($model);

// Cria um DAO para formular queries com o Id, Email e Nome pegos do model
$dao = new InserirDao(array($model->getId(), $model->getFoto(), $model->getTitulo(), $model->getPreco(), $model->getDescricao()));
print_r($dao);

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Cadastro no banco de dados
$result = $connection->query($dao->createQuery());

//print_r($dao->createQuery());
// Printa o resultado
echo "Query de inserção: " . $result . "<br>";

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/images/logo.png">
    <title>Maffort Imports</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
    <link rel="stylesheet" href="../assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    

  </head>
<body>

<div class="latest-products">
    <div class="container">
<div class="row">

<button type="submit" class="btn btn-danger filled-button" onclick="voltar()" >Voltar</button>

        
</div>
    </div>
</div>

  <script>
function voltar(){
  window.location.replace("https://hostdeprojetosdoifsp.gru.br/mimports/adm/gcm.php"); 
   //window.location.replace("https://<?php //echo '.  $_SERVER["SERVER_NAME"] . ' ?>/mimports/adm/gcm.php"); 
}

  </script>

</body>
</html>

