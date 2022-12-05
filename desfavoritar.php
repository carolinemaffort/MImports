<?php

require_once(__DIR__ . "/etc/autoload.php");

$favoritos = json_decode($_COOKIE["favoritos"]);

if (is_array($favoritos)) {
  $index = array_search($_REQUEST["id"], $favoritos);
  if (is_int($index)) {
    $newArray = array_slice($favoritos, 0, $index);
    $newArray = array_merge($newArray, array_slice($favoritos, $index + 1, count($favoritos) - ($index + 1)));
    if (setcookie("favoritos", json_encode($newArray), time() + 60 * 60 * 24 * 3)) {
      echo "Desfavoritando...";
    } else {
      echo "Deu ruim! ";
    }
  }
}
?> 

<script>
  //window.location.replace("https://localhost/mimports/adm/gcm.php"); 
   window.location.replace("https://<?= $_SERVER["SERVER_NAME"] ?>/mimports/products.php"); 
</script>
