<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require('dbconfig.php');

    $user = $_SESSION['user'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $oldPassword = md5($oldPassword);  
    $newPassword = md5($newPassword);  
    
    $response = array();

    $query = mysqli_query($db, "SELECT * FROM company WHERE company_name = '$user' AND password = '$oldPassword'");

    if(mysqli_num_rows($query)==1)
    {   
        $query2 = mysqli_query($db, "UPDATE company SET password = '$newPassword' WHERE company_name = '$user'");

        if($query2)
        {   
            $response['status'] = 'success';
        }       
    }

    else
    {
        $response['status'] = 'error';
    }

    echo json_encode($response);
?>