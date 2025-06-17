<?php
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

$listMenu = query("SELECT * FROM list_menu");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Daftar Menu</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

  <section class="max-w-7xl mx-auto px-4 py-8">

    <div class="mb-6">
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <form method="GET" class="flex flex-col sm:flex-row gap-2 items-center">
          <input type="text" name="search" id="keywordMenu"
            placeholder="Cari menu..."
            class="border border-gray-300 rounded-md px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-64" />

          <label for="filter" class="text-gray-700 font-medium">Pilih Kategori:</label>
          <select name="kategori" id="filter"
            class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="semua">Semua</option>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
          </select>

          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm">Terapkan</button>
        </form>
      </div>
    </div>


    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3" id="container-menu">

    <?php foreach($listMenu as $menu) : ?>

      <div class="bg-white rounded-xl shadow hover:shadow-lg transition-shadow p-5">
        <h3 class="text-lg font-semibold mb-1"><?= htmlspecialchars($menu['nama_menu']) ?></h3>
        <p class="text-gray-800 font-bold">Rp<?= htmlspecialchars($menu['harga']) ?></p>
        <p class="text-sm text-gray-500 mt-1 mb-2"><?= htmlspecialchars($menu['kategori']) ?></p>
        <p class="text-sm font-bold <?= $menu['ketersediaan'] ? 'text-green-600' : 'text-red-600' ?>">
          <?= $menu['ketersediaan'] ? 'tersedia' : 'kosong' ?>
        </p>
      </div>
    <?php endforeach ?>
    </div>
  </section>
  <script src="assets/js/listmenu.js"></script>
</body>

</html>