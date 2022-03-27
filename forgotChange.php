<?php
    require('dbconfig.php');

    $password = $_POST['password'];
    $company = $_POST['company'];

    
    $respond = array();

    $respond['a'] = $password;
    $respond['c'] = $company;
    $query = mysqli_query($db, "UPDATE company SET password = '$password' WHERE company_name = '$company'");
    if($query)
    {
        $_SESSION['fpSuccess']="yes";

        $respond['status'] = "success";
        
     
    }
    else
    {
        $respond['status'] = "error";
        $_SESSION['fpError']="yes";
    }

    echo json_encode($respond);

?>

