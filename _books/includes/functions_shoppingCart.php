<?php

  // Deleta o cookie
  function delete_cookie_cart(){
    $cookie_name = 'ShoppingCart';
    unset($_COOKIE[$cookie_name]);
  }

  // Adiciona livros ao vetor do cookie
  function add_book_cart($bookISBN, $bookQuant){

    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {

      // unserialize cookie
      $cart = unserialize($_COOKIE[$cookie_name]);


    } else {

      // Limpa a variável cart
      unset($cart);

      // Inicia a variável cart denovo
      $cart = array();

    }

    // ADICIONA PRODUTO NA LISTA
    // Limpa array se ele ja existir
    if(isset($bookINFO)){
      unset($bookINFO);
    }

    // Reinicia array
    $bookINFO = array();
    array_push($bookINFO, $bookISBN, $bookQuant);

    // Adiciona bookINFO no carrinho
    array_push($cart, serialize($bookINFO));

    // serializa novamente e salva no cookie
    $_COOKIE[$cookie_name] = serialize($cart);

  }

  // Lista livros no carrinho
  function list_books_cart(){

    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {

      // Caso o carrinho contenha livros
      $cart = unserialize($_COOKIE[$cookie_name]);

      foreach($cart as $book){

          $book = unserialize($book);

          echo "ISBN: ".$book[0]." QUANT.: ".$book[1]."<br>";

      }

    } else {

      // Caso o carrinho esteja vazio
      echo "<p>Empety Cart</p>";

    }

  }

  function list_books_cart_array(){
    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {

      // Caso o carrinho contenha livros
      $cart = unserialize($_COOKIE[$cookie_name]);

      return $cart;

    } else {

      // Caso o carrinho esteja vazio
      return NULL;

    }
  }

  function calculate_total_value(){

    $cookie_name = 'ShoppingCart';
    $totalValue = 0;

    if(isset($_COOKIE[$cookie_name])) {

      // inclui funções de manipulação do banco
      include_once("functions_db.php");

      // Caso o carrinho contenha livros
      $cart = unserialize($_COOKIE[$cookie_name]);

      foreach($cart as $book){

          $book = unserialize($book);

          $totalValue = $totalValue + ($book[1]*get_book_price($book[0]));

      }

      return $totalValue;

    } else {

      // Caso o carrinho esteja vazio
      return 0;

    }

  }

?>
