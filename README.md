# Sistem Inventory

## Deskripsi:
Web Inventory Management System adalah platform berbasis web yang dirancang untuk mengoptimalkan manajemen persediaan barang. Sistem ini menyediakan antarmuka yang user-friendly untuk mencatat, memonitor, dan mengelola stok barang secara real-time. Fitur-fitur utama termasuk pencatatan masuk dan keluar barang, pengelolaan data supplier, pengaturan level stok minimum dan maksimum, pelaporan untuk kemudahan input data.

## Fitur Utama:

-Dashboard Interaktif: Menyediakan tampilan ringkas mengenai status persediaan terkini, termasuk jumlah stok, barang yang hampir habis, dan barang yang berlebihan.
-Manajemen Stok: Memungkinkan pengguna untuk menambahkan, mengedit, dan menghapus data barang dengan mudah, serta melacak pergerakan stok secara real-time.
-Pencatatan Transaksi: Mencatat setiap transaksi masuk dan keluar barang dengan detail seperti tanggal, jumlah, dan pihak terkait.
-Peringatan Stok: Memberikan notifikasi otomatis saat stok mencapai level minimum atau maksimum yang telah ditentukan, membantu mencegah kehabisan atau kelebihan stok.
-Laporan dan Analisis: Menghasilkan berbagai laporan seperti laporan stok barang, laporan transaksi, dan analisis tren stok untuk membantu pengambilan keputusan yang lebih baik.
-Pengelolaan Supplier: Menyimpan data dan riwayat transaksi dengan supplier, memudahkan dalam melakukan pemesanan ulang barang.

## Demo
### Tampilan Halaman Login
![Tampilan Halaman Tiket Yang Sudah Di Beli](https://github.com/oyot47/tugasweb-inventory/blob/master/public/login.png)

### Tampilan Halaman Dashboard Admin
![Tampilan Halaman Dashboard Admin](https://github.com/oyot47/tugasweb-inventory/blob/master/public/dashboard.png)

### Tampilan Halaman Dashboard Petugas
![Tampilan Halaman Home User](https://github.com/oyot47/tugasweb-inventory/blob/master/public/dashboar.png)


## Manfaat:

-Efisiensi Operasional: Mempercepat proses manajemen stok dan mengurangi kesalahan manual.
-Visibilitas Real-Time: Memberikan informasi terkini mengenai status persediaan, membantu dalam perencanaan dan pengambilan keputusan.
-Penghematan Biaya: Mengurangi risiko kehabisan stok atau kelebihan stok yang dapat menyebabkan kerugian finansial.
-Peningkatan Akurasi: Memastikan data persediaan selalu akurat dan up-to-date.

## Prasyarat
Sebelum menginstal proyek ini, pastikan Anda memiliki:
- PHP >= 8.0
- Composer
- Laravel >= 10
- Database MySQL
- XAMPP

## Instalasi
Ikuti langkah-langkah di bawah ini untuk menginstal dan menjalankan proyek ini di lingkungan lokal Anda.

1. **Clone Repository**
   ```
   git clone https://github.com/oyot47/tugasweb-inventory.git
   cd tugasweb-inventory
   ```

3. **Install dependencies**
   ```
   composer install
   npm install
   ```

5. **Generate Key Aplikasi**
   ```
   php artisan key:generate
   php artisan storage:link
   ```

7. **Migrasi dan Seed Database**
   ```
   php artisan migrate --seed
   ```

9. **Jalankan serve**
   ```
   php artisan serve
   ```


