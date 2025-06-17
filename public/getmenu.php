<?php
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

$keyword = $_GET['keyword'];
if ($keyword === '') {
    $query = "SELECT * FROM list_menu";
} else {
    $query = "
        SELECT * FROM list_menu WHERE
        nama_menu LIKE '%$keyword%' OR
        kategori LIKE '%$keyword%'";
}

$queryMenu = query($query);

?>
<?php foreach ($queryMenu as $menu): ?>
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition-shadow p-5">
        <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($menu['nama_menu']) ?></h3>
        <p class="text-gray-800 font-bold">Rp<?= htmlspecialchars($menu['harga']) ?></p>
        <p class="text-sm text-gray-500 mt-1 mb-2"><?= htmlspecialchars($menu['kategori']) ?></p>
        <p class="text-sm font-bold <?= $menu['ketersediaan'] ? 'text-green-600' : 'text-red-600' ?>">
            <?= $menu['ketersediaan'] ? 'tersedia' : 'kosong' ?>
        </p>
    </div>
<?php endforeach ?>