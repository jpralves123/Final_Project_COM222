<?php

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$description = $_POST['description'];
//$author = $_POST['author'];
//$name = explode(" ", $author);
$categoryName = $_POST['category'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];
$pubdate = $_POST['pub_date'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];

//echo"<script language='javascript' type='text/javascript'>alert('".$category."');window.location.href='BookStoreManagement.php';</script>";


// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT ISBN FROM bookdescriptions WHERE ISBN = '$isbn'";
$query_select_catID = "SELECT CategoryID FROM bookcategoriesbooks WHERE ISBN = '$isbn'";
$query_select_autID = "SELECT AuthorID FROM bookauthorsbooks as autbooks WHERE autbooks.ISBN = '$isbn'";

$select = mysqli_query($connect, $query_select);
$select_catID = mysqli_query($connect, $query_select_catID);
$select_autID = mysqli_query($connect, $query_select_autID);

$array = mysqli_num_rows($select);
$categoryID = mysqli_num_rows($select_catID);
$autID = mysqli_num_rows($select_autID);

if($array > 0 )
  $logarray = $array['ISBN'];

  if($isbn == "" || $isbn == null || $title == "" || $title == null || $description == "" || $description == null || $title == "" || $title == null ){

    echo"<script language='javascript' type='text/javascript'>alert('ISBN field must be filled in!');window.location.href='ShowEditBook.php?catISBN=".$isbn."';</script>";

    }else{
      if($logarray == $isbn){

        echo"<script language='javascript' type='text/javascript'>alert('This ISBN number already exists!');window.location.href='ShowEditBook.php?catISBN=".$isbn."';</script>";
        die();

      }else{

        // Insere o livro na tabela
	$description = $connect->real_escape_string($description); // Caracteres especiais transformados para strings
        $queryB = "UPDATE bookdescriptions SET title = '$title', description = '$description', price = '$price', publisher = '$publisher', pubdate = '$pubdate', edition = '$edition', pages = '$pages' WHERE bookdescriptions.ISBN = '$isbn'";
	//$queryB = "SELECT * FROM bookcategories";
	$update = mysqli_query($connect, $queryB);

        // Liga o livro a sua categoria
        $queryC = "UPDATE bookcategoriesbooks SET CategoryID = '$categoryID' WHERE bookcategoriesbooks.ISBN = '$isbn'";
        $update = mysqli_query($connect, $queryC);

        // liga seu id do autor ao ISBN
        $queryA = "UPDATE bookauthorsbooks SET AuthorID = '$autID' WHERE bookauthorsbooks.ISBN = '$isbn'";
        $update = mysqli_query($connect, $queryA);

        if($update){
          echo"<script language='javascript' type='text/javascript'>alert('Book edited with sucess!');window.location.href='BookStoreManagement.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not edit this Book!');window.location.href='ShowEditBook.php?catISBN=".$isbn."'</script>";
        }

      }

    
}
?>
