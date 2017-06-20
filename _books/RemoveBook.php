<?php
	// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
	include_once('DatabaseConnection.php');

	if(isset($_GET['catISBN']) && $_GET['catISBN'] !== ''){

		// Deletando o livro
        	$query = "DELETE FROM bookdescriptions WHERE ISBN = '".$_GET['catISBN']."'";
        	$remove = mysqli_query($connect, $query);

		// Retirando a ligação do livro com os autores
        	$query = "DELETE FROM bookauthorsbooks WHERE ISBN = '".$_GET['catISBN']."'";
        	$remove = mysqli_query($connect, $query);

		// Retirando a ligação do livro com as categorias
        	$query = "DELETE FROM bookcategoriesbooks WHERE ISBN = '".$_GET['catISBN']."'";
        	$remove = mysqli_query($connect, $query);
	
		if($remove){
         		echo"<script language='javascript' type='text/javascript'>alert('Book removed with sucess!');window.location.href='BookStoreManagement.php'</script>";
        	}else{
          		echo"<script language='javascript' type='text/javascript'>alert('Could not remove this Book!');window.location.href='BookStoreManagement.php'</script>";
 		}
	}
?>
