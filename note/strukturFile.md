/resto-pro/
│
├── /public/                # Halaman pelanggan
│   ├── index.php           # Landing page/menu
│   ├── order.php           # Form pemesanan
│   ├── reservasi.php       # Reservasi meja
│   ├── ulasan.php          # Kirim ulasan
│   └── assets/             # Aset frontend pelanggan (css, js, img)
│
├── /admin/                 # Halaman khusus admin/bos
│   ├── index.php           # Dashboard bos
│   ├── laporan.php         # Laporan keuangan
│   ├── menu.php            # Manajemen menu & stok
│   ├── login.php           # Login admin
│   └── assets/             # Aset khusus admin (chart.js, table styling, dll)
│
├── /app/                   # Logic bersama (backend)
│   ├── controllers/        # Digunakan oleh public & admin
│   ├── models/
│   └── views/              # Bisa dipisah juga kalau mau
│
├── /config/
│   └── database.php        # Koneksi database
│
├── /storage/               # Simpan hasil ekspor, log, gambar upload
│
└── .htaccess               # Atur akses dan routing

===bagian admin===
/admin
  ├── index.php           ← Dashboard admin
  ├── login.php           ← Halaman login admin
  ├── logout.php          ← Proses logout
  ├── tambah_menu.php     ← Form tambah data menu
  ├── edit_menu.php       ← Edit data menu
  ├── hapus_menu.php      ← Proses hapus
  ├── menu.php            ← List semua menu (CRUD)
  ├── config/             ← Bisa re-use config dari folder utama
  └── assets/             ← Optional untuk styling

