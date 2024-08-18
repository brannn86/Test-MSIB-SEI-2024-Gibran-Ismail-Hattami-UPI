<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Lokasi</title>
</head>

<body>
    <h1>Daftar Lokasi</h1>
    <a href="<?php echo site_url('lokasicontroller/create'); ?>">Tambah Lokasi Baru</a>

    <?php if (isset($lokasi) && is_array($lokasi)): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama Lokasi</th>
                <th>Negara</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($lokasi as $lok): ?>
                <tr>
                    <td><?php echo htmlspecialchars($lok['id']); ?></td>
                    <td><?php echo htmlspecialchars($lok['namaLokasi']); ?></td>
                    <td><?php echo htmlspecialchars($lok['negara']); ?></td>
                    <td><?php echo htmlspecialchars($lok['provinsi']); ?></td>
                    <td><?php echo htmlspecialchars($lok['kota']); ?></td>
                    <td>
                        <a href="<?php echo site_url('lokasicontroller/edit/' . $lok['id']); ?>">Edit</a>
                        <a href="<?php echo site_url('lokasicontroller/delete/' . $lok['id']); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Data lokasi tidak ditemukan.</p>
    <?php endif; ?>
</body>

</html>