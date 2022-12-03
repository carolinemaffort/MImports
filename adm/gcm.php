
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

        <div class="col-md-12">
        
        <div class="section-heading">
              <h2>Gerenciamento</h2>
        </div>
              <h4>O que você deseja fazer?</h4>
             <br>
       
        <form action="../crud/inserir.html" class="needs-validation" novalidate style="display:inline-block">
                <button type="submit" class="btn btn-danger filled-button">Inserir</button>
        </form>
        <a class="btn btn-danger filled-button" href="#feedbacks" style="display:inline-block">Feedbacks</a>
        <a class="btn btn-danger filled-button" href="logout.php" style="display:inline-block">Logout</a><br>

        
        <div class="row">

        <?php
        try {
              $connection = new DatabaseConnection();
              $sql = "SELECT id, foto, titulo, descricao, preco FROM produtos";
              $result = $connection->query($sql);

              // print_r($result);

              foreach ($result as $rere) {
                echo "<div class='col-md-4'> <form name='formulario" . $rere["id"] . "' action='../crud/alterar.php' method='post' enctype='multipart/form-data' style='display: inline-block'><br> - ID: " . $rere["id"] . " <br>
                - Foto: <br> <img src='https://hostdeprojetosdoifsp.gru.br/mimports/assets/images/" . $rere["foto"] . "' alt='' width='300'><br><br><input type='file' name='foto' value='" . $rere["foto"] . "'><br>
                <br>- Titulo: <input type='text' name='titulo' value='" . $rere["titulo"] . "'> 
                <br>- Descrição: <input type='text' name='desc' value='" . $rere["descricao"] . "'> 
                <br> - Preço: <input type='text' name='preco' value='" . $rere["preco"] . "'><input type='hidden' name='id' value='" . $rere['id'] . "'></form>" . "<br>" ."<br>" .
                "<button type='submit' class='btn btn-danger filled-button' onclick='altform(" . $rere["id"] . ")'>Alterar</button>" .  "&nbsp" . 
                "<form action='../crud/excluir.php' method='post' style='display: inline-block'>  <button type='submit' class='btn btn-danger filled-button' >Deletar</button> <input type='hidden' name='id' value='" . $rere['id'] . "'></form> " . "<br><br></div>";
             }
             
             $connection->close();
        } catch(Error $e) {
                echo $e;
        } catch(Exception $e) {
                echo $e;
        }

        ?>
        

  <div class="col-md-12" id="feedbacks">
          <div class="section-heading">
              <h2>Feedbacks</h2>
          </div>

          <?php
          $connection = new DatabaseConnection();
              $sql = "SELECT id, nome, email, mensagem FROM cadastro";
              $resultado = $connection->query($sql); 

              //print_r($result);


              foreach ($resultado as $re){
                echo "<div class='col-lg-4 col-md-4 all gra'>
              <div class='product-item'>
                
                <div class='down-content'>
                  <h4> " . $re["nome"] . " </h4>
                  <p> " . $re["mensagem"] . " </p>
                  <form action='../crud/fdexcluir.php' method='post' style='display: inline-block'>  <button type='submit' class='btn btn-danger filled-button' >Deletar</button> <input type='hidden' name='id' value='" . $re['id'] . "'></form>
                </div>
              </div>
            </div>";
            }
?>
   </div>

        </div>
          </div>
</div>
    </div>
</div>
        <script>
          
          function altform(id){
                document.getElementsByName("formulario" + id)[0].submit();
          }

        </script>



</body>
</html>
