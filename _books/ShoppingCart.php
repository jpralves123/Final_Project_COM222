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

    	<table id="cart" class="table table-hover table-condensed">

                <thead>
    						<tr>
    							<th style="width:48%">Product</th>
    							<th style="width:10%">Price</th>
    							<th style="width:10%" class="text-center">Quantity</th>
    							<th style="width:22%" class="text-center">Subtotal</th>
    							<th style="width:10%">
                    <a href="AddToCart_Control.php?command=empty" class="btn btn-danger">Empty</a>
                  </th>
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
        									<div class="col-sm-2 hidden-xs text-center"><img src=<?php echo get_image_book($bookISBN) ?> alt="..." class="img-responsive"/></div>
        									<div class="col-sm-10">
        										<h4 class="nomargin">
                              <a>
                                <?php echo $bookTitle; ?>
                              </a>
                            </h4>
        									</div>
        								</div>
        							</td>
        							<td data-th="Price">
                        <?php echo $bookPrice; ?>
                      </td>
        							<td data-th="Quantity">
        								<?php echo "<input type=\"number\" class=\"form-control text-center\" value=".$bookQuant.">"; ?>
        							</td>
        							<td data-th="Subtotal" class="text-center">
                        <?php echo $bookPrice*$bookQuant ?>
                      </td>
        							<td class="actions" data-th="">

                        <form method="POST" action="AddToCart_Control.php">
          								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
          								<button class="btn btn-danger btn-sm" onclick=""><i class="fa fa-trash-o"></i></button>
                          <?php echo "<input type=\"hidden\" name=\"isbn\" id=\"isbn\" class=\"form-control text-center\" value=".$bookISBN.">"; ?>
                        </form>

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
    							<td><a href="index.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
    							<td colspan="2" class="hidden-xs"></td>
    							<td class="hidden-xs text-center">
                    <strong>
                      <?php echo calculate_total_value(); ?>
                    </strong>
                  </td>
    							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
    						</tr>
    					</tfoot>

    				</table>

            <?php
              //echo list_books_cart();
            ?>
    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
