<?php

$nameF = $_POST['first_name'];
$nameL = $_POST['last_name'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');


if($nameF == "" || $nameF == null || $nameL == "" || $nameL == null){
    	echo "<script language='javascript' type='text/javascript'>alert('The author name must me filled!');window.location.href='ManageCategory_Author.php';</script>";
}else{

        // Insere o autor na tabela
      	$nameF = $connect->real_escape_string($nameF); // Caracteres especiais transformados para strings
      	$nameL = $connect->real_escape_string($nameL); // Caracteres especiais transformados para strings
        $queryA = "INSERT INTO bookauthors (AuthorID, nameF, nameL) VALUES ('','$nameF', '$nameL')";
        $insert = mysqli_query($connect, $queryA);

        if($insert){
        	  echo"<script language='javascript' type='text/javascript'>alert('New Author added with sucess!');window.location.href='ManageCategory_Author.php'</script>";
        }else{
        	  echo"<script language='javascript' type='text/javascript'>alert('Could not register this Author!');window.location.href='ManageCategory_Author.php'</script>";
 	}
}
?>
