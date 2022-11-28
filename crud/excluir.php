<?php

require_once(__DIR__ . "/../etc/autoload.php");
include ('../class/connection/DatabaseConnection.class.php');

$connection = new DatabaseConnection();

$id = $_REQUEST['id'];

// deletar
$sql = "DELETE FROM produtos WHERE id=$id";

if ($connection->query($sql) === TRUE) {
  echo "Deletando...";
} else {
  echo "Deu ruim! " . $connection->error;
}

$connection->close();
?> 

<script>
  //window.location.replace("https://localhost/mimports/adm/gcm.php"); 
   window.location.replace("https://<?= $_SERVER["SERVER_NAME"] ?>/mimports/adm/gcm.php"); 
</script>


