<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3>👨‍🎓 Daftar Mahasiswa</h3>
            <a href="<?= base_url('students/create') ?>" class="btn btn-light btn-sm">+ Tambah Mahasiswa</a>
        </div>
        <div class="card-body">
            <?php if(session()->getFlashdata('success')): ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Entry Year</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($students)): ?>
                        <?php foreach($students as $s): ?>
                            <tr>
                                <td><?= esc($s['nim']) ?></td>
                                <td><?= esc($s['full_name']) ?></td>
                                <td><?= esc($s['age']) ?></td>
                                <td><?= esc($s['entry_year']) ?></td>
                                <td><?= esc($s['username']) ?></td>
                                <td><?= esc($s['email']) ?></td>
                                <td>
                                    <a href="<?= base_url('students/edit/'.$s['student_id']) ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm student-delete-btn" data-id="<?= $s['student_id'] ?>" data-name="<?= esc($s['full_name']) ?>">🗑 Hapus</button>
                       
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="7" class="text-center text-muted">Belum ada mahasiswa</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <a href="<?= base_url('home') ?>" class="btn btn-secondary">⬅ Kembali ke Dashboard</a>
        </div>
    </div>
</div>

<!-- Student Delete Modal -->
<div class="modal fade" id="studentDeleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Yakin hapus mahasiswa <span id="studentName"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="confirmStudentDelete" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>

<script>
    const studentsData = <?= json_encode($students) ?>; // Array of objects untuk students
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
