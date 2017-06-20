<?php

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$description = $_POST['description'];
$authorID = $_POST['author'];
$categoryID = $_POST['category_name'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];
$pubdate = $_POST['pub_date'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT ISBN FROM bookdescriptions WHERE ISBN NOT LIKE = '%".$isbn."%'";

$select = mysqli_query($connect, $query_select);

$row = mysqli_num_rows($select);

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

?>