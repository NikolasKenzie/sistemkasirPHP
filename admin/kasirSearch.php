<?php
require_once "../config/database.php";
require_once "../config/function.php";
$keyword = $_GET['key'] ?? '';
$query = "SELECT * FROM list_menu WHERE nama_menu LIKE '%$keyword%'";

$results = query($query);
if (count($results) === 0) {
    echo "<div class='suggestion-item'>Tidak ditemukan</div>";
    exit;
}

foreach ($results as $row) {
    $nama = htmlspecialchars($row['nama_menu'], ENT_QUOTES, 'UTF-8');
    echo "<div class='suggestion-item' onclick=\"selectSuggestion('$nama')\">$nama</div>";
}
?>
