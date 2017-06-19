<?php

$isbn = $_POST['isbn'];
$title = $_POST['title'];
$description = $_POST['description'];
$author = $_POST['author'];
$category = $_POST['category'];
$price = $_POST['price'];
$publisher = $_POST['publisher'];
$pubdate = $_POST['pub_date'];
$edition = $_POST['edition'];
$pages = $_POST['pages'];

//echo"<script language='javascript' type='text/javascript'>alert('".$category."');window.location.href='BookStoreManagement.php';</script>";


// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT ISBN FROM bookdescriptions WHERE ISBN = '$isbn'";

$select = mysqli_query($connect, $query_select);
$array = mysqli_num_rows($select);

if($array > 0 ){
  $logarray = $array['ISBN'];
}else{

  $logarray = "";

  if($isbn == "" || $isbn == null || $title == "" || $title == null || $description == "" || $description == null || $title == "" || $title == null ){

    echo"<script language='javascript' type='text/javascript'>alert('ISBN field must be filled in!');window.location.href='BookStoreManagement.php';</script>";

    }else{
      if($logarray == $isbn){

        echo"<script language='javascript' type='text/javascript'>alert('This ISBN number already exists!');window.location.href='NewBook.html';</script>";
        die();

      }else{

        // Insere o livro na tabela
        $queryB = "INSERT INTO bookdescriptions (ISBN, title, description, price, publisher, pubdate, edition, pages) VALUES ('$isbn','$title', '$description', '$price', '$publisher', '$pubdate', '$edition', '$pages')";
        $insert = mysqli_query($connect, $queryB);

        // Liga o livro a sua categoria
        $queryC = "INSERT INTO bookcategoriesbooks (CategoryID, ISBN) VALUES ('$category','$isbn')";
        $insert = mysqli_query($connect, $queryC);


        // liga seu id do autor ao ISBN
        $queryA = "INSERT INTO bookauthorsbooks (ISBN, AuthorID) VALUES ('$isbn','$author')";
        $insert = mysqli_query($connect, $queryA);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('New Book added with sucess!');window.location.href='BookStoreManagement.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not register this Book!');window.location.href='BookStoreManagement.php'</script>";
        }

      }

    }
}
?>
