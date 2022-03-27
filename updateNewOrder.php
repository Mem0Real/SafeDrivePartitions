<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');
    $id = $_POST['id'];
    $state = $_POST['state'];
    $data = array();

    $query = mysqli_query($db, "SELECT * FROM orders WHERE id = '$id'");
    
    if(mysqli_num_rows($query)!=0)
    {
        if($state=="approve")
        {
            $query1 = mysqli_query($db, "UPDATE orders SET Approved = '1' WHERE id='$id'");

            if($query1)
            {
                $data['status'] = "success";
            }
            else
            {
                $data['status'] = "error";
            }
            
        }

        if($state=="deny")
        {
            $query1 = mysqli_query($db, "UPDATE orders SET Approved = '-1' WHERE id='$id'");
            if($query1)
            {
                $data['status'] = "success";
            }
            else
            {
                $data['status'] = "error";
            }
            
        }
    }
    echo json_encode($data);
?>