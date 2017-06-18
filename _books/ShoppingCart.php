<?php
  // conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
  include_once('DatabaseConnection.php');
  include_once('includes/functions_db.php');
  include_once('includes/funtions_shoppingCart.php');

	if($_REQUEST['command']=='delete' && $_REQUEST['isbn']>0){
		remove_product($_REQUEST['isbn']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$ISBN=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$ISBN]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}

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
    							<th style="width:50%">Product</th>
    							<th style="width:10%">Price</th>
    							<th style="width:8%">Quantity</th>
    							<th style="width:22%" class="text-center">Subtotal</th>
    							<th style="width:10%"></th>
    						</tr>
    					</thead>

    					<tbody>
    						<tr>
    							<td data-th="Product">
    								<div class="row">
    									<div class="col-sm-2 hidden-xs"><img src="007184158X.01.MZZZZZZZ.jpg" alt="..." class="img-responsive"/></div>
    									<div class="col-sm-10">
    										<h4 class="nomargin"><a>JavaScript: 20 Lessons to Successful Web Development</a></h4>
    									</div>
    								</div>
    							</td>
    							<td data-th="Price">$1.99</td>
    							<td data-th="Quantity">
    								<input type="number" class="form-control text-center" value="1">
    							</td>
    							<td data-th="Subtotal" class="text-center">1.99</td>
    							<td class="actions" data-th="">
    								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
    								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
    							</td>
    						</tr>
    					</tbody>

    					<tfoot>
    						<tr class="visible-xs">
    							<td class="text-center"><strong>Total 1.99</strong></td>
    						</tr>
    						<tr>
    							<td><a href="index.php" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
    							<td colspan="2" class="hidden-xs"></td>
    							<td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
    							<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
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
