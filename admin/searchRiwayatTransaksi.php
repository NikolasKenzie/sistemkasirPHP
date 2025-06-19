<?php
require_once "../config/database.php";
require_once "../config/function.php";

$keyword = $_GET['keyword'];
$query = "SELECT * FROM riwayat_transaksi 
                WHERE 
                id_transaksi LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                nama_kasir LIKE '%$keyword%' OR
                total_harga LIKE '%$keyword%' OR
                metode_pembayaran LIKE '%$keyword%'
            ";
$resultSuggest = query($query);
?>
<tbody class="table-body">
    <?php foreach ($resultSuggest as $row) : ?>
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