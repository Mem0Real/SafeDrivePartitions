    <?php
        if(!isset($_SESSION))
        {
            session_start();
        }

        require("dbconfig.php");
        $compname = $_SESSION['user'];
    ?>
    
    <style>
        .switch-toggle {
            border-color: #242629;
        }
        .switch-toggle input {
            position: absolute;
            opacity: 0;
        }
        .switch-toggle input + label {
            padding: 7px;
            float:left;
            color: #fff;
            cursor: pointer;
        }
        .switch-toggle input:checked + label {
            background: rgb(40, 87, 128);
            background-clip: border-box;
            border-radius: 10px 10px 10px 10px;
            border: 2px solid white;
        }        
        .disabled input:checked + label {
            background-color: grey;
            background-clip: border-box;
            border-radius: 10px 10px 10px 10px;
            border-color: blue;
        }
        .search-table{
            table-layout: fixed; margin:20px auto 20px auto; 
        }
        .search-table, td, th{
            border-collapse:collapse; border:1px solid #777;
        }
        th{
            padding:10px 7px; font-size:15px;
        }
        td{
            padding:5px 10px; height:35px;
        }

        th, td{
            min-width: 140px; 
        }

        /* Popup container */
        .popup {
            position: absolute;
            cursor: pointer;
            
        }
        
        /* The actual popup (appears on top) */
        .popup .popuptext {
            visibility: hidden;
            width: 240px;
            background-color: #111;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 8px 0;
            position: absolute;
            z-index: 10;
            bottom: 110%;
            left: 50%;
            margin-left: -80px;
        }
        
        /* Popup arrow */
        .popup .popuptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }
        
        /* Toggle this class when clicking on the popup container (hide and show the popup) */
        .popup .show {
            visibility: visible;
            -webkit-animation: slide-in-elliptic-top-fwd 0.7s cubic-bezier(0.075, 0.820, 0.165, 1.000) both;
	        animation: slide-in-elliptic-top-fwd 0.7s cubic-bezier(0.075, 0.820, 0.165, 1.000) both;
        }

        .popup .hide {
            visibility: visible;
            -webkit-animation: fade-out-top 0.7s cubic-bezier(0.600, -0.280, 0.735, 0.045) both;
	        animation: fade-out-top 0.7s cubic-bezier(0.600, -0.280, 0.735, 0.045) both;
        }

        @-webkit-keyframes slide-in-elliptic-top-fwd {
            0% {
                -webkit-transform: translateY(-600px) rotateX(-30deg) scale(0);
                        transform: translateY(-600px) rotateX(-30deg) scale(0);
                -webkit-transform-origin: 50% 100%;
                        transform-origin: 50% 100%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) rotateX(0) scale(1);
                        transform: translateY(0) rotateX(0) scale(1);
                -webkit-transform-origin: 50% 1400px;
                        transform-origin: 50% 1400px;
                opacity: 1;
            }
        }
        @keyframes slide-in-elliptic-top-fwd {
            0% {
                -webkit-transform: translateY(-600px) rotateX(-30deg) scale(0);
                        transform: translateY(-600px) rotateX(-30deg) scale(0);
                -webkit-transform-origin: 50% 100%;
                        transform-origin: 50% 100%;
                opacity: 0;
            }
            100% {
                -webkit-transform: translateY(0) rotateX(0) scale(1);
                        transform: translateY(0) rotateX(0) scale(1);
                -webkit-transform-origin: 50% 1400px;
                        transform-origin: 50% 1400px;
                opacity: 1;
            }
        }
        @-webkit-keyframes fade-out-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                opacity: 1;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                opacity: 0;
                visibility: hidden;
                display: none;
            }
        }
        @keyframes fade-out-top {
            0% {
                -webkit-transform: translateY(0);
                        transform: translateY(0);
                opacity: 1;
            }
            100% {
                -webkit-transform: translateY(-50px);
                        transform: translateY(-50px);
                opacity: 0;
                visibility: hidden;
                display: none;
            }
        }
    </style>

    <script src="cook.js"></script>
    <?php
        // fetch query
        function fetch_data()
        {
            global $db;
            $userp = $_POST['user'];

            if(isset($_POST['newOrder']))
            {
                if($userp=="admin")
                {
                    $query="SELECT * from orders WHERE Approved = '1' AND status != '2' ORDER BY company_name ASC";
                }
                else
                {
                    $query="SELECT * from orders WHERE company_name = '$userp' AND status = '0' ORDER BY id ASC";
                }
            }

            else
            {
                if($userp=="admin")
                {
                    $query="SELECT * from orders WHERE Approved = '1' ORDER BY company_name ASC";
                }
                else
                {
                    $query="SELECT * from orders WHERE company_name = '$userp' ORDER BY id ASC";
                }
            }
            
            $exec=mysqli_query($db, $query);

            if(mysqli_num_rows($exec)>0)
            {
                if($userp=="admin")
                {
                    $query2=mysqli_query($db, "UPDATE orders SET status = '2' WHERE Approved = '1' AND status != '2'");
                }
                else
                {
                    $query2=mysqli_query($db, "UPDATE orders SET status = '1' WHERE company_name = '$userp'");
                }
                $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
                return $row;          
            }

            else
            {
                return $row=[];
            }
        }

        $fetchData= fetch_data();
        show_data($fetchData);

        // Show Fetched data
        function show_data($fetchData){ ?>

            <div class="search-table-outer">
                <table class="search-table">
                    <p id="just" class="pt-4 col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12 end-0 me-2" style="cursor: auto; display: none; margin-top: -4em;"></p>

                    <thead class="pt-3">
                        <tr>
                            <th class="px-4">No.</th>
                            <th class="px-4">First Name</th>
                            <th class="px-4">Last Name</th>
                            <th class="px-4">Company</th>
                            <th class="px-4">Car Mode</th>
                            <th class="px-4">Product Type</th>
                            <th class="px-4">Phone Number</th>
                            <?php
                                if(!isset($_POST['newOrder']))
                                {
                                    ?>
                                        <th>Approved</th>
                                        <th>Delivered</th>
                                    <?php
                                }
                            ?>
                            
                        </tr>
                    </thead>

                    <?php
                        if(count($fetchData)>0)
                        {
                            $sn=1;
                            
                            foreach($fetchData as $data)
                            { 
                                $compname = $_SESSION['user'];
                                $id = $data['id']; 
                                $ap = $data['approved'];
                                $del = $data['delivered'];
                                $co = $data['company_name'];
                                ?>  

                                <div id="rsn" class="popup end-50 top-50 position-fixed" style="margin-left: -50px; z-index: 1000;">
                                    <div class="popuptext" id="reason_popup<?php echo $id; ?>">
                                        <button class="btn-close btn-close-white" onclick="$('#rsn').hide()"></button>
                                        <label for="reason">Reason for denial: (optional)</label>
                                        <textarea class="form-control" id="reason<?php echo $id; ?>" rows="2"></textarea>
                                        <button id="btn_send_reason" class="btn btn-success" type="button" name="submit_reason" onclick="submit_reason(this)">Submit</button>
                                        <p class="ir d-none"><?php echo $id; ?></p>                           
                                    </div>
                                </div>

                                <div class="popup mt-auto start-50">
                                    <span class="popuptext bg-success" id="myPopup8">Delivery denial reason sent.</span>
                                </div>

                                <!-- Show Submit Button on keypress -->
                                <script>
                                    function show_butt()
                                    {
                                        document.getElementById('btn_send_reason'+id).classList.remove('d-none');
                                        $("#btn_send_reason"+id).removeClass('d-none');
                                    }
                                </script>


                                <tbody">
                                    <tr>
                                        <td class="px-2"><?php echo $sn; ?></td>
                                        <td class="px-2"><?php echo $data['first_name']?></td>
                                        <td class="px-2"><?php echo $data['last_name']?></td>
                                        <td class="px-2"><?php echo $data['company_name']?></td>
                                        <td class="px-2"><?php echo $data['car_model']?></td>
                                        <td class="px-2"><?php echo $data['product_type']?></td>
                                        <td><?php echo $data['phone_number']?></td>

                                        <?php 
                                            if(!isset($_POST['newOrder']))
                                            {
                                                ?>
                                                    <!-- Approved Button -->
                                                    <td id="atogglecover" class="text-center">

                                                        <div id="atoggler<?php echo $id; ?>" class="switch-toggle switch-3 switch-candy">
                                                            
                                                            <div class="popup">
                                                                <span class="popuptext" id="myPopup1">Admin Can Not Change the Approval Status.</span>
                                                            </div>

                                                            <div class="popup">
                                                                <span class="popuptext" id="myPopup3">Approval status already set.</span>
                                                            </div>

                                                            <input id="ad<?php echo $id; ?>" name="approved-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="ad"/>
                                                            <label for="ad<?php echo $id; ?>" style="font-size: 1px;"><i style="font-size: 23px;" class="pt-1 pb-1 far fa-times-circle text-danger"></i></label>    
                                                            
                                                            <input id="au<?php echo $id; ?>" name="approved-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="au"/>
                                                            <label for="au<?php echo $id; ?>" class="pt-2 mt-1 disabled">&nbsp; - &nbsp;</label>
                                                            
                                                            <input id="a<?php echo $id; ?>" name="approved-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="a"/>
                                                            <label for="a<?php echo $id; ?>" style="font-size: 1px;"><i style="font-size: 23px;" class="pt-1 pb-1 far fa-check-circle text-success"></i></label> 

                                                            <p class="ir" style="display: none;"> <?php echo $id; ?> </p>                           
                                                        
                                                        </div>                                            
                                                    </td>

                                                    <!-- Delivered Button -->
                                                    <td id="dtogglecover" class="text-center">
                                                        <div id="dtoggler<?php echo $id; ?>" class="switch-toggle switch-3 switch-candy">

                                                            <div class="popup">
                                                                <span class="popuptext" id="myPopup2">Companies Can not Change the Delivery Status.</span>
                                                            </div>

                                                            <div class="popup">
                                                                <span class="popuptext" id="myPopup4">Delivery status already set.</span>
                                                            </div>

                                                            <input id="dd<?php echo $id; ?>" name="delivered-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="dd"/>
                                                            <label for="dd<?php echo $id; ?>" style="font-size: 1px;"><i style="font-size: 23px;" class="pt-1 pb-1 far fa-times-circle text-danger"></i></label>    
                                                            
                                                            <input id="du<?php echo $id; ?>" name="delivered-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="du">
                                                            <label for="du<?php echo $id; ?>" class="pt-2 mt-1 disabled">&nbsp; - &nbsp;</label>
                                                            
                                                            <input id="d<?php echo $id; ?>" name="delivered-state<?php echo $id; ?>" type="radio" onclick="process(this);" value="d"/>
                                                            <label for="d<?php echo $id; ?>" style="font-size: 1px;"><i style="font-size: 23px;" class="pt-1 pb-1 far fa-check-circle text-success"></i></label> 
                                                            
                                                            <p class="ir" style="display: none;"> <?php echo $id; ?> </p>                           

                                                        </div>
                                                    </td>  
                                                <?php                                                             
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                                <?php 
                                    if(!isset($_POST['newOrder']))
                                    {
                                        ?>

                                            <!-- Read approval & delivery from db -->
                                            <script>    
                                                
                                                $(document).ready(function statusRead()
                                                {
                                                    var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
                                                    var appr = <?php echo json_encode("$ap", JSON_HEX_TAG); ?>;
                                                    var del = <?php echo json_encode("$del", JSON_HEX_TAG); ?>;
                                                    var company = <?php echo json_encode("$compname", JSON_HEX_TAG); ?>;

                                                    if(appr=="-1")
                                                    {
                                                        document.getElementById("ad"+id).checked = "true";
                                                    }

                                                    if(appr=="0")
                                                    {
                                                        document.getElementById("au"+id).checked = "true";
                                                    }

                                                    if(appr=="1")
                                                    {
                                                        document.getElementById("a"+id).checked = "true";
                                                        document.getElementById("ad"+id).disabled = "true";
                                                        document.getElementById("au"+id).disabled = "true";
                                                        document.getElementById("a"+id).disabled = "true";
                                                    }

                                                    if(del=="-1")
                                                    {
                                                        document.getElementById("dd"+id).checked = "true";
                                                        document.getElementById("dd"+id).setAttribute("checked", "checked");
                                                        document.getElementById("dd"+id).disabled = "true";
                                                        document.getElementById("du"+id).disabled = "true";
                                                        document.getElementById("d"+id).disabled = "true";
                                                    }

                                                    if(del=="0")
                                                    {
                                                        document.getElementById("du"+id).checked = "true";
                                                        document.getElementById("du"+id).setAttribute("checked", "checked");
                                                    }

                                                    if(del=="1")
                                                    {
                                                        document.getElementById("d"+id).checked = "true";
                                                        document.getElementById("d"+id).setAttribute("checked", "checked");
                                                        document.getElementById("dd"+id).disabled = "true";
                                                        document.getElementById("du"+id).disabled = "true";
                                                        document.getElementById("d"+id).disabled = "true";
                                                    }

                                                    if(company == "admin")
                                                    {
                                                        document.getElementById("ad"+id).disabled="true";
                                                        document.getElementById("au"+id).disabled="true";
                                                        document.getElementById("a"+id).disabled="true";
                                                    }

                                                    else
                                                    {
                                                        document.getElementById("dd"+id).disabled="true";
                                                        document.getElementById("du"+id).disabled="true";
                                                        document.getElementById("d"+id).disabled="true";
                                                    }
                                                
                                                    // Popup 
                                                    $("#atoggler"+id).click(function ()
                                                    {
                                                        if(company=="admin")
                                                        {
                                                            document.getElementById("myPopup1").classList.toggle("show");
                                                            $("#myPopup1").removeClass("hide");

                                                            setTimeout(function ()
                                                            {
                                                                $("#myPopup1").addClass("hide");
                                                                $("#myPopup1").removeClass("show");
                                                                $("#myPopup3").hide();
                                                            }, 2000);
                                                        }
                                                        else
                                                        {
                                                            if(appr=="1")
                                                            {
                                                                document.getElementById("myPopup3").classList.toggle("show");
                                                                $("#myPopup3").removeClass("hide");

                                                                setTimeout(function ()
                                                                {
                                                                    $("#myPopup3").addClass("hide");
                                                                    $("#myPopup3").removeClass("show");
                                                                    $("#myPopup1").hide();
                                                                }, 2000);
                                                            }
                                                        }

                                                    });

                                                    $("#dtoggler"+id).click(function ()
                                                    {
                                                        console.log('Pressed button\'s id is: ' + id);
                                                        var eyedee = id;

                                                        if(company=="admin")
                                                        {
                                                            if(del=="1"||del=="-1")
                                                            {
                                                                document.getElementById("myPopup4").classList.toggle("show");
                                                                $("#myPopup4").removeClass("hide");

                                                                setTimeout(function ()
                                                                {
                                                                    $("#myPopup4").addClass("hide");
                                                                    $("#myPopup4").removeClass("show");
                                                                }, 2000);
                                                            }

                                                            else
                                                            {
                                                                var status = document.getElementById('dd'+id).checked;

                                                                if(status)
                                                                {
                                                                    document.getElementById("reason_popup"+id).classList.toggle("show");
                                                                    $("#reason_popup"+id).removeClass('hide');
                                                                }

                                                                else
                                                                {
                                                                    $("#reason_popup"+id).addClass("hide");
                                                                    $("#reason_popup"+id).removeClass("show");
                                                                }
                                                            }
                                                        }

                                                        else
                                                        {
                                                            document.getElementById("myPopup2").classList.toggle("show");
                                                            $("#myPopup2").removeClass("hide");
                                                            
                                                            setTimeout(function ()
                                                            {
                                                                $("#myPopup2").addClass("hide");
                                                                $("#myPopup2").removeClass("show");
                                                                $("#myPopup4").hide();
                                                            }, 2000);
                                                        }
                                                    });

                                                });

                                            
                                                
                                            </script>
                                            
                                            <!-- Update state through ajax -->
                                            <script>
                                                function process(change) 
                                                {
                                                    var id = change.closest("div").querySelector('p').innerText;                                             
                                                    var state = change.value;

                                                    $.ajax({
                                                        url:"update.php",
                                                        method:"POST",
                                                        data:{id:id, state:state},
                                                        success:function(data){
                                                            
                                                            document.getElementById("just").style.display="block";
                                                            document.getElementById("confBtn").style.display = "block";
                                                            $('#just').html(data);
                                                        }
                                                    });

                                                }

                                                // Submit reason if denied
                                                function submit_reason(sub_reason)
                                                {
                                                    var id = sub_reason.closest("div").querySelector('p').innerText;
                                                    var reason = document.getElementById('reason').value;
                                                       
                                                    console.log(id);

                                                    $.ajax({
                                                        url:"reason_update.php",
                                                        method:"POST",
                                                        data:{id:id, reason:reason},
                                                        success:function(data){

                                                            // Hide reason text area
                                                            $("#reason_popup"+id).addClass("hide");
                                                            $("#reason_popup"+id).removeClass("show");


                                                            // Pop up reason sent success message
                                                            document.getElementById("myPopup8").classList.toggle("show");
                                                            $("#myPopup8").removeClass("hide");

                                                            setTimeout(function ()
                                                            {
                                                                $("#myPopup8").addClass("hide");
                                                                $("#myPopup8").removeClass("show");
                                                                $("#myPopup2").hide();
                                                            }, 2000);

                                                        }
                                                    });
                                                }

                                            </script>
                                    
                                        <?php
                                    }
                            
                                $sn++; 
                            }
                        }

                        else
                        {
                            if(isset($_POST['newOrder']))
                            {
                                ?>  
                                    <tr>
                                        <td class="mx-auto text-center" colspan='12'>There are currently no new orders.</td>
                                    </tr> 
                                <?php
                            }
                            else
                            {
                                ?>  
                                    <tr>
                                        <td class="mx-auto text-center" colspan='12'>There are currently no orders.</td>
                                    </tr> 
                                <?php
                            }
                        } 

                    ?> 
                </table> 
            </div>

            <div style="overflow: auto">
                <div style="width: 100%; right: 0; position: fixed;">
                    <button id="confBtn" class="btn btn-success mt-3 mb-2 mx-auto" style="display: none;" data-bs-dismiss="modal" onclick="showYeah();">Confirm</button>
                </div>
                <br>
            </div>

            <br>                                
            <?php
        }
    ?>
