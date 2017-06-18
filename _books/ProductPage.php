<?php

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

// Verifica se o ISBN do livro foi passado via GET URL
if(isset($_GET['ISBN']) && $_GET['ISBN'] !== ''){

  // Coleta os dados via GET
  $ISBN = $_GET['ISBN'];

  // cria a instrução SQL que vai selecionar os dados
  $query_selectISBN = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

  // executa a query
  $selectISBN = mysqli_query($connect, $query_selectISBN);

  // coleta os livros com aquele ISBN
  $rowISBN = mysqli_fetch_assoc($selectISBN);

}

?>

<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

  <head>

    <title>Product Page</title>
    <!-- ************************************************ -->
    <!--HEADER-->
    <?php  include 'header.php'; ?>
    <!-- ************************************************ -->
    <!--SIDE MENU-->
    <?php  include 'menus/sideMenu.php'; ?>
    <!-- ************************************************ -->

  </head>

  <!-- ************************************************ -->

  <body>

    <div class="container-fluid col-md-10">
      <div class="col-md-12">
            <?php

              if($rowISBN > 0){

                  // Imprime dados do livro
                  echo "  <h3 class=\"text-left\">
                            ".$rowISBN['title']."
                          </h3>

                          <img class=\"col-md-3 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowISBN['ISBN'].".01.MZZZZZZZ.jpg\">

                          <div class=\"col-md-9\">

                            <h3><b>Price: </b>\$ _____</h3>
                            <br>
                            <h5><b>Author: </b>_________</h5>
                            <h5><b>Publisher: </b>_________</h5>
                            <h5><b>Pages: </b>_________</h5>
                            <h5><b>Edition: </b>_________</h5>
                            <h5><b>ISBN: </b>_________</h5>
                            <br>
                            <a href=\"ShoppingCart.php\" class=\"btn btn-success\"><span class=\"fa fa-shopping-cart fa-lg\"></span> Add to Cart</a>
                          </div>

                          <div class=\"col-md-12 text-justify\">
                            <h5><b>Description</b></h5>
                            ".$rowISBN['description']."
                      <div>";

              } else {
                echo "No results.";
              }

            ?>
      </div>
    </div>
      <br><br><br><br>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->

  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
