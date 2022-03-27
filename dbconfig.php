<?php

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno) {
    printf("Connect failed: %s\n", $db->connect_error);
    exit();
}
if (!$db->select_db('sdp')) {
    echo "Couldn't select database: " . $db->error;
    if (!$db->query("CREATE DATABASE IF NOT EXISTS sdp;")) {
        echo "Couldn't create database: " . $db->error;
    }
    $db->select_db('sdp');
}

    $tbl_query1 = mysqli_query($db, "CREATE TABLE IF NOT EXISTS company (id INT(11) AUTO_INCREMENT PRIMARY KEY, company_name VARCHAR(250), email VARCHAR(250), password VARCHAR(250))");
    $tbl_query2 = mysqli_query($db, "CREATE TABLE IF NOT EXISTS delivered_products (id INT(11) AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(250), last_name VARCHAR(250), company_name VARCHAR(250), car_model VARCHAR(250), product_type VARCHAR(250), phone_number INT(250), delivery_date VARCHAR(25), hide TINYINT(1))");
    $tbl_query3 = mysqli_query($db, "CREATE TABLE IF NOT EXISTS denied_delivery (id INT(11) AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(250), last_name VARCHAR(250), company_name VARCHAR(250), car_model VARCHAR(250), product_type VARCHAR(250), phone_number INT(250), deny_date VARCHAR(25), reason VARCHAR(250), hide TINYINT(1))");
    $tbl_query4 = mysqli_query($db, "CREATE TABLE IF NOT EXISTS orders (id INT(11) AUTO_INCREMENT PRIMARY KEY, first_name VARCHAR(250), last_name VARCHAR(250), company_name VARCHAR(250), car_model VARCHAR(250), product_type VARCHAR(250), phone_number INT(250), approved INT(2), delivered INT(2), status INT(2))");
    $tbl_query5 = mysqli_query($db, "CREATE TABLE IF NOT EXISTS password_reset (id INT(11) AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255), token VARCHAR(255))");

    $companies = mysqli_query($db, "SELECT company_name FROM company");

    if(mysqli_num_rows($companies)<6)
    {
        $query1 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('feres', 'feres@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
        $query2 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('hellotaxi', 'hellotaxi@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
        $query3 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('ride', 'ride@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
        $query4 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('taxiye', 'taxiye@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
        $query5 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('zay-ride', 'zay-ride@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
        $query6 = mysqli_query($db, "INSERT INTO company(company_name, email, password) VALUES ('admin', 'juniourmimo@gmail.com', '8ce87b8ec346ff4c80635f667d1592ae')");
    }
?>