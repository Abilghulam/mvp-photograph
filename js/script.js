// Mobile Menu Toggle
const menuToggle = document.querySelector('.menu-toggle');
const navLinks = document.querySelector('.nav-links');

menuToggle.addEventListener('click', () => {
    navLinks.classList.toggle('active');
});

// Smooth scrolling for navigation links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        navLinks.classList.remove('active');
        
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop - 70,
                behavior: 'smooth'
            });
        }
    });
});

function bukaModal(jenis) {
  document.getElementById("modalPemesanan").style.display = "flex";
  document.getElementById("jenis-layanan-modal").value = jenis || "";
}

function tutupModal() {
  document.getElementById("modalPemesanan").style.display = "none";
}

// Untuk tombol "Pesan Sekarang" di setiap layanan
document.querySelectorAll('.service-card .btn').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    const jenis = this.closest('.service-card').querySelector('h3').textContent.trim();
    bukaModal(jenis);
  });
});

// Tangani semua tombol dengan class "pesan-sekarang"
  document.querySelectorAll('.pesan-sekarang').forEach(button => {
    button.addEventListener('click', function(e) {
      e.preventDefault(); // hindari scroll ke #pemesanan
      const layanan = this.getAttribute('data-layanan');

      // buka modal
      document.getElementById("modalPemesanan").style.display = "flex";

      // isi jenis layanan di select modal
      const jenisLayananInput = document.getElementById("jenis-layanan-modal");
      if (jenisLayananInput) {
        jenisLayananInput.value = layanan;
      }
    });
  });

  // Daftar harga untuk setiap layanan
const hargaLayanan = {
  "Graduation": 350000,
  "Product": 400000,
  "Wedding/Pre-Wedding": 800000,
  "Models": 500000,
  "Event Documentation": 600000
};

document.querySelectorAll('.pesan-sekarang').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    const layanan = this.getAttribute('data-layanan');

    // Buka modal
    document.getElementById("modalPemesanan").style.display = "flex";

    // Isi jenis layanan
    const jenisLayananInput = document.getElementById("jenis-layanan-modal");
    if (jenisLayananInput) {
      jenisLayananInput.value = layanan;
    }

    // Isi harga layanan
    const hargaDisplay = document.getElementById("harga-paket-display");
    const hargaHidden = document.getElementById("harga-paket");

    if (hargaLayanan[layanan]) {
      const harga = hargaLayanan[layanan];
      if (hargaDisplay) {
        hargaDisplay.value = `Rp ${harga.toLocaleString("id-ID")}`;
      }
      if (hargaHidden) {
        hargaHidden.value = harga;
      }
    } else {
      if (hargaDisplay) hargaDisplay.value = "";
      if (hargaHidden) hargaHidden.value = "";
    }
  });
});

// Modal sukses
document.addEventListener('DOMContentLoaded', function() {
    if (window.location.search.includes('success=true')) {
        const successModal = document.getElementById('successModal');
        successModal.style.display = 'flex';

        // Langsung hapus parameter dari URL setelah modal ditampilkan
        window.history.replaceState({}, document.title, window.location.pathname);
    }
});

function closeSuccessModal() {
    document.getElementById('successModal').style.display = 'none';
}






