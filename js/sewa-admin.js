document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.tab-link');
    const items = document.querySelectorAll('.card');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            // Hapus class 'active' dari semua tombol
            buttons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');

            const filter = button.getAttribute('data-filter');

            items.forEach(item => {
                if (item.classList.contains(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});

document.addEventListener("DOMContentLoaded", function () {
  const tabLinks = document.querySelectorAll(".tab-link");
  const btnTambah = document.getElementById("btnTambah");

  tabLinks.forEach(tab => {
    tab.addEventListener("click", () => {
      const filter = tab.getAttribute("data-filter");
      btnTambah.textContent = "+ Tambah " + capitalize(filter);
      btnTambah.setAttribute("onclick", `openModal('${filter}')`);

      tabLinks.forEach(t => t.classList.remove("active"));
      tab.classList.add("active");

      document.querySelectorAll(".card").forEach(card => {
        card.style.display = card.classList.contains(filter) ? "block" : "none";
      });
    });
  });
});

const modal = document.getElementById("modal-sewa");
const closeBtn = document.querySelector(".close-sewa");
const form = document.getElementById("form-sewa");
const modalTitle = document.getElementById("modal-title");

function openModal(tipe, data = null) {
  modal.style.display = "block";
  form.reset();
  document.getElementById("form-tipe").value = tipe;
  modalTitle.innerText = data ? `Edit ${capitalize(tipe)}` : `Tambah ${capitalize(tipe)}`;

  if (data) {
    document.getElementById("form-id").value = data.id;
    document.getElementById("form-nama").value = data.nama;
    document.getElementById("form-harga").value = data.harga_sewa;
    document.getElementById("form-deskripsi").value = data.deskripsi;
    document.getElementById("form-status").value = data.status;
  }
}

closeBtn.onclick = () => modal.style.display = "none";
window.onclick = e => { if (e.target === modal) modal.style.display = "none"; };

function capitalize(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}

// Fungsi untuk menampilkan konfirmasi hapus dengan SweetAlert
function confirmDelete(url) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika konfirmasi hapus, redirect ke URL penghapusan
            window.location.href = url;
        }
    });
}

// Fungsi untuk menampilkan konfirmasi hapus dengan SweetAlert
function confirmDelete(url) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika konfirmasi hapus, redirect ke URL penghapusan
            window.location.href = url;
        }
    });
}

