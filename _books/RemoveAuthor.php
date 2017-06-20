<?php

$authorID = $_POST['author'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT * FROM bookauthors as aut, bookauthorsbooks as autbooks WHERE aut.AuthorID = '$authorID' AND aut.AuthorID = autbooks.AuthorID";

$select = mysqli_query($connect, $query_select);

$row = mysqli_num_rows($select);

do {
	// Mudando o autor para "Unknown Author"
        $queryA = "UPDATE bookauthorsbooks SET AuthorID = '10' WHERE AuthorID = '".$authorID."'";
        $update = mysqli_query($connect, $queryA);

	// Deletando o autor
	$queryB = "DELETE FROM bookauthors WHERE AuthorID = '".$authorID."'"; // Deletando o autor
        $remove = mysqli_query($connect, $queryB);

	if($update && $remove){
          echo"<script language='javascript' type='text/javascript'>alert('Author removed with sucess!');window.location.href='ManageCategory_Author.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not remove this Author!');window.location.href='ManageCategory_Author.php'</script>";
 	}
}while ($row = $result->fetch_assoc($select));
?>
