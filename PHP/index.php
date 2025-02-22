<?php

// session_start();
// session_destroy(); // Hapus session lama
// session_start();   // Mulai session baru
// $_SESSION['produk'] = []; // Reset daftar produk

session_start();

// Inisialisasi daftar produk jika belum ada
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// Tambah Produk
if (isset($_POST['add'])) {
    $id = count($_SESSION['produk']) + 1;
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $photo = $_POST['photo']; // URL foto produk

    $_SESSION['produk'][] = [
        'id' => $id,
        'nama' => $nama,
        'kategori' => $kategori,
        'harga' => $harga,
        'photo' => $photo
    ];
}

// Hapus Produk
if (isset($_POST['delete'])) {
    $deleteId = $_POST['delete_id'];
    foreach ($_SESSION['produk'] as $key => $p) {
        if ($p['id'] == $deleteId) {
            unset($_SESSION['produk'][$key]);
            $_SESSION['produk'] = array_values($_SESSION['produk']); // Re-index array
            break;
        }
    }
}

// Cari Produk
$search = isset($_POST['search']) ? strtolower($_POST['search']) : '';
$filteredProduk = array_filter($_SESSION['produk'], function ($p) use ($search) {
    return strpos(strtolower($p['nama']), $search) !== false || strpos(strtolower($p['kategori']), $search) !== false;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetShop 🐾</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #2A0038, #7A0A6E);
            text-align: center;
            color:rgb(255, 255, 255);
            margin: 0;
            padding: 0;
        }

        h2 {
            font-size: 28px;
            font-weight: 600;
            color: #FF00FF;
            text-shadow: 0px 0px 12px rgba(255, 0, 255, 0.8);
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(255, 0, 255, 0.3);
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        th, td {
            padding: 12px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.2);
            color:rgb(255, 255, 255);
        }

        th {
            background: rgba(255, 0, 255, 0.5);
            font-weight: 600;
            color: #FFF;
        }

        tr:hover {
            background: rgba(255, 105, 180, 0.2);
        }

        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }

        form {
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            margin: 20px auto;
            width: 50%;
            border-radius: 12px;
            box-shadow: 0px 8px 16px rgba(255, 0, 255, 0.3);
            backdrop-filter: blur(15px);
        }

        input, button {
            padding: 12px;
            margin: 10px;
            width: 90%;
            border: none;
            border-radius: 8px;
            font-size: 16px;
        }

        input {
            background: rgba(255, 255, 255, 0.3);
            color:rgb(255, 255, 255);
            border-bottom: 2px solid #FF00FF;
        }

        button {
            background: #FF1493;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            border-radius: 20px;
            box-shadow: 0px 4px 8px rgba(255, 20, 147, 0.5);
        }

        button:hover {
            background: #FF00FF;
            transform: scale(1.05);
            box-shadow: 0px 6px 12px rgba(255, 20, 147, 0.7);
        }

        .search-container {
            margin: 20px auto;
            width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .search-container input {
            width: 70%;
            padding: 12px;
            border-radius: 10px 0 0 10px;
            border-right: none;
        }

        .search-container button {
            width: 30%;
            padding: 12px;
            border-radius: 0 10px 10px 0;
            border-left: none;
        }
    </style>
</head>
<body>

    <h2>🐾 PetShop - Manajemen Produk</h2>

    <!-- Form Tambah Produk -->
    <form method="POST">
        <h3>Tambah Produk 🛍️</h3>
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="number" name="harga" placeholder="Harga (Rp)" required>
        <input type="text" name="photo" placeholder="URL Foto" required>
        <button type="submit" name="add">➕ Tambah Produk</button>
    </form>

    <!-- Search Bar -->
    <form method="POST" class="search-container">
        <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">🔍 Cari</button>
    </form>

    <!-- Daftar Produk -->
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($filteredProduk as $p) : ?>
        <tr>
            <td><?= $p['id'] ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['kategori'] ?></td>
            <td>Rp<?= number_format($p['harga'], 0, ',', '.') ?></td>
            <td><img src="<?= $p['photo'] ?>" alt="Foto Produk"></td>
            <td>
                <form method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                    <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
                    <button type="submit" name="delete">🗑️ Hapus</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
