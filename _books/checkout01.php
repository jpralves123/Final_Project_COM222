<!DOCTYPE hml>
<?php
include 'includes/functions_shoppingCart.php';

// Atualiza lista de compras da página
$cart = list_books_cart_array();

?>

<html lang="en">
  <!-- ************************************************ -->
  <head>

    <title>Online Books - Login</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>

  <!-- ************************************************ -->

  <body>
    <div class="row">

      <div class="login-page">
        <div class="form">

          <div class="form-group">
            <a class="navbar-brand" href="index.php"><img class="logo" src="img/logo.png"></a>

           <form name="formMail" class="login-form" onsubmit="return validateMail();" method="POST" action="emailAuthentication.php">
              <br><br><br>
              <h4 class="text-center">You have <?php echo count_cart(); ?> item in your cart!</h3>
              <br>
              <input type="text" class="form-control" placeholder="email" name="email" id="email"/>
              <br>
              <input class="btn btn-primary" type="submit" value="Login" id="enter" name="enter">

            </form>

            <script>
              function validateMail() {
                  var x = document.forms["formMail"]["email"].value;
                  var atpos = x.indexOf("@");
                  var dotpos = x.lastIndexOf(".");
                  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                      alert("Not a valid e-mail address!");
                      return false;
                  }
              }
              </script>

              <p class="message"><br>Not registered? <a href="sign_up_page.html">Create an account</a></p>
              <a href="ShoppingCart.php"><span class="glyphicon glyphicon glyphicon glyphicon-circle-arrow-left"></span> Back</a>

          </div>

        </div>
      </div>
    </div>


  </body>
  <!-- ************************************************ -->
</html>
