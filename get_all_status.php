<?php
include './config.php';

$myarray = array();
if ($result = mysqli_query($db, "SELECT * FROM electronic")) {
    while ($row = $result->fetch_object()) {
        array_push($myarray, $row);
    }
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($myarray);