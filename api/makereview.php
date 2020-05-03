<?php
require "dbinit.php";


GLOBAL $conn;

$sql_query = "INSERT INTO reviews (";
$sql_info = " VALUES (";
$info_exists = FALSE;

if (!empty($_GET["placeid"])) {
    $sql_query = $sql_query . "placeid";
    $sql_info = $sql_info . "'" . urldecode($_GET["placeid"]) . "'";
    if(!empty($_GET["socialdistancing"])) {
        //record social distancing
        $sql_query = $sql_query . ", socialdistancing";
        $sql_info = $sql_info . ", " .$_GET["socialdistancing"];
        $info_exists = TRUE;
    }
    if(!empty($_GET["sanitation"])) {
        //record social distancing
        $sql_query = $sql_query . ", sanitation";
        $sql_info = $sql_info . ", " .$_GET["sanitation"];
        $info_exists = TRUE;
    }
    if(!empty($_GET["safety"])) {
        //record social distancing
        $sql_query = $sql_query . ", safety";
        $sql_info = $sql_info . ", " .$_GET["safety"];
        $info_exists = TRUE;
    }
    if(!empty($_GET["waiting"])) {
        //record social distancing
        $sql_query = $sql_query . ", waiting";
        $sql_info = $sql_info . ", " .$_GET["waiting"];
        $info_exists = TRUE;
    }
    if(!empty($_GET["masks"])) {
        //record social distancing
        $sql_query = $sql_query . ", masks";
        $sql_info = $sql_info . ", " .$_GET["masks"];
        $info_exists = TRUE;
    }
    if(!empty($_GET["other"])) {
        //record social distancing
        $sql_query = $sql_query . ", other";
        $sql_info = $sql_info . ", '" . urldecode($_GET["other"]) . "'";
        $info_exists = TRUE;
    }
    if($info_exists){
        $sql_query = $sql_query . ")";
        $sql_info = $sql_info . ")";
        add_review_to_db();
    } else {
        make_response(200, "noreviewinfo", NULL);
    }
} else {
    make_response(200, "no_place_id", NULL);
}

function add_review_to_db() {
    GLOBAL $conn;
    GLOBAL $sql_query;
    GLOBAL $sql_info;
    $final_sql = $sql_query . $sql_info;

    if ($conn->query($final_sql) === TRUE) {
        make_response(200, "success", [$final_sql]);
    } else {
        make_response(500, "dbconnectionfailed", $conn->error);
    }
}

?>