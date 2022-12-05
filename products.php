<?php 
require_once(__DIR__ . "/etc/autoload.php");


include ('class/connection/DatabaseConnection.class.php');

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="icon" href="assets/images/logo.png">
    <title>Maffort Imports</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
 
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Maffort <em>Imports</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Início
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="products.php">Produtos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre nós</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="favoritos.php"> <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg></span>
              </a>
              </li>



             

              
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <img src="assets/images/banners.png" class="page-heading products-heading">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
            <!--<h4>new arrivals</h4>
              <h2>sixteen products</h2> --> 
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">Todos os produtos</li>
                  <li data-filter=".des">Relógios</li>
                  <li data-filter=".dev">Fones</li>
                  <li data-filter=".gra">Cabos</li>
                  <li data-filter=".gru">Mouses</li>
                  <li data-filter=".daw">Caixas</li>
                  <li data-filter=".gre">Outros</li>
              </ul>
            </div>
          </div>
          
          
          
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">
                	<?php 
                try{
                    $connection = new DatabaseConnection();
                    $sql = "SELECT id, foto, titulo, descricao, preco FROM produtos";
                    $resultado = $connection->query($sql); 
                    $favoritos = json_decode($_COOKIE["favoritos"]);
                    if (!is_array($favoritos)) {
                      $favoritos = array();
                    }
                    //print_r(is_int(array_search(, $favoritos)));
                    foreach ($resultado as $re){
                        echo "<div class='col-lg-4 col-md-4 all gra'>
                      <div class='product-item'>
                        <img src='https://hostdeprojetosdoifsp.gru.br/mimports/assets/images/" . $re["foto"] . "' alt=''>
                        <div class='down-content'>
                          <h4> " . $re["titulo"] . " </h4>
                          <h6> R$" . $re["preco"] . " </h6>
                          <p> " . $re["descricao"] . " </p>
                          <ul class='stars'>

                            <li " . (is_int(array_search($re["id"], $favoritos)) ? "hidden" : "") . "><a href='favoritar.php?id=" . $re["id"] . "' style='color:black'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart' viewBox='0 0 16 16'>
                              <path d='m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/>
                            </svg></a></li>

                            <li " . (is_int(array_search($re["id"], $favoritos)) ? "" : "hidden") . "><a href='desfavoritar.php?id=" . $re["id"] . "' style='color:red'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart-fill' viewBox='0 0 16 16'>
                            <path fill-rule='evenodd' d='M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z'/>
                          </svg></a></li>
          
                            
                          </ul>
                          
                        </div>
                      </div>
                    </div>";
                    } /*<span><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-heart-fill' viewBox='0 0 16 16'>
                    <path fill-rule='evenodd' d='M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z'/>
                    </svg></span>*/
                 $connection->close();
        } catch(Error $e) {
             echo $e;
        } catch(Exception $e) {
            echo $e;
        }
                    ?>
                
             
                    
                </div>
                <div class="row justify-content-center">
                  <fieldset>
                    <a href="#" class="filled-button">Voltar ao topo</a>
                  </fieldset>
                </div>
            </div>
          </div>
         
        </div>
      </div>
    
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2022
            
            - Design: <a rel="nofollow noopener" href="http://projetos.talentosdoifsp.gru.br/mabe" target="_blank">MABE</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
