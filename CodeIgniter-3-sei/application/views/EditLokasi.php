<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lokasi</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e6e6e6;
            color: #000;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin: 30px;
        }

        .container {
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .btn-back {
            margin-top: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
        }

        .btn-group .btn {
            margin: 0 10px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<h1>Edit Lokasi</h1>
    <div class="container">
        <?php if (isset($lokasi) && is_array($lokasi)): ?>
            <form action="<?php echo site_url('lokasicontroller/update'); ?>" method="post">
                <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($lokasi['id']); ?>">
                <div class="form-group">
                    <label for="namaLokasi">Nama Lokasi:</label>
                    <input type="text" class="form-control" id="namaLokasi" name="namaLokasi"
                        value="<?php echo htmlspecialchars($lokasi['namaLokasi']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="negara">Negara:</label>
                    <input type="text" class="form-control" id="negara" name="negara"
                        value="<?php echo htmlspecialchars($lokasi['negara']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi:</label>
                    <input type="text" class="form-control" id="provinsi" name="provinsi"
                        value="<?php echo htmlspecialchars($lokasi['provinsi']); ?>" required>
                </div>
                <div class="form-group">
                    <label for="kota">Kota:</label>
                    <input type="text" class="form-control" id="kota" name="kota"
                        value="<?php echo htmlspecialchars($lokasi['kota']); ?>" required>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?php echo site_url(''); ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </form>

        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Data lokasi tidak ditemukan.
            </div>
        <?php endif; ?>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>