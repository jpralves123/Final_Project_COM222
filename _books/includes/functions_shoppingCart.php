<?php


  // Adiciona livros ao vetor do cookie
  function add_book_cart($ISBN){

    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {

      // unserialize cookie
      $cart = unserialize($_COOKIE[$cookie_name]);
      print_r(array_values($cart));

      // Adiciona ISBN na lista
      array_push($cart, $ISBN);

      // serializa novamente e salva no cookie
      setcookie($cookie_name, serialize($cart)); // 86400 = 1 day

    } else {

      // Cria um cookie chamado ShoppingCart e adiciona um array vazio a ele
      $cookie_name = 'ShoppingCart';
      $cart = array();

      // Adiciona ISBN ao vetor
      array_push($cart, $ISBN);

      // Seta o cookie
      setcookie($cookie_name, serialize($cart)); // 86400 = 1 day

    }

  }

  // Lista livros no carrinho
  function list_books_cart(){

    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {

      // Caso o carrinho contenha livros
      $cart = unserialize($_COOKIE[$cookie_name]);

      for ($i=0; $i < count($cart); $i++){
        echo "Key : " . key($cart) . " Value : " . $cart[$i] . "<br>";
        next($cart);
      }

    } else {

      // Caso o carrinho esteja vazio
      echo "<p>Empety Cart</p>";

    }

  }

?>
