<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    
    include('dbconfig.php');
    $user = $_POST['user'];
    $data = array();

    if($user=="admin")
    {
        $query = mysqli_query($db, "SELECT * FROM delivered_products");
    }
    else
    {    
        $query = mysqli_query($db, "SELECT * FROM delivered_products WHERE company_name = '$user' AND hide ='0'");
    }
        
?>
    <style>
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
    </style>

   <script src="cook.js"></script>
   <script>
   </script>
    <!-- Show Confirmation Modal -->
    <div class="modal fade" id="confirmClear" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content modal-cont">
                <div class="modal-header bg-danger">
                    <h3> Clear History </h3>
                    <button type="button" class="btn btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>				
                </div>	
                
                <div class="modal-body bg-dark">
                    <h4>Are You Sure You Want To Clear Your History?</h4>
                    <button class="btn btn-success" onclick="clearHistory();" data-bs-dismiss="modal">Confirm</button>
                    <button class="btn btn-danger" type="cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Table Data -->
    <div class="search-table-outer">
        <table class="search-table">
            <p id="just" class="btn btn-sm btn-dark col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12 position-absolute end-0 me-2" style="cursor: auto; display: none; margin-top: -2em;"></p>
            <thead class="pt-3">
                <tr>
                    <th class="px-4">No.</th>
                    <th class="px-4">First Name</th>
                    <th class="px-4">Last Name</th>
                    <th class="px-4">Company</th>
                    <th class="px-4">Car Mode</th>
                    <th class="px-4">Product Type</th>
                    <th class="px-4">Phone Number</th>
                    <th class="px-4">Date Delivered</th>
                </tr> 
            </thead>

            <?php

                if(mysqli_num_rows($query)>=1)
                {
                    
                    $data['status'] = "success";
                    $sn = 1;

                    while($row=mysqli_fetch_array($query))
                    {
                        ?>
                        <tbody>
                            <tr>
                                <td class="px-2"><?php echo $sn; ?></td>
                                <td class="px-2"><?php echo $row['first_name']?></td>
                                <td class="px-2"><?php echo $row['last_name']?></td>
                                <td class="px-2"><?php echo $row['company_name']?></td>
                                <td class="px-2"><?php echo $row['car_model']?></td>
                                <td class="px-2"><?php echo $row['product_type']?></td>
                                <td class="px-2"><?php echo $row['phone_number']?></td>
                                <td class="px-2"><?php echo $row['delivery_date']?></td>
                            </tr>
                        </tbody>

                        <?php
                        $sn++;
                    }
                    ?>
                        <script>setCookie("emptyHistory", "", "-1"); </script>
                    <?php
                }
                else
                {
                    
                    ?>
                    <script>
                        var user = <?php echo json_encode("$user", JSON_HEX_TAG); ?>;
                        setCookie("emptyHistory", user, "30"); 
                    </script>
                    <tr>
                        <td class="mx-auto text-center" colspan='12'>Your History is empty.</td>
                    </tr> 
                    <?php
                }
            ?>
        </table>
    </div>
    
    

            