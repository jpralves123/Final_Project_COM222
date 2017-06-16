<!-- ************************************************ -->
<?php
// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

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

<!--HEADER-->
<html lang="en">

<head>
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
        <li><a href="AboutUs.html"><span class="fa fa-book fa-lg"></span> About Us</a></li>
        <li><a href="ShoppingCart.html"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
        <li><a href="Exit.php"><span class="glyphicon glyphicon-log-out"></span> Exit</a></li>
      </ul>

    </div>
  </nav>

  <div class="container-fluid col-md-2">

    <div class="row">

      <!--SIDEMENU-->
        <div class="col-md-12 btn-group-vertical" id="sidemenu">

          <h3> Browse</h3>

          <?php
            while($row = mysqli_fetch_assoc($select)){
                  echo "<button type=\"button\" class=\"text-left btn btn-primary \">".$row['CategoryName']."</button></a></li>";
            }
          ?>

        </div>

      <?php
      // fim do if
      }
      ?>
    </div>
    </div>


</head>


<!-- ************************************************ -->

</html>
