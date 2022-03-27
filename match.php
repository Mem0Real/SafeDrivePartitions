<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include('dbconfig.php');

    $company = $_POST['company'];
    $password = $_POST['password'];

    $data = array();

    $password = md5($password);

    $query = mysqli_query($db, "SELECT * FROM company WHERE company_name = '$company' AND password = '$password'");

    if(mysqli_num_rows($query)==1)
    {
        $data['status'] = "found";
        $_SESSION['user'] = $company;
    }
    else
    {
        $data['status'] = "nope";
    }

    echo json_encode($data);
?>