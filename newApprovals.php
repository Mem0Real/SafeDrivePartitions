<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

    $user = $_POST['user'];
    $query = mysqli_query($db, "SELECT * FROM orders WHERE Approved='1' AND Delivered='0'");
    
    if(mysqli_num_rows($query)>0)
    {
        while($row = mysqli_fetch_array($query))
        {

            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $company = $row['company_name'];

            $query2 = mysqli_query($db, "UPDATE orders SET status = '2' WHERE id='$id'");

            ?>
                <div id="wrap<?php echo $id; ?>" class="wrapper display-inline-block text-center">
                    <div class="container pt-4" style="border-bottom: 16px solid #000000a8;">
                        <p><strong><?php echo $company; ?></strong> company has approved</p>
                        <p><strong><?php echo $first_name; echo " "; echo $last_name; ?></strong>'s order.</p>
                        <div id="btn" class="buttons position-absolute end-0 me-2 border-bottom">
                            <button id="newDeliver<?php echo $id; ?>" class="btn btn-success" onclick="updateNewApproval(this); event.stopPropagation();" value="deliver">Delivered</button>
                            <button id="newDeny<?php echo $id; ?>" class="btn btn-success" onclick="updateNewApproval(this); event.stopPropagation();" value="deny">Deny</button>
                            <p id="titty" class="d-none"><?php echo $id; ?></p>
                        </div>
                        <br><br>
                    </div>
                </div>

                <script>
                    function updateNewApproval(stat)
                    {
                        var ider = stat.closest(".buttons");
                        var id2 = $(ider).find("p");
                        var id = $(id2).text();
                        var id3 = $(ider).attr("id");
                        var id2 = $(id3).find("#titty");
                        var id1 = $(id2).attr("id");

                        // Ask for reason on admin page
                        why_deny(id);

                        var state = stat.value;
                        var wrapper = stat.closest(".wrapper");
                        var wrap = $(wrapper).attr("id");
                        $('#wrap'+id).fadeOut("slow");

                        $.ajax({
                            url: 'updateNewApprovals.php',
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
                                    if(state=="deliver")
                                    {
                                        var a = document.getElementById("deliveryApproveSnackbar");
                                        a.className = "show";
                                        setTimeout(function(){ a.className = a.className.replace("show", ""); }, 3000);
                                    }
                                    else if(state="deny")
                                    {
                                        var b = document.getElementById("deliveryDenySnackbar");
                                        b.className = "show";
                                        setTimeout(function(){ b.className = b.className.replace("show", ""); }, 3000);
                                    }
                                }
                                else
                                {
                                    var c = document.getElementById("deliveryErrorSnackbar");
                                    c.className = "show";
                                    setTimeout(function(){ c.className = c.className.replace("show", ""); }, 3000);
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

