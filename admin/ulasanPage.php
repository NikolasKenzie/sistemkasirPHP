<?php
require_once "../config/database.php";
require_once "../config/function.php";

$queryUlasan = query("SELECT * FROM ulasan_pelanggan");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ulasan Pelanggan - Admin</title>
    <link rel="stylesheet" href="assets/ulasan-admin.css" />
</head>

<body>

    <section class="ulasan-admin-section">
        <div class="ulasan-container">
            <h2>Daftar Ulasan Pelanggan</h2>

            <div class="ulasan-list">
                <?php foreach ($queryUlasan as $ulasan): ?>
                    <div class="ulasan-card">
                        <p class="email"><strong>Email:</strong><?= $ulasan['email'] ?></p>
                        <p class="subjek"><strong>Subjek:</strong> <?= $ulasan['subjek'] ?></p>
                        <p class="isi-ulasan"><strong>Ulasan: </strong><?= $ulasan['ulasan'] ?></p>



                        <!-- <div class="ulasan-actions">
                            <button class="btn-highlight">Tandai Penting</button>
                            <button class="btn-delete">Hapus</button>
                        </div> -->
                    </div>
                <?php endforeach ?>

                <!-- Tambahkan ulasan lain dengan PHP -->
            </div>
        </div>
    </section>

</body>

</html>