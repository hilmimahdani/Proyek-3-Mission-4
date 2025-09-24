<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Courses</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Daftar Courses</h2>

    <!-- Notifikasi sukses/error -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Tombol tambah khusus admin -->
    
    <?php if (session()->get('role') === 'admin'): ?>
        <a href="<?= base_url('courses/create') ?>" class="btn btn-success mb-3">+ Tambah Course</a>
    <?php endif; ?>

    <!-- Tabel Courses -->
    <form id="enrollForm" method="post" action="<?= base_url('courses/enroll') ?>"> <!-- Ubah action ke enroll, tapi JS handle -->
    
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <?php if (session()->get('role') !== 'admin'): ?>
                    <th>Pilih</th>
                <?php endif; ?>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>SKS</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($courses as $c): ?>
                <tr>
                    <?php if (session()->get('role') !== 'admin'): ?>
                            <td><input type="checkbox" name="courses[]" value="<?= $c['id'] ?>" data-sks="<?= $c['sks'] ?>"></td>
                    <?php endif; ?>
                    <td><?= esc($c['name']) ?></td>
                    <td><?= esc($c['description']) ?></td>
                    <td><?= esc($c['sks']) ?></td>
                    <td>
                        <a href="<?= base_url('courses/detail/'.$c['id']) ?>" class="btn btn-info btn-sm">Detail</a>

                        <?php if (session()->get('role') === 'admin'): ?>
                            <a href="<?= base_url('courses/edit/'.$c['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                           
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="<?= $c['id'] ?>" data-name="<?= esc($c['name']) ?>" data-sks="<?= $c['sks'] ?>">Delete</button>
                            


                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (session()->get('role') !== 'admin'): ?>
            <div class="mb-3">
                <strong>Total SKS: <span id="totalSks">0</span></strong>
            </div>
            <button type="submit" class="btn btn-primary">Enroll Selected</button>
        <?php endif; ?>
    </form>

    <!-- Tombol kembali -->
    <a href="<?= base_url('home') ?>" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
</div>

<!-- Custom Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Yakin hapus course <span id="courseName"></span> dengan SKS <span id="courseSks"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="confirmDelete" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- JS Data -->
<script>
    const coursesData = <?= json_encode($courses) ?>; // Array of objects untuk courses
</script>
<script src="<?= base_url('assets/js/app.js') ?>"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
