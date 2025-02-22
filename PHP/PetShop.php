<?php
session_start(); // mulai sesi

// inisialisasi session produk jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

class PetShop {
    // variabel atribut yang akan digunakan
    public $id, $nama, $kategori, $harga, $photo;

    // konstruktor untuk inisialisasi nilai awal
    public function __construct($id, $nama, $kategori, $harga, $photo) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->photo = $photo;
    }

    // method untuk menampilkan data produk
    public function printPetShop() {
        echo "<tr>
                <td>{$this->id}</td>
                <td>{$this->nama}</td>
                <td>{$this->kategori}</td>
                <td>Rp " . number_format($this->harga, 2, ',', '.') . "</td>
                <td><img src='{$this->photo}' alt='Foto Produk'></td>
              </tr>";
    }
}

// jika ada input dari form, tambahkan ke session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ambil data dari form
    $nama = $_POST['nama'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $photo = $_POST['photo'] ?? '';
    $kategori = $_POST['kategori'] ?? '';

    // tambahkan produk baru ke session
    $id = count($_SESSION['produk']) + 1; // id = jumlah produk + 1
    $newProduct = new PetShop($id, $nama, $kategori, $harga, $photo); // buat objek produk
    $_SESSION['produk'][] = $newProduct; // tambahkan produk ke session
}
?>
