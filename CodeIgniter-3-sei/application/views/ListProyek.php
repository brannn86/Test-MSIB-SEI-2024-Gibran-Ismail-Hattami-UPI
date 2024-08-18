<!DOCTYPE html>
<html>

<head>
    <title>Daftar Proyek</title>
</head>

<body>
    <h1>Daftar Proyek</h1>
    <a href="<?= site_url('proyekcontroller/create') ?>">Tambah Proyek</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Proyek</th>
                <th>Client</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Pimpinan Proyek</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($proyek)): ?>
                <?php foreach ($proyek as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= $p['namaProyek'] ?></td>
                        <td><?= $p['client'] ?></td>
                        <td><?= $p['tglMulai'] ?></td>
                        <td><?= $p['tglSelesai'] ?></td>
                        <td><?= $p['pimpinanProyek'] ?></td>
                        <td><?= $p['keterangan'] ?></td>
                        <td>
                            <a href="<?= site_url('proyekcontroller/edit/' . $p['id']) ?>">Edit</a>
                            <a href="<?= site_url('proyekcontroller/delete/' . $p['id']) ?>"
                                onclick="return confirm('Hapus proyek ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">Data proyek tidak ditemukan.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>

</html>