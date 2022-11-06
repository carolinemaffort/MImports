
<?php

if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

require_once(__DIR__ . "/../etc/autoload.php");

include ('verificalogin.php');
include ('../class/connection/DatabaseConnection.class.php');

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

        <div class="col-md-4">
        <div class="section-heading">
              <h2>Gerenciamento</h2>
        </div>
              <h4>O que você deseja fazer?</h4>
             <br>
       
        <form action="../crud/inserir.html" class="needs-validation" novalidate>
                <button type="submit" class="btn btn-danger filled-button">Inserir</button>
        </form><br>
        <br><a href="logout.php">Logout</a> <br>
        <?php
        try {
              $connection = new DatabaseConnection();
              $sql = "SELECT id, foto, titulo, descricao, preco FROM produtos";
              $result = $connection->query($sql);

              // print_r($result);

              foreach ($result as $rere) {
                echo "<br> id: ". $rere["id"]. " - Foto: ". $rere["foto"]. " - Titulo: ". $rere["titulo"]. " - Descrição: ". $rere["descricao"]. " - Preço: ". $rere["preco"] . "<br>";
             }
             
             $connection->close();
        } catch(Error $e) {
                echo $e;
        } catch(Exception $e) {
                echo $e;
        }
              
        
        //$consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error);

        ?>

        <!-- AQUI JÁ VAI TER A LISTAGEM DE PRODUTOS-->
<!-- 
    BOTÕES DELETAR E ALTERAR
        <form action="crud/alterar.php" class="needs-validation" novalidate>
                <button type="submit" class="btn btn-danger filled-button">Alterar</button>
        </form><br>
        <form action="crud/excluir.php" class="needs-validation" novalidate>
                <button type="submit" class="btn btn-danger filled-button">Deletar</button>
        </form><br> 
    
-->
        
          </div>

          

</div>
    </div>
</div>


</body>
</html>