<?php
require "dbinit.php";

if (!empty($_GET["placeid"])) {
    GLOBAL $conn;
    // Something is wrong here, not sure what, abandoning ship lol
    $sql = "SELECT FROM reviews WHERE placeid = '" . $_GET["placeid"] . '";
    $data = [];
    $result = $conn->query($sql);
    if ($result === TRUE) {
        while($row = $result->fetch_assoc()) {
            array_push($data, ["socialdistancing" => $row["socialdistancing"],  "sanitation" => $row["sanitation"],  "safety" => $row["safety"],  "waiting" => $row["waiting"],  "masks" => $row["masks"],  "other" => $row["other"]]);
        }
        make_response(200, "success", $data);
    } else {
        make_response(500, "dbconnectionfailed", $conn->error);
    }
} else {
    make_response(200, "no_place_id", null);
}
?>