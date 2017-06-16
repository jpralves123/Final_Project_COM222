<!-- ************************************************ -->
<!--HEADER-->
<?php

      session_start();

      if (isset($_SESSION["login"]) && isset($_SESSION["admin"])) {

        $user = $_SESSION["login"];
        $admin = $_SESSION["admin"];

        //Exibe o painel de admin
        if($admin == 1){
          include 'headers/header_Admin.php';
        } else {
        // Exibe o painel padrão de usuário logado
          include 'headers/header_User.php';
        }

      } else {
        // Exibe o painel padrão
        include 'headers/header_Default.php';
      }

 ?>
<!-- ************************************************ -->
