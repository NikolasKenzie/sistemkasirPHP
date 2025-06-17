<?php 
require_once "../config/database.php";
require_once "../config/function.php";

$idMenu = $_GET['id'];

$deleteMenu = "DELETE FROM list_menu WHERE ID = '$idMenu'";
$result = mysqli_query($conn, $deleteMenu);
header("Location: index.php?page=menupage");



?>