<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../db.php';
    include_once '../policies.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Policy($db);
    $item->customer = $_GET['customer'];
    $item->address = $_GET['address'];
    $item->premium = $_GET['premium'];
    $item->type = $_GET['type'];
    $item->insurer = $_GET['insurer'];
    if($item->createPolicy()){
        echo 'Employee created successfully.';
    } else {
        echo 'Employee could not be created.';
    }
?>