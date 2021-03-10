<?php
    include_once './db.php';
    include_once './policies.php';
    $database = new Database();

    $db = $database->getConnection();
    $items = new Policy($db);
    $records = $items->getPolicies();
    $itemCount = $records->num_rows;
    if($itemCount > 0){
        $policyArr = array();
        $policyArr["body"] = array();
        $policyArr["itemCount"] = $itemCount;
        while ($row = $records->fetch_assoc())
        {
            array_push($policyArr["body"], $row);
        } 
        echo json_encode($policyArr);
        } else {
        http_response_code(404);
        echo json_encode(
        array("message" => "No record found.")
        );
    }
?>