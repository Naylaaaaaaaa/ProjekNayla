Sistem Manajemen Penjualan dan Order Produk adalah aplikasi berbasis web yang dirancang untuk membantu pengelolaan penjualan produk dan pemrosesan order secara efisien. Sistem ini mendukung tiga jenis role pengguna:
1.	Admin: Pengelola utama aplikasi yang memiliki akses penuh untuk mengatur pengguna, produk, pesanan, kategori, serta melihat laporan transaksi.
2.	Customer (Pelanggan): Pengguna yang dapat melihat produk, melakukan pemesanan, memberikan ulasan, serta melacak status pesanan mereka.
3.	Kurir: Petugas pengiriman yang dapat melihat daftar pesanan yang harus dikirim, memperbarui status pengiriman, dan mencatat waktu pengiriman.

Fitur utama dari aplikasi ini termasuk:
1.	Pengelolaan Produk oleh Admin
2.	Pemesanan Produk oleh Customer
3.	Sistem Manajemen Pengguna dan Hak Akses oleh Admin

Fitur utama
1.	Autentikasi Pengguna: Pengguna dapat melakukan pendaftaran, masuk ke dalam sistem, dan mengelola profil mereka sesuai dengan peran (admin, customer, atau kurir).
2.	Pengelolaan Produk: Admin dapat menambahkan produk baru, mengedit detail produk, menghapus produk yang tidak tersedia, serta mengelola stok dan harga produk.
3.	Pemesanan dan Pembelian Produk: Customer dapat melihat daftar produk, menambahkan produk ke dalam keranjang, melakukan pemesanan, serta memantau status pesanan mereka.
4.	Pengelolaan Order dan Pengiriman: Admin dapat melihat semua pesanan yang masuk, memproses pesanan, menetapkan kurir untuk pengiriman, dan memperbarui status pesanan.
5.	Manajemen Role Akses: Sistem mendukung tiga peran pengguna utama: Admin, Customer, dan Kurir. Setiap peran memiliki hak akses dan tampilan yang berbeda sesuai fungsinya.
6.	Pencarian Produk: Customer dapat mencari produk berdasarkan nama atau kategori untuk memudahkan proses pembelian.
7.	Laporan Penjualan: Admin dapat melihat riwayat transaksi penjualan, laporan pendapatan, dan status pengiriman secara berkala.

