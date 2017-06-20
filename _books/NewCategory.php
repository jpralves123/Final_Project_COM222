<?php

$category = $_POST['category_name'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT CategoryName FROM bookcategories";

$select = mysqli_query($connect, $query_select);
$array = mysqli_num_rows($select);

if($array > 0)
	$logarray = $array['CategoryName'];
else
	$logarray = "";

if($category == "" || $category == null)
    	echo "<script language='javascript' type='text/javascript'>alert('The category name must me filled!');window.location.href='ManageCategory_Author.php';</script>";
else if($logarray == $category)
	echo"<script language='javascript' type='text/javascript'>alert('This category name already exists!');window.location.href='ManageCategory_Author.php';</script>";
else{
        // Insere a categoria na tabela
        $queryA = "INSERT INTO bookcategories (CategoryID, CategoryName) VALUES ('','$category')";
        $insert = mysqli_query($connect, $queryA);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('New Category added with sucess!');window.location.href='ManageCategory_Author.php'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Could not register this Category!');window.location.href='ManageCategory_Author.php'</script>";
 	}
}
?>
