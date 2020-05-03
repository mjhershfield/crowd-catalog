<?php
header("Content-Type:application/json");
$servername = "pdb44.awardspace.net";
$username = "2748696_crowdcatalog";
$password = "fo(_AdDu8B)*2Jwj";
$dbname = "2748696_crowdcatalog";

//Create Connection to DB
$conn = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if ($conn->connection_error) {
    die(json_encode( ["error" => $conn->connection_error]));
}

function make_response($status, $status_message, $data) {
    header("HTTP/1.1 ".$status);
    
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    
    $json_response = json_encode($response);
    echo $json_response;
}
?>