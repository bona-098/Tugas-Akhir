<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo">
                <h1 class="text-light"><a href="/"><span>Home - SAA</span></a></h1>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="/user-pengumuman">Pengumuman</a></li>
                    <li><a class="nav-link scrollto" href="/user-proker">Program Kerja</a></li>
                    <li><a class="nav-link scrollto" href="/user-prestasi">Prestasi</a></li>
                    <li><a class="nav-link scrollto" href="/user-dokumentasi">Dokumentasi</a></li>
                    <li><a class="nav-link scrollto" href="/user-pendaftaran">Pendaftaran</a></li>
                    <li><a class="nav-link scrollto" href="/user-pendaftaran">Servis Harian</a></li>
                    <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                          <li>

                              @if (auth()->id() != null)
                                  <div class="buttons">
                                      <a href="/profil" class="button is-dark is-mediumed is-inverted px-5">{{auth()->user()->email}}</a>
                                      <a href="register" class="button is-danger px-5">
                                          <strong class="has-text-light is-mediumed">
                                              <form action="{{route('logout')}}" method="post">
                                                  @csrf
                                                  <button type="submit" class="btn btn-outline-light">Logout</button>
                                              </form>
                                          </strong>
                                      </a>
                                  </div>
                              @else
                              <div class="buttons">
                                  <a href="login" class="button is-dark is-mediumed is-inverted px-5">Masuk</a>
                                  <a href="{{ route('register') }}" class="button is-dark px-5">
                                      <strong class="has-text-light is-mediumed">Daftar</strong>
                                  </a>
                              </div>
                              @endif
                          </li>
                        </ul>
                    </li>
                    <li>
                    </li>
                    {{-- <li><a class="getstarted scrollto" href="{{ route('register') }}">Daftar</a></li> --}}
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div><!-- End Header Container -->
    </div>
</header><!-- End Header -->
