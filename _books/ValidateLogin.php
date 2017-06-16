<?php
  $login = $_POST['login'];
  $enter = $_POST['enter'];
  $password = $_POST['password'];

  // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
  include_once('DatabaseConnection.php');

    if (isset($enter)) {

      $query_select = "SELECT * FROM user WHERE login = '$login' AND senha = '$password'";

      $select = mysqli_query($connect, $query_select) or die("erro ao selecionar");

      $register = mysqli_num_rows($select);

        if ($register > 0){

          // Criar a sessao. Login e senha conferem
          $login = $register["login"];
          $admin = $register["admin"];

          session_start();

          $_SESSION["login"] = $login;
          $_SESSION["admin"] = $admin;
          header("Location:index.php");

        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login_page.html';</script>";
          die();
        }
    }
?>
