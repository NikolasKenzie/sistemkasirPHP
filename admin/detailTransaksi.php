<?php 
require_once "../config/database.php";
require_once "../config/function.php";


$idTransaksi = $_GET['id'];
$queryDb = query("SELECT * FROM detail_transaksi WHERE id_transaksi = '$idTransaksi'");
$resultQuery = $queryDb;


?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Transaksi</title>
  <style>
    .container {
      max-width: 700px;
      margin: auto;
      background: #fff;
      padding: 25px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #2c3e50;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }

    th, td {
      padding: 10px 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #3498db;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .back-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 8px 16px;
      background-color: #2ecc71;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      transition: background-color 0.3s ease;
    }

    .back-btn:hover {
      background-color: #27ae60;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Detail Transaksi <?=$idTransaksi?></h2>

    <table>
      <thead>
        <tr>
          <th>Nama Menu</th>
          <th>Qty</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($resultQuery as $row) :?>
        <tr>
          <td><?=$row['nama_menu']?></td>
          <td><?=$row['qty']?></td>
          <td>Rp<?=$row['total']?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>

    <a href="index.php?page=dashboard" class="back-btn">← Kembali</a>
  </div>

</body>
</html>
