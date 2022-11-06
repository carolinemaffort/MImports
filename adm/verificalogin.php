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

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
    

//se o usuário não tiver login, ele será direcionado para a 
//página de login. Assim, não terá acesso ao gerenciamento 
//apenas pela URL

if(!isset ($_SESSION['email'])){
    header('Location: adm.html?erro=true');
    exit;
}

?>

