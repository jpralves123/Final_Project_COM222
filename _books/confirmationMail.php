<?php
  include 'includes/functions_shoppingCart.php';
  include 'includes/functions_db.php';

  // Inciai Sessão
  session_start();

  // relaciona dados do usuário
  $login = $_SESSION['login'];

  // busca dados do usuário
  $user = get_user_data($login);

  // pega lista de compras atualizada
  $cart = list_books_cart_array();

  $email = $user['nome'];
  $subject = "Order Summary - Web Books";
  $bodyM = "<br><h3><b>Order Summary</b></h3>
           <h4><b>Products:</h4>";

  if($cart !== NULL){
     // Início do loop
     foreach($cart as $book){
       $book = unserialize($book);
       $bookISBN = $book[0];
       $bookTitle = get_book_title($book[0]);
       $bookQuant = $book[1];
       $bookPrice = get_book_price($book[0]);

       $bodyM .= "<h4><b>> ".$bookTitle." - $ ".$bookPrice." x ".$bookQuant."</h4>";
    }
  }

  $bodyM .= "<h4><b>Name:</b> ".$user['fname']." ".$user['lname']."</h4>
           <br><br><h3><b>Delivery Address</b></h3>
           <h4><b>Name:</b> ".$user['fname']." ".$user['lname']."</h4>
           <h4><b>e-mail:</b>  ".$user['nome']."</h4>
           <h4><b>Street:</b> ".$user['street']."</h4>
           <h4><b>City:</b> ".$user['city']."</h4>
           <h4><b>State:</b> ".$user['state']."</h4>
           <h4><b>ZIP CODE:</b> ".$user['zip']."</h4>";

  // envia email
  mail($email, $subject ,$bodyM, 'From: contato@webbooks.com');

  // Limpa cookies
  delete_cookie_cart();

  // Volta para a index
  echo"<script language='javascript' type='text/javascript'>window.location.href='index.php';</script>";


 ?>
