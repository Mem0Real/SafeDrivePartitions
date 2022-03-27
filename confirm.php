<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

    // fetch query
    function fetch_data()
    {
        global $db;
        $userp = $_SESSION['user'];

        if(isset($_POST['newOrder']))
        {
            if($userp!="admin")
            {
                $query="SELECT * from orders WHERE company_name = '$userp' AND status = '0' ORDER BY id ASC";
            }
            else
            {
                $query="SELECT * from orders WHERE status = '0' AND Approved = '1' ORDER BY id ASC";
            }
        }

        else
        {
            if($userp!="admin")
            {
                $query="SELECT * from orders WHERE company_name = '$userp' ORDER BY id ASC";
            }
            else
            {
                $query="SELECT * from orders ORDER BY id ASC";
            }
        }
        
        $exec=mysqli_query($db, $query);
        if(mysqli_num_rows($exec)>0)
        {
            $query2=mysqli_query($db, "UPDATE orders SET status = '1' WHERE company_name = '$userp'");
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

    function show_data($fetchData)
    { ?>
        <table class="col-xs-4 col-lg-12 text-white">
            <thead>
                <p id="just" class="btn btn-sm btn-dark col-xs-8 col-sm-12 col-md-12 col-lg-12 col-xl-12 position-fixed end-0 me-2" style="cursor: auto; display: none; margin-top: -2em;"></p>
            </thead>
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Company</th>
                <th>Car Mode</th>
                <th>Product Type</th>
                <th>Phone Number</th>
                <th>Approved</th>
                <th>Delivered</th>
            </tr> 
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
                        ?>  <tr>
                                <td><?php echo $sn; ?></td>
                                <td><?php echo $data['first_name']?></td>
                                <td><?php echo $data['last_name']?></td>
                                <td><?php echo $data['company_name']?></td>
                                <td><?php echo $data['car_model']?></td>
                                <td><?php echo $data['product_type']?></td>
                                <td><?php echo $data['phone_number']?></td>
                                <td>
                                    <input id="approve<?php echo $id; ?>" class="approve" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="dark" data-on="✓" data-off="❌" <?php if($data['approved']=="1"){ ?> checked <?php } ?>>                            
                                    <p class="ir" style="display: none;"> <?php echo $id; ?> </p>                           
                                </td>
                                <td> 
                                    <input id="deliver<?php echo $id; ?>" class="deliver" type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="dark" data-on="✓" data-off="❌" <?php if($data['delivered']=="1"){ ?> checked <?php } ?>> 
                                    <p class="dir" style="display: none;"> <?php echo $id; ?> </p>                            
                                </td>
                        </tr>
        
                        <?php          
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
        <?php
    }
?>    