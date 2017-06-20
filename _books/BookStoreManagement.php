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

    <!-- ************************************************ -->
    <!--HEADER-->
    <?php  include 'header.php'; ?>
    <!-- ************************************************ -->

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

		  <form class="col col-xs-6 navbar-form navbar-left" method="POST" action="SearchBrowse.php">
                    <div class="form-group">
                      <input type="text" class="form-control" id="search" name="search" placeholder="Search with ISBN">
                    </div>
                 
		  <button type="button" class="btn btn-primary" id="searchBt" name="searchBt">
          	    <span class="glyphicon glyphicon-search"></span> Search 
        	  </button>

                  </form>

		  <div class="col col-xs-2 navbar-form navbar-right">
          	    <a href="ManageCategory_Author.php" class="btn btn-primary">Manage Authors and Categories</a>
        	  </div>
                  <div class="col col-xs-10 navbar-form navbar-right">
                    <a href="AddNewBook.php" class="btn btn-primary btn-create">New Book</a>
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
                              <a class=\"btn btn-default\" href=\"ShowEditBook.php?catISBN=" . $row['ISBN'] . "\"><em class=\"fa fa-pencil\"></em></a>
                              <a class=\"btn btn-danger\" href=\"RemoveBook.php?catISBN=" . $row['ISBN'] . "\"><em class=\"fa fa-trash-o\"></em></a>
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

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
