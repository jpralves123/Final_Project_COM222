<!-- ************************************************ -->
<!--HEADER-->
<?php

    // Inciai Sessão
    session_start();

    //Caso o usuário não esteja autenticado, limpa os dados e redireciona
    if ( !isset($_SESSION['login']) and !isset($_SESSION['password']) and !isset($_SESSION['admin'])) {

      //Destrói
    	session_destroy();

      // Cabeçalho padrão para usuários não autenticados
      include 'headers/header_Default.php';

    } else {

      if($_SESSION['admin'] == 1){
        // Cabeçalho para usuários Administradores
        include 'headers/header_Admin.php';
      } else {
        // Cabeçalho para usuários comuns autenticados
        include 'headers/header_User.php';
      }

    }

 ?>
<!-- ************************************************ -->
