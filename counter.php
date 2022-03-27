<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include('dbconfig.php');

    $data = array();

    $company_name = $_SESSION['user'];

    if($company_name=="admin")
    {
        $query = mysqli_query($db, "SELECT * from orders WHERE Approved = '1' AND status != '2' AND Delivered='0' ORDER BY company_name ASC");
    }
    else
    {
        $query = mysqli_query($db, "SELECT * FROM orders WHERE company_name = '$company_name' AND status = '0'");
    }
    

    $data['count'] = mysqli_num_rows($query);

    echo json_encode($data);

?>
    