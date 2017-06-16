<!--Lista as categorias de livros-->
<?php
// conecta ao banco de dados
$connect = mysqli_connect('localhost','root','');

// seleciona a base de dados em que vamos trabalhar
$db = mysqli_select_db($connect, 'sandvigbookstore');

// cria a instrução SQL que vai selecionar os dados
$query_select = "SELECT * FROM bookcategories";

// executa a query
$select = mysqli_query($connect, $query_select);

// transforma os dados em um array
$row = mysqli_fetch_assoc($select);

// calcula quantos dados retornaram
$total = mysqli_num_rows($select);

// se o número de resultados for maior que zero, mostra os dados
if($total > 0) {

?>


<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

<head>

  <title>Online Books</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <nav class="navbar ">
    <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png"></a>
      </div>

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <a href="SearchBrowse.html" class="btn btn-primary">Search</a>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="ShoppingCart.html"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
        <li><a href="sign_up_page.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login_page.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

</head>

<!-- ************************************************ -->

<body>

  <div class="container-fluid">

    <div class="row">

      <!--DROPDOWN MENU -->
      <div class="dropdown col-md-12">
        <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Browse
          <span class="caret"></span></button>
          <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
            <?php
              while($row = mysqli_fetch_assoc($select)){
                    echo "<li role=\"presentation\"><a role=\"menuitem\" tabindex=\"-1\" href=\"#\">".$row['CategoryName']."</a></li>";
              }
            ?>
          </ul>
        <a href="https://github.com/jpralves123/Final_Project_COM222/tree/master/_books" class="btn btn-primary">GitHub Source Code</a>
        <a href="BookStoreManagement.php" class="btn btn-danger">Book Store Management</a>
        <a href="#" class="btn btn-primary">About Us</a>
      </div>

      <?php
      // fim do if
      }
      ?>

      <br>
      <!--SLIDER RANDON BOOKS-->

      <div class="container-fluid col-md-12">
        <h3>Sugestions</h3>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <div class="item active">
              <div class="col-md-10">
                <div class="panel panel-primary">
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
                        <img class=\"col-md-2 img-responsive center-block\" src=\"007184158X.01.MZZZZZZZ.jpg\">
                        <br>

                        <p class=\"col-md-10 text-justify\">
                          Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                          <a>Read More</a>
                        </p>";

                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="col-md-10">
                <div class="panel panel-primary">
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
                        <img class=\"col-md-2 img-responsive center-block\" src=\"007184158X.01.MZZZZZZZ.jpg\">
                        <br>

                        <p class=\"col-md-10 text-justify\">
                          Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                          <a>Read More</a>
                        </p>";

                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="item">
              <div class="col-md-10">
                <div class="panel panel-primary">
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
                        <img class=\"col-md-2 img-responsive center-block\" src=\"007184158X.01.MZZZZZZZ.jpg\">
                        <br>

                        <p class=\"col-md-10 text-justify\">
                          Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                          <a>Read More</a>
                        </p>";

                    ?>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control col-md-1" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control col-md-1" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>

  </div>

</body>

<!-- ************************************************ -->
<!--FOOTER-->
<footer class="container-fluid text-center bg-lightgray">

  <div class="copyrights text-center" style="margin-top:25px;">
    <p>Web Books © 2017, All Rights Reserved
      <br>
      <span>Programação Web COM222 - Universidade Federal de Itajubá</span>
      <br>
      <a>About</a>
      <br><br>
    </p>
    <p>
      <a class="img-responsive center-block" href="index.php"><img class="logo" src="img/logo.png"></a>
      <br>
      <span>João Pedro Rufino Alves - 30239 | Mateus Romera Villar - 31451</span>
    </p>
  </div>

</footer>
<!-- ************************************************ -->

</html>
