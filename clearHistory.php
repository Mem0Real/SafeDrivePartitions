<?php
    if(!isset($_SESSION))
    {
        session_start();
    }
    include('dbconfig.php');
    $user = $_POST['user'];
    
    $query=mysqli_query($db, "UPDATE delivered_products SET hide = '1' WHERE company_name = '$user'");
?>