<?php

$login = $_POST['login'];
$senha = MD5($_POST['password']);
$senha = $_POST['email_address'];

$connect = mysqli_connect('localhost','root','');
$db = mysqli_select_db($connect, 'sandvigbookstore');

$query_select = "SELECT login FROM user WHERE login = '$login'";
$select = mysql_query($query_select,$connect);
$array = mysql_fetch_array($select);
$logarray = $array['login'];

  if($login == "" || $login == null){

    echo"<script language='javascript' type='text/javascript'>alert('Login field must be filled in!');window.location.href='sign_up.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('This Username already exists!');window.location.href='sign_up.html';</script>";
        die();

      }else{
        $query = "INSERT INTO user (login,senha, nome, admin) VALUES ('$login','$senha', '$email_address', 0)";

        $insert = mysql_query($query,$connect);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login_page.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='sign_up.html'</script>";
        }
      }
    }
?>
