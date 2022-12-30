<?php
include './config.php';

$type = $_GET['type'];
$status = $_GET['status'];

if (isset($_GET['value'])) {
    $query = "UPDATE electronic SET status = '" . $status . "', value = '" . $_GET['value'] . "' WHERE name = '" . $type . "'";
    mysqli_query($db, $query);
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
} else {
    $query = "UPDATE electronic SET status = '" . $status . "' WHERE name = '" . $type . "'";
    mysqli_query($db, $query);
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
}