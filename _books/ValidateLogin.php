<?php
  $login = $_POST['login'];
  $enter = $_POST['enter'];
  $password = $_POST['password'];

  $connect = mysqli_connect('localhost','root','');
  $db = mysqli_select_db($connect, 'sandvigbookstore');

    if (isset($enter)) {

      $query_select = "SELECT * FROM user WHERE login = '$login' AND senha = '$password'";

      $select = mysqli_query($connect, $query_select) or die("erro ao selecionar");

      $rows = mysqli_num_rows($select);
      echo"<script language='javascript' type='text/javascript'>alert('".$rows."');window.location.href='login_page.html';</script>";


        if ($rows > 0){
          setcookie("login",$login);
          header("Location:index.php");
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login_page.html';</script>";
          die();
        }
    }
?>
