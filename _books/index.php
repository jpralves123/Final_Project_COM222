<!--PÁGINA PRINCIPAL-->

<?php
// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

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



    <!--SLIDER RANDON BOOKS-->

    <div class="container-fluid col-md-10">
      <h3>Sugestions</h3>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
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
                            <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$row['ISBN'].".01.THUMBZZZ.jpg\">

                      <div class=\"col-md-10 text-justify\">
                        ".$row['description']."
                        <a>Read More</a>
                      </div>";

                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
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
                            <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$row['ISBN'].".01.THUMBZZZ.jpg\">

                            <div class=\"col-md-10 text-justify\">
                              ".$row['description']."
                              <a>Read More</a>
                            </div>";

                  ?>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
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
                            <img class=\"col-md-2 img-responsive center-block\" src=\"https://baldochi.unifei.edu.br/COM222/trabfinal/imagens/".$row['ISBN'].".01.THUMBZZZ.jpg\">

                            <div class=\"col-md-10 text-justify\">
                              ".$row['description']."
                              <a>Read More</a>
                            </div>";

                  ?>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
