<?php

require_once(__DIR__ . "/etc/autoload.php");

$favoritos = json_decode($_COOKIE["favoritos"]);

if (!is_array($favoritos)) {
  $favoritos = array();
}

if (array_search($_REQUEST["id"], $favoritos) === false) {
  array_push($favoritos, $_REQUEST["id"]);
  if (setcookie("favoritos", json_encode($favoritos), time() + 60 * 60 * 24 * 3)) {
    echo "Favoritando...";
  } else {
    echo "Deu ruim! ";
  }
}
?> 

<script>
  //window.location.replace("https://localhost/mimports/adm/gcm.php"); 
   window.location.replace("https://<?= $_SERVER["SERVER_NAME"] ?>/mimports/products.php"); 
</script>