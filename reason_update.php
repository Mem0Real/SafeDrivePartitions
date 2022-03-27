<?php
    require('dbconfig.php');

    $id = $_POST['id'];
    $reason = $_POST['reason'];

    $query = "UPDATE orders SET reason = '$reason' WHERE id = '$id'";
    
    if($db->query($query))
    {
        echo 'Data Updated :- Reason Inserted.';
    }

    else
    {
        echo 'Error: Could not update database';
    }
    
    if(isset($_POST['empty']))
    {
        $query2 = mysqli_query($db, "UPDATE orders SET reason = '' WHERE id = '$id'");
    }
?>
