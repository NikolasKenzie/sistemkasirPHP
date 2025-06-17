<?php
require __DIR__ . "/../../config/function.php";
require_once __DIR__ . "/../../config/database.php";

if (isset($_POST['btn-submitUlasan'])) {

    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $ulasan = $_POST['message'];

    $result = "INSERT INTO ulasan_pelanggan VALUES ('$email', '$subjek', '$ulasan')";
    mysqli_query($conn, $result);

    header("Location: ../index.php");
    exit;

}




?>