<?php

$login = $_POST['login'];
$fname = $_POST['fname'];
$senha = $_POST['password'];
$lname = $_POST['lname'];
$street = $_POST['street'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$email_address = $_POST['email_address'];

// Conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

$query_select = "SELECT login FROM user WHERE login = '$login'";
$select = mysqli_query($connect, $query_select);

$array = mysqli_num_rows($select);

if($array > 0 ){
  $logarray = $array['login'];

}else{

  $logarray = "";

  if($login == "" || $login == null){

    echo"<script language='javascript' type='text/javascript'>alert('Login field must be filled in!');window.location.href='sign_up_page.html';</script>";

    }else{
      if($logarray == $login){

        echo"<script language='javascript' type='text/javascript'>alert('This Username already exists!');window.location.href='sign_up_page.html';</script>";
        die();

      }else{
        $query = "INSERT INTO user (fname, lname, street, city, state, zip, login, senha, nome, admin) VALUES ('$fname', '$lname', '$street', '$city', '$state', '$zip','$login','$senha', '$email_address', '0')";

        $insert = mysqli_query($connect, $query);

        if($insert){
          echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='login_page.html'</script>";
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='sign_up.html'</script>";
        }
      }
    }
}
?>
