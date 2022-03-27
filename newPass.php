<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    if(isset($_COOKIE['getin']))
    {
        echo "get in";
    }

    if(isset($_SESSION['user']))
    {
        echo "logged in";
    }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Safe Drive Partitions</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" rel="stylesheet">
	<link href="custom.css" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">

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
			      	<i class="fa fa-bars"></i>
			      </span>
			    </button>
			    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
			      <ul class="navbar-nav">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="#">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#about">About</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#howitworks">How it works</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#portifolio">Portifolio</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#contact">Contact Us</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#order">Order</a>
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
	

        <!-- New Password M0dal -->
            <div class=" modal fade bd-editprofile-modal-lg mx-auto ms-4 mt-0" id="newPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" style="width: 90%;">
                <div class="modal-dialog" role="document">
                    <div class="modal-content text-dark" style="border: none; border-radius: 5em 5em 5em 5em; background-color: rgba(255, 255, 255, .6); backdrop-filter: blur(4px); width: 35em; margin-top: 12em; font-size: 15px;">
                        <div class="modal-header rounded rounded-4" style="border: none;">
                            <p class="text-center text-success mt-3" style="font-size: 16px; margin-left: 3em;">Your request for password reset have been approved. </p>
                            <button type="button" class="btn btn-close btn-close-dark me-4" data-bs-dismiss="modal" aria-label="Close" style="z-index: 10;"></button>				
                        </div>	
                        
                        <div class="modal-body">
                            <form name="fchange" method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

                            <p class="text-center mx-auto" style="font-size: 16px; margin-left: 3em; border-bottom: solid 2px grey; padding-bottom: 10px;">Please fill out the form below. </p>

                                <div id="fsuc1" class="alert alert-success mx-auto" style="width: 60%; height: 20%; display: none;">		
                                    <p id="fsuc"></p>
                                </div>
                                <br>
                                
                                <div id="fnerr1" class="alert alert-danger mx-auto" style="width: 60%; height: 20%; display: none;">		
                                    <p id="fnerr"></p>
                                </div>
                                
                                <div class="form-group col-6 mx-auto">
                                    <label for = "fpassword1" class="form-label">New Password</label>
                                    <input name="fpassword1" id="fPassword1" type="password" class="form-control">
                                    <i class="far fa-eye" id="tp1" style="margin-right: 1em; color: black; float: right; margin-top: -23px; cursor: pointer;"></i>
                                </div>
                                <br> <br>
                                
                                <div id="fcerr1" class="alert alert-danger mx-auto" style="width: 60%; height: 20%; display: none;">		
                                    <p id="fcerr"></p>
                                </div>

                                <div class="form-group col-6 mx-auto">
                                    <label for = "fpassword2" class="form-label">Confirm Password</label>
                                    <input name="fpassword2" id="fPassword2" type="password" class="form-control">
                                    <i class="far fa-eye" id="tp2" style="margin-right: 1em; color: black; float: right; margin-top: -23px; cursor: pointer;"></i>
                                </div>
                                <br>
                                <br>
                                
                                <button id="fchange"  class="btn btn-success" type="button" id="fchange" name="fchange" style="margin-left:11em;"> Confirm </button>
                                <button id="fcancel"  class="btn btn-danger" type="cancel" style="margin-left:4em;"> Cancel </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
         
        <!-- Recieve Token From email -->
            <?php
                $token = $_GET['token'];
                $company = $_COOKIE['company'];

                $_SESSION['token'] = $token;
                $_SESSION['user'] = $company;
                $_SESSION['rSuccess'] = "Password Reset Successful.";

            ?>
            
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" ></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="jQuery.js"></script>
        <script src="bootstrapToggle/js/bootstrap4-toggle.min.js"></script>   
        <script src="cook.js"> </script>
        <script src="wow.min.js"></script>
        <script>
            new WOW().init();
        </script>
        <script src="cook.js" type="text/javascript"></script>

        <!-- Validate lost password change -->
            <script>
                $(document).ready(function (){
                    $('#newPassword').modal('show');
                })

                document.getElementById("fchange").addEventListener("click", function (){
                    
                    var fNewPassword = document.getElementById("fPassword1");
                    var fConfirmPassword = document.getElementById("fPassword2");
                    var password = document.getElementById('fPassword1').value;
                    var fnerr1 = document.getElementById("fnerr1");
                    var fnerr = document.getElementById("fnerr");
                    var fcerr1 = document.getElementById("fcerr1");
                    var fcerr = document.getElementById("fcerr");
                    var fchange = document.getElementById("fchange");
                    var company = getCookie("company");

                    if(fNewPassword.value=="")
                    {
                        fNewPassword.style.borderColor = "red";
                        fnerr1.style.display = "block";
                        fnerr.innerHTML = "Please type in a new password";
                        return false;
                    }

                    else if(fNewPassword.value.length<8)
                    {
                        fNewPassword.style.borderColor = "red";
                        fnerr1.style.display = "block";
                        fnerr.innerHTML = "Your password must be 8 or more characters.";
                        return false;
                    }

                    else
                    {
                        fNewPassword.style.borderColor = "green";
                        fnerr1.style.display = "none";
                    }

                    if(fConfirmPassword.value=="")
                    {
                        fConfirmPassword.style.borderColor = "red";
                        fcerr1.style.display = "block";
                        fcerr.innerHTML = "Please confirm your password";
                        return false;
                    }

                    else if(fConfirmPassword.value!=fNewPassword.value)
                    {
                        fNewPassword.style.borderColor = "red";
                        fConfirmPassword.style.borderColor = "red";
                        fnerr1.style.display = "block";
                        fcerr1.style.display = "none";
                        fnerr.innerHTML = "Passwords do not match.";
                        return false;
                    }
                    else
                    {
                        fNewPassword.style.borderColor = "green";
                        fConfirmPassword.style.borderColor = "green";
                        fnerr1.style.display = "none";
                        fcerr1.style.display = "none";

                        $.ajax ({
                        url: "reset.php",
                        method: "POST",
                        data:
                        {
                            password:password,
                            company:company
                        },
                        dataType: "json",
                        success: function(data)
                        {
                            if(data.status === 'error')
                            {
                                alert('error');
                            }

                            else
                            {
                                setCookie("mail", "", "-1");
                                switch(company)
                                {
                                    case "feres":
                                        setCookie("company", "", "-1");
                                        window.location.replace('feres.php');
                                    break; 
                                 
                                    case "hellotaxi":
                                        setCookie("company", "", "-1");
                                        window.location.replace('hellotaxi.php');
                                    break; 
                                 
                                    case "ride":
                                        setCookie("company", "", "-1");
                                        window.location.replace('ride.php');
                                    break; 
                                  
                                    case "taxiye":
                                        setCookie("company", "", "-1");
                                        window.location.replace('taxiye.php');
                                    break; 
                                   
                                    case "zay-ride":
                                        setCookie("company", "", "-1");
                                        window.location.replace('zay-ride.php');
                                    break;

                                    case "admin":
                                        setCookie("company", "", "-1");
                                        window.location.replace('admin.php');
                                    break; 
                                    
                                }
                            }
                        }
                    });
                    }
                
                });

                
            </script>

        <!-- Show password -->
            <script>
                
                const tp1 = document.getElementById('tp1');
                const tp2 = document.getElementById('tp2');

                const p1 = document.getElementById('fPassword1');
                const p2 = document.getElementById('fPassword2');

                tp1.addEventListener('click', function () 
                {
                // toggle the type attribute
                    const type1 = p1.getAttribute('type') === 'password' ? 'text' : 'password';
                    p1.setAttribute('type', type1);

                });

                tp2.addEventListener('click', function () 
                {
                // toggle the type attribute
                    const type2 = p2.getAttribute('type') === 'password' ? 'text' : 'password';
                    p2.setAttribute('type', type2);

                });

                
            </script>  
    </body>
</html>
    