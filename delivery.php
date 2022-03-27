<?php

    if(!isset($_SESSION))
    {
        session_start();
    }

    include('dbconfig.php');
    $user = $_SESSION['user'];

    // Count products marked as delivered
    $query = mysqli_query($db, "SELECT * FROM orders WHERE Delivered = '1'");
    $count = mysqli_num_rows($query);

    // Count products marded as denied
    $query2 = mysqli_query($db, "SELECT * FROM orders WHERE Delivered = '-1'");
    $count2 = mysqli_num_rows($query2);

    if($count>=1)
    {
        while($row=mysqli_fetch_array($query))
        {
            $company = $row['company_name'];

            if($user==$company)
            {
                $id = $row['id'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $car_model = $row['car_model'];
                $product_type = $row['product_type'];
                $phone_number = $row['phone_number'];

                if($product_type=="day")
                {
                    $price = "2500.00 ETB";
                }
                else if($product_type == "hybrid")
                {
                    $price = "3200.00 ETB";
                }
                else
                {
                    $price = "3900.00 ETB";
                }
                
                ?>

                <!-- Delivery Success Modal -->
                <div id="delivery<?php echo $id;?>" class="modal fade" style="margin-top: -5%;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content text-light" style="font-size: 22px; background-color: rgba(0, 0, 0, .65);">
                            <div class="modal-header mx-auto">
                                Delivery Successful!
                                <button type="button" class="btn btn-close btn-close-white position-absolute end-0 me-5" data-bs-dismiss="modal" aria-label="Close"></button>				
                            </div>
                            <div class="modal-body">
                                <h4>Dear <strong><?php echo $company; ?></strong> representative.</h4>
                                <br>
                                <p> We have successfully delivered a <strong><?php echo $product_type; ?></strong> partition</p>
                                <p>  product for a <strong><?php echo $car_model; ?></strong> vehicle that was ordered by</p>
                                <p> <strong><?php echo $first_name; echo " "; echo $last_name; ?></strong>.</p>
                                <p> The total price is <strong> <?php echo $price; ?> </strong>.</p>
                                <br>
                                <p> You can contact the customer by the mobile number <br><strong> <?php echo $phone_number; ?></strong>
                                    to confirm the delivery.</p>
                                <p>If you have any questions, please call <strong>0913085993</strong>.</p>                                
                            </div>
                            <div class="modal-footer mx-auto pb-4">
                                <h5>Thank You For Using Safe Drive Partitions.</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="cook.js"></script>
                <script src="jQuery.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>

                <!-- Show Delivered Modal once -->
                <script>
                    $(document).ready(function (){
                        var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
                        var delvr = "#delivery"+id;

                        var deliverySeen = sessionStorage.getItem("delivery");
                        
                        if(deliverySeen==null)
                        {
                            $(delvr).modal('show');
                        }
                        $(delvr).on('hidden.bs.modal', function () { 
                            sessionStorage.setItem("delivery", id);
                            saveHistory();
                        });
                    });
                </script>

                <!-- Move Shown Data to another table -->
                <script>
                    function saveHistory() {

                        // Date
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today =  dd + '/' + mm + '/' + yyyy;

                        var nds = sessionStorage.getItem("delivery");

                        if(ds !="") 
                        {
                            sessionStorage.clear();

                            var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
                            var first_name = <?php echo json_encode("$first_name", JSON_HEX_TAG); ?>;
                            var last_name = <?php echo json_encode("$last_name", JSON_HEX_TAG); ?>;
                            var company = <?php echo json_encode("$company", JSON_HEX_TAG); ?>;
                            var car_model = <?php echo json_encode("$car_model", JSON_HEX_TAG); ?>;
                            var product_type = <?php echo json_encode("$product_type", JSON_HEX_TAG); ?>;
                            var phone_number = <?php echo json_encode("$phone_number", JSON_HEX_TAG); ?>;

                            $.ajax({
                                url: 'save.php',
                                method: 'POST',
                                dataType: 'json',
                                data:
                                {
                                    id:id,
                                    first_name:first_name,
                                    last_name:last_name,
                                    company:company,
                                    car_model:car_model,
                                    product_type:product_type,
                                    phone_number:phone_number,
                                    today:today
                                },
                                
                            });
                        }
                    }
                </script>

                <?php
            }
        }
    }

    if($count2>=1)
    {
        while($row2=mysqli_fetch_array($query2))
        {
            $company = $row2['company_name'];

            if($user==$company)
            {
                $id = $row2['id'];
                $first_name = $row2['first_name'];
                $last_name = $row2['last_name'];
                $car_model = $row2['car_model'];
                $product_type = $row2['product_type'];
                $phone_number = $row2['phone_number'];
                $reason = $row2['reason'];

                if($product_type=="day")
                {
                    $price = "2500.00 ETB";
                }
                else if($product_type == "hybrid")
                {
                    $price = "3200.00 ETB";
                }
                else
                {
                    $price = "3900.00 ETB";
                }
                
                ?>

                <!-- Delivery Denied Modal -->
                <div id="no_delivery<?php echo $id;?>" class="modal fade" style="margin-top: -5%;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content text-warning" style="font-size: 22px; background-color: rgba(0, 0, 0, .65);">
                            <div class="modal-header mx-auto">
                                Delivery Denied!
                                <button type="button" class="btn btn-close btn-close-white position-absolute end-0 me-5" data-bs-dismiss="modal" aria-label="Close"></button>				
                            </div>
                            <div class="modal-body">
                                <h4>Dear <strong><?php echo $company; ?></strong> representative.</h4>
                                <br>
                                <p> We have denied a delivery of a <strong><?php echo $product_type; ?></strong> partition</p>
                                <p>  product for a <strong><?php echo $car_model; ?></strong> vehicle that was ordered by</p>
                                <p> <strong><?php echo $first_name; echo " "; echo $last_name; ?></strong>.</p>
                                <br>
                                <?php if($reason != "")
                                { 
                                    ?>
                                        <p>The reason we denied the services is because: </p>
                                        <strong><?php echo $reason; ?> </strong>
                                    <?php
                                }
                                ?>

                                <p> You can contact the customer by the mobile number <br><strong> <?php echo $phone_number; ?></strong>
                                    to update.</p>
                                <p>If you have any questions, please call <strong>0913085993</strong>.</p>                                
                            </div>
                            <div class="modal-footer mx-auto pb-4">
                                <h5>Thank You For Using Safe Drive Partitions.</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="cook.js"></script>
                <script src="jQuery.js"></script>
                <script src="bootstrap/js/bootstrap.min.js"></script>

                <!-- Show Delivery Denied Modal once -->
                <script>
                    $(document).ready(function (){
                        var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
                        var no_delvr = "#no_delivery"+id;

                        var no_deliverySeen = sessionStorage.getItem("no_delivery");
                        
                        if(no_deliverySeen==null)
                        {
                            $(no_delvr).modal('show');
                        }
                        $(no_delvr).on('hidden.bs.modal', function () { 
                            sessionStorage.setItem("no_delivery", id);
                            saveDistory();
                        });
                    });
                </script>

                <!-- Move Shown Data to another table -->
                <script>
                    function saveDistory() {

                        // Date
                        var today = new Date();
                        var dd = String(today.getDate()).padStart(2, '0');
                        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                        var yyyy = today.getFullYear();

                        today =  dd + '/' + mm + '/' + yyyy;

                        var nds = sessionStorage.getItem("no_delivery");

                        if(nds !="") 
                        {
                            sessionStorage.clear();

                            var id = <?php echo json_encode("$id", JSON_HEX_TAG); ?>;
                            var first_name = <?php echo json_encode("$first_name", JSON_HEX_TAG); ?>;
                            var last_name = <?php echo json_encode("$last_name", JSON_HEX_TAG); ?>;
                            var company = <?php echo json_encode("$company", JSON_HEX_TAG); ?>;
                            var car_model = <?php echo json_encode("$car_model", JSON_HEX_TAG); ?>;
                            var product_type = <?php echo json_encode("$product_type", JSON_HEX_TAG); ?>;
                            var phone_number = <?php echo json_encode("$phone_number", JSON_HEX_TAG); ?>;
                            var reason = <?php echo json_encode("$reason", JSON_HEX_TAG); ?>;

                            $.ajax({
                                url: 'dsave.php',
                                method: 'POST',
                                dataType: 'json',
                                data:
                                {
                                    id:id,
                                    first_name:first_name,
                                    last_name:last_name,
                                    company:company,
                                    car_model:car_model,
                                    product_type:product_type,
                                    phone_number:phone_number,
                                    today:today,
                                    reason:reason
                                },
                                
                            });
                        }
                    }
                </script>

                <?php
            }
        }
    }


?>



