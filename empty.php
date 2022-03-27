<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');

    $user = $_POST['user'];
    $data = array();

    $query = mysqli_query($db, "SELECT * FROM delivered_products WHERE company_name = '$user' AND hide != '1'");
    
    if(mysqli_num_rows($query)>0)
    {
        $data['stat'] = "exists";
    }
    else
    {
        $data['stat'] = "empty";
    }

    echo json_encode($data);
?>