<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Proyek</title>
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
<h1>Edit Proyek</h1>
    <div class="container">
        <form action="<?php echo site_url('proyekcontroller/edit/' . $proyek['id']); ?>" method="post">
            <input type="hidden" id="id" name="id" value="<?php echo htmlspecialchars($proyek['id']); ?>">

            <div class="form-group">
                <label for="namaProyek">Nama Proyek:</label>
                <input type="text" class="form-control" id="namaProyek" name="nama_proyek"
                    value="<?php echo htmlspecialchars($proyek['namaProyek']); ?>" required>
            </div>

            <div class="form-group">
                <label for="client">Client:</label>
                <input type="text" class="form-control" id="client" name="client"
                    value="<?php echo htmlspecialchars($proyek['client']); ?>" required>
            </div>

            <div class="form-group">
                <label for="tglMulai">Tanggal Mulai:</label>
                <input type="date" class="form-control" id="tglMulai" name="tgl_mulai"
                    value="<?php echo htmlspecialchars(substr($proyek['tglMulai'], 0, 10)); ?>" required>
            </div>

            <div class="form-group">
                <label for="tglSelesai">Tanggal Selesai:</label>
                <input type="date" class="form-control" id="tglSelesai" name="tgl_selesai"
                    value="<?php echo htmlspecialchars(substr($proyek['tglSelesai'], 0, 10)); ?>" required>
            </div>

            <div class="form-group">
                <label for="pimpinanProyek">Pimpinan Proyek:</label>
                <input type="text" class="form-control" id="pimpinanProyek" name="pimpinan_proyek"
                    value="<?php echo htmlspecialchars($proyek['pimpinanProyek']); ?>" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="4"
                    required><?php echo htmlspecialchars($proyek['keterangan']); ?></textarea>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="<?= site_url('') ?>" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>