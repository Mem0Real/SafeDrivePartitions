
    // Enter key login
        $('form[name="login"]').keypress(function(e){
            var code = e.keycode || e.which;
            if(code==13)
            {
                e.preventDefault();
                $('#loginBtn').click();
            }
        });

    // Validate login
        document.getElementById("loginBtn").addEventListener('click', function()
        {
            var company = document.getElementById("company_name");
            var password = document.getElementById("password");
            var login = document.getElementById("loginBtn");
            var cerr = document.getElementById("cerr");
            var perr = document.getElementById("perr");

            if(company.value=="")
            {
                cerr.style.display = "block";
                company.style.borderColor = "red";
                cerr.innerHTML = "Please Select Your Company!";
                company.focus();
                return false;
            }
            else
            {
                cerr.style.display = "none";
                company.style.borderColor = "white";
            }

            if(password.value=="")
            {
                perr.style.display = "block";
                document.getElementById("loginError").style.display = "none";
                perr.innerHTML = "Please Type in your Password.";
                password.style.borderColor = "red";
                password.focus();
                return false;
            }

            else
            {				
                perr.style.display = "none";
                check();
            }	
        });

        // Check if user exists
            function check()
            {
                document.getElementById("spinner").classList.remove("d-none");
                document.getElementById("loginBtn").classList.add("d-none");

                var company = document.getElementById("company_name").value;
                var password = document.getElementById("password").value;

                $.ajax({
                    url: "match.php",
                    method: "POST",
                    data:{
                        company:company,
                        password:password
                    },
                    dataType:'json', 
                    success:function(data)
                    {
                        if(data.status=="found")
                        {
                            // Redirect to appropriate page
                            switch(company)
                            {
                                case "feres":
                                    window.location = "feres.php";
                                break;
                                case "hellotaxi":
                                    window.location = "hellotaxi.php";
                                break;
                                case "ride":
                                    window.location = "ride.php";
                                break;
                                case "taxiye":
                                    window.location = "taxiye.php";
                                break;
                                case "zay-ride":
                                    window.location = "zay-ride.php";
                                break;
                                case "admin":
                                    window.location = "admin.php";
                                break; 
                            }
                        }
                        
                        else if(data.status == "nope")
                        {
                            document.getElementById("spinner").classList.add("d-none");
                            document.getElementById("loginBtn").classList.remove("d-none");

                            $('#loginModal').modal('show');
                            document.getElementById("loginError").style.display = "block";
                            document.getElementById("password").style.borderColor = "red";
                            document.getElementById("password").focus();
                            document.getElementById("loginError").innerHTML = "Wrong Password";
                        }
                    }
                });
            }

    // Password Reset
        // Forgot Password Modal Validate
            function validate(e){

                var mail = document.getElementById("mail").value;
                var btn = document.getElementById("sub");
                var spin = document.getElementById("sub2");

                if(mail == "")
                {
                    document.getElementById("mail").style.borderColor = "red";
                    $('#message').removeClass("d-none");
                    document.getElementById("message").innerHTML = "Please enter your company's email address.";
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

                            if(data.status === 'error')
                            {
                                $("#forgotModal").modal('show');
                                document.getElementById("mail").style.borderColor = "red";
                                $('#message').html("No account found with that email.");                      
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

        // Show reset pending modal
            function showPendingModal()
            {
                var rEmail = getCookie('mail');
                var rcom = getCookie('company');

                document.getElementById("resetEmail").innerHTML = rEmail;
                document.getElementById("co").innerHTML = rcom;

                var reset = sessionStorage.getItem("reset");

                if(reset!="yes")
                {
                    
                    $(document).ready(function (){
                        $('#resetPendingModal').modal('show');  

                        $('#resetPendingModal').on('hide.bs.modal', function () { 
                            window.location.replace("home.php");
                            sessionStorage.setItem("reset", "yes");
                        });                    
                    })
                }
                
                
            }

        // Show New Password Modal for reset
            function newPasswordModal()
            {
                $(document).ready(function ()
                {
                    setCookie('mail', '', '-1');
                    $('#resetPendingModal').modal('hide');                    
                    $('#newPassword').modal('show');
                });
            }

            // Validate lost password change
                document.getElementById("fchange").addEventListener("click", function (){
                            
                    var fNewPassword = document.getElementById("fPassword1");
                    var fConfirmPassword = document.getElementById("fPassword2");
                    var password = document.getElementById('fPassword1').value;
                    var fnerr1 = document.getElementById("nperr1");
                    var fnerr = document.getElementById("nperr");
                    var fcerr1 = document.getElementById("ncperr1");
                    var fcerr = document.getElementById("ncperr");
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

                        $('#spinner2').removeClass("d-none");
                        $('#fchange').hide();

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
                                    showUnknownError();
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

                        function showUnknownError()
                        {
                            $('#orderErrorSnackbar').html("Error: Could not Update Password.");
                            
                            var u = document.getElementById("#orderErrorSnackbar");
                            u.className = "show";
                            setTimeout(function(){ u.className = u.className.replace("show", ""); }, 3000); 
                            
                        }
                    }

                });


    // Show Password
        const togglePassword = document.getElementById('togglePassword');
        const tp1 = document.getElementById('tp1');
        const tp2 = document.getElementById('tp2');

        const password = document.getElementById('password');
        const p1 = document.getElementById('fPassword1');	
        const p2 = document.getElementById('fPassword2');

        togglePassword.addEventListener('click', function () 
        {
        // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            var input_group1 = $(this).closest('.input-group');
            var icon1 = input_group1.find('i');
            icon1.toggleClass('fa-eye-slash fa-eye');
        });

        tp1.addEventListener('click', function () 
        {
        // toggle the type attribute
            const type1 = p1.getAttribute('type') === 'password' ? 'text' : 'password';
            p1.setAttribute('type', type1);
            var input_group2 = $(this).closest('.form-group');
            var icon2 = input_group2.find('i');
            icon2.toggleClass('fa-eye-slash fa-eye');
        });

        tp2.addEventListener('click', function () 
        {
        // toggle the type attribute
            const type2 = p2.getAttribute('type') === 'password' ? 'text' : 'password';
            p2.setAttribute('type', type2);
            var input_group3 = $(this).closest('.form-group');
            var icon3 = input_group3.find('i');
            icon3.toggleClass('fa-eye-slash fa-eye');
        });

    // Validate & Process Order

        // Select Product Type
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

        // Validate Order
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
            var matchFirst = fName.value.trim().match(letters);
            var matchLast = lName.value.trim().match(letters);

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
            else if(no!="09"||pNumber.value.length>10)
            {
                pError.style.display = "block";
                pError.innerHTML = "Please type in a correct phone number! i.e. 0912345678"
                pNumber.style.borderColor = "red";
                pNumber.focus();
                return false;
            }

            else if(pNumber.value.length<10)
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

    // Order status notification call
    var u = sessionStorage.getItem("go");

    if(u=="yup")
    {
        var x = document.getElementById("orderSuccessSnackbar");
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000); 
    }

    else if(u=="no")
    {
        var y = document.getElementById("orderErrorSnackbar");
        y.className = "show";
        setTimeout(function(){ y.className = y.className.replace("show", ""); }, 3000); 
    }

    sessionStorage.clear();

    // Full screen image control
        var Modal = document.getElementById('portifolioModal');

        Modal.addEventListener('show.bs.modal', function (event) {
            var image = document.getElementById("img");
            var button = event.relatedTarget;
            var source = button.getAttribute('data-bs-whatever')
            image.src = source;
        })

    // Make sure user is authorized to access a page
        function authorization(){
            $(document).ready(function()
            {    
                $('#loginModal').modal('show');
                $('#loginError').show();
                $('#loginError').html("Please Log in to continue.");
                $('#password').css("borderColor", "red");
                $('#password').attr("placeholder", "");
                $('#password').focus();
            });
        }


    // Bounce Navigation item on hover
    $(".nav-item").on('mouseover', function (){
        $(this).addClass('wow animated heartBeat heartDelay');
    });

    $(".nav-item").on('mouseout', function (){
        $(this).removeClass('wow animated heartBeat heartDelay');
    });


    // Make Navigation Items active on scroll
    