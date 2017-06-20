<?php

  $email = $_POST["email"];

  // Inciai Sessão
  session_start();

  if (!isset($_SESSION['login'])){
    echo"<script language='javascript' type='text/javascript'>alert('User not registered or not logged!');window.location.href='login_page.html';</script>";
  }else{

    $password =$_SESSION['password'];
    $login = $_SESSION['login'];

    // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
    include_once('DatabaseConnection.php');

    $query_select = "SELECT * FROM user WHERE nome = '$email' AND login = '$login' AND senha = '$password'";

    $select = mysqli_query($connect, $query_select) or die("Database Error!");

    $rows = mysqli_fetch_assoc($select);

    if ($rows > 0){

      // direciona pra checkout02
      echo"<script language='javascript' type='text/javascript'>alert('Hello, ".$login."!');window.location.href='ShowCheckout02.php?email=".$email."';</script>";

    }else{
      echo"<script language='javascript' type='text/javascript'>alert('Incorrect email');window.location.href='checkout01.php';</script>";
      die();
    }

  }

?>
