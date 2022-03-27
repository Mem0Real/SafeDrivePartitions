<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    include('dbconfig.php');

    $password = $_POST['password'];
    $company = $_POST['company'];
    $token = $_SESSION['token'];
    $reply = array();

    $password = md5($password);

    $sql = "SELECT email FROM password_reset WHERE token='$token' LIMIT 1";
    
    $results = mysqli_query($db, $sql);
    $email = mysqli_fetch_assoc($results)['email'];
    
    if ($email) 
    {
        $query = mysqli_query($db, "UPDATE company SET password = '$password' WHERE email = '$email'");
        
        if($query)
        {
            $query2 = mysqli_query($db, "DELETE FROM password_reset WHERE token='$token'");
            $reply['status'] = "success";
            unset($_GET['token']);
        }
        else
        {
            $reply['status'] = "error";
        }
    }

    else
    {
        $reply['status'] = "error";
    }
    
    echo json_encode($reply);

?>