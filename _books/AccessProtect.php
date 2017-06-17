<!-- ************************************************ -->
<!--HEADER-->
<?php

    // Inciai Sessão
    session_start();

    // Define qual o nível de acesso de cada usuários
    if ( !isset($_SESSION['login']) and !isset($_SESSION['password'] and !isset($_SESSION['admin']) ) {

      //Destrói
      session_destroy();

      //Limpa
      unset ($_SESSION['login']);
      unset ($_SESSION['password']);
      unset ($_SESSION['admin']);

      //Redireciona para a página inicial
      header('location:index.php');

    }

 ?>
<!-- ************************************************ -->
