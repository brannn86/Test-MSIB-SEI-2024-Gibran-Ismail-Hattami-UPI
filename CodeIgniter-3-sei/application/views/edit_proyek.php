<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Proyek</title>
</head>

<body>
    <h1>Edit Proyek</h1>
    <form action="<?php echo site_url('proyekcontroller/edit/' . $proyek['id']); ?>" method="post">
        <input type="hidden" id="id" name="id" value="<?php echo $proyek['id']; ?>">
        <label for="namaProyek">Nama Proyek:</label>
        <input type="text" id="namaProyek" name="nama_proyek" value="<?php echo $proyek['namaProyek']; ?>"><br><br>
        <label for="client">Client:</label>
        <input type="text" id="client" name="client" value="<?php echo $proyek['client']; ?>"><br><br>
        <label for="tglMulai">Tanggal Mulai:</label>
        <input type="date" id="tglMulai" name="tgl_mulai" value="<?php echo $proyek['tglMulai']; ?>"><br><br>
        <label for="tglSelesai">Tanggal Selesai:</label>
        <input type="date" id="tglSelesai" name="tgl_selesai" value="<?php echo $proyek['tglSelesai']; ?>"><br><br>
        <label for="pimpinanProyek">Pimpinan Proyek:</label>
        <input type="text" id="pimpinanProyek" name="pimpinan_proyek"
            value="<?php echo $proyek['pimpinanProyek']; ?>"><br><br>
        <label for="keterangan">Keterangan:</label>
        <input type="text" id="keterangan" name="keterangan" value="<?php echo $proyek['keterangan']; ?>"><br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>