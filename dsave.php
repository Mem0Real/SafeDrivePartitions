<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include('dbconfig.php');
    
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $company = $_POST['company'];
    $car_model = $_POST['car_model'];
    $product_type = $_POST['product_type'];
    $phone_number = $_POST['phone_number'];
    $today = $_POST['today'];
    $reason = $_POST['reason'];
    
    $dataR = array();

    $query = mysqli_query($db, "INSERT INTO denied_delivery(id, first_name, last_name, company_name, car_model, product_type, phone_number, deny_date, reason, hide) VALUES
    ('$id', '$first_name', '$last_name', '$company', '$car_model', '$product_type', '$phone_number', '$today', '$reason', '0')");

    if($query)
    {
        $query2 = mysqli_query($db, "DELETE FROM orders WHERE id = '$id'");

        $dataR['status'] = "success";
    }
    else
    {
        $dataR['status'] = "error";      
    }
    echo json_encode($dataR);
?>