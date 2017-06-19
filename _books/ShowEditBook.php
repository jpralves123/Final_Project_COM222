<?php
	// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
	include_once("./DatabaseConnection.php");

	if(isset($_GET['catISBN']) && $_GET['catISBN'] !== ''){

		  // cria a instrução SQL que vai selecionar os dados
                  $query_select = "SELECT * FROM bookdescriptions as esc, bookauthors as aut, bookcategories as cat, bookauthorsbooks as autbook, bookcategoriesbooks as catbook WHERE esc.ISBN LIKE '%".$_GET['catISBN']."%' AND esc.ISBN = catbook.ISBN AND esc.ISBN = autbook.ISBN AND aut.AuthorID = autbook.AuthorID AND cat.CategoryID = catbook.CategoryID";

                  // executa a query
                  $select = mysqli_query($connect, $query_select);

                  // coleta ISBNs dos livros que daquela Categoria
                  $row = mysqli_fetch_assoc($select);

		  // calcula quantos dados retornaram
		  $total = mysqli_num_rows($select);
	}


	// Preenche a caixa de categoria e de autores com as opções
	
	// cria a instrução SQL que vai selecionar os dados
	$query_selectA = "SELECT * FROM bookcategories WHERE CategoryName NOT LIKE '".$row['CategoryName']."'";
	$query_selectB = "SELECT * FROM bookauthors WHERE nameF NOT LIKE '".$row['nameF']."' AND nameL NOT LIKE '".$row['nameL']."'";

	// executa a query
	$selectA = mysqli_query($connect, $query_selectA);
	$selectB = mysqli_query($connect, $query_selectB);

	// transforma os dados em um array
	$rowA = mysqli_fetch_assoc($selectA);
	$rowB = mysqli_fetch_assoc($selectB);

	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Online Books - Edit Book</title>

  <!-- ************************************************ -->
  <!--HEADER-->
  <?php  include 'header.php'; ?>
  <!-- ************************************************ -->
</head>

<body>

  <div id="main" class="container-fluid">

    <h3 class="page-header">Edit Book</h3>

    <form class="register-form" method="POST" action="EditBook.php">

      <div class="row">
        <div class="form-group col-md-4">
          <label for="exampleInputEmail1">ISBN</label>
          <input type="text" class="form-control" id="isbn" name="isbn"  value="<?php echo $row['ISBN'];?>"/>
        </div>
        <div class="form-group col-md-8">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title'];?>"/>
        </div>
        <div class="form-group col-md-12">
          <label for="exampleInputEmail1">Description</label>
          <input type="text" class="form-control" id="description"  name="description" value="<?php echo strip_tags($row['description']);?>"/>
        </div>
        <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Author</label>
          <select type="text" class="form-control" id="author"  name="author">
            <option selected="select"><?php echo $row['nameF']; echo " "; echo $row['nameL'];?></option>
            <?php
                do{
                  echo '<option value=\"'. $rowB['AuthorID'] .'\">' . $rowB['nameF'] ." ". $rowB['nameL'] .'</option>';
                }while($rowB = mysqli_fetch_assoc($selectB));
            ?>
          </select>
        </div>
        <div class="form-group col-md-1">
          <label for="exampleInputEmail1">New</label><br>
          <a href="#" class="btn btn-default"><em class="fa fa-plus"></em></a>
        </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">Category</label>
          <select type="text" class="form-control" id="category"  name="category">
            <option selected="selected"><?php echo $row['CategoryName'];?></option>
            <?php
		do{
                  echo '<option value=\"'. $rowA['CategoryID'] .'\">' . $rowA['CategoryName'] . '</option>';
                }while($rowA = mysqli_fetch_assoc($selectA));
           	?>
          </select>
	  <?php
          // fim do if
          }
          ?>
        </div>
        <div class="form-group col-md-1">
          <label for="exampleInputEmail1">New</label><br>
          <a href="#" class="btn btn-default"><em class="fa fa-plus"></em></a>
        </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">Price</label>
          <input type="number" class="form-control" id="price"  name="price" value="<?php echo $row['price'];?>"/>
        </div>
        <div class="form-group col-md-5">
          <label for="exampleInputEmail1">Publisher</label>
          <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $row['publisher'];?>"/>
        </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">Publication Date</label>
          <input type="text" class="form-control" id="pub_date" name="pub_date" value="<?php echo $row['pubdate'];?>"/>
        </div>
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">Edition</label>
          <input type="number" class="form-control" id="edition" name="edition" value="<?php echo $row['edition'];?>"/>
        </div>
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">Pages</label>
          <input type="number" class="form-control" id="pages" name="pages" value="<?php echo $row['pages'];?>"/>
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