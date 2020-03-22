<?php
    session_start();
    require 'includes/connection.inc.php';
	require_once ('./php/categoryTemp.php');
	if (!isset($_SESSION['id'])) {
        header("Location: 401.html");
	}
	$idNum = $_SESSION['id'];
	$shipQuery = "SELECT * FROM shipping_address WHERE user_id = $idNum";
	$billQuery = "SELECT * FROM billing_address WHERE user_id = $idNum";
	$shipResult = mysqli_query($conn, $shipQuery);
	$billResult = mysqli_query($conn, $billQuery);
	$resultCheck = mysqli_num_rows($shipResult);
	$shipRow = mysqli_fetch_assoc($shipResult);
	$billRow = mysqli_fetch_assoc($billResult);
	if ($resultCheck > 0) {	
	$_SESSION['phoneNum'] = $shipRow['phoneNum'];
	$_SESSION['street'] = $billRow['street'];
	$_SESSION['city'] = $billRow['city'];
	$_SESSION['country'] = $billRow['country'];
	$_SESSION['zip'] = $billRow['zip'];
	$_SESSION['shipStreet'] = $shipRow['shipStreet'];
	$_SESSION['shipCity'] = $shipRow['shipCity'];
	$_SESSION['shipCountry'] = $shipRow['shipCountry'];
	$_SESSION['shipZip'] = $shipRow['shipZip'];
	}

?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Watch Planet | Settings</title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/ion.rangeSlider.css" />
	<link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/brand/watch_planet.png" width="200px" alt=""></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="category.php">Shop</a></li>
							<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                    <?php
                                    if (isset($_SESSION['id'])){
									   echo    '<li class="nav-item"><a class="nav-link" href="includes/logout.inc.php">Log Out <i class="fa fa-sign-out"></i></a></li>';
                                    }
                                    else {
									   echo    '<li class="nav-item"><a class="nav-link" href="login.php"><i class="fa fa-sign-in"></i> Log in</a></li>';
                                        }
                                        ?>
                            <li class="nav-item"><a href="cart.php" class="nav-link"><span class="ti-bag">
                                <?php
									//if session cart array holds items, display the amount of items stored next to the cart icon
									if(isset($_SESSION['cart'])){
										$count = count($_SESSION['cart']);
										echo '<span class="badge badge-light poppins">'.$count.'</span>';
									}else{
										echo '<span class="badge badge-light poppins">0</span>';
									}
										

                                ?></span></a></li>
							</ul>
						<ul class="nav navbar-nav navbar-right">
							
							<li class="nav-item">
								<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<section class="login_box_area section_gap mt-5">
		<div class="container">
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="fa fa-user"></i> User</h3>
        <div class="row">
		<div class="col-lg-4">
					<div class="details_item">
						<h4>Account</h4>
						<ul class="list">
							<li><span>Name</span> : <?php echo $_SESSION["name"]?></li>
							<li><span>Last Name</span> : <?php echo $_SESSION["last_name"]?></li>
							<li><span>Email</span> : <?php echo $_SESSION["email"]?></li>
							<?php
							if ($resultCheck > 0) {	
								echo '<li><span>Phone Number</span> : '.$_SESSION["phoneNum"].'</li>';
							}
							?>
						</ul>
					</div>
				</div>
				<?php
			
				if ($resultCheck > 0) {	
				echo
				'<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address <a href="#"><i class="fa fa-pencil-square-o"></i></a></h4>
						<ul class="list">
							<li><span>Street </span>: '.$_SESSION['street'].'</li>
							<li><span>City </span>: '.$_SESSION['city'].'</li>
							<li><span>Country </span>: '.$_SESSION['country'].'</li>
							<li><span>Postcode </span>: '.$_SESSION['zip'].'</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Billing Address <a href="#"><i class="fa fa-pencil-square-o"></i></a></h4>
						<ul class="list">
							<li><span>Street </span>: '.$_SESSION['street'].'</li>
							<li><span>City </span>: '.$_SESSION['city'].'</li>
							<li><span>Country </span>: '.$_SESSION['country'].'</li>
							<li><span>Postcode </span>: '.$_SESSION['zip'].'</li>
						</ul>
					</div>
				</div>';
				}
				?>
			</div>
        <hr>
        <h3 class="mgbt-xs-15 mgtp-10 font-semibold"><i class="fa fa-shopping-bag"></i> Orders</h3>
        <div class="row">
		<?php
		 echo '
                                   
		
		 <div class="card-body">
			 <div class="table-responsive">
				 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					 <thead>
						 <tr>';
									echo " <th>Product Brand</th>
										   <th>Product Name</th>
										   <th>Quantity</th>";

			  echo           '</tr>
				  
					 <tbody>';
									  $orderQuery = "SELECT watches.brand, watches.name, orderDetails.quantity
                                                     FROM watches 
                                                     JOIN orderDetails 
                                                     ON watches.id = orderDetails.watch_id
                                                     JOIN orders
                                                     ON orders.order_id = orderDetails.order_id WHERE user_id = $idNum;";
                                                      $orderResult = mysqli_query($conn, $orderQuery);   
                                                      $orderResultCheck = mysqli_num_rows($orderResult);
                                                        
                                                      if($orderResultCheck > 0){
                                                        while($row = mysqli_fetch_assoc($orderResult)){
                                                            if(!empty($row['brand'])){
                                                               echo "<tr><td>".$row['brand']."</td>". 
                                                               "<td>".$row['name']."</td>".
                                                               "<td>".$row['quantity']."</td>";
                                                            } else{
                                                                echo "<td>0</td>";
                                                            }
                                                        }
													 } 
													 echo   '</tbody>
													 </table>
												 </div>
											 </div>		 
										';
			?>
          </div>
        </div>  
		</div>
	</section>

	<!-- start footer Area -->
	<footer class="footer-area">
		<div class="container">
			<div class="row">
			 <div class="col">
				<div class="single-footer-widget">
					<img class="img-fluid pb-5" width="75%" src="img/brand/watch_planet.png">
				</div>
			</div>
			<div class="col-lg-5">
				<div class="single-footer-widget">
					<h6>About Us</h6>
					<p>
						We are a watch e-commerce centered on giving our costumers the best experience possible.
					</p>
				</div>
			</div>
               
				
			</div>	
             <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap mt-5">
				<p class="mx-auto">Copyright &copy; 2020 All rights reserved  |  <a class="a-color disabled" href="">Privacy Policy</a> &middot; <a class="a-color disabled" href="">Terms &amp; Conditions</a></p>
             </div>
		</div>
	</footer>
	<!-- End footer Area -->


	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>