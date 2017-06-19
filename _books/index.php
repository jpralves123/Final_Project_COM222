<!--PÁGINA PRINCIPAL-->
<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

  <head>

    <title>Online Books</title>

    <!-- ************************************************ -->
    <!--HEADER-->
    <?php  include 'header.php'; ?>
    <!-- ************************************************ -->
    <!--SIDE MENU-->
    <?php  include 'menus/sideMenu.php'; ?>
    <!--RANDOM BOOKS FUNCTIONS-->
    <?php  include 'RandomBookFunctions.php'; ?>
    <!-- ************************************************ -->


  </head>

<!-- ************************************************ -->

  <body>

    <!--SLIDER RANDON BOOKS-->

    <div class="container-fluid col-md-10">
      <h3>Sugestions</h3>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
              <div class="panel">
                <div class="panel-body">
		 <?php
		   randomBookShow();
		 ?>
                </div>
		</div>
            </div>
          </div>

          <div class="item">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
              <div class="panel">
                <div class="panel-body">
                <?php
		   randomBookShow();
		 ?>
                </div>
              </div>
            </div>
          </div>

          <div class="item">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
              <div class="panel">
                <div class="panel-body">
               <?php
		   randomBookShow();
		 ?>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div>

  </body>

  <!-- ************************************************ -->
  <!--FOOTER-->
  <br>
  <?php  include 'footer.html'; ?>
  <!-- ************************************************ -->

</html>
