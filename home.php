<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

?>
<!DOCTYPE html>
<html lang="en	">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Safe Drive Partitions</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="animate.css">
	<link href="custom.css" rel="stylesheet">
	<link href="modals.css" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="snackbar.css" rel="stylesheet">

</head>

<body>

	<!-- NavBar -->
	<div class="nav-area fixed-top">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light w-100">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="home.php">Safe Drive Partitions</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon">
			      </span>
			    </button>
			    <div class="nav-container collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			      <ul class="navbar-nav">
			        <li class="nav-item">
			          <a id="s1" class="nav-link" aria-current="page" href="#home">Home</a>
			        </li>
			        <li class="nav-item">
			          <a id="s2" class="nav-link" href="#about">About</a>
			        </li>
			        <li class="nav-item">
			          <a id="s3" class="nav-link" href="#howitworks">How it works</a>
			        </li>
              		<li class="nav-item">
			          <a id="s4" class="nav-link" href="#portifolio">Portifolio</a>
			        </li>
    					<li class="nav-item">
    					  <a id="s5" class="nav-link" href="#order">Order</a>
    					</li>
			        <li class="nav-item">
			          <a id="s6" class="nav-link" href="#contact">Contact Us</a>
			        </li>
			        <?php
    						if(isset($_SESSION['user']))
    						{
    							?>
    							<li class="nav-item">
    								<?php if($_SESSION['user']=='feres') { ?> <a class="nav-link" href="feres.php">Feres Page</a> <?php } ?>
    								<?php if($_SESSION['user']=='hellotaxi') { ?> <a class="nav-link" href="hellotaxi.php">Hello Taxi Page</a> <?php } ?>
    								<?php if($_SESSION['user']=='ride') { ?> <a class="nav-link" href="ride.php">Ride Page</a> <?php } ?>
    								<?php if($_SESSION['user']=='taxiye') { ?> <a class="nav-link" href="taxiye.php">Taxiye Page</a> <?php } ?>
    								<?php if($_SESSION['user']=='zay-ride') { ?> <a class="nav-link" href="zay-ride.php">ZayRide Page</a> <?php } ?>
    								<?php if($_SESSION['user']=='admin') { ?> <a class="nav-link" href="admin.php">Admin Page</a> <?php } ?>
    							</li>
    							<?php
    						}
    					?>
    					<li class="nav-item" style="cursor: pointer;">
    						<?php if(!isset($_SESSION['user'])&&!isset($_COOKIE['getin'])){?><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a><?php }
    						else { ?><a class="btn btn-danger" href="logout.php">Logout</a><?php } ?>
    					</li>
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>
	</div>

	<?php include('server.php'); ?>

	<!-- Home Area -->
	<div id="home" class="slider-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">

					<!-- Notifications -->
					<div class="slider-message">
						<div id="orderSuccessSnackbar">Product Ordered Successfully!</div>
						<div id="orderErrorSnackbar"> Order Already Sent!</div>
					</div>

					<!-- Welcome Message -->
					<div class="slider-text">

						<h1>Welcome <br> To <br> <span id="animateMe" class="reflect">Safe Drive Partitions </span> </h1>
						<p>
							<a href="#order">Order Now </a>
							<a href="#contact">Contact Us </a>
						</p>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- About Area -->
	<div id="about" class="about-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<div class="section-header">
						<h2>About Us</h2>
					</div>
				</div>
				<br>
			</div>

			<div class="row">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
					<div class="about-img">
						<img src="images/srplogo2.jpg" alt="object">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
					<div class="item-text spaced">
						<p style="font-size: 18px;">Our company provides a reliable and secure barrier between drivers and passengers to insure the safety of both parties.
							This helps to increase productivity by providing security for both <strong> day</strong> and <strong>night</strong> jobs.
							Hence boosting the profitability of both the drivers and ride hailing companies by giving the access of increased working time for the drivers.
						</p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Status Area -->
	<div class="stats-area section-padding">
		<div class="container">

				<div class="col-md-12" style="padding-top: 7%; padding-bottom: 7%;">
					<div class="single-stats">
					<h1>መኪናዎ ሳይበሳ ከወንበሩ ጋር በቀበቶ ብቻ የሚታሰር የጋቢና መከለያ </h1>
					<h1>ይዘዙ በ 72 ሰዓት ይደርሶታል</h1>
					</div>
				</div>
		</div>
	</div>

	<!-- How it Works -->
	<div id="howitworks" class="hiw-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<div class="section-header">
						<h1>How this works</h1>
						<p>These are the steps you should follow to get our product</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated slideInLeft" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-hand-point-right fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">1</span>  Selection</h2>
						<p>	First step is for the customer to choose from the products available.
							These being the Day Time Product (Acrylic), the Night Time Product (Metal) or the Hybrid Product (Both).
							Select the corresponding "Order Now" button to choose from the three.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated slideInDown" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-pen-fancy fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">2</span> Fill out Order Form</h2>
						<p>	Second step is for the customer to fill out the form for the chosen product.
							This form includes Full Name of the customer, the Company's name for which the customer works for
							as well as contact information. Once the user completes the form, he/she can submit the form using the
							"Order" button.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated slideInRight" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-clipboard-check fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">3</span> Approval</h2>
						<p>	In this step, the customer's employer company will recieve notification of the customer's order.
							Once the company confirms that the customer is an employee, they will approve the order which will inturn send a notification
							to our company. This means the customer is viable to recieve the product he/she ordered.
						</p>
					</div>
				</div>
			</div>
			<div class="row mt-5 pt-3">
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated slideInLeft" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-route fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">4</span> Delivery</h2>
						<p>	Once approved, one of our company representatives will contact the customer and arranges meeting place and time.
							We are able to meet the customer anywhere at anytime, as long as it is in Addis Ababa.
							We will open branches to other countries in the future.
							Once our representative meets the customer, then he/she will proceed to assemble our product into the customer's vehicle.
							This will be free of charge.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated fadeIn" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-hands-helping fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">5</span> Confirmation</h2>
						<p>	After the job is done, the company will contact the customer and confirm the delivery of our product.
							Once the customer confirms he/she successfully recieved our product, the customer's company will finalize payment method.
							This will conclude our part in the process.
						</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-hiw wow animated slideInRight" data-wow-delay="0.2s" data-wow-duration="1.3s">
						<i class="fas fa-donate fa-4x"></i>
						<h2> <span class="bg-dark text-white px-4 ps-3 pe-3 me-2" style="border-radius: 5em;">6</span> Payment</h2>
						<p>	The final process is the matter of payment. Here the customer can either pay the amount owed in full to the company
							or the company will provide other means of payment such as deductables from every transaction or from daily profits.
							This is helpful for those employee's who can't afford to pay the price immediately.
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pay in 6months -->
	<div class="first-area secion-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8 offset-md-2">
					<div class="single-first">
						<h1 class="text-white">የሚሰሩበት የታክሲ ድርጅት በ6 ወር ከክሬዲትዎ ላይ መክፈል እንዲችሉ አመቻችቶሎታል</h1>
						<a href="#order" class="btn btn-dark btn-sm" style="font-family: 'AudioWide', cursive;">Order Now</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Portifolio -->
	<div id="portifolio" class="portifolio-area section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<div class="section-header">
						<h2>Our Recent Works</h2>
						<p>These are some of the partitions we have installed</p>
					</div>
				</div>
			</div>
			<div class="row text-center">
				<div class="col-md-6 col-sm-6 col-xs-6 wow animated fadeIn" data-wow-delay="0.2s" data-wow-duration="1s">
					<div class="portifolio-images">
						<div class="single-work"><img id="myImg1" src="images/f1.jpg" alt="" data-bs-toggle="modal" data-bs-target="#portifolioModal" data-bs-whatever="images/f1.jpg"></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 wow animated fadeIn" data-wow-delay="0.6s" data-wow-duration="1s">
					<div class="portifolio-images">
						<div class="single-work"><img id="myImg2" src="images/f2.jpg" alt="" data-bs-toggle="modal" data-bs-target="#portifolioModal" data-bs-whatever="images/f2.jpg"></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 wow animated fadeIn" data-wow-delay="0.2s" data-wow-duration="1s">
					<div class="portifolio-images">
						<div class="single-work"><img id="myImg4" src="images/f4.jpg" alt="" data-bs-toggle="modal" data-bs-target="#portifolioModal" data-bs-whatever="images/f4.jpg"></div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-6 wow animated fadeIn" data-wow-delay="0.6s" data-wow-duration="1s">
					<div class="portifolio-images">
						<div class="single-work"><img id="myImg5" src="images/f5.jpg" alt="" data-bs-toggle="modal" data-bs-target="#portifolioModal" data-bs-whatever="images/f5.jpg"></div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Portifolio Modal -->
	<div class="text-center">
		<div class="modal" id="portifolioModal" tabindex="-1">
			<div class="modal-dialog modal-fullscreen pt-5">
				<img class="img-fluid portifolio-images" id="img">
				<button class="btn btn-close btn-close-white position-absolute start-50 mt-3" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
		</div>

	</div>

	<!-- Product Carousels -->
	<div id="order">
		<div class="product-header section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<h2>Our partitions come in three forms</h2>
					</div>
				</div>
			</div>
		</div>

		<!-- Day Product -->
		<div class="day-product section-padding">
			<div class="container">
				<div class="row">
					<!-- Day-Product Carousel -->
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="day-product-image">
							<div id="dayCar" class="carousel slide" data-bs-ride="carousel">

								<div class="carousel-indicators">
									<button type="button" data-bs-target="#dayCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#dayCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#dayCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>

								<div class="carousel-inner rounded rounded-pill">
									<div class="carousel-item active">
										<img src="./images/d1.jpg" class="d-block w-100" alt="Day Partition Model">
									</div>
									<div class="carousel-item">
										<img src="./images/d2.jpg" class="d-block w-100" alt="Day Partition Model">
									</div>
									<div class="carousel-item">
										<img src="./images/d3.jpg" class="d-block w-100" alt="Day Partition Model">
									</div>
								</div>

								<button class="carousel-control-prev" type="button" data-bs-target="#dayCar" data-bs-slide="prev">
									<span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>

								<button class="carousel-control-next" type="button" data-bs-target="#dayCar" data-bs-slide="next">
									<span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>

							</div>
						</div>
					</div>

					<!-- Day-Product Text -->
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-5 pt-5">
						<div class="item-text ml-5 product dproduct">
							<h3>Day-Product</h3>
							<p class="font-weight-bold font-italic">
								This product uses an acrylic glass which is strong and agile. It has a crystal clear view and is easy to install on your vehicle. It's preferable to use at day time. It's stylish and overall classy look makes it perfect to use for all types of vehicles.
							</p>
							<button id="d" class="col-xl-4 btn btn-sm btn-success text-center" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>2500.00 ETB </i></button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Hybrid Product -->
		<div class="hybrid-product section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Hybrid-Product Carousel -->
						<div class="hybrid-product-image">
							<div id="hybridCar" class="carousel slide" data-bs-ride="carousel" >
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#hybridCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#hybridCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#hybridCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>

								<div class="carousel-inner rounded rounded-pill">
									<div class="carousel-item active">
										<img src="./images/h1.jpg" class="d-block w-100 h-50" alt="...">
									</div>
									<div class="carousel-item">
										<img src="./images/h2.jpg" class="d-block w-100 h-50" alt="...">
									</div>
									<div class="carousel-item">
										<img src="./images/h3.jpg" class="d-block w-100 h-50" alt="...">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#hybridCar" data-bs-slide="prev">
									<span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#hybridCar" data-bs-slide="next">
									<span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
					</div>

					<!-- Hybrid-Product Text -->
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-5 pt-5">
						<div class="item-text ml-5 product hproduct">
							<h3>Hybrid-Product</h3>
							<p class="font-weight-bold font-italic">
								This product uses both a metal as well as an acrylic glass for the material. This is a good balance between security and style. The hybrid can be used for day time as well as night time. It is both strong as well as classy thus maintaining the conformity of your vehicle while increasing it's protection.
							</p>
							<button id="h" class="col-xl-4 btn btn-sm btn-success text-center" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>3200.00 ETB </i></button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Night-Product -->
		<div class="night-product section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Night-Product Carousel -->
						<div class="night-product-image">
							<div id="nightCar" class="carousel slide" data-bs-ride="carousel" >
								<div class="carousel-indicators">
									<button type="button" data-bs-target="#nightCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
									<button type="button" data-bs-target="#nightCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
									<button type="button" data-bs-target="#nightCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
								</div>

								<div class="carousel-inner rounded rounded-pill">
									<div class="carousel-item active">
										<img src="./images/n1.jpg" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="./images/n2.jpg" class="d-block w-100" alt="...">
									</div>
									<div class="carousel-item">
										<img src="./images/n3.jpg" class="d-block w-100" alt="...">
									</div>
								</div>
								<button class="carousel-control-prev" type="button" data-bs-target="#nightCar" data-bs-slide="prev">
									<span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Previous</span>
								</button>
								<button class="carousel-control-next" type="button" data-bs-target="#nightCar" data-bs-slide="next">
									<span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
									<span class="visually-hidden">Next</span>
								</button>
							</div>
						</div>
					</div>


					<!-- Night-Product Text -->
					<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 mt-5 pt-5">
						<div class="item-text ml-5 product nproduct">
							<h3>Night-Product</h3>
							<p class="font-weight-bold font-italic">
								This product uses a metal for it's material. This is the most strongest partition and can withstand any kind of force laid upon it. It has secure fastening system which can not be undone by the passenger. This is recommended for drivers who work at night time.
							</p>
							<button id="n" class="col-xl-4 btn btn-sm btn-success justify-content-end" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>3900.00 ETB </i></button>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<!-- Contact Us -->
	<div id="contact">
		<div class="contact-area section-padding">
			<div class="container">
				<div class="row pt-5">
					<div class="col-lg-3 col-md-12">
						<div class="single-contact">
							<div class="ico-area">
								<i class="fas fa-phone fa-4x"></i>
							</div>
							<h2>Phone Number</h2>
							<p>0913085993</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="single-contact">
							<div class="ico-area">
								<i class="fas fa-paper-plane fa-4x"></i>
							</div>
							<h2>Telegram Address</h2>
							<p>@safedrivepartitions</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="single-contact">
							<div class="ico-area">
								<i class="fab fa-facebook-f fa-4x"></i>
							</div>
							<h2>Facebook</h2>
							<p>SafeDrivePartitions@facebook.com</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-12">
						<div class="single-contact">
							<div class="ico-area">
								<i class="fas fa-envelope fa-4x"></i>
							</div>
							<h2>Email</h2>
							<p>SafeDrivePartitions@gmail.com</p>
						</div>
					</div>
				</div>
				<br> <br> <br>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-xs-6 mt-5">
						<div class="single-contact location">
							<div class="ico-area">
								<i class="fas fa-map-marker-alt fa-4x"></i>
							</div>
							<h2>Location</h2>
						</div>
						<div class="map col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<iframe src="https://www.google.com/maps/embed?pb=!1m24!1m8!1m3!1d7880.140203997113!2d38.7407101565918!3d9.057370468721324!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x164b88cb4c05a263%3A0xf044bc50cbe3ae0d!2sAddisu%20Gebeya!3m2!1d9.0589815!2d38.7365597!4m5!1s0x164b8f134c20dc29%3A0x1dd9c89e4cde8549!2zTUFSS09TIFBMQyBIUSB8IEFkZGlzdSBHZWJleWF8IHwg4Yib4Yit4YmG4Yi1IOGImOGMi-GLmOGKlSB8IOGKoOGLsuGIsSDhjIjhiaDhi6sgVW5uYW1lZCBSb2FkIEFkZGlzIEFiYWJh!3m2!1d9.0636215!2d38.7436284!5e0!3m2!1sen!2set!4v1632852290686!5m2!1sen!2set" width="105%" height="500" allowfullscreen="" loading="auto">
							</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Log In Modal -->
	<div class="modal fade" id="loginModal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header mx-auto">
					<h5 class="modal-title ms-3">Sign In</h5>
					<button type="button" class="btn btn-close btn-close-white position-absolute end-0 me-4" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form name="login" method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
						<h5 class="mt-5">Fill in this form to login to your account!</h5>
						<br> <br>

							<p id="loginError" class="alert alert-danger mx-auto" style="display: none;"></p>
							<br>
							<p id="cerr" class="alert alert-danger mx-auto" style="display: none;"></p>

							<div class="form-group mx-auto modal-select">
								<b><i class="far fa-user-circle fa-2x select-icon"></i></b>
								<select class="select-area text-center" id="company_name" name="company_name" size="1" required>
									<option value="" disabled selected hidden>Company Name </option>
									<option value="feres" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="feres"){?>selected<?php } ?>>Feres </option>
									<option value="hellotaxi" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="hellotaxi"){?>selected<?php } ?>>Hello Taxi </option>
									<option value="ride" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="ride"){?>selected<?php } ?>>Ride </option>
									<optionvalue="taxiye" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="taxiye"){?>selected<?php } ?>>Taxiye </option>
									<option value="zay-ride" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="zay-ride"){?>selected<?php } ?>>Zay-Ride </option>
									<option value="admin" <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']=="admin"){?>selected<?php } ?>>Admin </option>
								</select>
							</div>

							<br> <br>

							<p id="perr" class="alert alert-danger mx-auto" style="display: none;"></p>

							<div class="form-group mx-auto modal-select">
								<div class="input-group">
									<div>
										<i class="fill-icon fas fa-unlock-alt fa-2x pe-1 ms-3"></i>
										<input id="password" name="password" type="password" placeholder="Password" class="fill-area mainLoginInput col-4 ms-4 me-2" required>
										<i class="fill-icon far fa-eye-slash form-control-feedback ps-3" id="togglePassword" style="cursor: pointer;"></i>
									</div>
								</div>
							</div>
							<br> <br>

							<div class="modal-buttons">
								<button id="spinner" type="button" class="btn btn-primary d-none" disabled>
									<i style="font-size: 17px;" class="fas fa-spinner fa-spin fa-fw"></i>
									Logging In...
								</button>

								<button id="loginBtn" type="button" class="btn btn-primary" name="login">Login</button>
								<br> <br>
								<button type="button" class="btn text-primary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password </button>
							</div>
					</form>
					<br>
				</div>
			</div>
		</div>
	</div>

	<!-- Order Modal -->
	<div class="modal fade bd-editprofile-modal-lg" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content col-7" style="background-color: rgba(255, 255, 255, .15); backdrop-filter: blur(4px); width: 100%; margin-top: 3em; margin-left: auto;">
				<div class="modal-header">
					<h5 class="modal-title" style="margin-left: 10.5em;" id="exampleModalLabel">Order</h5>
					<button type="button" class="btn-close btn-close-white me-3" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body text-white">

					<form method="POST" name="placeOrder" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">

						<h5 class="hint-text text-center">Fill in this form to order our product</h3>
							<br>
						<div id="fnerr" class="alert alert-danger text-center" role="alert" style="display: none;">
						</div>

						<div class="form-group col-7 mx-auto">
							<label for="fname" class="form-label">First Name </label>
							<input id="firstName" type="text" class="form-control" name="firstName" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];} ?>">
						</div>
						<br>

						<div id="lnerr" class="alert alert-danger text-center" role="alert" style="display: none;">
						</div>

						<div class="form-group col-7 mx-auto">
							<label for="lname" class="form-label">Last Name </label>
							<input id="lastName" type="text" class="form-control" name="lastName" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['lname'];} ?>">
						</div>
						<br>

						<div id="company_error" class="alert alert-danger col-7 mx-auto" role="alert" style="display: none;">
						</div>

						<div class="col-7 mx-auto">
							<label for="companyName" class="form-label">Company Name</label>
							<select class="form-select" name="companyName" id="companyName" size="1" >
								<option value="">Select one</option>
								<option value="feres">Feres </option>
								<option value="hellotaxi">Hello Taxi </option>
								<option value="ride">Ride </option>
								<option value="taxiye">Taxiye </option>
								<option value="zay-ride">Zay-Ride </option>
							</select>
						</div>
						<br>

						<div id="model_error" class="alert alert-danger col-7 mx-auto" role="alert" style="display: none;">
						</div>

						<div class="col-7 mx-auto">
							<label for="carModel" class="form-label">Car Model</label>
							<select class="form-select" name="carModel" id="carModel" size="1" onchange="model();">
								<option value="">Select one</option>
								<option value="corolla">Corolla </option>
								<option value="vitz">Vitz </option>
								<option value="vitz Compact">Vitz Compact </option>
								<option value="yaris">Yaris </option>
								<option value="other">Others... </option>
							</select>
						</div>
						<br>

						<div class="form-group col-7 mx-auto">
							<input class="form-control" name="otherModel" id="otherModel" type="text" placeholder="Car Model" style="display: none;">
						</div>
						<br>

						<div class="form-control col-7 mx-auto" hidden>
							<select name="productType" id="productType" size="1" class="form-select">
								<label for="productType" class="form-label">Product Type</label>
								<option value="">Select one</option>
								<option value="day">Day Time </option>
								<option value="hybrid">Hybrid </option>
								<option value="night">Night Time </option>
							</select>
						</div>

						<div id="phone_error" class="alert alert-danger col-7 mx-auto" role="alert" style="display: none;">
						</div>

						<div class="form-group col-7 mx-auto">
							<label for="phoneNumber" class="form-label">Mobile Number </label>
							<input id="phoneNumber" name="phoneNumber" type="number" class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom" title="i.e. 0912345678" required>
						</div>
						<br>

						<div class="text-center">
							<button type="button" id="placeOrder" class="btn btn-success btn-block mx-auto" style="font-family: 'AudioWide', cursive;" name="placeOrder" onclick="orderNow();">Order </button>
						</div>
						<br>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Forgot Modal -->
	<div class="modal fade" id="forgotModal" tabindex="-1">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header mx-auto">
					<h5 class="modal-title">Password Reset</h5>
					<button type="button" class="btn btn-close position-absolute end-0 me-4" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form id="resetForm" name="forgot" method="POST" action="sender.php">

						<p id="message" class="alert alert-danger mx-auto d-none"></p>

						<div class="form-group col-6 mx-auto">
							<label class="form-label" for="email">Email Address </label>
							<input class="form-control" name="mail" id="mail" type="email">
							<br>
						</div>

						<div class="modal-buttons mx-auto">
							<button id="sub2" class="btn btn-success mx-auto" type="button" style="display: none;" disabled>
								<span class="fas fa-spinner fa-spin fa-fw" role="status" aria-hidden="true"></span>
								Processing...
							</button>

							<button id="sub" name="token" type="button" class="btn btn-success" onclick="validate(this.form);">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Password reset pending Modal -->
	<div class="modal fade bd-editprofile-modal-lg mt-5" id="resetPendingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content modal-cont" >
				<div class="modal-header mx-auto">
					<h5 class="modal-title mx-auto" id="exampleModalLabel">Password Reset</h5>
				</div>
				<a type="button" class="btn-close position-absolute end-0 mt-4 me-4" data-bs-dismiss="modal" aria-label="Close" href="home.php"></a>

				<div class="modal-body">
					<h4 style="font-family: 'AudioWide', cursive; float: left;">Dear <span id="co"></span>. </h4>
					<br>
					<h5 class="pb-4">We have sent a reset link to the email <b> "<span id="resetEmail"> </span>"</b>. </h5>
					<br>
					<h5 class="pb-4">Please login into your email account and click on the link we sent to reset your password.</h5>
					<h5 class="text-center">Thank You!</h5>
				</div>
			</div>
		</div>
	</div>

	<!-- New Password M0dal -->
	<div class="modal fade mt-5" id="newPassword" tabindex="-1">
		<div class="modal-dialog modal-md">
			<div class="modal-content bg-dark">
				<div class="modal-header mx-auto" style="border: none;">
					<p class="text-success mt-3 mx-auto" style="font-size: 16px; border-bottom: solid 2px grey; padding-bottom: 10px;">Password Reset approved. </p>
					<button type="button" class="btn btn-close btn-close-white position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body">
					<form name="fchange" method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

						<p class="text-center mx-auto" style="font-size: 16px;">Please fill out the form below. </p>

						<div id="presuc1" class="alert alert-success mx-auto col-7" style="display: none;">
							<p id="presuc"></p>
						</div>
						<br>

						<div id="nperr1" class="alert alert-danger mx-auto col-7" style="display: none;">
							<p id="nperr"></p>
						</div>

						<div class="form-group col-6 mx-auto">
							<label for = "fPassword1" class="form-label">New Password</label>
							<input name="fPassword1" id="fPassword1" type="password" class="form-control text-center">
							<i class="far fa-eye-slash" id="tp1" style="margin-right: 1em; color: black; float: right; margin-top: -23px; cursor: pointer;"></i>
						</div>
						<br> <br>

						<div id="ncperr1" class="alert alert-danger mx-auto col-7" style="display: none;">
							<p id="ncperr"></p>
						</div>

						<div class="form-group col-6 mx-auto">
							<label for = "fPassword2" class="form-label">Confirm Password</label>
							<input name="fPassword2" id="fPassword2" type="password" class="form-control text-center">
							<i class="far fa-eye-slash" id="tp2" style="color: black; float: right; cursor: pointer; margin-right: 1em; margin-top: -23px;"></i>

						</div>
						<br>
						<br>

						<div class="container mx-auto" style="font-family: 'AudioWide', cursive;">
							<button id="spinner2" type="button" class="btn btn-success d-none" disabled>
								<i style="font-size: 17px;" class="fas fa-spinner fa-spin fa-fw"></i>
								Processing...
							</button>

							<button id="fchange" class="btn btn-success" type="button" id="fchange" name="fchange"> Confirm </button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer-area">								
		<!-- <div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-2 col-xs-2"></div>
				<div class="col-md-4 col-sm-2 col-xs-2 pt-5">
					All rights reserved &nbsp <i class="far fa-registered"></i> Safe Drive Partitions 
				</div>
				<div class="col-md-4 col-sm-2 col-xs-2"> 
					Web Developed by:  <img src="images/Mem0Real.png" alt="Mem0Real"> 
				</div>
			</div>
		</div> -->
		<div class="flex-container">
			<div style="margin-left: 27em; margin-top: 3.3em; margin-right: 8em;">
				All rights reserved &nbsp <i class="far fa-registered"></i> Safe Drive Partitions 
			</div>

			<div>
				Web Developed by:  <img src="images/Mem0Real.png" alt="Mem0Real"> 
			</div>
			
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jQuery.js"></script>
	<script src="cook.js"> </script>
	<script src="homeScripts.js"></script>
	<script src="wow.js"></script>
	<script>new WOW().init();</script>
	<script src="jquery.waypoints.min.js"></script>
  	<script src="scroll.js"></script>
	<script src="anime.min.js"></script>
  	<script src="animateme.js"></script>

	<!-- Show Reset Password Pending MOdal -->
	<?php
		if(isset($_GET['pending']))
		{
			?>
				<script>
					showPendingModal();
				</script>
			<?php
		}
	?>

	<!-- Show New Password Modal for reset -->
	<?php
		if(isset($_GET['token']))
		{
			unset($_SESSION['pending']);
			$token = $_GET['token'];
			$company = $_COOKIE['company'];

			$_SESSION['token'] = $token;
			$_SESSION['user'] = $company;
			$_SESSION['rSuccess'] = "Password Reset Successful.";
			?>
				<script>newPasswordModal();</script>

			<?php
		}
	?>

	<!-- Make sure User is authorized to access a page -->
	<?php
		if(isset($_SESSION['logerr']))
		{
			?>
				<script>
					authorization();
				</script>
			<?php
		}
		unset($_SESSION['logerr']);

	?>

</body>
</html>
