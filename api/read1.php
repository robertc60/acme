<?php
/**
 * Returns the list of cars.
 */
require 'connect.php';
    
$cars = [];
$sql = "SELECT id, customer, address, premium, type, insurer FROM policies";

if($result = mysqli_query($con,$sql))
{
  $cr = 0;
  while($row = mysqli_fetch_assoc($result))
  {
    $cars[$cr]['id']    = $row['id'];
    $cars[$cr]['customer'] = $row['customer'];
    $cars[$cr]['address'] = $row['address'];
    $cars[$cr]['premium'] = $row['premium'];
    $cars[$cr]['type'] = $row['type'];
    $cars[$cr]['insurer'] = $row['insurer'];
    $cr++;
  }
    
  echo json_encode(['data'=>$cars]);
}
else
{
  http_response_code(404);
}