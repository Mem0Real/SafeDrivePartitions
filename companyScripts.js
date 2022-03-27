
    // Get User Name
        var user;

        function companyName(company){
            user = company;
        }
        
    // Shortcut to Restore hidden history
        $(document).ready(function (){
            $('body').on('keydown', function(e)
            {
                if(e.keyCode === 113 && e.shiftKey === true){
                    restoreHistory();
                    console.log("press");
                }

            });
        });

    // Clear History 
        function clearHistory()
        {
            $.ajax({
                url: 'clearHistory.php',
                method: 'POST',
                data: {user:user},
                success: function(data)
                {
                    showHistory();
                }
            })
        }   
    
    // Restore History
            function restoreHistory()
            {
                $.ajax({
                    url: 'restore.php',
                    method: 'POST',
                    dataType: 'json',
                    data:{user:user},
                    success: function(data)
                    {
                        if(data.status=="success")
                        {
                                var r = document.getElementById("orderUpdateSnackbar");
                                r.innerHTML = "History restored successfully!";
                                r.className = "show";
                                setTimeout(function(){ r.className = r.className.replace("show", ""); }, 3000); 
                                
                                var isShown = $('#historyModal').hasClass('show');
                                if(isShown)
                                {
                                    showHistory();
                                }
                        }
                        else
                        {
                            alert("Whatchu tryna do?");   
                        }
                    }
                })
            }

    // Show History
        function showHistory()
        {
            $.ajax({
                url: 'history.php',
                method: 'post',
                data: {user:user},
                success: function(data)
                {
                    $('#historyModal').modal('show');
                    $('#historytbl').html(data);
                    voided();
                }
            });
        }

        function voided()
        {
            $.ajax({
                url: 'empty.php',
                method: 'POST',
                dataType: 'json', 
                data: {user:user},
                success: function(data)
                {
                    if(data.stat === "empty")
                    {
                        $('#clr').hide();
                    }
                    else
                    {
                        $('#clr').show();
                    }
                }
            });
        }

        // Hide Clear History Button If Empty
            let id = null;

            $('#historyModal').on('shown.bs.modal', function (){
    
                id = setInterval(voided, 4000);                    
            });

            $('#historyModal').on('hide.bs.modal', function (){
                clearInterval(id);
            })

    // Data Updated Notification
        function showYeah()
        {
            var a = document.getElementById("orderUpdateSnackbar");
            a.className = "show";
            setTimeout(function(){ a.className = a.className.replace("show", ""); }, 3000); 
        }

    // Reset Success Snackbar
        function resetSuccessful()
        {
            var x = document.getElementById("resetSuccessSnackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2700); 
        }
    
    // Company Added Snackbar
        function companyAdded()
        {
            $(document).ready(function (){
                        
                var x = document.getElementById("companyAddSuccess");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                
            });
        }

    // Ajax call to update notification
        function notification() 
        {
            $.ajax({
                url: 'counter.php',
                method: 'POST',
                dataType: 'json',
                success: function(data)
                {
                    if(data.count!=0)
                    {
                        $('#countIcon').html(data.count);
                    }
                    else
                    {
                        $('#countIcon').html("");
                    }
                }
            });
        }

        setInterval(notification, 3000);

    // View New Orders for companies
        $('#viewNewBtn').on('click', function ()
        {
            $(document).ready(function viewNew(){
                if(user=="admin")
                {
                    var newOrder="yes";
                    $.ajax({
                        url: "newApprovals.php",
                        method: "POST",
                        dataType: "html",
                        data:
                        {
                            user:user,  
                            newOrder:newOrder                    
                        },
                        success: function(data)
                        {
                            $("#myDropdown").html(data);        
                        }   
                    });
                }
                else
                {
                    $.ajax({
                        url: "newOrders.php",
                        method: "POST",
                        dataType: "html",
                        data:
                        {
                            user:user,                      
                        },
                        success: function(data)
                        {
                            $("#myDropdown").html(data);    
                        }   
                    });
                }
            });
        });

    // Show Reason Prompt
        function why_deny(idee)
        {
            id = idee;
            $("#why_deny").removeClass('d-none');
            $("#why_deny").addClass('d-block');
        }

    // Send Reason to DB
        function send_reason(reason_form)
        {
            console.log(id);
            var reason = document.getElementById('reason').value;

            $.ajax({
                url:"reason_update.php",
                method:"POST",
                data:{id:id, reason:reason},
                success:function(data){
                    // Erase Reason Prompt Text-area
                    $('#reason').val('');

                    $("#why_deny").addClass('d-none');
                    $("#why_deny").removeClass('d-block');

                    // Pop up reason sent success message
                    var a = document.getElementById("reasonSentSnackbar");
                    a.className = "show";
                    setTimeout(function(){ a.className = a.className.replace("show", ""); }, 3000);

                }
            });
        }
    // View All Orders
        function viewOrders(){
            $.ajax({
                url: "process.php",
                method: "POST",
                data:
                {
                    user:user
                },
                success: function(data)
                {
                    $('#viewModal').modal('show');
                    $('#nviewModal').modal('hide');
                    $("#tblplace").html(data);            
                }   
            });
        }

        // Show Password     
            $(document).ready(function ()
            {
                const togglePassword1 = document.getElementById('togglePassword1'); 
                const togglePassword2 = document.getElementById('togglePassword2');
                
                const password1 = document.getElementById('password1');        
                const password2 = document.getElementById('password2');

                if(user == "admin")
                {
                    const togglePassword = document.getElementById('togglePassword');
                    const password = document.getElementById('password');
                    
                    togglePassword.addEventListener('click', function () 
                    {
                    // toggle the type attribute
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        var input_group = $(this).closest('.input-group');
                        var icon = input_group.find('i');
                        icon.toggleClass('fa-eye-slash fa-eye');
            
                    });
            
                }     
            
                togglePassword1.addEventListener('click', function () 
                {
                    // toggle the type attribute
                    const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
                    password1.setAttribute('type', type);
                    var input_group1 = $(this).closest('.input-group');
                    var icon1 = input_group1.find('i');
                    icon1.toggleClass('fa-eye-slash fa-eye');

                });

                togglePassword2.addEventListener('click', function () 
                {
                    // toggle the type attribute
                    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
                    password2.setAttribute('type', type);
                    var input_group2 = $(this).closest('.input-group')
                    var icon2 = input_group2.find('i')
                    icon2.toggleClass('fa-eye-slash fa-eye')

                });
            });

    // Validate Password Change
        function changer ()
        {
            var oldPassword = document.getElementById('password1');
            var newPassword = document.getElementById('password2');
            var op = document.getElementById('password1').value;
            var np = document.getElementById('password2').value;
            var olderr = document.getElementById('olderr');
            var newerr = document.getElementById('newerr');

            if(oldPassword.value=="")
            {
                olderr1.style.display = "block";
                olderr.innerHTML = "Please type in your current password!";
                oldPassword.style.borderColor = "red";
                return false;
            }

            else
            {
                olderr1.style.display = "none";
                oldPassword.style.borderColor = "green";
            }
            
            if(newPassword.value=="")
            {
                newerr1.style.display = "block";
                newerr.innerHTML = "Please type in a new password!";
                newPassword.style.borderColor = "red";
                return false;
            }

            else if(newPassword.value.length<8)
            {
                newerr1.style.display = "block";
                newerr.innerHTML = "Password must be minimum of 8 characters.";
                newPassword.style.borderColor = "red";
                return false;
            }

            else
            {
                newerr1.style.display = "none";
                newPassword.style.borderColor = "green";

                go(op, np);
            }
    
        }

        // Ajax call to change password
            function go(op, np){

                $('#spinner').removeClass("d-none");
                $('#chang').hide();
                $('#cance').hide();

                var oldPassword = op;
                var newPassword = np;
                
                $.ajax({
                    url: 'change.php',
                    method:'POST',
                    data:
                    {
                        oldPassword:oldPassword,
                        newPassword:newPassword,
                    },

                    success: function(data){                        
                        
                        var data = $.parseJSON(data);

                        if(data.status =='success')
                        {
                            $('#spinner').addClass("d-none");
                            $('#spinner').hide();
                            $('#cance').show();
                            $('#changeModal').modal('hide');

                            var x = document.getElementById("resetSuccessSnackbar");
                            x.className = "show";
                            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                            
                        }      
                        
                        else if(data.status =='error')
                        {
                            $('#spinner').addClass("d-none");
                            $('#chang').show();
                            $('#cance').show();
                            document.getElementById("olderr1").style.display="block";
                            document.getElementById("olderr").innerHTML = 'Incorrect Password!';
                            document.getElementById('password1').style.borderColor = "red";
                        }
                    }
                });  

            }

    // Show Add Modal if there is an error
        function showAddModal()
        {
            $(document).ready(function (){
                $('#addModal').modal('show');
            });
        }

    // Dropdown button hide when clicked outside
        // Show/hide popover
        $(".dropdown").click(function myFunction(){
            $(this).find("#myDropdown").slideToggle("fast");
        });

        $(document).on("click", function(event){
            var $trigger = $(".dropdown");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                if(!$("#orderDeniedSnackbar").hasClass("show"))
                {
                    $("#myDropdown").slideUp("fast");
                }
            }
        });

    // Close Navbar collapse when clicked outside
        $(document).click(function (event) {
            var clickover = $(event.target);
            var $navbar = $(".navbar-collapse");               
            var _opened = $navbar.hasClass("show");
            if (_opened === true && !clickover.hasClass("navbar-toggler")) {      
                if(!clickover.hasClass("dropbtn"))
                {
                    $navbar.collapse('hide');
                }
            }
        });
