<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white">
            <h3>➕ Tambah Mahasiswa</h3>
        </div>
        <div class="card-body">
            <form id="studentForm" method="post" action="<?= base_url('students/store') ?>">
                <h5 class="text-primary">🔑 Akun User</h5>
                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                    <div class="invalid-feedback">Username wajib diisi!</div>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">Email wajib diisi dan valid!</div>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Password wajib diisi!</div>
                </div>

                <hr>
                <h5 class="text-primary">📋 Identitas Mahasiswa</h5>
                <div class="mb-3">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" required>
                    <div class="invalid-feedback">NIM wajib diisi!</div>
                </div>
                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" name="full_name" class="form-control" required>
                    <div class="invalid-feedback">Nama lengkap wajib diisi!</div>
                </div>
                <div class="mb-3">
                    <label>Usia</label>
                    <input type="number" name="age" class="form-control" required>
                    <div class="invalid-feedback">Usia wajib diisi!</div>
                </div>
                <div class="mb-3">
                    <label>Entry Year</label>
                    <input type="number" name="entry_year" class="form-control" required>
                    <div class="invalid-feedback">Tahun masuk wajib diisi!</div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('students') ?>" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
