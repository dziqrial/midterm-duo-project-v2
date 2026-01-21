# 📘 Panduan Penggunaan Aplikasi

## 1. Gambaran Umum

Aplikasi ini merupakan aplikasi web yang menyediakan informasi dan layanan berbasis akun pengguna.  
Terdapat dua jenis pengguna dalam aplikasi ini:

- **Pengguna Biasa (User)**
- **Pengguna dengan Role Admin**

Perbedaan hak akses ditentukan berdasarkan role akun yang digunakan saat login.

---

## 2. Akses Aplikasi

Pengguna dapat mengakses aplikasi melalui browser dengan alamat:

```
http://localhost/nama_folder_aplikasi
```

Saat pertama kali dibuka, pengguna akan diarahkan ke halaman **Beranda**.

---

## 3. Navigasi Halaman

Menu navigasi tersedia di bagian atas halaman, meliputi:

- **Beranda**
- **Program**
- **Edukasi**
- **Kontak**
- **Login / Daftar**

Pada perangkat mobile, menu dapat diakses melalui ikon **hamburger menu**.

---

## 4. Panduan untuk Pengguna Biasa (User)

DUMMY ACCOUNT siap pakai buat demo user role:

1.andi@gmail.com pw:andi1
2.bagas@gmail.com pw:bagas2
3.caca@gmail.com pw:caca3
4.deni@gmail.com pw:deni4
5.elsa@gmail.com pw:elsa5

### 4.1 Registrasi Akun

Pengguna yang belum memiliki akun dapat melakukan pendaftaran.

Langkah-langkah:

1. Klik tombol **Daftar**
2. Isi data:
   - Nama
   - Email
   - Password
3. Klik **Submit**
4. Akun berhasil dibuat dan dapat digunakan untuk login

---

### 4.2 Login Pengguna

1. Klik menu **Login**
2. Masukkan email dan password
3. Klik **Login**
4. Jika berhasil, pengguna akan masuk ke sistem

---

### 4.3 Menggunakan Aplikasi

Setelah login, pengguna dapat:

- Mengakses halaman Beranda
- Melihat informasi Program
- Mengakses halaman Edukasi
- Melihat informasi Kontak

Pengguna biasa **hanya dapat melihat informasi**, tanpa dapat mengubah data.

---

### 4.4 Logout

1. Klik tombol **Logout**
2. Pengguna akan keluar dari sistem
3. Untuk masuk kembali, pengguna harus login ulang

---

## 5. Panduan untuk Pengguna dengan Role Admin

DUMMY ACCOUNT untuk akses role admin:

1. admin@tarunadaya.com pw: admin123

### 5.1 Login sebagai Admin

Admin login menggunakan akun dengan hak akses admin.

Langkah-langkah:

1. Buka halaman **Login**
2. Masukkan email dan password admin
3. Klik **Login**
4. Admin berhasil masuk ke sistem

---

### 5.2 Hak Akses Admin

Selain fitur yang dimiliki pengguna biasa, admin memiliki hak akses tambahan untuk:

- Mengelola data program
- Melihat data anggota

---

### 5.3 Mengelola Data Program (CRUD)

Pada halaman **Program**, admin dapat melakukan operasi:

#### a. Menambah Program (Create)

1. Masuk ke halaman Program
2. Isi data program
3. Klik **Simpan**
4. Program baru akan ditampilkan

#### b. Mengubah Program (Edit)

1. Pilih program yang ingin diubah
2. Klik tombol **Edit**
3. Ubah data yang diperlukan
4. Klik **Simpan**
5. Data program diperbarui

#### c. Menghapus Program (Delete)

1. Pilih program yang ingin dihapus
2. Klik tombol **Hapus**
3. Konfirmasi penghapusan
4. Program akan dihapus dari sistem

---

### 5.4 Melihat Data Anggota

Admin dapat mengakses halaman **Admin Anggota** untuk:

- Melihat daftar anggota
- Melihat informasi dasar anggota seperti nama dan email

---

### 5.5 Logout Admin

1. Klik tombol **Logout**
2. Admin akan keluar dari sistem
3. Untuk mengakses kembali fitur admin, diperlukan login ulang

---

## 6. Keamanan dan Pembatasan Akses

- Fitur tambah, ubah, dan hapus program **hanya tersedia untuk admin**
- Pengguna biasa tidak dapat mengakses halaman admin
- Sistem otomatis membatasi akses berdasarkan role pengguna

---

## 7. Penutup

Panduan ini dibuat untuk membantu pengguna memahami cara menggunakan aplikasi, baik sebagai **pengguna biasa** maupun sebagai **admin**, tanpa memerlukan pengetahuan teknis.

Aplikasi ini masih dapat dikembangkan lebih lanjut sesuai kebutuhan.
