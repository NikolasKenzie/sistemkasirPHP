<?php

require_once "../config/database.php";
require_once "../config/function.php";


if (!isset($_SESSION['listMenu'])) {
  $_SESSION['listMenu'] = [];
}
if (isset($_POST['add_product'])) {
  $namaMenu = $_POST['product_name'];
  $qty = (int) $_POST['product_qty'];

  $queryMenu = query("SELECT * FROM list_menu WHERE nama_menu = '$namaMenu'");

  if (!empty($queryMenu)) {
    $menu = $queryMenu[0];
    $found = false;

    foreach ($_SESSION['listMenu'] as $key => $item) {
      if ($item['nama_menu'] === $menu['nama_menu']) {

        $_SESSION['listMenu'][$key]['qty'] += $qty;
        $_SESSION['listMenu'][$key]['total'] = $menu['harga'] * $_SESSION['listMenu'][$key]['qty'];

        $found = true;
        break;
      }
    }
    if (!$found) {
      $_SESSION['listMenu'][] = [
        'nama_menu' => $menu['nama_menu'],
        'harga' => $menu['harga'],
        'qty' => $qty,
        'total' => $menu['harga'] * $qty,
      ];
    }
  }

  $listMenu = $_SESSION['listMenu'];
}

if (isset($_POST['reset_menu'])) {
  unset($_SESSION['listMenu']);
  unset($_SESSION['idTransaksi']);
  header("Location: index.php?page=kasirPage");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Halaman Kasir</title>

</head>

<body>
  <div class="kasir-container">
    <h1>Kasir </h1>
    <form id="product-form" action="index.php?page=kasirPage" method="POST"
      style="display: flex; gap: 10px; margin-bottom: 20px; position: relative;">
      <div style="flex:1; position: relative;">
        <input type="text" name="product_name" placeholder="Nama Produk" required style="width: 100%; padding: 8px;"
          id="inputSearch" autocomplete="off" />
        <div id="suggestionBox" style="position: absolute; top: 100%; left: 0; right: 0; 
            background: white; border: 1px solid #ccc; z-index: 1000; display: block; 
            max-height: 150px; overflow-y: auto;">
        </div>
      </div>
      <input type="number" name="product_qty" placeholder="Qty" value="1" min="1" required
        style="width: 80px; padding: 8px;" />
      <button type="submit" name="add_product" style="padding: 0 20px; cursor:pointer;">Tambah</button>
      <button type="button" onclick="confirmCetakStruk()" style="padding: 0 20px; cursor:pointer;">
        Cetak Struk
      </button>
    </form>
    <form method="POST" style="display:inline;">
      <button type="submit" name="reset_menu" onclick="return confirm('Yakin ingin mengosongkan daftar?')">
        Kosongkan Daftar
      </button>

    </form>

    <table style="width: 100%; border-collapse: collapse; margin-bottom: 15px;">
      <thead>
        <tr style="background: #333; color: white;">
          <th style="padding: 8px; border: 1px solid #ddd;">Produk</th>
          <th style="padding: 8px; border: 1px solid #ddd;">Harga (Rp)</th>
          <th style="padding: 8px; border: 1px solid #ddd;">Qty</th>
          <th style="padding: 8px; border: 1px solid #ddd;">Subtotal (Rp)</th>
        </tr>
      </thead>
      <?php
      $totalHarga = 0;

      ?>
      <?php if (!empty($listMenu)): ?>
        <tbody>
          <?php foreach ($listMenu as $row): ?>
            <tr>

              <td style="padding: 8px; border: 1px solid #ddd;"><?= $row['nama_menu'] ?></td>
              <td style="padding: 8px; border: 1px solid #ddd;"><?= $row['harga'] ?></td>
              <td style="padding: 8px; border: 1px solid #ddd;"><?= $row['qty'] ?></td>
              <td style="padding: 8px; border: 1px solid #ddd;"><?= $row['total'] ?></td>
              <?php
              // Tambahkan total ke totalHarga
              $totalHarga += $row['total'];
              ?>
            </tr>
          <?php endforeach ?>
          <?php $_SESSION['total_harga'] = $totalHarga; ?>
        </tbody>
      <?php endif ?>
    </table>
    <div style="text-align: right; font-weight: bold; font-size: 1.2rem; color: #333;">
      <h2>Total Rp<span><?= $totalHarga ?></span></h2>
    </div>
  </div>

  <!-- export to struk -->


  <script src="sistem/js/kasir.js"></script>
  <script>
  function confirmCetakStruk() {
    if (confirm('Apakah Anda yakin ingin mencetak struk?')) {
      window.location.href = 'index.php?page=cetakStruk';
    }
  }
</script>

</body>

</html>