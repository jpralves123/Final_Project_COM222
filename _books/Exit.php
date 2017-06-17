<?php

  // Inicia Sessão
  session_start();

  //Destrói
  session_destroy();

  //Limpa
	unset ($_SESSION['login']);
	unset ($_SESSION['password']);
  unset ($_SESSION['admin']);

  //Direciona para a página inicial
  header('location:index.php');

?>
