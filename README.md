# pos-app
POS (Point of Sale) adalah sebuah sistem yang digunakan untuk mencatat dan memproses transaksi penjualan di toko atau bisnis retail. Sistem POS ini dapat membantu pengusaha untuk mengelola inventori dan stok barang, memproses transaksi penjualan, menghitung jumlah uang yang masuk.

#Cara menjalankan aplikasi
- Pastikan composer sudah terinstall
- buat database baru dan atur didalam file .env
- jalankan command php artisan migrate untuk membuat table
- jalankan command db:seeb --class=userData untuk membuat akun
- Akun:

  Admin: 
  username: admin,
  password: password
  role: admin
  
  Kasir:
  username: kasir,
  password: kasir,
  role: kasir
