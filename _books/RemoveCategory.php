<?php

$categoryID = $_POST['category_name'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT * FROM bookcategories as cat, bookcategoriesbooks as catbooks WHERE cat.CategoryID = '$categoryID' AND cat.CategoryID = catbooks.CategoryID";

$select = mysqli_query($connect, $query_select);

$row = mysqli_num_rows($select);

do {
	// Mudando a categoria para "Unknown Category"
        $queryA = "UPDATE bookcategoriesbooks SET CategoryID = '10' WHERE CategoryID = '".$categoryID."'";
        $update = mysqli_query($connect, $queryA);

	// Deletando a categoria
	$queryB = "DELETE FROM bookcategories WHERE CategoryID = '".$categoryID."'";
        $remove = mysqli_query($connect, $queryB);

	if($update && $remove){
          echo"<script language='javascript' type='text/javascript'>alert('Category removed with sucess!');window.location.href='ManageCategory_Author.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not remove this Category!');window.location.href='ManageCategory_Author.php'</script>";
 	}
}while ($row = $result->fetch_assoc($select));

?>
