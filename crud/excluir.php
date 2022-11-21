<?php

require_once(__DIR__ . "/../etc/autoload.php");
include ('../class/connection/DatabaseConnection.class.php');

$connection = new DatabaseConnection();

$id = $_REQUEST['id'];

// deletar
$sql = "DELETE FROM produtos WHERE id=$id";

if ($connection->query($sql) === TRUE) {
  echo "Deletado!";
} else {
  echo "Deu ruim! " . $connection->error;
}

$connection->close();
?> 

<button type="submit" class="btn btn-danger filled-button" onclick="voltar()" >Voltar</button>

<script>
  //window.location.replace("https://localhost/mimports/adm/gcm.php"); 
   window.location.replace("https://<?= $_SERVER["SERVER_NAME"] ?>/mimports/adm/gcm.php"); 
</script>


