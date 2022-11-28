<?php
// Requer o arquivo de autoloading
require_once(__DIR__ . "/../etc/autoload.php");
include ('../class/model/InserirModel.class.php');
include ('../class/dao/InserirDao.class.php');
include ('../class/connection/DatabaseConnection.class.php');

// Recebe os dados do formulário
$id = $_REQUEST['id'];
$tmpName = $_FILES['foto']['tmp_name'];
$time = (new DateTime())->format('YmdHisu');
$pathFile = '../assets/images/' . $time .  $_FILES['foto']['name'];
move_uploaded_file($tmpName, $pathFile);
$titulo = $_REQUEST["titulo"];
$preco = $_REQUEST["preco"];
$descricao = $_REQUEST["desc"];



// Transporta os valores do formulário para o model de cadastro
$model = new InserirModel($id, $time .  $_FILES['foto']['name'],  $titulo, $preco, $descricao);

//print_r($model);

// Cria um DAO para formular queries com o Id, Email e Nome pegos do model
$dao = new InserirDao(array($model->getId(), $model->getFoto(), $model->getTitulo(), $model->getPreco(), $model->getDescricao()));
//print_r($dao);

$dao -> setComplement("WHERE id = $id");

// Cria uma nova conexão com os dados do conf.php
$connection = new DatabaseConnection();

// Fazer uma query de criar um Cadastro no banco de dados
$result = $connection->query($dao->updateQuery());



?>

<script>
  //window.location.replace("https://localhost/mimports/adm/gcm.php"); 
   window.location.replace("https://<?= $_SERVER["SERVER_NAME"] ?>/mimports/adm/gcm.php"); 
</script>
