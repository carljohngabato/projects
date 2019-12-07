<link rel="stylesheet" type="text/css" href="../libs/css/custom.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Fixed navbar -->
	<header class="navbar navbar-expand sticky-top navbar-dark bg-custom" role="navigation">
		<div class="container">
				<a class="navbar-brand mr-0 mr-md-2" href="../views/welcome.php">Brand</a>
				<button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="col-lg-9"><!-- LINKS to navigate -->
  					<ul class="navbar-nav ml-auto">
  						<li class="nav-item">
  							<a class="nav-link" href="#">Blogs</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" href="../views/mystore.php?id=<?php echo $row['userGUID']; ?>">Store</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" href="../views/upgrade.php?id=<?php echo $row['userGUID']?>">Upgrade</a>
  						</li>
              <!-- highlight if $page_title has 'Products' word. -->
              <li class="nav-item" <?php //echo $page_title=="Products" ? "class='active'" : ""; ?>>
                  <a class="nav-link" href="products.php" class="dropdown-toggle">Products</a>
              </li>

              <li class="nav-item" <?php //echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                  <a class="nav-link" href="cart.php">
                      <?php
                      // count products in cart
                      //$cart_count = count($_SESSION['cart']);
                      ?>
                      Cart <span class="badge" id="comparison-count"><?php// echo $cart_count; ?></span>
                  </a>
              </li>
  					</ul>
          </div>
          <div class="col-lg-3"><!-- Profile & Log out -->
            <div class="row">
              <div class="col-md-12">
                <div class="error-template">
                  <span>Welcome : <a href = "../views/myprofile.php"><?php echo htmlentities($login_session);?></a></span>
                  <div class="error-actions">
                    <a href="logout.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-log-out"></span>Logout</a>
                  </div>
              </div>
            </div>
          </div>
                				  <!--<form class="form-inline mt-2 mt-md-0">
                					<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>-->
				</div>

        <!--
        <ul class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
          <li class="nav-item"><a class="nav-link p-2">link1</a></li>
          <li class="nav-item"><a class="nav-link p-2">link2</a></li>
          <li class="nav-item"><a class="nav-link p-2">link3</a></li>
          <li class="nav-item"><a class="nav-link p-2">link4</a></li>
        </ul>
      -->
		</div>
	</header>

  <!-- navbar -
  <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">

          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="products.php">XYZ Webstore</a>
          </div>

          <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">

                  <!-- highlight if $page_title has 'Products' word. -
                  <li <?php //echo $page_title=="Products" ? "class='active'" : ""; ?>>
                      <a href="products.php" class="dropdown-toggle">Products</a>
                  </li>

                  <li <?php //echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                      <a href="cart.php">
                          <?php
                          // count products in cart
                          //$cart_count = count($_SESSION['cart']);
                          ?>
                          Cart <span class="badge" id="comparison-count"><?php// echo $cart_count; ?></span>
                      </a>
                  </li>
              </ul>
          </div><!--/.nav-collapse
      </div>
  </div>
  <!-- /navbar -->
