<?php

// Classe que faz a ponto entre o produto e sua adição ou exclusão do carrinho de compras

  include 'includes/functions_shoppingCart.php';

  if (isset($_GET['command']) and $_GET['command'] == "add") {
    if (isset($_GET['ISBN'])) {

      // Adiciona livro ao carrinho
      add_book_cart($_GET['ISBN'], 1);

      // leva para a página do carrinho de compras
      echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";

    }
  }

  if (isset($_GET['command']) and $_GET['command'] == "del") {
    if (isset($_GET['ISBN'])) {

      // Adiciona livro ao carrinho
      remove_book_cart($_GET['ISBN']);

      // leva para a página do carrinho de compras
      echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";

    }
  }

  if (isset($_GET['command']) and $_GET['command'] == "empty") {

    // Limpa o cookie
    delete_cookie_cart();

    // Atualiza a página
    echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";

  }

  // Remoção de elemento do carrinho
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if(isset($_POST['isbnD'])){
        $isbnD = $_POST['isbnD'];

        remove_book_cart($isbnD);

        // Atualiza a página
        echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";
      }

      if(isset($_POST['isbnQ'])){

        $isbnQ = $_POST['isbnQ'];
        $quantity = $_POST['quantityHidden'];

        quantity_book_cart($isbnQ, $quantity);

        // Atualiza a página
        echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";
        
      }
  }

 ?>
