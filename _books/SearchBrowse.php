<?php
// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

// Coleta os dados via POST
$searchString = $_POST["search"];

// Verifica se foi uma busca comum (barra de pesquisa) ou se o side menu foi acionado
if (isset($_POST["search"])) {

  // Realiza a busca com base no texto informado
  echo"<script language='javascript' type='text/javascript'>alert('".$searchString."');</script>";



}

?>

<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

  <head>

    <title>Online Books</title>
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
                // cria a instrução SQL que vai selecionar os dados
                $query_select = "SELECT * FROM bookdescriptions ORDER BY RAND() LIMIT 76";

                // executa a query
                $select = mysqli_query($connect, $query_select);

                // transforma os dados em um array
                $row = mysqli_fetch_assoc($select);

                // calcula quantos dados retornaram
                $total = mysqli_num_rows($select);

                $row = mysqli_fetch_assoc($select);

                echo "<div class=\"panel-heading\">
                        <h4 class=\"text-left\">
                          <a>
                            ".$row['title']."
                          </a>
                        </h4>
                      </div>
                      <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$row['ISBN'].".01.MZZZZZZZ.jpg\">

                <div class=\"col-md-10 text-justify\">
                  ".$row['description']."
                  <a>Read More</a>
                </div>";
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
