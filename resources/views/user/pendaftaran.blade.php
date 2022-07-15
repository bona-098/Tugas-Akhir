@extends('user.app')
@section('content')
<section id="values" class="values">

    <div class="container" data-aos="fade-up">

      <header class="text-center">
        <h2>Pendftaran</h2>
        <p>silahkan mendaftar sebagai anggota jika ingin bergabung</p>
        <p>silahkan mendaftar sebagai pengurus jika sudah menjadi anggota</p>
      </header>

      <div class="row">

        <div class="col-lg-6">
          <div class="box" data-aos="fade-up" data-aos-delay="200">
            <img src="assets/img/values-1.png" class="img-fluid" alt="">
            <a class="text-center" href="/user-anggota"><h3>Anggota</h3></a>
            <p>Eum ad dolor et. Autem aut fugiat debitis voluptatem consequuntur sit. Et veritatis id.</p>
          </div>
        </div>

        <div class="col-lg-6 mt-6 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="400">
            <img src="assets/img/values-2.png" class="img-fluid" alt="">
            <a class="text-center" href="/user-pengurus"><h3>Pengurus</h3></a>
            <p>Repudiandae amet nihil natus in distinctio suscipit id. Doloremque ducimus ea sit non.</p>
          </div>
        </div>

        {{-- <div class="col-lg-4 mt-4 mt-lg-0">
          <div class="box" data-aos="fade-up" data-aos-delay="600">
            <img src="assets/img/values-3.png" class="img-fluid" alt="">
            <a href="{{ ('/userlomba') }}"><h3>Lomba</h3></a>
            <p>Quam rem vitae est autem molestias explicabo debitis sint. Vero aliquid quidem commodi.</p>
          </div>
        </div> --}}

      </div>

    </div>

</section>
@endsection