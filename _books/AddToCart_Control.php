<?php

  include 'includes/functions_shoppingCart.php';

  if (isset($_GET['ISBN'])) {

    // Adiciona livro ao carrinho
    add_book_cart($_GET['ISBN'], 1);

    // leva para a página do carrinho de compras
    echo"<script language='javascript' type='text/javascript'>window.location.href='ShoppingCart.php';</script>";

  }

 ?>
