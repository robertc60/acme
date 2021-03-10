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

    $item->id = isset($_GET['id']) ? $_GET['id'] : die();

    if($item->deletePolicy()){
        echo json_encode("Employee deleted.");
    } else {
        echo json_encode("Data could not be deleted");
    }
?>