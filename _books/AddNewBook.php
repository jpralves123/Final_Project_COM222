<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Online Books - New Book</title>

  <!-- ************************************************ -->
  <!--HEADER-->
  <?php  include 'header_Admin.php'; ?>
  <!-- ************************************************ -->
</head>

<body>

  <div id="main" class="container-fluid">

    <h3 class="page-header">New Book</h3>

    <form class="register-form" method="POST" action="NewBook.php">

      <div class="row">
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">ISBN</label>
          <input type="text" class="form-control" id="isbn" name="isbn"  placeholder="ISBN Number"/>
        </div>
        <div class="form-group col-md-4">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Title"/>
        </div>
        <div class="form-group col-md-6">
          <label for="exampleInputEmail1">Description</label>
          <input type="text" class="form-control" id="description"  name="description" placeholder="Book Description"/>
        </div>
      </div>

      <div class="row">
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">Price</label>
          <input type="text" class="form-control" id="price"  name="price" placeholder="Book Price"/>
        </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">Publisher</label>
          <input type="text" class="form-control" id="publisher" name="publisher"  placeholder="Book Publisher"/>
        </div>
        <div class="form-group col-md-3">
          <label for="exampleInputEmail1">Publication Date</label>
          <input type="Date" class="form-control" id="pub_date" name="pub_date" placeholder="dd/mm/aaaa"/>
        </div>
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">Edition</label>
          <input type="text" class="form-control" id="edition" name="edition" placeholder="Edition"/>
        </div>
        <div class="form-group col-md-2">
          <label for="exampleInputEmail1">Pages</label>
          <input type="text" class="form-control" id="pages" name="pages" placeholder="Page Number"/>
        </div>
      </div>

      <div class="row">
      </div>

      <hr />

      <div class="row">
        <div class="col-md-12">

        </div>
      </div>

      <input class="btn btn-primary" type="submit" value="Save Book" id="save" name="save">
      <a href="BookStoreManagement.php" class="btn btn-default">Cancel</a>

    </form>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

<!-- ************************************************ -->
<!--FOOTER-->
<br>
<?php  include 'footer.html'; ?>
<!-- ************************************************ -->

</html>
