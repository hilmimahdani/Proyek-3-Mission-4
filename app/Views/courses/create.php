<!DOCTYPE html>
<html>
<head>
    <title>Tambah Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Course</h2>
    <form method="post" action="<?= base_url('courses/store') ?>">
        <div class="mb-3">
            <label>Nama Course</label>
            <input type="text" name="name" class="form-control" required>
            <div class="invalid-feedback">Nama wajib diisi!</div>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" required></textarea>
            <div class="invalid-feedback">Deskripsi wajib diisi!</div>
        </div>
        <div class="mb-3">
            <label>SKS</label>
            <input type="number" name="sks" class="form-control" value="3" required>
            <div class="invalid-feedback">SKS wajib diisi!</div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= base_url('courses') ?>" class="btn btn-secondary">Batal</a>
    </form>
    <script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
