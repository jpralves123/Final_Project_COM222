<?php

  include 'includes/functions_shoppingCart.php';

  // Inicia Sessão
  session_start();

  //Destrói
  session_destroy();

  //Limpa
	unset ($_SESSION['login']);
	unset ($_SESSION['password']);
  unset ($_SESSION['admin']);

  // Limpa o cookie do carrinho de compras
  delete_cookie_cart();

  //Direciona para a página inicial
  header('location:index.php');

?>
