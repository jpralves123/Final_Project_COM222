<?php

// conecta ao banco de dados
$connect = mysqli_connect('localhost','root','');

// seleciona a base de dados em que vamos trabalhar
$db = mysqli_select_db($connect, 'sandvigbookstore');

?>
