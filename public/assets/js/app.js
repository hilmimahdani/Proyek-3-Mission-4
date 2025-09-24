// Scope, Array, Object
// Contoh array of objects (data dari PHP di-load ke global var seperti coursesData, studentsData)

// DOM Selector & Manipulation
function updateUI(elementId, content) {
    const elem = document.getElementById(elementId);
    if (elem) {
        elem.innerHTML = content;
    }
}

// Event Handling & Validasi Form
document.addEventListener('DOMContentLoaded', () => {
    // Validasi form umum (untuk login, studentForm, courseForm)
    const forms = document.querySelectorAll('#loginForm, #studentForm, #courseForm');
    forms.forEach(form => {
        form.addEventListener('submit', (e) => {
            let valid = true;
            form.querySelectorAll('input[required], textarea[required]').forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('is-invalid');
                    valid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
            if (!valid) {
                e.preventDefault();
                alert('Isi semua field!');
            }
        });
    });

    // Checklist courses & total SKS
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="courses[]"]');
    const totalSksElem = document.getElementById('totalSks');
    if (checkboxes.length && totalSksElem) {
        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                let total = 0;
                checkboxes.forEach(c => {
                    if (c.checked) total += parseInt(c.dataset.sks);
                });
                totalSksElem.textContent = total;

                // Cek no double enroll (asumsi myCoursesData dari mycourses page, tapi untuk demo alert)
                // Untuk full, load enrolled via JS atau hidden input
                if (cb.checked && myCoursesData && myCoursesData.some(course => course.id == cb.value)) {
                    cb.checked = false;
                    alert('Sudah enroll course ini!');
                }
            });
        });
    }

    // Submit enroll (simpan checked, tapi untuk sekarang submit form; nanti ganti fetch)
    const enrollForm = document.getElementById('enrollForm');
    if (enrollForm) {
        enrollForm.addEventListener('submit', (e) => {
            // e.preventDefault(); // Untuk full async, uncomment & gunakan fetch
            // Di sini simpan ke array atau post
            console.log('Enrolled courses:', Array.from(checkboxes).filter(c => c.checked).map(c => c.value));
        });
    }

    // Delete confirmation course
    const deleteBtns = document.querySelectorAll('.delete-btn');
    const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
    deleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('courseName').textContent = btn.dataset.name;
            document.getElementById('courseSks').textContent = btn.dataset.sks;
            document.getElementById('confirmDelete').href = `<?= base_url('courses/delete/') ?>${btn.dataset.id}`;
            deleteModal.show();
        });
    });

    // Delete confirmation student
    const studentDeleteBtns = document.querySelectorAll('.student-delete-btn');
    const studentDeleteModal = new bootstrap.Modal(document.getElementById('studentDeleteModal'));
    studentDeleteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('studentName').textContent = btn.dataset.name;
            document.getElementById('confirmStudentDelete').href = `<?= base_url('students/delete/') ?>${btn.dataset.id}`;
            studentDeleteModal.show();
        });
    });

    // Menu aktif
    const menuLinks = document.querySelectorAll('.menu-link');
    menuLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            menuLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
            // Contoh createElement: Tambah badge baru
            const badge = document.createElement('span');
            badge.className = 'badge bg-secondary ms-2';
            badge.textContent = 'Aktif';
            link.appendChild(badge);
        });
    });

    // Sync vs Async
    // Sync: Update langsung
    console.log('Sync: Mulai');
    updateUI('totalSks', 0); // Contoh
    console.log('Sync: Selesai');

    // Async: setTimeout
    setTimeout(() => {
        console.log('Async: Update setelah 2 detik');
        // Siapkan untuk REST API: Contoh fetch dummy
        // fetch('/api/courses').then(res => res.json()).then(data => console.log(data));
    }, 2000);
});