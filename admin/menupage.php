<?php
require_once "../config/database.php";
require_once "../config/function.php";

$listMenu = query("SELECT * FROM list_menu");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/menu.css" />
  <title>List Menu</title>
</head>

<body>
  <section class="menu-table-section">
    <div class="menu-table-container">
      <h2>Daftar Menu</h2>

      <!-- Search Box -->
      <div class="menu-search">
        <input type="text" id="searchMenu" placeholder="Cari nama menu..." name="search-keyword">
      </div>
      <!-- Tombol Tambah Menu -->
      <div class="menu-action">
        <button onclick="window.location.href='tambahMenu.php'">Tambah Menu</button>
      </div>


      <!-- Tabel Menu -->
      <div id="container-table">
        <table class="menu-table">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Harga</th>
              <th>Ketersediaan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($listMenu as $menu): ?>
              <tr>
                <td><?= $menu['nama_menu'] ?></td>
                <td><?= $menu['kategori'] ?></td>
                <td><?= $menu['harga'] ?></td>
                <td><?= $menu['ketersediaan'] ? 'tersedia' : 'kosong' ?></td>
                <td>
                  <a href="editMenu.php?id=<?=$menu['ID']?>"><button class="btn-edit">Edit</button></a>
                  <a href="hapusMenu.php?id=<?=$menu['ID']?>"><button class="btn-delete" onclick="return confirm('Apakah anda yakin untuk menghapus menu?')">Hapus</button></a>
                </td>
              </tr>
            <?php endforeach ?>
            
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <script src="sistem/js/menu.js"></script>
</body>

</html>