<?php

require_once "../config/database.php";
require_once "../config/function.php";

if (!isset($_SESSION['idTransaksi'])) {
    $id_transaksi = generateTransactionId();
    $_SESSION['idTransaksi'] = $id_transaksi;
} else {
    $id_transaksi = $_SESSION['idTransaksi'];
}

$tanggalTransaksi = date("d-m-Y H:i"); 

$listMenu = $_SESSION['listMenu'];
$totalHarga = $_SESSION['total_harga'];
$nama_kasir = $_SESSION['login']; 


if (isset($_POST['btn_cetakStruk'])) {

    $tanggal_mysql = date("Y-m-d H:i:s");

    //insert ke table riwayat_transaksi TUNG TUNG SAHUR  
    $query1 = "INSERT INTO riwayat_transaksi 
               (id_transaksi, tanggal, nama_kasir, total_harga, metode_pembayaran) 
               VALUES ('$id_transaksi', '$tanggal_mysql', '$nama_kasir', '$totalHarga', 'CASH')";

    $result1 = mysqli_query($conn, $query1);

    // insert ke table detail_transaksi BOMBARDIL) CROCODILO
    //NASGOR ENAK COK
    $isSuccess = true;
    foreach ($listMenu as $menu) {
        $nama_menu = mysqli_real_escape_string($conn, $menu['nama_menu']);
        $qty = (int)$menu['qty'];
        $total = (int)$menu['total'];

        $query2 = "INSERT INTO detail_transaksi 
                   (id_transaksi, nama_menu, qty, total) 
                   VALUES ('$id_transaksi', '$nama_menu', $qty, $total)";
        $result2 = mysqli_query($conn, $query2);
        if (!$result2) {
            $isSuccess = false;
            break;
        }
    }
    if ($result1 && $isSuccess) {
        unset($_SESSION['listMenu']);
        unset($_SESSION['total_harga']);
        unset($_SESSION['idTransaksi']);

        echo "<script>alert('Transaksi berhasil diproses')</script>";

        header("Location: index.php?page=kasirPage");
    } else {
        echo "<script>alert('Transaksi gagal diproses')</script>";
    }
    
}


if (isset($_POST['reset_menu'])) {
    unset($_SESSION['listMenu']);
    header("Location: index.php?page=kasirPage");
    exit;
}


// ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Struk Pembelian</title>
    <style>
        .struk-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
        }

        .struk-card {
            font-family: monospace;
            background-color: white;
            width: 300px;
            padding: 20px;
            border: 1px dashed #333;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .struk-header,
        .struk-footer {
            text-align: center;
            border-top: 1px dashed #333;
            border-bottom: 1px dashed #333;
            margin: 10px 0;
            padding: 5px 0;
        }

        .info {
            font-size: 13px;
            margin-bottom: 10px;
        }

        .info p {
            margin: 2px 0;
        }

        table {
            width: 100%;
            font-size: 13px;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        th,
        td {
            padding: 2px 0;
        }

        th {
            text-align: left;
            border-bottom: 1px dashed #333;
        }

        td:last-child,
        th:last-child {
            text-align: right;
        }

        .total-row {
            font-weight: bold;
            border-top: 1px dashed #333;
            margin-top: 10px;
            padding-top: 5px;
        }
    </style>
</head>

<body>

    <div class="struk-wrapper">
        <div class="struk-card">
            <div class="struk-header">
                <span>==========</span>
                <p><strong>STRUK PEMBELIAN</strong></p>
                <span>==========</span>

            </div>

            <div class="info">
                <p>ID Transaksi : <?= $_SESSION['idTransaksi'] ?></p>
                <p>Tanggal : <?= $tanggalTransaksi ?></p>
                <p>Kasir : <?= $nama_kasir ?></p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Ulangi baris <tr> ini -->
                    <?php foreach ($listMenu as $row): ?>
                        <tr>
                            <td><?= $row['nama_menu'] ?></td>
                            <td><?= $row['qty'] ?></td>
                            <td><?= $row['total'] ?></td>
                        </tr>
                    <?php endforeach ?>
                    
                </tbody>
            </table>

            <div class="total-row">
                <p>Total Bayar: Rp <?= (int) $totalHarga ?></p>
                <p>Metode Pembayaran: CASH</p>
            </div>

            <div class="struk-footer">
                <span>==============</span>
                <p><strong>TERIMA KASIH</strong></p>
                <span>==============</span>
            </div>
        </div>
    </div>
    
    <form action="" method="POST">
    <button type="submit" name="btn_cetakStruk">CETAK STRUK</button>
        <button type="submit" name="reset_menu" onclick="return confirm('Yakin ingin mengosongkan daftar?')">
            Kosongkan Daftar
        </button>
    </form>

</body>

</html>