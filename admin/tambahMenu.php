<?php 
require __DIR__ . "/../config/function.php";
require_once "../config/database.php";

if(isset($_POST['btn-submit'])) {
    $namaMenu = $_POST['nama_menu'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $ketersediaan = $_POST['ketersediaan'];

    $query = "INSERT INTO list_menu VALUES ('', '$namaMenu', '$kategori', '$harga', '$ketersediaan')";
    $result = mysqli_query($conn, $query);

    if($result > 0) {
        echo "
            <script>
                alert('Menu berhasil ditambahkan!');
                document.location.href = 'index.php?page=dashboard';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('data gagal ditambahkan');
            </script>
        ";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="assets/tambah-menu.css" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .form-section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .form-button {
            text-align: center;
            margin-top: 20px;
        }

        .btn-submit {
            background-color: #4CAF50;
            color: white;
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <section class="form-section">
        <div class="form-container">
            <h2>Tambah Menu Baru</h2>
            <form action="" method="POST" class="form-add-menu">
                <div class="form-group">
                    <label for="nama_menu">Nama Menu</label>
                    <input type="text" id="nama_menu" name="nama_menu" required />
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="makanan">Makanan</option>
                        <option value="minuman">Minuman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" id="harga" name="harga" required />
                </div>
                <div class="form-group">
                    <label for="ketersediaan">Ketersediaan</label>
                    <select id="ketersediaan" name="ketersediaan" required>
                        <option value="1">Tersedia</option>
                        <option value="0">Kosong</option>
                    </select>
                </div>
                <div class="form-button">
                    <button type="submit" class="btn-submit" 
                    onclick="return confirm('Anda yakin ingin menambah menu?')" 
                    id="btn-submit"                  
                    name="btn-submit">
                    Simpan Menu</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>