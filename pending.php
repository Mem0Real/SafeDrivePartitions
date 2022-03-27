<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Password Reset PHP</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css">
	<link rel="stylesheet" href="style.css" type="text/css">

	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="jQuery.js" type="text/javascript"></script>
</head>
<body>
	<iframe src=" home.php"></iframe>
                
        <!-- Password reset pending Modal -->
			<div class="modal fade bd-editprofile-modal-lg" id="resetPendingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content col-6" style="background-color: rgba(255, 255, 255, .15); backdrop-filter: blur(4px); width: 100%; margin-top: 3em; margin-left: auto;">
                        <div class="modal-header mx-auto">
                            <h5 class="modal-title mx-auto" id="exampleModalLabel">Password Reset</h5>	
                        </div>	
						<a type="button" class="btn-close position-absolute end-0 mt-3 me-3" data-bs-dismiss="modal" aria-label="Close" href="home.php"></a>		
                        
                        <div class="modal-body">
							<p>Dear <span id="co"></span>. </p>
							<p>We sent an email to  <b> <span id="resetEmail"> </span></b> to help you recover your account. </p>
							<p>Please login into your email account and click on the link we sent to reset your password</p>        
							<p class="text-center">Thank You! </p>
                        </div>
                    </div>
                </div>
            </div>  

            <script src="cook.js"> </script>

			<?php
				if(isset($_SESSION['pending']))
				{
					?>
					<script>
						$(document).ready(function ()
						{
							var rseen = sessionStorage.getItem("rseen");
							var rEmail = getCookie('mail');
							var rcom = getCookie('company');

							document.getElementById("resetEmail").innerHTML = rEmail;
							document.getElementById("co").innerHTML = rcom;
							setCookie('mail', '', '-1');
							$('#resetPendingModal').modal('show');                    
							
						});
					</script>	
					<?php
				}
			?>
				
</body>
</html>