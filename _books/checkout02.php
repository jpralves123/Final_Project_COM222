<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$email = $_POST['nome'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT * FROM user WHERE nome = '%".$email."%'";

$select = mysqli_query($connect, $query_select);

// coleta ISBNs dos livros que daquela Categoria
$row = mysqli_fetch_assoc($select);

// calcula quantos dados retornaram
$total = mysqli_num_rows($select);

do{
	if($total > 0)
		$logarray = $row['email'];
	else
		$logarray = "";

	if($fname == "" || $fname == null || $lname == "" || $lname == null || $street == "" || $street == null || $city == "" || $city == null || $zip == "" || $zip == null || $state == "" || $state == null || $login == "" || $login == null || $senha == "" || $senha == null)
   		echo"<script language='javascript' type='text/javascript'>alert('All fields must be filled in!');window.location.href='ShowCheckout02.php?email=".$email."';</script>";
	//else if($logarray == $email)
       		//echo"<script language='javascript' type='text/javascript'>alert('This email already exists!');window.location.href='ShowCheckout02.php?email=".$email."';</script>";
	else{
        	// Altera o usuário
		//$street = $connect->real_escape_string($street); // Caracteres especiais transformados para strings
        	$queryC = "UPDATE user SET fname = '".$fname."', lname = '".$lname."', street = '".$street."', city = '".$city."', zip = '".$zip."', state = '".$state."', login = '".$login."', senha = '".$senha."' WHERE nome = '".$email."'";
        	$update = mysqli_query($connect, $queryC);

        	if($update){
          		echo"<script language='javascript' type='text/javascript'>alert('Checkout almost finished!');window.location.href='checkout03.php';</script>";
        	}else{
          		echo"<script language='javascript' type='text/javascript'>alert('Error on checkout!');window.location.href='ShowCheckout02.php?email=".$email."'</script>";
        	}
	}
}while ($row = $result->fetch_assoc($select));
