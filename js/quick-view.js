// Store currently selected equipment
let currentEquipment = '';
let currentPrice = '';

// Equipment specs data
const equipmentSpecs = {
  'Canon EOS R5': [
    'Lensa Kit 15-45mm',
    '2x Baterai',
    'Charger/Adapter',
    'Memory 32GB',
    'Tas',
    'Strap'
  ],
  'Sony Alpha a7 III': [
    'Body Only (tanpa lensa)',
    '2x Baterai',
    'Charger Dock',
    'SDHC Sandisk 32GB Extreme 90Mbps',
    'Tas',
    'Strap'
  ],
  'Canon EOS M50 Mark II': [
    'Body Only (tanpa lensa)',
    'Adapter EF-RF',
    '2x Baterai',
    'SDHC Sandisk 32GB',
    'Tas',
    'Strap'
  ],
  'Sony A6000': [
    'Body Only (tanpa lensa)',
    '2x Baterai',
    'Charger/Adapter',
    'SDHC Sandisk 32GB Extreme',
    'Tas',
    'Strap'
  ],
  'Fujifilm XT-30 Mark II': [
    'Body Only (tanpa lensa)',
    '2x Baterai',
    'Charger/Adapter Dock',
    'SDHC Sandisk 32GB Extreme 90Mbps',
    'Tas',
    'Strap'
  ],
  'Lumix DMC-G85K': [
    'Body Only (tanpa lensa)',
    '2x Baterai',
    'Charger/Adapter',
    'SDHC Sandisk 32GB Extreme 90Mbps',
    'Tas',
    'Strap'
  ],
  'Lensa Tele Sony Vario-Tessar': [
    'Lens Cap',
    'Lens Adapter (compatible Canon only)',
    'Pouch/Tas',
    'For Full Frame & APSC'
  ],
  'Lensa Fix Canon RF': [
    'Lens Cap',
    'No Lens Adapter (Canon only)',
    'Pouch/Tas'
  ],
  'Lensa Fujinon XF': [
    'Lens Cap',
    'No Lens Adapter (Fujifilm only)',
    'Pouch/Tas'
  ],
  'Lensa Lumix G Vario': [
    'Lens Cap',
    'Lens Hood',
    'No Lens Adapter (Lumix only)',
    'Pouch/Tas'
  ],
  'Lensa Sigma DG HSM': [
    'Lens Cap',
    'Lens Hood',
    'Lens Adapter (compatible for Sony, Canon, Fujifilm, Lumix)',
    'For Full Frame & APSC',
    'Pouch/Tas'
  ],
  'Lensa Fix Sony SEL50F25G': [
    'Lens Cap',
    'No Lens Adapter (Sony only)',
    'Pouch/Tas'
  ],
  'Tripod Leofoto LS-284C Carbon': [
    'Tripod',
    'Adapter (camera type request)',
    'Tas'
  ],
  'Tripod Sirui T-004KX': [
    'Tripod',
    'Adapter (camera type request)',
    'Tas'
  ],
  'Lighting Kit Godox H160-B': [
    '2x Light Stand',
    '2x Umbrella',
    'Tas Stand',
    'Tas Lighting'
  ],
  'Flash Godox Thinklite TT600': [
    'Flash',
    'Flash Adapter (for Fujifilm & Lumix)',
    '2x Baterai',
    'Pouch/Tas'
  ],
  'Gimbal Stabilizer DJI RS 4 Mini': [
    'Gimbal Stabilizer',
    'Gimbal Adapter (for Fujifilm & Lumix)',
    'Pouch/Tas'
  ],
  'Microphone Rode Videomic Pro': [
    'Microphone',
    'Kabel Jack 3.5 mm',
    '2x Baterai',
    'Pouch/Tas'
  ]
};

// Equipment images data
const equipmentImages = {
  'Canon EOS R5': 'img/canonr5.png',
  'Sony Alpha a7 III': 'img/a7iii.png',
  'Canon EOS M50 Mark II': 'img/m50ii.png',
  'Sony A6000': 'img/a60001.png',
  'Fujifilm XT-30 Mark II': 'img/xt30ii.png',
  'Lumix DMC-G85K': 'img/g85k.png',
  'Lensa Tele Sony Vario-Tessar': 'img/lensa-tele-sony.png',
  'Lensa Fix Canon RF': 'img/lensa-canon.png',
  'Lensa Fujinon XF': 'img/lensa-fujinon.png',
  'Lensa Lumix G Vario': 'img/lensa-lumix.png',
  'Lensa Sigma DG HSM': 'img/lensa-sigma.png',
  'Lensa Fix Sony SEL50F25G': 'img/lensa-fix-sony.png',
  'Tripod Leofoto LS-284C Carbon': 'img/tripod-leofoto.webp',
  'Tripod Sirui T-004KX': 'img/tripod-sirui.jpg',
  'Lighting Kit Godox H160-B': 'img/lighting-godox.webp',
  'Flash Godox Thinklite TT600': 'img/flash-godox.png',
  'Gimbal Stabilizer DJI RS 4 Mini': 'img/gimbal-dji.webp',
  'Microphone Rode Videomic Pro': 'img/mic-rode.webp'
};

// Format harga menjadi Rp xxx.xxx
function formatRupiah(number) {
  number = number.toString().replace(/\./g, ''); // Hapus titik
  return 'Rp ' + parseInt(number, 10).toLocaleString('id-ID');
}

// Open the Quick View Modal
function openQuickView(equipment, price) {
  currentEquipment = equipment;
  currentPrice = price;

  const modal = document.getElementById('quickViewModal');
  if (modal) {
    modal.style.display = 'flex';
  }

  const titleElement = document.getElementById('quickViewTitle');
  const priceElement = document.getElementById('quickViewPrice');
  const specsList = document.getElementById('quickViewSpecs');
  const imageElement = document.getElementById('quickViewImage');

  if (titleElement) titleElement.textContent = equipment;
  if (priceElement) priceElement.textContent = `${formatRupiah(price)}/hari`;

  if (specsList) {
    specsList.innerHTML = '';

    if (equipmentSpecs[equipment]) {
      equipmentSpecs[equipment].forEach(spec => {
        const li = document.createElement('li');
        li.textContent = spec;
        specsList.appendChild(li);
      });
    } else {
      specsList.innerHTML = '<li>Spesifikasi tidak tersedia.</li>';
    }
  }

  if (imageElement) {
    const imageSrc = equipmentImages[equipment] || 'https://via.placeholder.com/400x300?text=No+Image';
    imageElement.src = imageSrc;
  }
}

// Event listener untuk tombol WhatsApp setelah halaman siap
document.addEventListener('DOMContentLoaded', function() {
  const whatsappButton = document.getElementById('whatsappButton');
  if (whatsappButton) {
    whatsappButton.addEventListener('click', function() {
      const phoneNumber = '6285102860099'; // Nomor admin WA
      const message = `Halo Admin, saya tertarik untuk menyewa ${currentEquipment} dengan harga ${formatRupiah(currentPrice)}/hari. Apakah tersedia?`;
      const encodedMessage = encodeURIComponent(message);
      const whatsappLink = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

      window.open(whatsappLink, '_blank');
    });
  }
});

// Close modal function
function closeModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
  }
}

// Close modal jika klik di luar modal
window.onclick = function(event) {
  const modal = document.getElementById('quickViewModal');
  if (event.target === modal) {
    closeModal('quickViewModal');
  }
};
