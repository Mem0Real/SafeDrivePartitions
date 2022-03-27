<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

    $user = $_POST['user'];
    $query = mysqli_query($db, "SELECT * FROM orders WHERE company_name = '$user' AND Approved='0'");
    
    if(mysqli_num_rows($query)>0)
    {
        while($row = mysqli_fetch_array($query))
        {

            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];

            $query2 = mysqli_query($db, "UPDATE orders SET status = '1' WHERE id='$id'");

            ?>
                <div id="wrap<?php echo $id; ?>" class="wrapper display-inline-block">
                    <div class="container pt-2">
                        <i class="fas fa-shopping-cart"></i>
                        <p><?php echo $first_name; echo " "; echo $last_name; ?> has sent an order.</p>
                        <div id="btn" class="buttons position-absolute end-0 me-2">
                            <button id="newApprove<?php echo $id; ?>" class="btn btn-success" onclick="updateNewOrder(this);" value="approve">Approve</button>
                            <button id="newDeny<?php echo $id; ?>" class="btn btn-success" onclick="updateNewOrder(this);" value="deny">Deny</button>
                            <p id="titty" class="d-none"><?php echo $id; ?></p>
                        </div>
                        <br><br>
                    </div>
                </div>

                <script>
                    function updateNewOrder(stat)
                    {
                        var ider = stat.closest(".buttons");
                        var id2 = $(ider).find("p");
                        var id = $(id2).text();
                        var id3 = $(ider).attr("id");
                        var id2 = $(id3).find("#titty");
                        var id1 = $(id2).attr("id");

                        var state = stat.value;
                        var wrapper = stat.closest(".wrapper");
                        var wrap = $(wrapper).attr("id");
                        $('#wrap'+id).fadeOut("slow");
                        
                        $.ajax({
                            url: 'updateNewOrder.php',
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                id:id,
                                state:state
                            },
                            success: function(data)
                            {
                                if(data.status=="success")
                                {
                                    if(state=="approve")
                                    {
                                        var x = document.getElementById("orderApprovedSnackbar");
                                        x.className = "show";
                                        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                                    }
                                    else if(state="deny")
                                    {
                                        var y = document.getElementById("orderDeniedSnackbar");
                                        y.className = "show";
                                        setTimeout(function(){ y.className = y.className.replace("show", ""); }, 3000);
                                    }
                                }
                                else
                                {
                                    var z = document.getElementById("orderErrorSnackbar");
                                    z.className = "show";
                                    setTimeout(function(){ z.className = z.className.replace("show", ""); }, 3000);
                                }
                            }
                        })
                    }
                </script>
                
            <?php
        }
    }
    
    else
    {
        ?>
            <p class="text-center px-2 pt-3">No New Notifications.</p>
        <?php
    }
?>

