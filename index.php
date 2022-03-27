<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');
    
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=1366, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css">
        <link rel="stylesheet" href="style.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="owlcarousel0/owl.theme.default.css">
        <style>
            body, html {
                height: 100%;
                width: 100%;
                margin: 0;
                }

                .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4 {
                position: relative;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;

                }
                .bgimg-1 {
                background-image: url("images/bod8.jpg");
                min-height: 60em;
                }

                .bgimg-2 {
                background-image: url("images/bod5.jpg");
                min-height: 100%;
                }

                .bgimg-3 {
                background-image: url("images/pt.png");
                min-height: 600px;
                }

                .bgimg-4 {
                background-image: url("images/p2.png");
                min-height: 700px;
                }
                /* Turn off parallax scrolling for tablets and phones */
                @media only screen and (max-device-width: 1024px) 
                {
                    .bgimg-1, .bgimg-2, .bgimg-3, .bgimg-4 
                    {
                        background-attachment: scroll;
                    }
                }

        </style>
    </head>
    
    <body>

    <div class="bgimg-1">

        <!-- Navigation Bar -->
        <div class="nav-area fixed-top">
            <div class="container">

                <nav class="navbar fixed-top navbar-expand-lg w-100 navbar-light bg-info">
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">    
                        <a class="navbar-brand" href="home.php">Safe Drive Partitions</a>
                    
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item active me-auto">
                                <a class="nav-link" aria-current="page" href="home.php">Home</a>
                            </li>

                            <li class="nav-item me-auto">
                                <a class="nav-link" href="#">Installation</a>
                            </li>

                            <li class="nav-item me-auto">
                                <a class="nav-link" href="#">Portifolio</a>
                            </li>

                            <li class="nav-item me-auto">
                                <a class="nav-link" href="#">Contact Us</a>
                            </li>

                            <?php 
                            if(isset($_SESSION['user']))
                            {
                                ?>
                                <li class="nav-item me-auto">
                                    <?php if($_SESSION['user']=='feres') { ?> <a class="nav-link" href="feres.php">Feres Page</a> <?php } ?>
                                    <?php if($_SESSION['user']=='hellotaxi') { ?> <a class="nav-link" href="hellotaxi.php">Hello Taxi Page</a> <?php } ?>
                                    <?php if($_SESSION['user']=='ride') { ?> <a class="nav-link" href="ride.php">Ride Page</a> <?php } ?>
                                    <?php if($_SESSION['user']=='taxiye') { ?> <a class="nav-link" href="taxiye.php">Taxiye Page</a> <?php } ?>
                                    <?php if($_SESSION['user']=='zay-ride') { ?> <a class="nav-link" href="zay-ride.php">ZayRide Page</a> <?php } ?>
                                </li>
                                <?php
                            }   
                            ?>


                        </ul> 
                        
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item ms-auto mt-2">
                                <?php if(!isset($_SESSION['user'])&&!isset($_COOKIE['getin'])){?><button class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button><?php }
                                else { ?><a class="btn btn-danger" href="logout.php">Logout</a><?php } ?>
                            </li>
                        </ul>

                    </div>        
                </nav>      
            </div>
        </div>

        <br> <br>
        <h1 class="text-center text-white mt-5" style="margin-bottom: -2em; margin-top: 4em;"> Safe Drive Partitions </h2>
        
        <?php include('server.php'); ?>

        <!-- Success Toast -->
            <div aria-live="assertive" aria-atomic="true" style="margin-bottom: -10em; position: relative; min-height: 200px;">
                <div id="sstoast" class="toast" style="position: absolute; top: 0; right: 0; margin-top: -3em;">
                    <div class="toast-header bg-success">
                        <strong class="mr-auto" style="color: white;">Success</strong>
                        <small style="margin-left: 16em; color: white;">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" style="z-index: 5;">
                        </button>
                    </div>
                    <div class="toast-body bg-dark" style="color: white;">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                </div>
            </div>
        
        <!-- Order Success Toast -->
            <div aria-live="assertive" aria-atomic="true" style="margin-bottom: -10em; position: relative; min-height: 200px;">
                <div id="stoast" class="toast" style="position: absolute; top: 0; right: 0; margin-top: -3em;">
                    <div class="toast-header bg-success">
                        <strong class="mr-auto" style="color: white;">Success</strong>
                        <small style="margin-left: 16em; color: white;">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" style="z-index: 5;">
                        </button>
                    </div>
                    <div class="toast-body bg-dark" style="color: white;">
                        <?php echo $_SESSION['order_success']; ?>
                    </div>
                </div>
            </div>

        <!-- Order Error Toast -->
            <div aria-live="assertive" aria-atomic="true" style="margin-bottom: -10em; position: relative; min-height: 200px;">
                <div id="etoast" class="toast" style="position: absolute; top: 0; right: 0; margin-top: -9em;">
                    <div class="toast-header bg-danger">
                        <strong class="mr-auto" style="color: white;">Error</strong>
                        <small style="margin-left: 16em; color: white;">just now</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close" style="z-index: 5;">
                        </button>
                    </div>
                    <div class="toast-body bg-dark" style="color: white;">
                        <?php echo $_SESSION['order_error']; ?>
                    </div>
                </div>
            </div>
    
        <!-- Log In Modal -->
            <div class=" modal fade bd-editprofile-modal-lg mx-auto ms-4 mt-0" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" style="width: 90%;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="color: white; border: none; border-radius: 5em 5em 5em 5em; background-color: rgba(255, 255, 255, .15); backdrop-filter: blur(4px); width: 35em; margin-top: 12em; margin-left: auto; font-size: 12px;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="margin-left: 7.5em;" id="exampleModalLabel">Sign In</h5>
                            <button type="button" class="btn btn-close btn-close-white me-4" data-bs-dismiss="modal" aria-label="Close"></button>				
                        </div>	
                        
                        <div class="modal-body">

                            <form name="login" method="POST" action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>'>
                                <h6 class="text-center">Fill in this form to login to your account!</h6>
                                <br>

                                <?php if(isset($_SESSION['logerr'])){ ?> 
                                <div class="alert alert-danger mx-auto" style="width: 60%; height: 20%; ">		
                                    <p> <?php echo $_SESSION['logerr'];?> </p>
                                </div>
                                <?php } ?>
                                <br>

                                <?php if(isset($_SESSION['err'])){ ?> 
                                <div class="alert alert-danger mx-auto" style="width: 60%; height: 20%; ">		
                                    <p> <?php echo $_SESSION['err'];?> </p>
                                </div>
                                <?php } ?>
                                <br>

                                <?php if(isset($_SESSION['success'])){ ?> 
                                <div class="alert alert-success mx-auto" style="width: 70%; height: 20%; ">		
                                    <p> <?php echo $_SESSION['success']; ?> </p>
                                </div>
                                <?php } ?>

                                <div class="form-group col-7 mx-auto">
                                    <label for="cname" class="form-label">Company Name </label>
                                    <select class="form-select" id="cname" name="company_name" size="1" required>
                                        <option value="">Select one </option>
                                        <option value="feres" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="feres"){?>selected<?php } ?>>Feres </option>
                                        <option value="hellotaxi" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="hellotaxi"){?>selected<?php } ?>>Hello Taxi </option>
                                        <option value="ride" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="ride"){?>selected<?php } ?>>Ride </option>
                                        <option value="taxiye" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="taxiye"){?>selected<?php } ?>>Taxiye </option>
                                        <option value="zay-ride" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="zay-ride"){?>selected<?php } ?>>Zay-Ride </option>
                                        <option value="admin" <?php if(isset($_SESSION['cname'])&&$_SESSION['cname']=="admin"){?>selected<?php } ?>>Admin </option>
                                    </select>

                                </div>
                                <br> <br>

                                <div class="form-group col-7 mx-auto">
                                    <label for = "password" class="form-label">Password</label>
                                    <input name="password" id="password" type="password" class="form-control" required>
                                    <i class="far fa-eye" id="togglePassword" style="margin-right: 1em; color: black; float: right; margin-top: -23px; cursor: pointer;"></i>
                                </div> 
                                <br> <br>                            
                            
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary btn-block" style="font-size: 12px;" value="Login" name="login">
                                </div>
                                <br>
                                
                            </form>
                            
                            <div class="form-group col-9" style="display: inline;">
                                <button class="btn btn-dark" style="margin-left: 16rem; margin-top: 2em; font-size: 10px;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotModal">Forgot Password </button>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
                
		<!-- Order Modal -->
            <div class="modal fade bd-editprofile-modal-lg" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content col-6" style="background-color: rgba(255, 255, 255, .15); backdrop-filter: blur(4px); width: 100%; margin-top: 3em; margin-left: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title" style="margin-left: 10.5em;" id="exampleModalLabel">Order</h5>	
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
                        </div>	
                        
                        <div class="modal-body text-white">

                            <form method="POST" name="placeOrder" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                            
                                <h5 class="hint-text text-center">Fill in this form to order our product</h3>
                                 <br>                                               
                                <div id="fnerr" class="alert alert-danger text-center" role="alert" style="display: none;">
                                </div>

                                <div class="form-group col-6 mx-auto">
                                    <label for="fname" class="form-label">First Name </label>
                                    <input id="firstName" type="text" class="form-control" name="firstName" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['fname'];} ?>">
                                </div>
                                <br> 
                                
                                <div id="lnerr" class="alert alert-danger text-center" role="alert" style="display: none;">
                                </div>

                                <div class="form-group col-6 mx-auto">
                                    <label for="lname" class="form-label">Last Name </label>
                                    <input id="lastName" type="text" class="form-control" name="lastName" value="<?php if(isset($_SESSION['fname'])){echo $_SESSION['lname'];} ?>">
                                </div>
                                <br>
                                
                                <div id="company_error" class="alert alert-danger col-7 mx-auto" role="alert" style="display: none;">		
                                </div>

                                <div class="col-6 mx-auto">
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

                                <div class="col-6 mx-auto">
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

                                <div class="form-group col-6 mx-auto">
                                    <input class="form-control" name="otherModel" id="otherModel" type="text" placeholder="Car Model" style="display: none;">
                                </div>
                                <br>
                                        
                                <div class="form-control col-6 mx-auto" hidden>
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

                                <div class="form-group col-6 mx-auto">
                                    <label for="phoneNumber" class="form-label">Mobile Number </label>
                                    <input id="phoneNumber" name="phoneNumber" type="number" class="form-control" data-bs-toggle="tooltip" data-bs-placement="bottom" title="i.e. 0912345678" required>
                                </div>
                                <br> 

                                <div class="text-center">
                                    <button type="button" id="placeOrder" class="btn btn-primary btn-block mx-auto" style="font-size: 13px;" name="placeOrder" onclick="orderNow();">Order </button>
                                </div>
                                <br>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>  

		<!-- Forgot Modal -->
            <div class="modal fade bd-editprofile-modal-lg" id="forgotModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content col-6" style="background-color: rgba(255, 255, 255, .15); backdrop-filter: blur(4px); width: 100%; margin-top: 6em; margin-left: auto;">
                        <div class="modal-header">
                            <h5 class="modal-title mx-auto" id="exampleModalLabel">Forgot Password</h5>	
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>		
                        </div>	
                        
                        <div class="modal-body">
                            <form id="resetForm" name="forgot" method="POST" action="sender.php">
                                <div class="col-7 mx-auto">
                                    <p id="message"></p>
                                    <label class="form-label" for="email">Email Address </label>
                                    <input class="form-control" name="mail" id="mail" type="email">
                                    <br>
                                    
                                    <button id="sub" name="token" type="button" class="btn btn-success" style="margin-left: 6em;" onclick="validate(this.form);">Submit</button> 
                                    
                                    <button id="sub2" class="btn btn-success" type="button" style="margin-left: 4em; display: none;" disabled>
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        Submitting...
                                    </button>
                                
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Carousels -->
            <div class="li2">
                
                <!-- Day model -->
                    <div id="dayCar" class="carousel slide pb-5 rounded rounded-circle" data-bs-ride="carousel" style="border: 10px outset rgba(255, 255, 255, .55); width: 18em; display: inline-block;">
                        
                        <div class="carousel-header">
                            <h5 class="text-center text-dark  rounded rounded-5 pt-2 pb-2 col-4 mx-auto" style="margin-bottom: 1px;"> Day Time Product </h4>
                        </div>

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#dayCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#dayCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#dayCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        
                    
                        
                        <div class="carousel-inner rounded rounded-circle">
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
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        
                        <button class="carousel-control-next" type="button" data-bs-target="#dayCar" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button> 
                        
                    </div>

                <!-- Hybrid model -->
                    <div id="hybridCar" class="carousel slide pb-5" data-bs-ride="carousel" style="border: 10px inset rgba(51, 44, 44, 0.527); border-right: 10px inset rgba(51, 44, 44, 0.9); border-left: 10px inset rgba(190, 190, 192, 0.5); border-radius: 2em; width: 20em; display: inline-block;">
                        
                        
                        <div class="carousel-header">
                            <h5 class="text-center text-dark bg-secondary rounded rounded-5 pt-2 pb-2 col-4 mx-auto" style="margin-bottom: 1px;"> Hybrid Product </h4>
                        </div>

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#hybridCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#hybridCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#hybridCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <div class="carousel-inner">
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
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#hybridCar" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                <!-- Night model -->
                    <div id="nightCar" class="carousel slide carousel-fade pb-5 rounded rounded-circle" data-bs-ride="carousel" style="border: 10px inset rgba(138, 50, 10, 0.445);  width: 32em;display: inline-block;">
                        
                        <div class="carousel-header">
                            <h5 class="text-center text-dark  rounded rounded-5 pt-2 pb-2 col-5 mx-auto" style="margin-bottom: 1px;"> Night Time Product </h4>
                        </div>

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#nightCar" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#nightCar" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#nightCar" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        
                        <div class="carousel-inner rounded rounded-circle">
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
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#nightCar" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
            
        <div class="li2 position-justify">
            <!-- Buttons -->
                <button id="d" class="btn btn-success bg-light text-dark" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>2500.00 ETB </i></button>
                <button id="h" class="btn btn-success bg-primary" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>3200.00 ETB </i></button>
                <button id="n" class="btn btn-success bg-dark" type="button" onclick="orderthis(this.id);"> <strong> Order Now </strong> <br> <i>3900.00 ETB </i></button>
        </div>

    </div>

    <div class="col-7 mx-auto" style="color: #555; background-color:white; text-align:center; padding:50px 80px; text-align: justify;">
        <h3 style="text-align:center;">Safe Drive Partitions</h3>
        <br>
        <p style="font-size: 18px;">Our company aims to provide a reliable and secure barrier between drivers and passengers. Our partitions create a shield that can successfully prevent unwanted contact and protects from COVID-19 Virus.</p>
        <p style = "font-size: 18px;"> The partitions come in three forms. <br> 
            <ol>
                <li> <strong>The day time</strong>, which uses a polymer glass and easy to assemble. </li>  
                <li> <strong> The Night time</strong>, which uses metal to protect from mugging, and </li> 
                <li> <strong> The hybrid</strong>, which is a mix of the two. </li> 
            </ol>
        <br>
            <ul>
                <li> No more risks of getting robbed while driving at night. </li> 
                <li> No more sharing contaminated air ways. </li>
            </ul>
                <h4 class="text-center bold">Use our one of a kind partition and protect yourself!  </h4>
        </p>
    </div>

    <div class="bgimg-4">
        <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
    </div>

    <!-- Slick Carousel -->
    <div class="bgimg mt-5 mt-5">
        <h3 class="position-absolute start-50 me-5 btn btn-primary" style="cursor: auto">Take a look at some of our work. </h3>
        <div class="mx-auto bg-secondary">
            <div class="owl-carousel owl-theme rounded rounded-5" style="border: inset 55px rgb(0,0,0,0)">
                <img src="images/h1.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Hybrid Partition Model"> 
                <img src="images/h2.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Hybrid Partition Model"> 
                <img src="images/h3.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Hybrid Partition Model"> 
                <img src="images/n1.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Night Partition Model"> 
                <img src="images/n2.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Night Partition Model"> 
                <img src="images/n3.jpg" class="d-block w-100" style="border: inset 7px rgb(0,0,0,0.5); border-radius: 4em 4em 4em 4em;" alt="Night Partition Model"> 
            </div>
        </div>
        <br> <br> <br> <br>
    </div>
    
    
    <div class="bgimg-3">

        <!-- Installation -->
            <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> 
    </div>
    
    
    
    <!-- Include External js files -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrapToggle/js/bootstrap4-toggle.min.js"></script>   
        <script src="cook.js"> </script>
        <script src="owl/jquery.min.js"></script>
        <script src="owlcarousel/dist/owl.carousel.min.js"></script>

        <script>
            $(document).ready(function(){
              $(".owl-carousel").owlCarousel();
            });
        </script>
        
    <!-- Forgot Password Modal Validate -->
        <script>
            function validate(e){

                var mail = document.getElementById("mail").value;
                var btn = document.getElementById("sub");
                var spin = document.getElementById("sub2");

                if(mail == "")
                {
                    document.getElementById("mail").style.borderColor = "red";
                    document.getElementById("message").innerHTML = "Please enter your company's email address.";
                    document.getElementById("message").style.color = "red";
                    document.getElementById("mail").focus();
                    return false;
                }

                else
                {
                    $.ajax({
                        url:"forgot.php",
                        method:"POST",
                        data:{mail:mail},
                        dataType: 'json', 
                        success:function(data)
                        {                      

                            if(data.status == 'error')
                            {
                                $("#forgotModal").modal('show');
                                document.getElementById("mail").style.borderColor = "red";
                                document.getElementById("message").style.color = "red";
                                document.getElementById("message").innerHTML = "No account related to that email!";                      
                            }

                            else
                            {
                                document.getElementById("mail").style.borderColor = "green";
                                document.getElementById("message").style.display = "none";
                                setCookie("company", data.comp, "15");
                                setCookie("mail", data.em, "15");
                                spin.style.display = "block";
                                btn.style.display = "none";
                                e.submit();
                            }
                        }
                    });
                    return false;
                }
                
            }
        </script>

    <!-- Success Message call -->
        <script>
            function success(){ 
                var seen = sessionStorage.getItem("seen");
                if(seen!="yes")
                {
                    $(document).ready(function (){
                        $('#sstoast').toast('show');                    
                    });
                }

                $('#sstoast').on('shown.bs.toast', function () { 
                    sessionStorage.setItem("seen", "yes");
                });
            }
        </script>	

    <!-- Order Success Message call -->
        <script>
            var u = sessionStorage.getItem("go");
            var l = sessionStorage.getItem("in");

            if(u=="yup")
            {
                var oseen = sessionStorage.getItem("oseen");
                if(oseen!="yes")
                {
                    $(document).ready(function (){
                        $('#stoast').toast('show');                    
                    });
                }

                $('#stoast').on('hidden.bs.toast', function () { 
                    sessionStorage.setItem("oseen", "yes");
                });
            }

            else if(u=="no")
            {
                var eseen = sessionStorage.getItem("eseen");
                if(eseen!="yes")
                {
                    $(document).ready(function (){
                        $('#etoast').toast('show');                    
                    });
                }

                $('#etoast').on('shown.bs.toast', function () { 
                    sessionStorage.setItem("eseen", "yes");
                });   
            }

            if(l=="k")
            {
                var seen = sessionStorage.getItem("seen");
                if(seen!="yes")
                {
                    $(document).ready(function (){
                        $('#stoast').toast('show');                    
                    });
                }

                $('#stoast').on('shown.bs.toast', function () { 
                    sessionStorage.setItem("seen", "yes");
                });
            }
            sessionStorage.clear();
        </script>

    <!-- Order Error Message call -->
        <script>
            function oderr(){ 
                var eseen = sessionStorage.getItem("eseen");
                if(eseen!="yes")
                {
                    $(document).ready(function (){
                        $('#etoast').toast('show');                    
                    });
                }

                $('#etoast').on('shown.bs.toast', function () { 
                    sessionStorage.setItem("eseen", "yes");
                });
            }
        </script>			

    <!-- Remove session afterwards -->
        <script> 
            var x = sessionStorage.getItem("seen");
            var y = sessionStorage.getItem("oseen");
            var z = sessionStorage.getItem("eseen");

            if(x=="yes"||y=="yes"||z=="yes")
            {
                sessionStorage.clear();
            }
        </script>

    <!-- Show password -->
        <script>
            
            const togglePassword = document.getElementById('togglePassword');

            const password = document.getElementById('password');

            togglePassword.addEventListener('click', function () 
            {
            // toggle the type attribute
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');

            });

            
        </script>    

    <!-- Validate order -->
        <script>

            function orderthis(id)
            {

                $('#orderModal').modal('show');
                var pType = document.getElementById("productType");
                var model = id;

                if(model==="d")
                {
                    pType.value = "day";
                    pType.style.display = "none";
                    
                }
                else if(model==="h")
                {
                    pType.value = "hybrid";
                    pType.style.display = "none";
                }
                else if(model==="n")
                {
                    pType.value = "night";
                    pType.style.display = "none"
                }
            }
            
            function orderNow()
            {                    
                var fName = document.getElementById("firstName");
                var lName = document.getElementById("lastName");
                var cName = document.getElementById("companyName");
                var cModel = document.getElementById("carModel");
                var oModel = document.getElementById("otherModel");
                var pType = document.getElementById("productType");
                var pNumber = document.getElementById("phoneNumber");
                var order = document.getElementById("placeOrder");
                
                var no = pNumber.value.substr(0, 2);          

                var letters = /^[A-Za-z]+$/;
                var matchFirst = fName.value.match(letters);
                var matchLast = lName.value.match(letters);

                var cError = document.getElementById("company_error");
                var mError = document.getElementById("model_error");
                var pError = document.getElementById("phone_error");
                var fNameErr = document.getElementById("fnerr");
                var lNameErr = document.getElementById("lnerr");

                //Check if first name is empty
                if (fName.value == "")
                {
                    fName.placeholder = "Please enter your first name.";
                    fName.style.borderColor = "red";
                    fName.focus();
                    return false;
                }

                else if(!matchFirst)
                {
                    fNameErr.style.display = "block";
                    fNameErr.innerHTML = "Please enter a valid first name.";
                    fName.style.borderColor = "red";
                    fName.focus();
                    return false;
                }

                else
                {
                    fNameErr.style.display = "none";
                    fName.style.borderColor = "green";
                }

                //Check if last name is empty
                if (lName.value == "")
                {
                    lName.placeholder = "Please enter your last name.";
                    lName.style.borderColor = "red";
                    lName.focus();
                    return false;
                }

                else if(!matchLast)
                {
                    lNameErr.style.display = "block";
                    lNameErr.innerHTML = "Please enter a valid last name.";
                    lName.style.borderColor = "red";
                    lName.focus();
                    return false;
                }

                else
                {
                    lNameErr.style.display = "none";
                    lName.style.borderColor = "green";
                }

                //Check if company name is empty
                if (cName.value == "")
                {
                    cError.style.display = "block";
                    cError.innerHTML = "Please select your company!";
                    cName.style.borderColor = "red";
                    cName.focus();
                    return false;
                }
                
                else
                {                
                    cError.style.display = "none";
                    cName.style.borderColor = "green";
                }

                if(cModel.value == "")
                {
                    mError.style.display = "block";
                    mError.innerHTML = "Please select your car model!"
                    cModel.style.borderColor = "red";
                    cModel.focus();
                    return false;
                }

                else if (cModel.value == "other")
                {
                    mError.style.display = "none";
                    cModel.style.borderColor = "green";

                    if(oModel.value == "")
                    {
                        oModel.placeholder = "Please type in your car model";
                        oModel.style.borderColor = "red";
                        oModel.focus();
                        return false;
                    }
                    else
                    {
                        oModel.style.borderColor = "green";
                    }
                }

                else
                {
                    mError.style.display = "none";
                    cModel.style.borderColor = "green";
                }

                //Check if car Model is empty
                if (pType.value == "")
                {
                    pType.placeholder = "Please enter your last name.";
                    pType.style.borderColor = "red";
                    pType.style.display = "block";
                    pType.focus();
                    return false;
                }

                //Check if car Model is empty
                if (pNumber.value == "")
                {
                    pNumber.placeholder = "Please enter your phone Number.";
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }
                else if((no)!="09")
                {
                    pError.style.display = "block";
                    pError.innerHTML = "Please type in a correct phone number! i.e. 0912345678"
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }

                else if(pNumber.value.length>10||pNumber.value.length<10)
                {
                    pError.style.display = "block";
                    pError.innerHTML = "Please type in your full phone number!"
                    pNumber.style.borderColor = "red";
                    pNumber.focus();
                    return false;
                }

                else
                {
                    pError.style.display = "none";
                    pNumber.style.borderColor = "green";
                    order.type = "submit";
                }
            
            }

            function model()
            {
                var cModel = document.getElementById("carModel");
                var oModel = document.getElementById("otherModel");

                if(cModel.value === "other")
                {
                    oModel.style.display = "block";
                }
                else
                {
                    oModel.style.display = "none";
                }
            }            
        </script>      
    
    <!-- Slick -->
        <script type="text/javascript" src="slick/slick.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.li').slick({
                    infinite: true,
                    autoplay: true,
                    autoplaySpeed: 2,
                    dots: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: 
                            {
                                slidesToShow: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: 
                            {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: 
                            {
                                slidesToShow: 1,
                            }
                        }
                        
                    ]
                });

                $('.li2').slick({
                    slidesToShow: 3,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: 
                            {
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: 
                            {
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: 
                            {
                                slidesToShow: 1,
                            }
                        }
                        
                    ]
                });
            });
        </script>

    <!-- Show Login Modal if there is an error -->
        <?php 
            if(isset($_SESSION['err']))
            {
                ?>  <script>
                        $(document).ready(function (){
                            $('#loginModal').modal('show');
                        });
                    </script> 
                <?php
            }

            if(isset($_SESSION['logerr']))
            {
                ?> <script>
                    $(document).ready(function (){
                            $('#loginModal').modal('show');
                        });
                    </script> 
                <?php
            }

            unset($_SESSION['err']);
            unset($_SESSION['logerr']);
            unset($_SESSION['success']);

        ?>


    </body> 
</html>