<?php
  include 'includes/functions_shoppingCart.php';
  include 'includes/functions_db.php';

?>

<!DOCTYPE hml>
<html lang="en">

  <!-- ************************************************ -->
  <head>

    <title>Shopping Cart</title>

    <!-- ************************************************ -->
    <!--HEADER-->
    <?php  include 'header.php'; ?>
    <!-- ************************************************ -->

  </head>

  <!-- ************************************************ -->

  <body>

    <div class="container">
      <h1>Checkout</h1>

      <table id="cart" class="table table-hover table-condensed">
        <h3>Order Summary</h3>
      <thead>
        <tr>
          <th style="width:58%">Product</th>
          <th style="width:10%" class="text-center">Price</th>
          <th style="width:10%" class="text-center">Quantity</th>
          <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
      </thead>

      <?php

        // Atualiza lista de compras da página
        $cart = list_books_cart_array();

        if($cart !== NULL){

      ?>

        <tbody>

          <?php

            // Início do loop
            foreach($cart as $book){
              $book = unserialize($book);
              $bookISBN = $book[0];
              $bookTitle = get_book_title($book[0]);
              $bookQuant = $book[1];
              $bookPrice = get_book_price($book[0]);
          ?>

            <tr>
              <td data-th="Product">
                <div class="row">
                  <div class="col-sm-10">
                    <h4 class="nomargin">
                        <?php echo $bookTitle; ?>
                    </h4>
                  </div>
                </div>
              </td>
              <td data-th="Price" class="text-center">
                <?php echo $bookPrice; ?>
              </td>
              <td data-th="Quantity" class="text-center">
                <?php echo $bookQuant; ?>
              </td>
              <td data-th="Subtotal" class="text-center">
                <?php echo $bookPrice*$bookQuant ?>
              </td>
            </tr>

          <?php
            // Fim do loop
            }
          ?>

        </tbody>

      <?php } ?>

      <tfoot>
        <tr class="visible-xs">
          <td class="text-center"><strong>Total 1.99</strong></td>
        </tr>
        <tr>
          <td colspan="1" class="hidden-xs"></td>
          <td colspan="2" class="hidden-xs"></td>
          <td class="hidden-xs text-center">
            <strong>
              <?php echo calculate_total_value(); ?>
            </strong>
          </td>
        </tr>

        <br><br>

        <tr>
          <td data-th="Product">
            <div class="row">
              <div class="col-sm-10">
                <h4 class="nomargin">
                    <?php
                      echo "<h3>Delivery Address</h3>";
                      echo "<h4>Name: </h4>";
                      echo "<h4>e-mail:  </h4>";
                      echo "<h4>Street: </h4>";
                      echo "<h4>City: </h4>";
                      echo "<h4>State: </h4>";
                      echo "<h4>ZIP CODE: </h4>";

                    ?>
                </h4>
              </div>
            </div>
          </td>
        </tr>

        <br><br>

        <tr>
          <td><a href="index.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
          <td colspan="1" class="hidden-xs"></td>
          <td><a href="OrderHistory.php" class="btn btn-success btn-block"><span class="glyphicon glyphicon-time"></span> Order History</a></td>
          <td><a href="confirmationMail.php" class="btn btn-success btn-block">	Finalize <span class="glyphicon glyphicon-ok"></span></a></td>
        </tr>
      </tfoot>

    </table>


    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
