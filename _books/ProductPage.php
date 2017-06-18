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

  // Busca nome do author
  $query_selectAuthor = "SELECT * FROM bookauthorsbooks WHERE ISBN LIKE '%".$ISBN."%'";
  $selectAuthor = mysqli_query($connect, $query_selectAuthor);
  $rowAuthor = mysqli_fetch_assoc($selectAuthor);

  $query_selectAuthor = "SELECT * FROM bookauthors WHERE AuthorID LIKE '%".$rowAuthor['AuthorID']."%'";
  $selectAuthor = mysqli_query($connect, $query_selectAuthor);
  $rowAuthor = mysqli_fetch_assoc($selectAuthor);
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

              if($rowISBN > 0 and $rowAuthor > 0){

                  // Imprime dados do livro
                  echo "  <h3 class=\"text-left\">
                            ".$rowISBN['title']."
                          </h3>

                          <a href=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowISBN['ISBN'].".01.LZZZZZZZ.jpg\"><img class=\"col-md-3 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowISBN['ISBN'].".01.LZZZZZZZ.jpg\"></a>

                          <div class=\"col-md-9\">
                            <h3 class=\"text-success\"><b>Price: </b>\$ ".$rowISBN['price']."</h3>
                            <br>
                            <h4><b>Author: </b>".$rowAuthor['nameF']." ".$rowAuthor['nameL']."</h4>
                            <h4><b>Publisher: </b>".$rowISBN['publisher']."</h4>
                            <h4><b>Pages: </b>".$rowISBN['pages']."</h4>
                            <h4><b>Edition: </b>".$rowISBN['edition']."</h4>
                            <h4><b>ISBN: </b>".$rowISBN['ISBN']."</h4>
                            <br>
                            <a href=\"ShoppingCart.php\" class=\"btn btn-success\"><span class=\"fa fa-shopping-cart fa-lg\"></span> Add to Cart</a>
                          </div>

                          <div class=\"col-md-12 text-justify\">
                            <br>
                            <h5><b>Description</b></h5>
                            ".$rowISBN['description']."
                          </div>";

              } else {
                echo "No results.";
              }

            ?>
      </div>
    </div>

    <div class="col-md-12">
      <br> <br> <br>
    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->

  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
