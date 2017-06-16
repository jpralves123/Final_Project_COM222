<?php
// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

// cria a instrução SQL que vai selecionar os dados
$query_select = "SELECT * FROM bookdescriptions";

// executa a query
$select = mysqli_query($connect, $query_select);

// transforma os dados em um array
$row = mysqli_fetch_assoc($select);

// calcula quantos dados retornaram
$total = mysqli_num_rows($select);
?>

<!DOCTYPE hml>
<html lang="en">
  <!-- ************************************************ -->
  <head>

    <title>WB - Store Management</title>

    <?php
    include_once('header.php');
    ?>

  </head>

  <!-- ************************************************ -->

  <body>

    <?php
    	// se o número de resultados for maior que zero, mostra os dados
    	if($total > 0) {
    ?>

    <div class="container">
    <div class="row">

    <p></p>
    <h1>Book Store Management</h1>

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Book List</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="NewBook.html" class="btn btn-primary btn-create">New Book</a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th>ISBN</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Publisher</th>
                        <th>Publication</th>
                        <th>Edition</th>
                        <th>Pages</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    while($row = mysqli_fetch_assoc($select)){
                          echo "<tr>
                            <td align=\"center\">
                              <a class=\"btn btn-default\" href=\"EditBook.html\"><em class=\"fa fa-pencil\"></em></a>
                              <a class=\"btn btn-danger\"><em class=\"fa fa-trash\"></em></a>
                            </td>";
                          echo "<td>".$row['ISBN']."</td>";
                          echo "<td>".$row['title']."</td>";
                          echo "<td>".$row['description']."</td>";
                          echo "<td>".$row['price']."</td>";
                          echo "<td>".$row['publisher']."</td>";
                          echo "<td>".$row['pubdate']."</td>";
                          echo "<td>".$row['edition']."</td>";
                          echo "<td>".$row['pages']."</td>";
                          echo "</tr>";
                    }
                    ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>


  <?php
  // fim do if
  }
  ?>

  </body>

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
