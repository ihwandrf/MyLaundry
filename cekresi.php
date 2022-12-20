<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style2.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Cek Resi</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="src/img/logo-black.png" alt="logoutama" id="logoutama">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item ms-">
            <a class="nav-link" href="../index.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="cekresi.html">Cek Resi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="section section-lg" style="margin-bottom: 190px; margin-top: 120px;">
    <div class="container container-lg">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center" style="margin-bottom: 20px;">
          <h1>
            <span style="color: #BAF2FE ;">Cek Resi</span>
            Laundrymu
          </h1>
        </div>
        <div class="row border rounded">
          <form id="form-cek-resi" action="" autocomplete="off">
            <div class="col-md-12 border-0">
              <div class="card border-0">
                <div class="card-body">
                  <form id="formcekresi" action="">
                    <div class="row">
                      <div class="col-md-12">
                        <p>Masukan nomor resi anda</p>
                        <input oninput="cekInputan()" id="noresi" class="rounded inputan" type="text" placeholder="Nomor Resi" style="width: 100%; padding-left:1rem;">
                      </div>
                    </div>
                    <button onclick="cekResi()" id="cekresibtn" type="submit" class="border-0 buttonutama my-3" style="width: 100%">CEK RESI</button>
                  </form>
                </div>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </section>

  <section class="section section-lg" id="table-resi">
    <div class="container table-responsive">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th scope="col">
              <p>ID</p>
            </th>
            <th scope="col">
              <p>Nama Pelanggan</p>
              </td>
            <th scope="col">
              <p>Pengerjaan</p>
            </th>
            <th scope="col">
              <p>Status Pembayaran</p>
            </th>
            <th scope="col">
              <p>Invoice</p>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr style="background-color: #EEFCFF;">
            <td>1256734976</td>
            <td>Sulfikar Hartono</td>
            <td>DI PROSES</td>
            <td>BELUM</td>
            <td>
              <button type="button" class="btn active aksi-btn"><img class="img-fluid" src="src/img/invoice.png" alt="">
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <section class="section section-lg" id="table-resi" style="margin-top: 50px;">
    <div class="container table-responsive">
      <table class="table" width="100%">
        <thead>
          <tr>
            <th scope="col">
              <p>ID</p>
            </th>
            <th scope="col">
              <p>Nama Pelanggan</p>
              </td>
            <th scope="col">
              <p>Pengerjaan</p>
            </th>
            <th scope="col">
              <p>Status Pembayaran</p>
            </th>
            <th scope="col">
              <p>Invoice</p>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr style="background-color: #EEFCFF;">
            <td>1694204976</td>
            <td>Rusdi Notobotolimo</td>
            <td>DI PROSES</td>
            <td>SUDAH</td>
            <td>
              <button type="button" class="btn active aksi-btn"><img class="img-fluid" src="src/img/invoice.png" alt="">
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6">
          <div class="single-box">
            <img src="src/img/logo-white.png" alt="" id="logo-footer">
            <h2 class="my-4">Follow us on</h2>
            <p class="socials">
              <i class="fa fa-facebook"></i>
              <i class="fa fa-instagram"></i>
              <i class="fa fa-pinterest"></i>
              <i class="fa fa-twitter"></i>
            </p>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="single-box">
            <ul>
              <li><a href="#">Beranda</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Berita</a></li>
              <li><a href="#">Cek Resi</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="single-box">
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Solution</a></li>
              <li><a href="#">Reviews</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6">
          <div class="single-box">
            <h2>Newsletter</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur doloremque earum similique fugiat nobis. Facere?</p>
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Enter your Email ..." aria-describedby="basic-addon2">
              <span class="input-group-text" id="basic-addon2"><i class="fa fa-long-arrow-right"></i></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>
    let inputresi = document.getElementById("noresi");
    let btnresi = document.getElementById("cekresibtn");
    let tabel = document.getElementById("table-resi");
    let form = document.getElementById("formcekresi");

    function cekInputan() {
      let resi = inputresi.value;
      if (resi.length >= 6) {
        btnresi.style.backgroundColor = "#BAF2FE";
        btnresi.style.color = "#009EFF";
        btnresi.disabled = false;

      } else if (resi.length <= 6) {
        btnresi.style.backgroundColor = "#D9D9D9";
        btnresi.style.color = "#595959";
        btnresi.disabled = true;
      }
    }
    inputresi.addEventListener("keydown", cekInputan());

    function cekResi() {
      tabel.style.display = "block";
    }

    form.addEventListener("submit", function(event) {
      event.preventDefault()
    });
  </script>
</body>

</html>