<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Most Valueable Photograph - Jasa Fotografi & Sewa Kamera</title>
    <link rel="stylesheet" href="css/style.css">

    <script src="https://unpkg.com/feather-icons"></script>

</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">
                <img src="img/logo-white.png" alt="Logo" style="height: 45px; margin-right: 20px; vertical-align: bottom;">
                MV<span>Photograph</span></a>
                <div class="menu-toggle">&#9776;</div>
                <ul class="nav-links">
                    <li><a href="#layanan">Layanan</a></li>
                    <li><a href="#sewa1">Sewa Peralatan</a></li>
                    <li><a href="#galeri">Galeri</a></li>
                    <li><a href="#pemesanan">Pemesanan</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                    <li><a href="javascript:void(0);" onclick="confirmLogout()" style="color: #ff6b6b;">Log out</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!--Menu Section Promotion-->
    <section class="hero">
        <h1>Most Valueable Product & Photograph</h1>
        <p>Professional photography and videography services and the best camera rental in Sidoarjo. For wedding/pre-wedding, graduation, event, product, and fashion.</p>
        <div>
            <a href="#pemesanan" class="btn">Pesan Sekarang!</a>
            <a href="#sewa1" class="btn" style="background-color: transparent; border: 2px solid white; margin-left: 10px;">Sewa Peralatan</a>
        </div>
    </section>
    <!--Section End-->

    <!--Menu Section Layanan-->
    <section id="layanan" class="section">
        <div class="container">
            <h2 class="section-title">Layanan Kami</h2>
            <div class="services-container">
                <div class="service-card">
                    <div class="service-img" style="background-image: url('img/porto/img-10.jpg')"></div>
                    <div class="service-content">
                        <h3>Graduation Photo</h3>
                        <p>Rayakan pencapaian akademik Anda dengan sesi foto profesional. Kami menawarkan paket foto wisuda individual maupun kelompok dengan tema yang diinginkan.</p>
                        <a href="#pemesanan" class="btn">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img" style="background-image: url('img/porto/img-8.jpg')"></div>
                    <div class="service-content">
                        <h3>Product Photo</h3>
                        <p>Tingkatkan daya tarik produk bisnis Anda dengan foto produk berkualitas tinggi. Cocok untuk katalog, e-commerce, dan keperluan pemasaran.</p>
                        <a href="#pemesanan" class="btn">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img" style="background-image: url('img/porto/img-11.jpg')"></div>
                    <div class="service-content">
                        <h3>Wedding/Pre-Wedding</h3>
                        <p>Abadikan momen spesial pernikahan Anda dengan sentuhan profesional, kami siap melayani Anda mulai dari Pre-Wedding, Wedding, hingga resepsi.</p>
                        <a href="#pemesanan" class="btn">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img" style="background-image: url('img/porto/img-3.jpg')"></div>
                    <div class="service-content">
                        <h3>Models Photo</h3>
                        <p>Abadikan gaya dan ekspresi terbaik Anda dengan sesi pemotretan model profesional. Cocok untuk portofolio, majalah, dan media sosial.</p>
                        <a href="#pemesanan" class="btn">Pesan Sekarang</a>
                    </div>
                </div>
                <div class="service-card">
                    <div class="service-img" style="background-image: url('img/porto/img-5.jpg')"></div>
                    <div class="service-content">
                        <h3>Event Documentation</h3>
                        <p>Abadikan setiap momen spesial dari acara Anda dengan dokumentasi profesional, Kami siap meliput berbagai jenis event dengan vibe yang meriah.</p>
                        <a href="#pemesanan" class="btn">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section End-->

    <!--Menu Section Sewa-->
        <nav class="bg-pilihan">
          <div class="pilihan" id="pilihan">
            <div class="row" id="row">
            <a class="product-class" id="kamera-id">Kamera</a>
            <a class="lensa-class" id="lensa-id">Lensa</a>
            <a class="accesories-class" id="aksesoris-id">Aksesoris</a>
            <div class="animation start-home"></div>
            </div>
        </nav>

    <!-- Rental Card -->
    <section id="sewa1" class="section1" style="background-color: #f9f9f9;">
        <div class="container">
            <h2 class="section-kamera">Kamera</h2>
            <div class="rental-container">
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/canonr5.png')"></div>
                    <div class="rental-content">
                        <h3>Canon EOS R5</h3>
                        <p class="rental-price">Rp 400.000/hari</p>
                        <ul class="rental-features">
                            <li>45MP Full-Frame CMOS</li>
                            <li>8K30 RAW Video Recording</li>
                            <li>In-Body Image Stabilization</li>
                            <li>Dual Card Slots</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Canon EOS R5', 400000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/a7iii.png')"></div>
                    <div class="rental-content">
                        <h3>Sony Alpha a7 III</h3>
                        <p class="rental-price">Rp 650.000/hari</p>
                        <p class="rental-features">
                            24.2MP Full-Frame Exmor R BSI Sensor<br>
                            4K HDR Video<br>
                            5-Axis Stabilization<br>
                            693-Point AF System
                        </p>
                        <button class="button" onclick="openQuickView('Sony Alpha a7 III', 650000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/m50ii.png')"></div>
                    <div class="rental-content">
                        <h3>Canon EOS M50 Mark II</h3>
                        <p class="rental-price">Rp 550.000/hari</p>
                        <p class="rental-features">
                            24.1MP APS-C CMOS Sensor<br>
                            DIGIC 8 Image Processor<br>
                            Lensa Kit 15-45mm<br>
                            Full HD 60p Video Recording
                        </p>
                        <button class="button" onclick="openQuickView('Canon EOS M50 Mark II', 550000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/a60001.png')"></div>
                    <div class="rental-content">
                        <h3>Sony A6000</h3>
                        <p class="rental-price">Rp 300.000/hari</p>
                        <p class="rental-features">
                            24,3MP APS-C (23,5 x 15,6mm)<br>
                            Full HD 1080 AVCHD 2.0/MP4<br>
                            Tru-Finder 0.39" 1,440k-Dot OLED EVF<br>
                            Fast Hybrid AF & 179 Phase-Detect Points
                        </p>
                        <button class="button" onclick="openQuickView('Sony A6000', 300000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/xt30ii.png')"></div>
                    <div class="rental-content">
                        <h3>Fujifilm XT-30 Mark II</h3>
                        <p class="rental-price">Rp 550.000/hari</p>
                        <ul class="rental-features">
                            <li>26.1MP APS-C X-Trans BSI CMOS 4 Sensor</li>
                            <li>X-Processor 4 with Quad CPU</li>
                            <li>DCI and UHD 4K30 Video F-Log Gamma</li>
                            <li>Tilting LCD Touchscreen</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Fujifilm XT-30 Mark II', 550000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/g85k.png')"></div>
                    <div class="rental-content">
                        <h3>Lumix DMC-G85K</h3>
                        <p class="rental-price">Rp 500.000/hari</p>
                        <ul class="rental-features">
                            <li>Sensor Live MOS 16MP</li>
                            <li>3.0" 1.04m-Dot Swivel LCD Touchscreen</li>
                            <li>2.36m-Dot Electronic Viewfinder</li>
                            <li>UHD 4K Video Recording 30/24fps</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Lumix DMC-G85K', 500000)">Quick View</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sewa2" class="section2" style="background-color: #f9f9f9;">
        <div class="container">
            <h2 class="section-lensa">Lensa</h2>
            <div class="rental-container">
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-tele-sony.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Tele Sony Vario-Tessar</h3>
                        <p class="rental-price">Rp 200.000/hari</p>
                        <ul class="rental-features">
                            <li>ZEISS Tessar Compact</li>
                            <li>Approx 4x Zoom Range</li>
                            <li>Constant F4 Maximum Aperture</li>
                            <li>0.35 Focus Distance</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Lensa Tele Sony Vario-Tessar', 200000, 'img/lensa-tele-sony.png')">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-canon.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Fix Canon RF</h3>
                        <p class="rental-price">Rp 90.000/hari</p>
                        <ul class="rental-features">
                            <li>RD-Mout Lens/Full-Frame Format</li>
                            <li>Aperture Range f/2.8 - f/22</li>
                            <li>STM Stepping AF Motor</li>
                            <li>Customizable Control Ring</li>
                        </ul>
                        <button class="button" onclick="openQuickView('Lensa Fix Canon RF', 90000, 'img/lensa-canon.png')">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-fujinon.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Fujinon XF</h3>
                        <p class="rental-price">Rp 150.000/hari</p>
                        <ul class="rental-features">
                            <li>56mm/F1.2 R APD</li>
                            <li>28.5 Angle of View</li>
                            <li>Focus Range 7mm - 3mm</li>
                            <li>405g with Approx</li>
                        </ul>
                        <button class="button" onclick="openQuickView('Lensa Fujinon XF', 150000, 'img/lensa-fujinon.png')">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-lumix.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Lumix G Vario</h3>
                        <p class="rental-price">Rp 150.000/hari</p>
                        <ul class="rental-features">
                            <li>Ultra Wide Angle</li>
                            <li>14-28mm - 35mm Format Equivalent</li>
                            <li>Contrast AF System Support</li>
                            <li>For Micro Four Thirds Mount Cameras</li>
                        </ul>
                        <button class="button" onclick="openQuickView('Lensa Lumix G Vario', 150000, 'lensa-lumix.png')">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-sigma.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Sigma DG HSM</h3>
                        <p class="rental-price">Rp 250.000/hari</p>
                        <ul class="rental-features">
                            <li>for Sony E Mount and Canon EF Mount</li>
                            <li>94.5 Angle of View</li>
                            <li>F16 Minimum Aperture</li>
                            <li>20mm/F1.4 DG Full Frame</li>
                        </ul>
                        <button class="button" onclick="openQuickView('Lensa Sigma DG HSM', 250000, 'img/lensa-sigma.png')">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lensa-fix-sony.png')"></div>
                    <div class="rental-content">
                        <h3>Lensa Fix Sony SEL50F25G</h3>
                        <p class="rental-price">Rp 250.000/hari</p>
                        <ul class="rental-features">
                            <li>FE 50mm/F2.5 G</li>
                            <li>35mm Full Frame Format</li>
                            <li>F22 - F2.3 Aperture</li>
                            <li>0.35m AF/0.31m MF Focus Distance</li>
                        </ul>
                        <button class="button" onclick="openQuickView('Lensa Fix Sony SEL50F25G', 250000, 'img/lensa-fix-sony.png')">Quick View</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="sewa3" class="section3" style="background-color: #f9f9f9;">
        <div class="container">
            <h2 class="section-aksesoris">Aksesoris</h2>
            <div class="rental-container">
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/tripod-leofoto.webp')"></div>
                    <div class="rental-content">
                        <h3>Tripod Leofoto LS-284C Carbon</h3>
                        <p class="rental-price">Rp 90.000/hari</p>
                        <ul class="rental-features">
                            <li>Load Capacity 10 Kg</li>
                            <li>14.5 cm - 158.5 cm</li>
                            <li>Folded Length 53 cm</li>
                            <li>10x Carbon Fiber Legs</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Tripod Leofoto LS-284C Carbon', 90000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/tripod-sirui.jpg')"></div>
                    <div class="rental-content">
                        <h3>Tripod Sirui T-004KX</h3>
                        <p class="rental-price">Rp 65.000/hari</p>
                        <ul class="rental-features">
                            <li>Load Capacity 7 Kg</li>
                            <li>4.9 cm - 58 cm</li>
                            <li>Folded Length 39 cm</li>
                            <li>Compact Aluminium FIber</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Tripod Sirui T-004KX', 65000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/lighting-godox.webp')"></div>
                    <div class="rental-content">
                        <h3>Lighting Kit Godox H160-B</h3>
                        <p class="rental-price">Rp 150.000/hari</p>
                        <ul class="rental-features">
                            <li>Flash Power 100WS - 300WS</li>
                            <li>Light Stand 304 (2 m)</li>
                            <li>250DI & 300DI</li>
                            <li>Red Eye Pre-Flash</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Lighting Kit Godox H160-B', 150000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/flash-godox.png')"></div>
                    <div class="rental-content">
                        <h3>Flash Godox Thinklite TT600</h3>
                        <p class="rental-price">Rp 50.000/hari</p>
                        <ul class="rental-features">
                            <li>Optical & 2.4G Wireless</li>
                            <li>Power Flash Approx. 230 (2500mA)</li>
                            <li>Red LED Indicator</li>
                            <li>Flash Duration 1/300s - 1/20000s</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Flash Godox Thinklite TT600', 50000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/gimbal-dji.webp')"></div>
                    <div class="rental-content">
                        <h3>Gimbal Stabilizer DJI RS 4 Mini</h3>
                        <p class="rental-price">Rp 100.000/hari</p>
                        <ul class="rental-features">
                            <li>Lightweight Capacity 2 Kg</li>
                            <li>Threefold Ease for Balancing</li>
                            <li>Wireless Recording and Zoom</li>
                            <li>Fast Charge Extended Battery (13 hour)</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Gimbal Stabilizer DJI RS 4 Mini', 100000)">Quick View</button>
                    </div>
                </div>
                <div class="rental-card">
                    <div class="rental-img" style="background-image: url('img/mic-rode.webp')"></div>
                    <div class="rental-content">
                        <h3>Microphone Rode Videomic Pro</h3>
                        <p class="rental-price">Rp 85.000/hari</p>
                        <ul class="rental-features">
                            <li>JFET Impedance Converter</li>
                            <li>40Hz - 20kHz Frequency Range (HPF @80)</li>
                            <li>134dB Maximum SPL</li>
                            <li>Sensivity -32.0dB re 1 Volt/Pascal</li>
                          </ul>
                        <button class="button" onclick="openQuickView('Microphone Rode Videomic Pro', 85000)">Quick View</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Section End-->

    <!--Menu Section Galeri-->
    <section id="galeri" class="section gallery">
        <div class="container">
            <h2 class="section-title">Galeri Karya</h2>
            <div class="gallery-container">
                <div class="gallery-item">
                    <img src="img/porto/img-10.jpg" alt="Galeri 1" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-17.jpg" alt="Galeri 2" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-7.jpg" alt="Galeri 3" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-8.jpg" alt="Galeri 4" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-11.jpg" alt="Galeri 5" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-14.jpg" alt="Galeri 6" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-15.jpg" alt="Galeri 7" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-4.jpg" alt="Galeri 8" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-3.jpg" alt="Galeri 9" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-18.jpg" alt="Galeri 10" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-19.jpg" alt="Galeri 11" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-20.jpg" alt="Galeri 12" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-21.jpg" alt="Galeri 13" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-13.jpg" alt="Galeri 14" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-12.jpg" alt="Galeri 15" class="gallery-img">
                </div>
                <div class="gallery-item">
                    <img src="img/porto/img-5.jpg" alt="Galeri 16" class="gallery-img">
                </div>
            </div>
        </div>
    </section>
    <!--Section End-->

    <!--Menu Section Form-->
    <section id="pemesanan" class="section">
        <div class="container">
        <h2 class="section-title">Form Pemesanan Jasa</h2>
        <div class="booking-form">
            <form id="booking-form" method="POST" action="php/proses.php">
            <div class="form-group">
                <label for="service-type">Jenis Layanan</label>
                <select id="service-type" name="jenis_layanan" class="form-control" required>
                <option value="">Pilih Layanan</option>
                <option value="Graduation">Graduation</option>
                <option value="Product">Product</option>
                <option value="Wedding/Pre-Wedding">Wedding/Pre-Wedding</option>
                <option value="Models">Models</option>
                <option value="Event">Event</option>
                </select>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                <label for="booking-date">Tanggal Pemesanan</label>
                <input type="date" id="booking-date" name="tanggal_pemesanan" class="form-control" required>
                </div>
                <div class="form-group">
                <label for="booking-time">Waktu</label>
                <input type="time" id="booking-time" name="waktu_pemesanan" class="form-control" required>
                </div>
            </div>
    
            <div class="form-group">
                <label for="location">Lokasi</label>
                <input type="text" id="location" name="lokasi" class="form-control" placeholder="Masukkan alamat lokasi" required>
            </div>
    
            <div class="form-row">
                <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" name="nama_lengkap" class="form-control" placeholder="Nama lengkap Anda" required>
                </div>
                <div class="form-group">
                <label for="phone">Nomor Telepon</label>
                <input type="tel" id="phone" name="nomor_telepon" class="form-control" placeholder="Nomor telepon Anda" required>
                </div>
            </div>
    
            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="email@example.com" required>
            </div>
    
            <button type="submit" class="btn" style="width: 100%;">Kirim Pemesanan</button>
            </form>
        </div>
        </div>
    </section>

    <!-- Modal sukses -->
    <div id="successModal" class="modal-success" style="display: none;">
        <div class="modal-success-content">
            <h2>Berhasil Memesan Jasa Fotografi!</h2>
            <p>Yey! Terima kasih atas kepercayaan Anda kepada kami, pesanan jasa fotografi Anda telah diterima. Anda akan segera kami hubungi melalui Whatsapp/Email</p>
            <button class="btn-success" onclick="closeSuccessModal()">Tutup</button>
            </div>
        </div>
  <!--Section End-->
  
    <!--Menu Section Footer-->
    <footer id="kontak">
        <div class="container">
            <div class="footer-container">
                <div class="footer-col">
                    <h4>Most Valueable Photograph</h4>
                    <p>Jasa fotografi profesional dan penyewaan kamera terbaik untuk mengabadikan momen spesial Anda.</p><br>
                    <div class="social-links">
                        <a href="https://www.instagram.com/mvp.captured.id/" target="_blank"><i data-feather="instagram"></i></a>
                        <a href="#"><i data-feather="twitter"></i></a>
                        <a href="#"><i data-feather="facebook"></i></a>
                    </div>
                </div>
                <div class="footer-col">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#">Graduation</a></li>
                        <li><a href="#">Product</a></li>
                        <li><a href="#">Wedding/Pre-Wedding</a></li>
                        <li><a href="#">Models</a></li>
                        <li><a href="#">Event</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Sewa Peralatan</h4>
                    <ul>
                        <li><a href="#">Kamera</a></li>
                        <li><a href="#">Lensa</a></li>
                        <li><a href="#">Aksesoris</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li>Jl. Balongdowo No. 123, Sidoarjo</li>
                        <li>Contact Person: 0878-0650-0261 | 0882-1722-2486 </li>
                        <li>Email: mvp.brandproject@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 Most Valueable Photograph. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!--Section End-->

    <!-- Quick View Modal -->
    <div id="quickViewModal" class="modal quick-view-modal">
        <div class="modal-contents">
        <div class="quick-view-image">
            <img id="quickViewImage" src="" alt="Equipment Image">
        </div>
        <div class="quick-view-details">
            <h2 id="quickViewTitle" class="quick-view-title"></h2>
            <p id="quickViewPrice" class="quick-view-price"></p>
            
            <div class="quick-view-specs">
            <h3>Kelengkapan Sewa:</h3>
            <ul id="quickViewSpecs" class="spec-list"></ul>
            </div>
            
            <!-- Button Whatsapp -->
            <div class="action-buttons">
            <a id="whatsappButton" href="javascript:void(0)" class="whatsapp-btn" target="_blank">
                <svg class="whatsapp-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                </svg>
                Sewa via WhatsApp
            </a>
            <button class="secondary-button" onclick="closeModal('quickViewModal')">Kembali</button>
            </div>
        </div>
        </div>
    </div>
  <!-- Quick View Modal End -->
  
  <a href="https://wa.me/6285102860099" class="chat-btn" target="_blank">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
      <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
    </svg>
    Hubungi Admin
  </a>

    <script>
        feather.replace();
    </script>
    <script src="js/script.js"></script>
    <script src="js/section-rental.js"></script>
    <script src="js/quick-view.js"></script>
    <script src="js/logout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>