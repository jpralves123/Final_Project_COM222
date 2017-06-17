<?php
// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

// Coleta os dados via POST
$searchString = $_POST["search"];

// Verifica se foi uma busca comum (barra de pesquisa) ou se o side menu foi acionado
if (isset($_POST["search"])) {

  // Realiza a busca com base no texto informado
          // a busca pode ser realizada por:
                      // título
                      // autor
                      // categoria

  // cria a instrução SQL que vai selecionar os dados
  $query_selectT = "SELECT * FROM bookdescriptions WHERE title LIKE '%".$searchString."%'"; // Título
  $query_selectA = "SELECT * FROM bookdescriptions WHERE publisher LIKE '%".$searchString."%'"; // Autor
  //$query_selectC = "SELECT * FROM bookdescriptions ORDER BY RAND() LIMIT 76"; // Categoria

  // executa a query
  $selectT = mysqli_query($connect, $query_selectT);
  $selectA = mysqli_query($connect, $query_selectA);
  //$selectC = mysqli_query($connect, $query_selectC);

}

?>

<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

  <head>

    <title>Search Browse</title>
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
      <h3>Search results...</h3>

      <div class="col-md-12">
        <div class="panel">
          <div class="panel-body">

          <?php
/*
            // transforma os dados em um array
            while($rowC = mysqli_fetch_assoc($selectC)){

              echo "<div class=\"panel\">
                    <div class=\"panel-body\">
                      <div class=\"panel-heading\">
                        <h4 class=\"text-left\">
                          <a>
                            ".$rowC['title']."
                          </a>
                        </h4>
                      </div>
                      <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowC['ISBN'].".01.MZZZZZZZ.jpg\">

                      <div class=\"col-md-10 text-justify\">
                        ".$rowC['description']."
                      </div>
                    </div>
                  <div>";

            }
*/
            while($rowA = mysqli_fetch_assoc($selectA)){

                echo "<div class=\"panel\">
                      <div class=\"panel-body\">
                        <div class=\"panel-heading\">
                          <h4 class=\"text-left\">
                            <a>
                              ".$rowA['title']."
                            </a>
                          </h4>
                        </div>
                        <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowA['ISBN'].".01.MZZZZZZZ.jpg\">

                        <div class=\"col-md-10 text-justify\">
                          ".$rowA['description']."
                        </div>
                      </div>
                    <div>";

            }

            while($rowT = mysqli_fetch_assoc($selectT)){

              echo "<div class=\"panel\">
                    <div class=\"panel-body\">
                      <div class=\"panel-heading\">
                        <h4 class=\"text-left\">
                          <a>
                            ".$rowT['title']."
                          </a>
                        </h4>
                      </div>
                      <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowT['ISBN'].".01.MZZZZZZZ.jpg\">

                      <div class=\"col-md-10 text-justify\">
                        ".$rowT['description']."
                      </div>
                    </div>
                  <div>";

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
