<?php
include './config.php';

$type = $_GET['type'];

if (strpos($type, '=') === false) {
    $myarray = array();

    if ($result = mysqli_query($db, "SELECT * FROM electronic WHERE name = '" . $type . "'")) {
        while ($row = $result->fetch_object()) {
            array_push($myarray, $row);
        }
    }

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($myarray);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["message" => "Indicates of sql injection"]);
}