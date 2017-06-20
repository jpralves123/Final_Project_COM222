<?php

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

if(isset($_GET['email']) && $_GET['email'] !== ''){

	// Pegando as info do usuário
        $query = "SELECT * FROM user WHERE nome = '".$_GET['email']."'";
        $select = mysqli_query($connect, $query);

	// coleta ISBNs dos livros que daquela Categoria
        $row = mysqli_fetch_assoc($select);

	// calcula quantos dados retornaram
	$total = mysqli_num_rows($select);

	$msg = "Welcome back, ".$row['fname']."! Please verify your delivery address";
}
else
	$msg = "Welcome! Please provide an delivery address.";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Online Books - Checkout</title>

  <!-- ************************************************ -->
  <!--HEADER-->
  <?php  include 'header.php'; ?>
  <!-- ************************************************ -->
</head>

<body>

  <div id="main" class="container-fluid">

    <h3 class="page-header"><?php echo $msg; ?></h3>

    <form class="register-form" method="POST" action="checkout02.php">

      <div class="row">
        <div class="form-group col-md-4">
          <label for="Add an ISBN">First Name</label>
          <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname'];?>"/>
        </div>
        <div class="form-group col-md-8">
          <label for="Add an Title">Last Name</label>
          <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lname'];?>"/>
        </div>
        <div class="form-group col-md-12">
          <label for="Add an Description">Street</label>
          <input type="text" class="form-control" id="street"  name="street" value="<?php echo strip_tags($row['street']);?>"/>
        </div>
        <div class="form-group col-md-8">
          <label for="Add an Description">City</label>
          <input type="text" class="form-control" id="city"  name="city" value="<?php echo strip_tags($row['city']);?>"/>
        </div>
	<div class="form-group col-md-4">
          <label for="Add an Description">State</label>
          <input type="text" class="form-control" id="state"  name="state" value="<?php echo strip_tags($row['state']);?>"/>
        </div>
	<div class="form-group col-md-6">
          <label for="Add an Description">ZIP</label>
          <input type="text" class="form-control" id="zip"  name="zip" value="<?php echo strip_tags($row['zip']);?>"/>
        </div>
	<div class="form-group col-md-6">
          <label for="Add an Description">E-mail</label>
          <input type="text" class="form-control" id="nome"  name="nome" value="<?php echo strip_tags($row['nome']);?>" readonly/>
        </div>
	<div class="form-group col-md-8">
          <label for="Add an Description">Login</label>
          <input type="text" class="form-control" id="login"  name="login" value="<?php echo strip_tags($row['login']);?>"/>
        </div>
	<div class="form-group col-md-4">
          <label for="Add an Description">Password</label>
          <input type="text" class="form-control" id="senha"  name="senha" value="<?php echo strip_tags($row['senha']);?>"/>
        </div>
	</div>
      <input class="btn btn-primary" type="submit" value="Confirm" id="save" name="save">
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
<!--
do{
	if($row > 0)
		$logarray = $row['ISBN'];
	else
		$logarray = "";

	if($isbn == "" || $isbn == null || $title == "" || $title == null || $description == "" || $description == null || $title == "" || $title == null )
   		echo"<script language='javascript' type='text/javascript'>alert('ISBN field must be filled in!');window.location.href='ShowEditBook.php?catISBN=".$isbn."';</script>";
	else if($logarray == $isbn)
       		echo"<script language='javascript' type='text/javascript'>alert('This ISBN number already exists!');window.location.href='ShowEditBook.php?catISBN=".$isbn."';</script>";
	else{
        	// Insere o livro na tabela
		$description = $connect->real_escape_string($description); // Caracteres especiais transformados para strings
       		$queryB = "UPDATE bookdescriptions SET title = '".$title."', description = '".$description."', price = '".$price."', publisher = '".$publisher."', pubdate = '".$pubdate."', edition = '".$edition."', pages = '".$pages."' WHERE ISBN = '".$isbn."'";
		//$queryB = "SELECT * FROM bookcategories";
		$update = mysqli_query($connect, $queryB);

        	// Liga o livro a sua categoria
        	$queryC = "UPDATE bookcategoriesbooks SET CategoryID = '".$categoryID."' WHERE ISBN = '".$isbn."'";
        	$update = mysqli_query($connect, $queryC);

        	// Liga seu id do autor ao ISBN
        	$queryA = "UPDATE bookauthorsbooks SET AuthorID = '".$authorID."' WHERE ISBN = '".$isbn."'";
        	$update = mysqli_query($connect, $queryA);

        	if($update){
          		echo"<script language='javascript' type='text/javascript'>alert('Book edited with sucess!');window.location.href='BookStoreManagement.php'</script>";
        	}else{
          		echo"<script language='javascript' type='text/javascript'>alert('Could not edit this Book!');window.location.href='ShowEditBook.php?catISBN=".$isbn."'</script>";
        	}
	}
}while ($row = $result->fetch_assoc($select));

-->