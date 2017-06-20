<?php
// Verifica se o usuário está logado
//include_once("./validate.php");

// Preenche a caixa de categoria com as opções

// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once("./DatabaseConnection.php");

// cria a instrução SQL que vai selecionar os dados
$query_select = "SELECT * FROM bookcategories";
$query_selectA = "SELECT * FROM bookauthors";

// executa a query
$select = mysqli_query($connect, $query_select);
$selectA = mysqli_query($connect, $query_selectA);

// transforma os dados em um array
$row = mysqli_fetch_assoc($select);
$rowA = mysqli_fetch_assoc($selectA);

// calcula quantos dados retornaram
$total = mysqli_num_rows($select);

// se o número de resultados for maior que zero, mostra os dados
if($total > 0) {

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Online Books - New Book</title>

  <!-- ************************************************ -->
  <!--HEADER-->
  <?php  include 'header.php'; ?>
  <!-- ************************************************ -->
</head>

<body>

  <div id="main" class="container-fluid">

    <h3 class="page-header">Add New Book</h3>

    <form class="register-form" method="POST" action="NewBook.php">

      <div class="row">
        <div class="form-group col-md-4">
          <label for="Add an ISBN">ISBN</label>
          <input type="text" class="form-control" id="isbn" name="isbn"  placeholder="ISBN Number"/>
        </div>
        <div class="form-group col-md-8">
          <label for="Add an Title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
        </div>
        <div class="form-group col-md-12">
          <label for="Add an Description">Description</label>
          <input type="text" class="form-control" id="description"  name="description" placeholder="Book Description"/>
        </div>
        <div class="form-group col-md-4">
          <label for="Choose an Author">Author</label>
          <select type="text" class="form-control" id="author"  name="author" placeholder="Book Category">
            <option></option>
            <?php
                do{
                  echo '<option value=\"'. $rowA['AuthorID'] .'\">' . $rowA['nameF'] ." ". $rowA['nameL'] .'</option>';
                }while($rowA = mysqli_fetch_assoc($selectA));
            ?>
          </select>
        </div>
        <div class="form-group col-md-3">
          <label for="Choose an category">Category</label>
          <select type="text" class="form-control" id="category"  name="category" placeholder="Book Category">
            <option></option>
            <?php
            		do{
                  echo '<option value=\"'. $row['CategoryID'] .'\">' . $row['CategoryName'] . '</option>';
                }while($row = mysqli_fetch_assoc($select));
           	?>
          </select>
          <?php
          // fim do if
          }
          ?>
        </div>
        <div class="form-group col-md-2">
	        <label for="Choose an category">Management</label><br>
          <a href="ManageCategory_Author.php" class="btn btn-primary">Manage Authors and Categories</a>
        </div>
        <div class="form-group col-md-3">
          <label for="Add an price">Price</label>
          <input type="number" class="form-control" id="price"  name="price" placeholder="Book Price"/>
        </div>
        <div class="form-group col-md-5">
          <label for="Add an publisher">Publisher</label>
          <input type="text" class="form-control" id="publisher" name="publisher"  placeholder="Book Publisher"/>
        </div>
        <div class="form-group col-md-3">
          <label for="Add the publication date">Publication Date</label>
          <input type="text" class="form-control" id="pub_date" name="pub_date"/>
        </div>
        <div class="form-group col-md-2">
          <label for="Add the book edition">Edition</label>
          <input type="number" class="form-control" id="edition" name="edition" value="1"/>
        </div>
        <div class="form-group col-md-2">
          <label for="Add the quantity of pages">Pages</label>
          <input type="number" class="form-control" id="pages" name="pages" value="1"/>
        </div>
      </div>

      <div class="row">
      </div>

      <hr />

      <div class="row">
        <div class="col-md-12">

        </div>
      </div>

      <input class="btn btn-primary" type="submit" value="Save Book" id="save" name="save">
      <a href="BookStoreManagement.php" class="btn btn-default">Cancel</a>

    </form>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

<!-- ************************************************ -->
<!--FOOTER-->
<br>
<?php  include 'footer.html'; ?>
<!-- ************************************************ -->

</html>
