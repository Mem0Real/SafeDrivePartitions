<?php
    if(!isset($_SESSION))
    {
        session_start();
    }

    require('dbconfig.php');

    if(isset($_POST['add']))
    {
        $cname = $_POST['company'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $_SESSION['cname'] = $cname;
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;

        $query = mysqli_query($db, "SELECT * FROM company WHERE company_name = '$cname'");

        if(mysqli_num_rows($query)>=1)
        {
            $_SESSION['addError'] = "Company Already Exists";
        }
        
        else
        {
            $password = md5($password);
            $query2 = mysqli_query($db, "INSERT INTO company (company_name, password, email) VALUES ('$cname', '$password', '$email')");
            if($query2)
            {
                $_SESSION['addSuccess'] = "Company Added Successfully!";
            }

            else
            {
                $_SESSION['addError'] = "Could not add company! Please try again later.";
            }
        }
    }
?>