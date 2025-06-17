==dasboard==
1. 1. ✅ Informasi Ringkas (Statistik Cepat)
Tampilkan ringkasan dalam bentuk card atau box:

🔢 Jumlah total menu

📦 Jumlah stok tersedia / kosong

💰 Total transaksi hari ini

🧾 Total pendapatan hari ini

👤 Admin yang sedang login

2. 📋 Manajemen Menu
Fitur CRUD (Create, Read, Update, Delete):

Tambah menu baru

Edit harga, kategori, ketersediaan

Hapus menu

3. 💵 Sistem Kasir
Fitur kasir langsung dari dashboard:

Pencarian menu

Tambah ke keranjang

Hitung total otomatis

Proses pembayaran (tunai / QR)

Simpan transaksi

4. 📊 Riwayat Transaksi
Tabel log transaksi:

Filter berdasarkan tanggal

Detail: waktu, total, kasir

Bisa ekspor ke Excel atau cetak

5. 👨‍💻 Manajemen Admin (opsional)
Tambah akun admin baru

Ganti password

Logout

🔧 Fitur Teknis yang Direkomendasikan
Live Search menu

AJAX tanpa reload (untuk kasir/menu)

Konfirmasi sebelum hapus

Notifikasi sukses/gagal (pakai toast atau alert)

Responsive layout (Tailwind/Grid/Flexbox)

Akses dibatasi hanya untuk admin (cek cookie/session)


array(2) { 
    [0]=> array(4) { 
        ["nama_menu"]=> string(5) "Katsu" ["harga"]=> string(5) "18000" ["qty"]=> int(1) ["total"]=> int(18000) 
        } 

    [1]=> array(4) { 
        ["nama_menu"]=> string(16) "Nasi Ayam Geprek" ["harga"]=> string(5) "15000" ["qty"]=> int(2) ["total"]=> int(30000)
    } 
}

id_transaksi
tanggal
total_harga
metode_pembayaran
nama_kasir