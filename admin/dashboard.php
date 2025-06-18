<?php
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

$db = "SELECT COUNT(*) AS total FROM riwayat_transaksi";
$queryCountTransaksi = mysqli_query($conn, $db);
$row = mysqli_fetch_assoc($queryCountTransaksi);
$totalTransaksi = $row['total'];

$queryRiwayatTransaksi = query("SELECT * FROM riwayat_transaksi");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="assets/dashboard.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body>
  <section class="dashboard-section">
    <div class="dashboard-container">

      <div class="summary-boxes">
        <div class="summary-card">
          <i class="fas fa-receipt"></i>
          <div class="summary-info">
            <h3><?= $totalTransaksi ?></h3>
            <p>Total Order Hari Ini</p>
          </div>
        </div>
      </div>

      <!-- Riwayat Transaksi -->
      <div class="transaction-history">
        <div class="transaction-header">

          <h2>Riwayat Transaksi</h2>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Cari ID Transaksi atau Nama Kasir..." id="inputSearch">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="table-container">
          <table class="transaction-table">
            <thead>
              <tr>
                <!-- <th>No</th> -->
                <th>Order ID</th>
                <th>Tanggal</th>
                <th>Nama Kasir</th>
                <th>Total Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="table-body">
              <?php foreach ($queryRiwayatTransaksi as $row) : ?>
                <tr>
                  <!-- <td>1</td> -->
                  <td><?= $row['id_transaksi'] ?></td>
                  <td><?= $row['tanggal'] ?></td>
                  <td><?= $row['nama_kasir'] ?></td>
                  <td><?= $row['total_harga'] ?></td>
                  <td>
                    <a href="index.php?page=detailTransaksi&id=<?= $row['id_transaksi'] ?>">
                      <button class="btn-detail"> Cek Detail</button>
                    </a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </section>
  <script src="sistem/js/searchRiwayatTransaksi.js"></script>
</body>

</html>