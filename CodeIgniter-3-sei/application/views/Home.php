<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Daftar Proyek dan Lokasi</title>
</head>

<body>
    <h1>Daftar Proyek</h1>
    <ul>
        <?php foreach ($proyek as $p): ?>
            <li><?php echo $p->namaProyek; ?> - <?php echo $p->client; ?></li>
        <?php endforeach; ?>
    </ul>
    <h1>Daftar Lokasi</h1>
    <ul>
        <?php foreach ($lokasi as $l): ?>
            <li><?php echo $l->namaLokasi; ?> - <?php echo $l->kota; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>