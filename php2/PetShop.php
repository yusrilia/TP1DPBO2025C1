<?php
session_start(); // Mulai sesi

// Inisialisasi session produk jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

class PetShop {
    public $id, $nama, $kategori, $harga, $photo;

    public function __construct($id, $nama, $kategori, $harga, $photo) {
        $this->id = $id;
        $this->nama = $nama;
        $this->kategori = $kategori;
        $this->harga = $harga;
        $this->photo = $photo;
    }

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

// Jika ada input dari form, tambahkan ke session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $harga = $_POST['harga'] ?? 0;
    $photo = $_POST['photo'] ?? 'https://via.placeholder.com/80';

    $id = count($_SESSION['produk']) + 1;
    $newProduct = new PetShop($id, $nama, $kategori, $harga, $photo);
    $_SESSION['produk'][] = $newProduct;
}
?>
