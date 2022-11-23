<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container responsive">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ '/' }}"><img src="{{ asset('assets/img/logoSAA.png') }}" alt="logosaa"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/user-pengumuman">Pengumuman</a></li>
                    {{-- <li><a class="nav-link scrollto" href="/user-proker">Program Kerja</a></li> --}}
                    <li><a class="nav-link scrollto" href="/user-prestasi">Prestasi</a></li>
                    <li><a class="nav-link scrollto" href="/user-dokumentasi">Dokumentasi</a></li>
                    <li><a class="nav-link scrollto" href="/user-pendaftaran">Pendaftaran</a></li>
                    <li><a class="nav-link scrollto" href="/user-service">Servis Harian</a></li>
                    @if (auth()->id() != null)
                        <li><a class="button" href="/profil">{{auth()->user()->name}}</a></li>
                    @else
                        <li><a class="nav-link scrollto" href="/login">Masuk</a></li>
                    @endif
                    @if (auth()->id() != null)
                    <li>
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-transparent"><i class="bi bi-arrow-right-square-fill"></i></button>
                        </form>
                    </li>
                    @else
                    <li><a class="nav-link scrollto" href="/register">daftar</a></li>
                    <input type="hidden">
                    @endif
                    
                    <li>
                    </li>
                    {{-- <li><a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div><!-- End Header Container -->
    </div>
</header><!-- End Header -->
