<?php
// Verifica se o usuário está logado
//include_once("./validate.php");

// Preenche a caixa de categoria com as opções

// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once("./DatabaseConnection.php");

// Preenche a caixa de categoria e de autores com as opções
	
// cria a instrução SQL que vai selecionar os dados
$query_selectA = "SELECT * FROM bookcategories";
$query_selectB = "SELECT * FROM bookauthors";

// executa a query
$selectA = mysqli_query($connect, $query_selectA);
$selectB = mysqli_query($connect, $query_selectB);

// transforma os dados em um array
$rowA = mysqli_fetch_assoc($selectA);
$rowB = mysqli_fetch_assoc($selectB);

// calcula quantos dados retornaram
$totalCat = mysqli_num_rows($selectA);
$totalAut = mysqli_num_rows($selectB);

// se o número de resultados for maior que zero, mostra os dados
if($totalCat > 0 && $totalAut > 0) {

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Online Books - New Author / Category</title>

  <!-- ************************************************ -->
  <!--HEADER-->
  <?php  include 'header.php'; ?>
  <!-- ************************************************ -->
</head>

<body>

  <div id="main" class="container-fluid">

    <h3 class="page-header">Manage Authors</h3>

    <form class="register-form" method="POST" action="NewAuthor.php">

      <div class="row">
        <div class="form-group col-md-12">
          <label for="Add an first name">Fill the name text boxes to create a new Author:</label>
	</div>
	<div class="form-group col-md-5">
          <input type="text" class="form-control" id="first_name" name="first_name"  placeholder="First Name"/>
	</div>
	<div class="form-group col-md-5">
          <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"/>
        </div>
	<div class="form-group col-md-2">
          <input class="btn btn-primary" type="submit" value="Create New Author" id="save" name="save">
	</div>
	</div>
    </form>
    <form class="register-form" method="POST" action="RemoveAuthor.php">
      <div class="row">
    	<div class="form-group col-md-12">
          <label for="Select an Author">Select an Author for removal:</label>
	</div>
	<div class="form-group col-md-10">
          <select type="text" class="form-control" id="author"  name="author">
            <?php
                do{
                  echo '<option value='. $rowB['AuthorID'] .'>' . $rowB['nameF'] ." ". $rowB['nameL'] .'</option>';
                }while($rowB = mysqli_fetch_assoc($selectB));
            ?>
          </select>
        </div>
	<div class="form-group col-md-2">
          <input class="btn btn-primary" type="submit" value="Delete Author" id="save" name="save">
	</div>
    </div>
    </form>
    <div class="row">
      </div>

     

      <div class="row">
        <div class="col-md-12">

        </div>
      </div>

    <h3 class="page-header">Manage Categories</h3>

    <form class="register-form" method="POST" action="NewCategory.php">

      <div class="row">
        <div class="form-group col-md-12">
          <label for="Add an category name">Category Name</label>
	</div>
	<div class="form-group col-md-10">
          <input type="text" class="form-control" id="category_name" name="category_name"  placeholder="Category Name"/>
        </div>
	<div class="form-group col-md-2">
          <input class="btn btn-primary" type="submit" value="Create new Category" id="save" name="save">
	</div>
      </div>
    </form>
    <form class="register-form" method="POST" action="RemoveCategory.php">
      <div class="row">
    	<div class="form-group col-md-12">
          <label for="Select an category">Select an Category for removal:</label>
	</div>
	<div class="form-group col-md-10">
          <select type="text" class="form-control" id="category_name"  name="category_name">
            <?php
		do{
                  echo '<option value=' .$rowA['CategoryID']. '>' .$rowA['CategoryName']. '</option>';
                }while($rowA = mysqli_fetch_assoc($selectA));?>
          </select>
	  <?php
          // fim do if
          }
          ?>
        </div>
	<div class="form-group col-md-2">
          <input class="btn btn-primary" type="submit" value="Delete Category" id="save" name="save">
	</div>
   </div>
   </form>
	
  <br>
  <a href="BookStoreManagement.php" class="btn btn-primary"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back to Book Store Management</a>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

<!-- ************************************************ -->
<!--FOOTER-->
<br>
<?php  include 'footer.html'; ?>
<!-- ************************************************ -->

</html>
