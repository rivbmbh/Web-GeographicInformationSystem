<section id="hero">

    <div class="hero-container" style="background-image: url(<?= base_url('assets/img/tema.jpg') ?>); background-size:cover;
    background-repeat:no-repeat;
    background-attachment:fixed;">
        <h1 style="background-color: tranparent; border: solid white 5px; padding: 6px">Amazing Sangihe</h1>
        <h2 style="color: green; font-weight:bold">Kabupaten Kepulauan Sangihe</h2>
        <a href="#portfolio" class="btn-get-started" style="font-weight:bold">Visit Sangihe</a>
    </div>
</section><!-- #hero -->

<main id="main">

    <!--==========================
        About Us Section
    ============================-->
    <section id="about">
        <div class="container">
            <div class="row about-container">

                <div class="col-lg-12 content order-lg-1 order-2">
                    <h2 class="title text-center">Sangihe</h2>
                    <p style="text-align:center">
                        Pulau Sangihe merupakan Pulau utama dari gugusan Kepulauan Sangihe. Secara administasi Pulau
                        Sangihe terletak di Kabupaten Kepulauan Sangihe, Provinsi Sulawesi Utara. Pulau Sangihe juga
                        merupakan lokasi bagi Kota Tahuna yang merupakan Ibukota Kabupaten Kepulauan Sangihe. Kondisi
                        geografis Pulau ini tepat di utara Pulau Sulawesi dan berbatasan langsung dengan negara
                        Filipina.
                        Pulau Sangihe sendiri terletak di jalur cincin api pasifik dimana wilayah ini sangat rawan
                        terjadi gempa bumi dan tsunami.
                        <br> <br>
                        Keindahan yang terdapat di Pulau Sangihe merupakan anugrah Tuhan yang semestinya kita jaga dan
                        kita lestarikan untuk kehidupan anak cucu kita kelak. Pulau Sangihe merupakan salah satu aset
                        berharga bagi bangsa Indonesia yang memiliki berjuta keindahan lainnya. Pembangunan yang baik,
                        dimana harus semestinya merencanakan pembangunan yang berkelanjutan dimana sangat memperhatikan
                        aspek lingkungan. Serta lebih mengembangkan sektor pariwisata yang ada di Kepulauan Sangihe
                    </p>



                </div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
        Facts Section
    ============================-->

    <!--==========================
        Services Section
    ============================-->


    <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
        <div class="container wow fadeIn">
            <div class="row">
                <div class="col-lg-9 text-center text-lg-left">
                    <h3 class="cta-title">Visit to Sangihe</h3>
                    <!-- <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                        deserunt mollit anim id est laborum.</p> -->
                </div>
                <div class="col-lg-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="<?= base_url('peta') ?>">Visit to Map</a>
                </div>
            </div>

        </div>
    </section><!-- #call-to-action -->

    <!--==========================
        Portfolio Section
    ============================-->
    <section id="portfolio">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Objek WIsata Sangihe</h3>
                <p class="section-description">Destinasi wisata yang ada di Sangihe terbilang cukup banyak walaupun
                    hanya
                    sebuah pulau yang luasnya sekitar 700km², jenis-jenis wisata alam buatan maupun budaya mudah di
                    temui di Sangihe ini.</p>
            </div>
            <div class="row">

                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter=".filter-app, .filter-card, .filter-logo, .filter-web" class="filter-active">
                            Semua
                        </li>
                        <li data-filter=".filter-app">Alam</li>
                        <li data-filter=".filter-card">Buatan</li>
                        <li data-filter=".filter-logo">Sejarah</li>
                        <li data-filter=".filter-web">Infrastruktur</li>
                    </ul>
                </div>
            </div>

            <div class="row" id="portfolio-wrapper">
                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="<?= site_url('point/detail/35') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/lelapide.jpg" width="100%">
                        <div class="details">
                            <h4>Lelapide</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="<?= base_url('point/detail/47') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/mafana.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Hotel Mafana</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="<?= base_url('point/detail/33') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/pananuareng.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Pananualeng</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="<?= base_url('point/detail/37') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/alfa.jpg" width="100%">
                        <div class="details">
                            <h4>Puncak Alfa</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="<?= base_url('point/detail/38') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/kolamLembah.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Kolam Lembah Kenari</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="<?= base_url('point/detail/46') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/paragon.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Paragon Mart</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-card">
                    <a href="<?= base_url('point/detail/36') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/nawirahi.jpg" width="100%" height="" alt="">
                        <div class="details">
                            <h4>Nawirahi</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-app">
                    <a href="<?= base_url('point/detail/34') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/kadadima.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Kadadima</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="<?= base_url('point/detail/42') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/mokodompis.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Makam Raja Mokodompis</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="<?= base_url('point/detail/44') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/makampahlawan.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Makam Pahlawan Santiago</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-web">
                    <a href="<?= base_url('point/detail/45') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/megaria.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Megaria Mart</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3 col-md-6 portfolio-item filter-logo">
                    <a href="<?= base_url('point/detail/43') ?>">
                        <img src="<?= base_url() ?>assets/Fwisata/makaampo.jpg" width="100%" alt="">
                        <div class="details">
                            <h4>Makam Raja Makaampo</h4>
                            <span>Klik</span>
                        </div>
                    </a>
                </div>

            </div>

        </div>
    </section><!-- #portfolio -->


    <!--==========================
        Contact Section
    ============================-->
    <section id="contact">
        <div class="container wow fadeInUp">
            <div class="section-header">
                <h3 class="section-title">Contact</h3>
                <p class="section-description">Hubungi kami melalui via telepon, email dan bisa langsung datang ke
                    alamat yang ada pada peta di bawah ini</p>
            </div>
        </div>
        <!-- alamt disparda sangihe -->
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d995.4840088653818!2d125.5107!3d3.6021239999999994!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x328b0a434980dd91%3A0xdf5b070866b74607!2sTourism%20Office%20Jln.Baru%20Tona!5e0!3m2!1sid!2sid!4v1689146185488!5m2!1sid!2sid"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>


    </section><!-- #contact -->

</main>