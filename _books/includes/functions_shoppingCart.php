<?php

  // Deleta o cookie
  function delete_cookie_cart(){

    $cookie_name = 'ShoppingCart';

    if(isset($_COOKIE[$cookie_name])) {
      setcookie($cookie_name, "", time() - 3600, "/");
    }

  }

  function frete(){

    $books = count_cart();
    $frete = 0;

    if($books > 0){

      $frete = 10 + ($books-1)*5;

    }

    return $frete;

  }

  // Contar itens no carrinho
  function count_cart(){

    $cookie_name = 'ShoppingCart';
    $quant = 0;

    if(isset($_COOKIE[$cookie_name])) {

      // Da um unserialize no array de compras
      $cart = unserialize($_COOKIE[$cookie_name]);

      // Para cada produto
      foreach($cart as $book){

        // Da unserialize
        $book = unserialize($book);

        // soma as quantidades
        $quant = $quant + $book[1];

      }

    }

    return $quant;

  }

  // Adiciona livros ao vetor do cookie
  function add_book_cart($bookISBN, $bookQuant){

    $cookie_name = 'ShoppingCart';

    // Verifica se o cookie existe
    if(!isset($_COOKIE[$cookie_name])) {

      // Se o array $cart ja existe, é limpo
      if(isset($cart)){
        unset($cart);
      }

      // Cria um array de compras
      $cart = array();

      // Se o array $bookINFO ja existe, é limpo
      if(isset($bookINFO)){
        unset($bookINFO);
      }

      // Cria array do produto com ISBN + quantidade
      $bookINFO = array($bookISBN, $bookQuant);

      // Adiciona o array de produto no array de compras
      array_push($cart, serialize($bookINFO));

      // da um serialize no vetor de compras e cria um novo cookie com o vetor atualizado
      setcookie($cookie_name, serialize($cart), time() + (86400 * 30), "/"); // 86400 = 1 day

    } else {

      // Se sim da um unserialize para acessar o array de compras
      $cart = unserialize($_COOKIE[$cookie_name]);

      // Cria array do produto com ISBN + quantidade
      $bookINFO = array($bookISBN, $bookQuant);

      // Adiciona o array de produto no array de compras
      array_push($cart, serialize($bookINFO));

      // da um serialize no vetor de compras e cria um novo cookie com o vetor atualizado
      setcookie($cookie_name, serialize($cart), time() + (86400 * 30), "/"); // 86400 = 1 day

    }

  }

  // Lista livros no carrinho
  function list_books_cart(){

    $cookie_name = 'ShoppingCart';

    // Verifica se o cookie existe
    if(isset($_COOKIE[$cookie_name])) {

      // Se sim
      // Da um unserialize no array de compras
      $cart = unserialize($_COOKIE[$cookie_name]);

      // Para cada produto
      foreach($cart as $book){

        // Da unserialize
        $book = unserialize($book);

        // Imprime na tela o ISBN e quantidade de unidades
        echo "ISBN: ".$book[0]." QUANT.: ".$book[1]."<br>";

      }

    } else {

      // Caso o carrinho esteja vazio
      echo "<p>Empty Cart</p>";

    }

  }

  // Gera um array com os elementos do carrinho
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

  // Calcula valor total do carrinho
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

  // Remove item do carrinho
  function remove_book_cart($ISBN){

    $cookie_name = 'ShoppingCart';

    $cart = unserialize($_COOKIE[$cookie_name]);

    foreach($cart as $book){

        $book = unserialize($book);

        // Verifica se o ISBN é o mesmo
        if($book[0] == $ISBN){

          $book = serialize($book);

          $key = array_search($book, $cart);

          unset($cart[$key]);

          // da um serialize no vetor de compras e cria um novo cookie com o vetor atualizado
          setcookie($cookie_name, serialize($cart), time() + (86400 * 30), "/"); // 86400 = 1 day

          break;
        }
    }
  }

  // Aumenta a quantidade de itens do carrinho
  function quantity_book_cart($ISBN, $bookQuant){

    remove_book_cart($ISBN);
    add_book_cart($ISBN, $bookQuant);

  }

?>
