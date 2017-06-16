<?php

session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["admin"])) {
    header("Location:formlogin.php?erro=User is offline");
}

?>
