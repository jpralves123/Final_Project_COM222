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
        <div class="panel">
          <div class="panel-body">

            <?php

              if($rowISBN > 0){

                  // Imprime dados do livro
                  echo "<div class=\"panel\">
                        <div class=\"panel-body\">
                          <div class=\"panel-heading\">
                            <h4 class=\"text-left\">
                              ".$rowISBN['title']."
                            </h4>
                          </div>
                          <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowISBN['ISBN'].".01.MZZZZZZZ.jpg\">

                          <div class=\"col-md-10 text-justify\">
                            ".$rowISBN['description']."
                          </div>
                        </div>
                      <div>";

              } else {
                echo "No results.";
              }

            ?>

          </div>
        </div>
      </div>
    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
