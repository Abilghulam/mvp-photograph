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





