<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require('dbconfig.php');
?>
<script src="cook.js"></script>
<?php

    if(isset($_POST['login']))
    {
        $cname = $_POST['company_name'];
        $password = $_POST['password'];

        $password = md5($password);
        
        $_SESSION['cname'] = $cname;
        $_SESSION['password'] = $password;
        
        $query = mysqli_query($db, "SELECT * FROM company WHERE company_name = '$cname' AND password = '$password'");
        
        
        if(mysqli_num_rows($query)>=1)
        {
            ?><script>sessionStorage.setItem("in", "k");</script><?php
            $_SESSION['user'] = $cname;

            switch($cname)
            {
                case "feres":
                    header('location: feres.php');
                break;
                case "hellotaxi":
                    header('location: hellotaxi.php');
                break;
                case "ride":
                    header('location: ride.php');
                break;
                case "taxiye":
                    header('location: taxiye.php');
                break;
                case "zay-ride":
                    header('location: zay-ride.php');
                break;
                case "admin":
                    header('location: admin.php');
                break;                
            }
        }
        else
        {
            $_SESSION['err'] = "Wrong Password";
        }
    }

    if(isset($_POST['placeOrder']))
    {
        $firstName = $_POST['firstName'];   
        $lastName = $_POST['lastName'];   
        $companyName = $_POST['companyName'];   
        $carModel = $_POST['carModel'];  

        if($carModel=="other")
        {
            $carModel = $_POST['otherModel'];
        }

        $productType = $_POST['productType'];   
        $phoneNumber = $_POST['phoneNumber'];   

        $query0 = mysqli_query($db, "SELECT * FROM orders WHERE first_name='$firstName' AND last_name='$lastName' AND company_name ='$companyName' AND car_model = '$carModel' AND product_type = '$productType' AND phone_number = '$phoneNumber'");
        
        if(mysqli_num_rows($query0)>=1)
        {
            $_SESSION['order_error'] = "You have already placed an order!";
            ?><script>sessionStorage.setItem("go", "no");</script><?php
        }

        else
        {
            $query = mysqli_query($db, "INSERT INTO orders(first_name, last_name, company_name, car_model, product_type, phone_number)
            VALUES ('$firstName', '$lastName', '$companyName', '$carModel', '$productType', '$phoneNumber')");

            if($query)
            {
                $_SESSION['order_success'] = "Order sent successfully!"; 
                ?><script>sessionStorage.setItem("go", "yup");</script><?php
            }

            else
            {
                $_SESSION['order_error'] = "Order not sent! Unknown error.";
                ?><script>sessionStorage.setItem("go", "no");</script><?php
            }
        }
    }
?>