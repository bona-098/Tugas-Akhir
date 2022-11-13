@extends('user.app')
@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>Student Automotive Association</h1>
            <h2>mengembangkan dan membina kemampuan mahasiswa Institut Teknologi Kalimantan dalam bidang otomotif </h2>
            {{-- <a href="#about" class="btn-get-started scrollto">Get Started</a> --}}
        </div>
    </section>
    <!-- End Hero -->
    <!-- profil section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row content">
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <h2>Student Automotive Association</h2>
                    <h3 class="fst-italic">sejak 2014</h3>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left" data-aos-delay="200">
                    <p>
                        Visi
                    </p>
                    <h6>Sebagai organisasi keprofesian yang mampu mengembangkan dan membina kemampuan mahasiswa Institut
                        Teknologi Kalimantan dalam bidang otomotif guna menunjang mahasiswa dalam persaingan di dunia kerja
                        serta berperan aktif dalam pembangunan industri otomotif di Indonesia.
                    </h6>
                    <p>
                        Misi
                    </p>
                    <ul>
                        <li><i class="ri-check-double-line"></i> Mengadakan pelatihan otomotif yang unggul bagi seluruh
                            pengurus SAA
                        </li>
                        <li><i class="ri-check-double-line"></i> Mengadakan kegiatan pelayanan kepada masyarakat dalam
                            bidang otomotif
                        </li>
                        <li><i class="ri-check-double-line"></i> Mengadakan penelitian dan pengembangan inovasi sebagai
                            bentuk kreatifitas dalam menunjang kemajuan dunia otomotif.
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    </div>
    </section><!-- End profil Section -->
    <main>
        {{-- pengumuman section --}}
        <section id="team" class="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title" data-aos="fade-right">
                            <h2>Pengumuman</h2>
                            <p>Berikut ini adalah pengumuman terkait Student Automotive association</p>
                            <a href="/user-prestasi" class="icon-link">
                                Selengkapnya
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="/user-pengumumandet" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($getpengumuman as $pengumuman)
                                <div class="col-lg-6">
                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="pic"><img src="Bethany/assets/img/team/team-1.jpg" class="img-fluid"
                                                alt=""></div>
                                        <div class="member-info">
                                            <h4>{{ $pengumuman->waktu }}</h4>
                                            <span>{{ $pengumuman->judul }}</span>
                                            <p>{{ $pengumuman->deskripsi }}</p>
                                            <div class="social">
                                                <a href="#">selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end pengumuman section -->
        <!-- Dokumentasi Section -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="section-title" data-aos="fade-left">
                    <h2>dokumentasi</h2>
                    <p>Berikut ini merupakan dokumentasi dari kegiatan yang pernah dilakukan oleh student automotive
                        association
                    </p>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($getdokumentasi as $dokumentasi)
                        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                            <div class="portfolio-wrap">
                                <img src="{{ asset('images/dokumentasi/' . $dokumentasi->media) }}" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{{ $dokumentasi->nama }}</h4>
                                    <p>{{ $dokumentasi->waktu }}</p>
                                    <div class="portfolio-links">
                                        <a href="{{ asset('images/dokumentasi/' . $dokumentasi->media) }}" data-gallery="portfolioGallery"
                                            class="portfolio-lightbox" title="{{ $dokumentasi->nama }}"><i class="bx bx-plus"></i></a>
                                        <a href="/user-dokumentasi" title="selengkapnya"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End dokumentasi Section -->
        <!-- prestasi Section -->
        <section id="team" class="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title" data-aos="fade-right">
                            <h2>Prestasi</h2>
                            <p>Berikut ini adalah prestasi yang sudah dicapai oleh SAA</p>
                            <a href="/user-prestasi" class="icon-link">
                                Selengkapnya
                                <svg class="bi" width="1em" height="1em">
                                    <use xlink:href="/user-pengumumandet" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($getprestasi as $prestasi)
                                <div class="col-lg-6">
                                    <div class="member" data-aos="zoom-in" data-aos-delay="100">
                                        <div class="pic"><img src="Bethany/assets/img/team/team-1.jpg" class="img-fluid"
                                                alt=""></div>
                                        <div class="member-info">
                                            <h4>{{ $prestasi->nama }}</h4>
                                            <span>11181019</span>
                                            <p>Juara 1 lomba mobil listrik</p>
                                            <div class="social">
                                                <a href="#">selengkapnya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End prestasi Section -->

        <!-- lokasi Section -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>Lokasi</h2>
                            <p>Lokasi workshop Student Automotive Association berada di kampus Institut
                                Teknologi Kalimantan 
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.014780806901!2d116.86000911423234!3d-1.1499315358156963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df149298f826ab5%3A0x8489d5309f45c0db!2sInstitut%20Teknologi%20Kalimantan!5e0!3m2!1sid!2sus!4v1649443214845!5m2!1sid!2sus"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        {{-- <div class="info mt-4">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>Balikpapan, Kalimantan Timur</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 mt-4">
                                <div class="info">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>Saa@example.com</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="info w-100 mt-4">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>62342342344</p>
                                </div>
                            </div>
                        </div> --}}
                        {{-- <form action="forms/contact.php" method="post" role="form" class="php-email-form mt-4">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form> --}}
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
