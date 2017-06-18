<?php

// conecta ao banco de dados e seleciona a base de dados em que vamos trabalhar
include_once('DatabaseConnection.php');

// Verifica se o ISBN do livro foi passado via GET URL
if(isset($_GET['ISBN']) && $_GET['ISBN'] !== ''){

  // Coleta os dados via GET
  $ISBN = $_GET['ISBN'];

  // cria a instrução SQL que vai selecionar os dados
  $query_selectISBN = "SELECT * FROM bookdescriptions WHERE ISBN LIKE '%".$ISBN."%'";

  // executa a query
  $selectISBN = mysqli_query($connect, $query_selectISBN);

  // coleta os livros com aquele ISBN
  $rowISBN = mysqli_fetch_assoc($selectISBN);

}

?>

<!DOCTYPE hml>
<html lang="en">
  <!-- ************************************************ -->
  <head>

    <title>Online Books</title>

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
