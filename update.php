<?php
    require('dbconfig.php');

    $id = $_POST['id'];
    $state = $_POST['state'];

    
    switch($state)
    {
        // Case Approval Denied
        case "ad":
            $sql="UPDATE orders SET approved='-1' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Approval Request Denied.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;

        // Case Approval Undefined
        case "au":
            $sql="UPDATE orders SET approved='0' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Approval Request Pending.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;

        // Case Approval Confirmed
        case "a":
            $sql="UPDATE orders SET approved='1' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Approval Request accepted.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;
        
        // Case Delivery Denied
        case "dd":
            $sql="UPDATE orders SET delivered='-1' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Delivery Request Denied.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;

        // Case Delivery Undefined
        case "du":
            $sql="UPDATE orders SET delivered='0' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Delivery Pending.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;

        // Case Delivery Confirmed
        case "d":
            $sql="UPDATE orders SET delivered='1' WHERE id='$id'";
        
            if($db->query($sql))
            {
                echo 'Data Updated :- Delivery Confirmed.';
            }
    
            else
            {
                echo 'Error: Could not update database';
            }
        break;

    }
    
?>
