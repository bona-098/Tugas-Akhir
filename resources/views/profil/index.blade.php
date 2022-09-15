
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profil</title>
    <link href="dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <i class="fa fa-cog"></i>
      <h2>Nama User</h2>
      <p class="lead">email</p>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Riwayat Booking</span>
          <span class="badge bg-primary rounded-pill">1</span>
        </h4>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-muted">jadwal</small>
            </div>
            <span class="text-muted">pending</span>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Tentang saya</h4>
        <form class="needs-validation" novalidate>
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Nama</label>
              <input type="text" class="form-control" id="firstName" placeholder="user" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="user-098" value="" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" placeholder="user@gmail.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            
            <div class="col-6">
              <label for="email" class="form-label">password</label>
              <input type="email" class="form-control" id="email" placeholder="**********">
              <div class="invalid-feedback">
                Your password is incorrect.
              </div>
            </div>
            
            <div class="col-6">
              <label for="email" class="form-label">Nim</label>
              <input type="email" class="form-control" id="email" placeholder="11181019">
              <div class="invalid-feedback">
                Your nim is incorrect.
              </div>
            </div>

            <div class="col-6">
              <label for="email" class="form-label">password</label>
              <input type="email" class="form-control" id="email" placeholder="085231311212">
              <div class="invalid-feedback">
                Your number is incorrect.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="jl.fungai wain" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
