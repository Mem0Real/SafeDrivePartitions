<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
                  
    $user = $_SESSION['user'];
    if($user!="taxiye")
    {
        header('location: home.php');
        $_SESSION['logerr'] = "Please log in to continue.";
        $_SESSION['cname'] = "taxiye";    
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taxiye</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
    

    <link rel="stylesheet" href="company-custom.css" type="text/css">
    <link rel="stylesheet" href="modals.css" type="text/css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
	<link href="snackbar.css" rel="stylesheet">
    <style>
        /* Responsive Table */
        .responsive{
            width: 110%;
            overflow-x: none;
            overflow-y: hidden;      
            border-radius: 5em;
        }
        .move
        {
            margin-left: -10%;
        }
    </style>

</head>
<body>

	<!-- NavBar -->
	<div class="nav-area fixed-top">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light w-100">
			  <div class="container-fluid">
                <a href="#"><img src="./images/taxiyelogo.png" width="110px" height="50px"></a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon">
			      </span>
			    </button>
			    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			      <ul class="navbar-nav">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="home.php">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="home.php#about">About</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="home.php#howitworks">How it works</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="home.php#portifolio">Portifolio</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="home.php#contact">Contact Us</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="home.php#order">Order</a>
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
							</li>
							<?php
						}   
					?>

                    <div class="nav-item">
                        <div class="dropdown">
                            <i id="viewNewBtn" class="far fa-bell btn rounded-circle dropbtn mb-2" style="font-size: 20px; background-color: rgb(80, 7, 92); color: white;"></i>
                            <span id="countIcon" class="badge rounded-circle"></span> 
                            
                            <div id="myDropdown" class="dropdown-content mt-3" onclick="event.stopPropagation()">
                            </div>
                        </div>                       
                    </div>
   
					<li class="nav-item" style="cursor: pointer;">
						<?php if(!isset($_SESSION['user'])&&!isset($_COOKIE['getin'])){?><a class="nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a><?php }
						else { ?><a class="btn btn-danger" href="logout.php">Logout</a><?php } ?>
					</li>
			      </ul>
			    </div>
			  </div>
			</nav>
		</div>
	</div>
        	
    <!-- Delivered Notification -->
    <?php include('delivery.php'); ?>  

    <!-- Taxiye Area -->
    <div class="slider-area4 bg-image">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-xs-12">
                    
                    <!-- Notifications -->
                    <div class="slider-message">
                        <div id="resetSuccessSnackbar">Password Updated Successfully.</div>
                        <div id="orderUpdateSnackbar"> Data Updated Successfully.</div>
                        <div id="orderApprovedSnackbar"> Order Approved!</div>
                        <div id="orderDeniedSnackbar"> Order Denied!</div>
						<div id="orderErrorSnackbar"> Error: Data Not Updated!</div>
                    </div>

                    <!-- Welcome Message -->
                    <div class="slider-text">
						<h1>Welcome Taxiye Rep.</h1>
						<h2>What would you like to do?</h2>
						<p>	
                            <a id="viewBtn" onclick="viewOrders();" style="background-color: rgb(80, 7, 92);">View Orders </a>
                            <a id="changeBtn" data-bs-toggle="modal" data-bs-target="#changeModal" style="background-color: rgb(80, 7, 92);">Change Password </a>
                            <a id="historyBtn" onclick="showHistory();" style="background-color: rgb(80, 7, 92);">Show History </a>
						</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- Show Clear History Confirmation Modal -->
    <div class="modal fade" id="confirmClear" tabindex="-1" style="z-index: 1062; margin-top: -6em;">
        <div class="modal-dialog modal-md">
            <div class="modal-content modal-cont">
                <div class="modal-header bg-secondary">
                    <h5> Clear History </h5>
                    <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>				
                </div>	
                
                <div class="modal-body bg-dark" style="font-size: 10px;">
                    <h6>Are You Sure You Want To Clear Your History?</h6>
                    <br><br>
                    <button class="btn btn-success" onclick="clearHistory();" data-bs-dismiss="modal">Confirm</button>
                    <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View History Modal -->
    <div class="modal fade" id="historyModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background: transparent; backdrop-filter: blur(3px);">
                <div class="modal-header mx-auto" style="background: transparent; border-left: 3px solid #fff; border-right: 3px solid #fff; border-bottom: none; border-radius: 15px;">
                    <h3 class="text-center pe-5 ps-5"> Delivered Products </h3>
                    <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1;"></button>				
                </div>	 
                <div class="move">
                    <div class="modal-body bg-dark responsive pt-5" style="border-top: 1.5px solid rgb(80, 7, 92); border-bottom: 3px solid rgb(80, 7, 92);">
                        <div id="historytbl"></div>
                    </div>
                </div>            
                <button id="clr" class="btn btn-dark btn-md mx-auto mt-2" onclick="$('#confirmClear').modal('show');">Clear History</button>
            </div>
        </div>
    </div>
 
    <!-- View Orders Modal -->
    <div class="modal fade" id="viewModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content" style="background: transparent; backdrop-filter: blur(3px);">
                <div class="modal-header mx-auto" style="background: transparent; border-left: 3px solid #fff; border-right: 3px solid #fff; border-bottom: none; border-radius: 15px;">
                    <h3 class="text-center pe-5 ps-5"> Order List </h3>
                    <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" style="z-index: 1;"></button>				
                </div>	      
                <div class="move">
                    <div class="modal-body bg-dark responsive pt-5" style="border-top: 1.5px solid rgb(80, 7, 92); border-bottom: 3px solid rgb(80, 7, 92);">
                        <p id="tblplace"></p>
                    </div>
                </div>       
            </div>
        </div>
    </div>

    <!-- Change password Modal -->
    <div class="modal fade" id="changeModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content pt-3" style="background: transparent; backdrop-filter: blur(3px); border-bottom: 0.5px solid rgb(80, 7, 92);">
                <div class="modal-header mx-auto" style="background: transparent; border-left: 3px solid rgb(80, 7, 92); border-right: 3px solid rgb(80, 7, 92); border-bottom: none; border-radius: 15px;">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn btn-close btn-close-white ms-4" data-bs-dismiss="modal" aria-label="Close"></button>				
                </div>	

                <div class="modal-body">
                    <form name="change" method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        
                        <div id="info1" class="alert alert-info mx-auto" style="display: none;">		
                            <p id="infoer"></p>
                        </div>
                        <br>

                        <div id="olderr1" class="alert alert-danger mx-auto" style="display: none;">		
                            <p id="olderr"></p>
                        </div>
                        <br>

                        <div class="form-group col-6 mx-auto">
                            <label for = "password1" class="form-label">Current Password</label>
                            <div class="input-group">
                                <div>
                                    <input class="form-control" name="password1" id="password1" type="password">
                                    <i class="far fa-eye-slash" id="togglePassword1" style="margin-right: 1em; color: black; float: right; margin-top: -27px; cursor: pointer;"></i>
                                </div>
                            </div>
                        </div> 
                        <br> <br>

                        <div id="newerr1" class="alert alert-danger mx-auto" style="display: none;">		
                            <p id="newerr"></p>
                        </div>
                        
                        <div class="form-group col-6 mx-auto">
                            <label for = "password2" class="form-label">New Password</label>
                            <div class="input-group">
                                <div>
                                    <input class="form-control" name="password2" id="password2" type="password" >
                                    <i class="far fa-eye-slash" id="togglePassword2" style="margin-right: 1em; color: black; float: right; margin-top: -27px; cursor: pointer;"></i>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        
                        <div class="modal-buttons mx-auto">
                            <button id="spinner" type="button" class="btn btn-success d-none" disabled>
                                <i style="font-size: 17px;" class="fas fa-spinner fa-spin fa-fw"></i>
                                Processing...
                            </button>
                            <button id="chang" class="btn btn-success" type="button" id="change" name="change" onclick="changer();"> Confirm </button>
                            <button id="cance" class="btn btn-danger" type="button" data-bs-dismiss="modal"> Cancel </button>
						</div>
                    </form>
                </div>
            </div>
        </div>
    </div>

	<!-- Footer -->
	<div class="footer-area">								
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-2 col-xs-2"></div>
				<div class="col-md-4 col-sm-2 col-xs-2 pt-5">
					All rights reserved &nbsp <i class="far fa-registered"></i> Safe Drive Partitions 
				</div>
				<div class="col-md-4 col-sm-2 col-xs-2"> 
					Web Developed by:  <img src="images/Mem0Real.png" alt="Mem0Real"> 
				</div>
			</div>
		</div>
	</div>

    <script src="jQuery.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
    <script src="cook.js"> </script>
    <script src="companyScripts.js"> </script>
    
    <!-- Send company nameFunction -->  
    <script>
        var user = <?php echo json_encode("$user", JSON_HEX_TAG); ?> ;
        companyName(user);
    </script>

    <!-- Reset Success Toast -->
    <?php
        if(isset($_SESSION['rSuccess']))
        {
            ?>
            <script>
                resetSuccessful();
            </script>
            <?php
                unset($_SESSION['rSuccess']);
        }
    ?>  
    

</body>
</html>