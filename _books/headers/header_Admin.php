<?php
//include_once("./validate.php");
 ?>

<!-- ************************************************ -->
<!--HEADER-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <nav class="navbar ">
    <div class="container-fluid">

      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png"></a>
      </div>

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <a href="SearchBrowse.html" class="btn btn-primary">Search</a>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a>Ola, <?php echo $_SESSION['login']; ?>!</a></li>
        <li><a href="BookStoreManagement.php"><span class="fa fa-cogs fa-lg"></span> Management</a></li>
        <li><a href="https://github.com/jpralves123/Final_Project_COM222/tree/master/_books"><span class="fa fa-github fa-lg"></span> Source Code</a></li>
        <li><a href="index.php"><span class="fa fa-home fa-lg"></span> Home</a></li>
        <li><a href="Exit.php"><span class="fa fa-sign-out fa-lg"></span> Exit</a></li>
      </ul>

    </div>
  </nav>

</head>


<!-- ************************************************ -->

</html>
