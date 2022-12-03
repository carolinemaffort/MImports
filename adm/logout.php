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

require_once(__DIR__ . "/../etc/autoload.php");
require_once(__DIR__ . "/../etc/conf.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
session_destroy();
//manda pra página index https://localhost/mimports/index.html
header('Location: https://'.  $_SERVER["SERVER_NAME"] . '/mimports/index.php'); 


?>
