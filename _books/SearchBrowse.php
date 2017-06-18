<?php
// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

?>

<?php
// Verifica se foi uma busca comum (barra de pesquisa) ou se o side menu foi acionado
if (isset($_POST["search"])) {

  //*********** AINDA TA COM ERRO QUANDO FAZ A BUSCA DE UMA CAIXA VAZIA

  // Coleta os dados via POST
  $searchString = $_POST["search"];

  // Realiza a busca com base no texto informado
          // a busca pode ser realizada por:
                      // título
                      // autor

  // cria a instrução SQL que vai selecionar os dados
  $query_selectT = "SELECT * FROM bookdescriptions WHERE title LIKE '%".$searchString."%'"; // Título
  $query_selectA = "SELECT * FROM bookdescriptions WHERE publisher LIKE '%".$searchString."%'"; // Autor

  // executa a query
  $selectT = mysqli_query($connect, $query_selectT);
  $selectA = mysqli_query($connect, $query_selectA);

}

if(isset($_GET['catID']) && $_GET['catID'] !== ''){

  // Coleta os dados via GET
  $catID = $_GET['catID'];

  // cria a instrução SQL que vai selecionar os dados
  $query_selectC = "SELECT * FROM bookcategoriesbooks WHERE CategoryID LIKE '%".$catID."%'"; // Categoria X ISBN

  // executa a query
  $selectC = mysqli_query($connect, $query_selectC);

  // coleta ISBNs dos livros que daquela Categoria
  $rowC = mysqli_fetch_assoc($selectC);



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
          if (isset($_POST["search"])) {

            while($rowA = mysqli_fetch_assoc($selectA)){

                echo "<div class=\"panel\">
                      <div class=\"panel-body\">
                        <div class=\"panel-heading\">
                          <h4 class=\"text-left\">
                            <a href=\"ProductPage.php?ISBN=".$rowA['ISBN']."\">".$rowA['title']."</a>
                          <h4>
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
                          <a href=\"ProductPage.php?ISBN=".$rowT['ISBN']."\">".$rowT['title']."</a>
                        </h4>
                      </div>
                      <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowT['ISBN'].".01.MZZZZZZZ.jpg\">

                      <div class=\"col-md-10 text-justify\">
                        ".$rowT['description']."
                      </div>
                    </div>
                  <div>";

            }

          } else {

              if(isset($_GET['catID']) && $_GET['catID'] !== ''){

                while($rowC = mysqli_fetch_assoc($selectC)){

                  // cria a instrução SQL que vai selecionar os dados
                  $query_selectB = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '".$rowC['ISBN']."'"; // Categoria X ISBN

                  // executa a query
                  $selectB = mysqli_query($connect, $query_selectB);

                  // coleta ISBNs dos livros que daquela Categoria
                  $rowB = mysqli_fetch_assoc($selectB);

                  // Imprime dados do livro
                  echo "<div class=\"panel\">
                        <div class=\"panel-body\">
                          <div class=\"panel-heading\">
                            <h4 class=\"text-left\">
                              <a href=\"ProductPage.php?ISBN=".$rowB['ISBN']."\">".$rowB['title']."</a>
                            </h4>
                          </div>
                          <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$rowB['ISBN'].".01.MZZZZZZZ.jpg\">

                          <div class=\"col-md-10 text-justify\">
                            ".$rowB['description']."
                          </div>
                        </div>
                      <div>";

                }

              } else {
                echo "No results.";
              }
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
