<?php
    include('dbconfig.php');

    $mail =  $_POST['mail'];        
    $message = array();
 
    $query = mysqli_query($db, "SELECT * FROM company WHERE email = '$mail'");

    if(mysqli_num_rows($query)==1)
    {
        $message['status'] = "success";
        $row=mysqli_fetch_assoc($query);
        $message['comp'] = $row['company_name'];    
        $message['em'] = $mail;  
    }

    else
    {
        $message['status'] = "error";
    }

    echo json_encode($message);
    
?>