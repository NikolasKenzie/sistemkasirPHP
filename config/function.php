<?php 
$conn = mysqli_connect("localhost", "root", "", "restopro");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function generateTransactionId($prefix = "TRX") {
    $date = date("Ymd"); 
    $unique = substr(uniqid(), -5); 
    return $prefix . $date . strtoupper($unique);
}


?>