<?php
require_once "../config/database.php";
require_once "../config/function.php";

$keyword = $_GET['keyword'];
$query = "
        SELECT * FROM list_menu WHERE
        nama_menu LIKE '%$keyword%' OR
        kategori LIKE '%$keyword%'
        ";
$queryMenu = query($query);
?>
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

        <?php foreach ($queryMenu as $menu): ?>
            <tr>
                <td><?= $menu['nama_menu'] ?></td>
                <td><?= $menu['kategori'] ?></td>
                <td><?= $menu['harga'] ?></td>
                <td><?= $menu['ketersediaan'] ? 'tersedia' : 'kosong'?></td>
                <td>
                <a href="editMenu.php?id=<?=$menu['ID']?>"><button class="btn-edit">Edit</button></a>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
        <?php endforeach ?>


    </tbody>
</table>