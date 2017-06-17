<?php

  $login = $_POST["login"];
  $password = $_POST["password"];

  // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
  include_once('DatabaseConnection.php');

  $query_select = "SELECT * FROM user WHERE login = '$login' AND senha = '$password'";

  $select = mysqli_query($connect, $query_select) or die("Database Error!");

  $rows = mysqli_fetch_assoc($select);

  if ($rows > 0){

    // Criar a sessao. Login e senha conferem
    $login = $rows['login'];
    $admin = $rows['admin'];

    session_start();

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
    $_SESSION['admin'] = $admin;

    //echo"<script language='javascript' type='text/javascript'>alert('Login Success!');";

    header('location:index.php');

  }else{
    echo"<script language='javascript' type='text/javascript'>alert('Incorrect Login or password!');window.location.href='login_page.html';</script>";
    die();
  }

?>
