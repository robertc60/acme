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

    $item->getSinglePolicy();

    if($item->customer != null){

        // create array
        $pol_arr = array(
            "customer" => $item->customer,
            "address" => $item->address,
            "premium" => $item->premium,
            "type" => $item->type,
            "insurer" => $item->insurer
        );

        http_response_code(200);
        echo json_encode($pol_arr);
    } else {
        http_response_code(404);
        echo json_encode("Employee not found.");
    }
?>