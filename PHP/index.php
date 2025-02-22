<?php
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
    $photo = $_POST['photo'];

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
            $_SESSION['produk'] = array_values($_SESSION['produk']);
            break;
        }
    }
}

// Ubah Produk
if (isset($_POST['update'])) {
    $updateId = $_POST['update_id'];
    foreach ($_SESSION['produk'] as &$p) {
        if ($p['id'] == $updateId) {
            $p['nama'] = $_POST['nama'];
            $p['kategori'] = $_POST['kategori'];
            $p['harga'] = $_POST['harga'];
            $p['photo'] = $_POST['photo'];
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
</head>
<body>
    <h2>🐾 PetShop Products </h2>
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
            color:rgb(255, 0, 140);
            text-shadow: 0px 0px 12px rgba(255, 0, 140, 0.8);
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

    <!-- Form Cari Produk -->
    <form method="POST">
        <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search) ?>">
        <button type="submit">🔍 Cari</button>
    </form>

    <!-- Form Tambah Produk -->
    <form method="POST">
        <h3>Tambah Produk 🛍️</h3>
        <input type="text" name="nama" placeholder="Nama" required>
        <input type="text" name="kategori" placeholder="Kategori" required>
        <input type="number" name="harga" placeholder="Harga" required>
        <input type="text" name="photo" placeholder="URL Foto" required>
        <button type="submit" name="add">➕ Tambah</button>
    </form>

    <!-- Daftar Produk -->
    <table border="1" width="80%" align="center">
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
            <td><img src="<?= $p['photo'] ?>" width="80"></td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="delete_id" value="<?= $p['id'] ?>">
                    <button type="submit" name="delete">🗑️ Hapus</button>
                </form>
                <button onclick="editProduk(<?= $p['id'] ?>, '<?= $p['nama'] ?>', '<?= $p['kategori'] ?>', <?= $p['harga'] ?>, '<?= $p['photo'] ?>')">✏️ Ubah</button>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <!-- Form Ubah Produk -->
    <div id="editForm" style="display:none;">
        <h3>Ubah Produk ✏️</h3>
        <form method="POST">
            <input type="hidden" id="update_id" name="update_id">
            <input type="text" id="update_nama" name="nama" required>
            <input type="text" id="update_kategori" name="kategori" required>
            <input type="number" id="update_harga" name="harga" required>
            <input type="text" id="update_photo" name="photo" required>
            <button type="submit" name="update">✔️ Simpan</button>
            <button type="button" onclick="document.getElementById('editForm').style.display='none'">❌ Batal</button>
        </form>
    </div>

    <script>
        function editProduk(id, nama, kategori, harga, photo) {
            document.getElementById('update_id').value = id;
            document.getElementById('update_nama').value = nama;
            document.getElementById('update_kategori').value = kategori;
            document.getElementById('update_harga').value = harga;
            document.getElementById('update_photo').value = photo;
            document.getElementById('editForm').style.display = 'block';
        }
    </script>
</body>
</html>
