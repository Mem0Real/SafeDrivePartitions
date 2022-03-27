<?php
    include('dbconfig.php');
    $user = $_POST['user'];
    $stat = array();

    $query = mysqli_query($db, "UPDATE delivered_products SET hide = '0' WHERE company_name = '$user'");
    if($query)
    {
        $stat['status'] = "success";
    }
    else
    {
        $stat['status'] = "error";
    }
    echo json_encode($stat);
?>
