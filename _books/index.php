
<!DOCTYPE hml>
<html lang="en">
<!-- ************************************************ -->

<head>

  <title>Online Books</title>

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
        <li><a href="ShoppingCart.html"><span class="glyphicon glyphicon glyphicon-shopping-cart"></span>Cart</a></li>
        <li><a href="sign_up_page.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login_page.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

    </div>
  </nav>

</head>

<!-- ************************************************ -->

<body>

  <div class="container-fluid">

    <div class="row">

      <!--DROPDOWN MENU -->
      <div class="dropdown col-md-12">
        <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Browse
          <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ASP.NET</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MySQL</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">PHP</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular Expressions</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">SQL</a></li>
          <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Web Usability</a></li>
        </ul>
        <a href="https://github.com/jpralves123/Final_Project_COM222/tree/master/_books" class="btn btn-primary">GitHub Source Code</a>
        <a href="BookStoreManagement.php" class="btn btn-danger">Book Store Management</a>
        <a href="#" class="btn btn-primary">About Us</a>
      </div>

      <br>
      <!--SLIDER RANDON BOOKS-->

      <div class="container-fluid col-md-12">
        <h3>Sugestions</h3>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <div class="item active">

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                            <a>
                              JavaScript: 20 Lessons to Successful Web Development
                            </a>
                          </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                            <a>
                              JavaScript: 20 Lessons to Successful Web Development
                            </a>
                          </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                            <a>
                              JavaScript: 20 Lessons to Successful Web Development
                            </a>
                          </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

            </div>


            <div class="item">
              <!--<img src="chicago.jpg" alt="Chicago" style="width:100%;">-->

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

            </div>

            <div class="item text-center">
              <!--<img src="ny.jpg" alt="New york" style="width:100%;">-->
              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="panel panel-primary">
                  <div class="panel-body">

                    <h4 class="text-center">
                          <a>
                            JavaScript: 20 Lessons to Successful Web Development
                          </a>
                        </h4>

                    <img class="img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">
                    <br>

                    <p class="text-justify">
                      Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                      <a>Read More</a>
                    </p>

                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control col-md-1" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control col-md-1" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <!--CONTENT-->
      <!--<div class="col-md-9" id="content">

            <div class="col-md-12">
              <h3> Sugestions</h3>
            </div>


            <div class="col-md-12">

              <div class="panel panel-primary">

                <div class="panel-heading">
                  <h4>JavaScript: 20 Lessons to Successful Web Development</h4>
                </div>

                <div class="panel-body">

                  <img class=" col-md-2 img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">

                  <p class = "col-md-10 text-justify">
                    Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                    ... <a href="details.html">Read More</a>.
                  </p>

                </div>
              </div>

            </div>

            <div class="col-md-12">

              <div class="panel panel-primary">

                <div class="panel-heading">
                  <h4>JavaScript: 20 Lessons to Successful Web Development</h4>
                </div>

                <div class="panel-body">

                  <img class=" col-md-2 img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">

                  <p class = "col-md-10 text-justify">
                    Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                    ... <a href="details.html">Read More</a>.
                  </p>

                </div>
              </div>

            </div>

            <div class="col-md-12">

              <div class="panel panel-primary">

                <div class="panel-heading">
                  <h4>JavaScript: 20 Lessons to Successful Web Development</h4>
                </div>

                <div class="panel-body">

                  <img class=" col-md-2 img-responsive center-block" src="007184158X.01.MZZZZZZZ.jpg">

                  <p class = "col-md-10 text-justify">
                    Based on the author's successful online courses, this complete, integrated learning tool provides easy-to-follow lessons that feature clear explanations, sample code and exercises, and video tutorials. Each lesson is designed to take you less than
                    ... <a href="details.html">Read More</a>.
                  </p>

                </div>
              </div>

            </div>

        </div> -->

    </div>

  </div>

</body>

<!--FOOTER-->
<footer class="container-fluid text-center bg-lightgray">

  <div class="copyrights text-center" style="margin-top:25px;">
    <p>Web Books © 2017, All Rights Reserved
      <br>
      <span>Programação Web COM222 - Universidade Federal de Itajubá</span>
      <br>
      <a>About</a>
      <br><br>
    </p>
    <p>
      <a class="img-responsive center-block" href="index.php"><img class="logo" src="img/logo.png"></a>
      <br>
      <span>João Pedro Rufino Alves - 30239 | Mateus Romera Villar - 31451</span>
    </p>
  </div>

</footer>
<!-- ************************************************ -->

</html>