<h2>A. Tabel Users (Pengguna)</h2>
  <table>
    <tr><th>Field</th><th>Tipe Data</th><th>Keterangan</th></tr>
    <tr><td>id</td><td>BIGINT (PK)</td><td>Primary key (auto increment)</td></tr>
    <tr><td>name</td><td>VARCHAR</td><td>Nama lengkap pengguna</td></tr>
    <tr><td>email</td><td>VARCHAR</td><td>Email unik pengguna (digunakan untuk login)</td></tr>
    <tr><td>passwod</td><td>VARCHAR</td><td>Password terenkripsi (bcrypt)</td></tr>
    <tr><td>role</td><td>ENUM</td><td>Peran: 'admin', 'customer', 'kurir'</td></tr>
    <tr><td>phone_Number</td><td>VARCHAR</td><td>Nomor HP pengguna</td></tr>
    <tr><td>address</td><td>TEXT</td><td>Alamat pengguna</td></tr>
    <tr><td>email_verified_at</td><td>TIMESTAMP</td><td>Tanggal verifikasi email</td></tr>
    <tr><td>remember_token</td><td>VARCHAR</td><td>Token untuk “remember me”</td></tr>
    <tr><td>created_at</td><td>TIMESTAMP</td><td>Otomatis diisi Laravel</td></tr>
    <tr><td>updated_at</td><td>TIMESTAMP</td><td>Otomatis diisi Laravel</td></tr>
  </table>

  <h2>B. Tabel Products (Produk)</h2>
  <table>
    <tr><th>Field</th><th>Tipe Data</th><th>Deskripsi</th></tr>
    <tr><td>id</td><td>INT AUTO_INCREMENT</td><td>ID unik produk</td></tr>
    <tr><td>name</td><td>VARCHAR(255)</td><td>Nama produk</td></tr>
    <tr><td>description</td><td>TEXT</td><td>Deskripsi produk</td></tr>
    <tr><td>price</td><td>DECIMAL(10,2)</td><td>Harga produk</td></tr>
    <tr><td>stock</td><td>INT</td><td>Jumlah stok produk</td></tr>
    <tr><td>category_id</td><td>INT</td><td>ID kategori produk (FK ke categories)</td></tr>
    <tr><td>image</td><td>VARCHAR(255)</td><td>URL/path gambar produk</td></tr>
    <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu produk ditambahkan</td></tr>
    <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu data diperbarui</td></tr>
  </table>

  <h2>C. Tabel Couriers (Kurir)</h2>
  <table>
    <tr><th>Field</th><th>Tipe Data</th><th>Deskripsi</th></tr>
    <tr><td>id</td><td>INT AUTO_INCREMENT</td><td>ID unik kurir</td></tr>
    <tr><td>user_id</td><td>INT</td><td>Foreign key ke users.id</td></tr>
    <tr><td>vehicle_type</td><td>VARCHAR(100)</td><td>Jenis kendaraan</td></tr>
    <tr><td>vehicle_plate</td><td>VARCHAR(50)</td><td>Nomor plat kendaraan</td></tr>
    <tr><td>status</td><td>ENUM</td><td>'available', 'on_delivery', 'inactive'</td></tr>
    <tr><td>phone_number</td><td>VARCHAR(20)</td><td>Nomor telepon kurir</td></tr>
    <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu dibuat</td></tr>
    <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu diperbarui</td></tr>
  </table>

  <h2>D. Tabel Orders (Pesanan)</h2>
  <table>
    <tr><th>Field</th><th>Tipe Data</th><th>Deskripsi</th></tr>
    <tr><td>id</td><td>INT AUTO_INCREMENT</td><td>ID unik pesanan</td></tr>
    <tr><td>customer_id</td><td>INT</td><td>FK ke users.id</td></tr>
    <tr><td>courier_id</td><td>INT (nullable)</td><td>FK ke users.id</td></tr>
    <tr><td>order_date</td><td>TIMESTAMP</td><td>Tanggal dan waktu pemesanan</td></tr>
    <tr><td>status</td><td>ENUM</td><td>'pending', 'processed', 'shipped', 'completed', 'cancelled'</td></tr>
    <tr><td>total_price</td><td>DECIMAL(10,2)</td><td>Total harga seluruh item</td></tr>
    <tr><td>shipping_address</td><td>TEXT</td><td>Alamat pengiriman</td></tr>
    <tr><td>created_at</td><td>TIMESTAMP</td><td>Waktu dibuat</td></tr>
    <tr><td>updated_at</td><td>TIMESTAMP</td><td>Waktu diperbarui</td></tr>
  </table>

  <h2>E. Tabel Order_Items (Item dalam Pesanan)</h2>
  <table>
    <tr><th>Field</th><th>Tipe Data</th><th>Deskripsi</th></tr>
    <tr><td>id</td><td>INT AUTO_INCREMENT</td><td>ID unik item</td></tr>
    <tr><td>order_id</td><td>INT</td><td>FK ke orders.id</td></tr>
    <tr><td>product_id</td><td>INT</td><td>FK ke products.id</td></tr>
    <tr><td>quantity</td><td>INT</td><td>Jumlah item dipesan</td></tr>
    <tr><td>unit_price</td><td>DECIMAL(10,2)</td><td>Harga satuan saat pesan</td></tr>
    <tr><td>subtotal</td><td>DECIMAL(10,2)</td><td>Total = quantity × unit_price</td></tr>
  </table>

  <h2>Relasi Antar Tabel</h2>
  <ul>
    <li>Users → Orders: One-to-Many</li>
    <li>Orders → Order_Items: One-to-Many</li>
    <li>Products → Order_Items: One-to-Many</li>
    <li>Products → Categories: Many-to-One</li>
    <li>Users → Logs: One-to-Many</li>
    <li>Orders → Payments: One-to-One</li>
    <li>Users → Couriers: One-to-One</li>
    <li>Orders → Couriers: Many-to-One</li>
  </ul>