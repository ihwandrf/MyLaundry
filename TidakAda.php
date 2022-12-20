<?php
session_start();

require_once "Config/Database.php";
require_once "Helper/functions.php";
$conn = getConnection();


if ($_SESSION['login'] != true) {
  header("Location: login.php");
  exit();
}

// Get user's name
$email = $_SESSION['email'];
$namasql = "SELECT nama FROM karyawan WHERE email = ?;";
$hasilNama = $conn->prepare($namasql);
$hasilNama->execute([$email]);

$nama = $hasilNama->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="tidakada.css" />

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <title>Page not found</title>
</head>

<body>
  <section id="interface">
    <div class="navigation">
      <div class="n1">
        <i id="slide-bar" class="fa-solid fa-bars"></i>
      </div>
      <div class="profile">
        <i class="fa fa-bell"> </i>
        <img src="org1.jpeg" alt="" />
        <span class="material-symbols-outlined" onclick="toggleMenu()">
          expand_more
        </span>
      </div>
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="org1.jpeg" alt="" />
            <h2><?php echo $nama['nama'] ?></h2>
          </div>
          <hr />
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> manage_accounts </span>
            <p>Edit Profile</p>
          </a>
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> settings </span>
            <p>Settings</p>
          </a>
          <a href="TidakAda.php" class="sub-menu-link">
            <span class="material-symbols-outlined"> contact_support </span>
            <p>Help & Support</p>
          </a>
          <a class="sub-menu-link" id="logout">
            <span class="material-symbols-outlined"> logout </span>
            <p>Logout</p>
          </a>
        </div>
      </div>
    </div>

    <div class="container">
      <div>
        <img src="notfound.svg" alt="">
      </div>
      <div>
        <h1>Halaman belum tersedia</h1>
      </div>
      <div>
        <p>Belum tersedia, seperti rasa suka dia padaku.</p>
      </div>
      <div>
        <button class="button button1">Kembali ke Beranda</button>
      </div>
    </div>

    <!-- <h3 class="i-name">Dashboard</h3>

      <div class="values">
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>45</h3>
            <span>Total Customer</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa-solid fa-money-check-dollar"></i>
          <div>
            <h3>Rp.14.525.000</h3>
            <span>Total Pemasukan</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa-solid fa-bag-shopping"></i>
          <div>
            <h3>690</h3>
            <span>Total Transaksi</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa-solid fa-user-gear"></i>
          <div>
            <h3>41</h3>
            <span>Total Karyawan</span>
          </div>
        </div>
      </div>
      <div class="board">
        <p id="p-order">List order</p>
        <div class="show-search">
          <div>
            <label id="show" for="">Show</label>
            <select name="jumlah-data" id="jumlah-data">
              <option value="10">10</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="100">100</option>
            </select>
            <label id="show" for="">entries</label>
          </div>
          <div class="search">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search" name="" id="" />
          </div>
        </div> -->
    <!-- <table width="100%">
          <thead>
            <tr>
              <td>No</td>
              <td>Tanggal Transaksi</td>
              <td>Customer</td>
              <td>Paket</td>
              <td>Pembayaran</td>
              <td>Status Order</td>
              <td>Total</td>
              <td>Aksi</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>

              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
            <tr>
              <td>1</td>
              <td>20 Desember 2022</td>
              <td>Johan</td>
              <td>Cuci & setrika</td>
              <td class="Lunas">Lunas</td>
              <td>Baru</td>
              <td>Rp.180.000</td>
              <td>
                <button
                  type="button"
                  class="btn btn-outline-primary active aksi-btn"
                >
                  Detail
                </button>
              </td>
            </tr>
          </tbody>
          <tbody>
            <tr>
              <td class="people"></td>
            </tr>
          </tbody>
        </table> -->
    </div>
  </section>
  <script>
    let sideBar = document.getElementById("menu");
    let el_html = document.querySelector("html");
    let subMenu = document.getElementById("subMenu");
    let slideBar = document.getElementById("slide-bar");
    let manajemen = document.getElementById("manajemen-li");
    let manajemenDrop = document.getElementById("manajemen");

    // let x = window.matchMedia("(max-width: 769px)");

    function toggleMenu() {
      // subMenu.subMenu.classList.toggle("open-menu");
      if (subMenu.style.maxHeight == "400px") {
        subMenu.style.maxHeight = "0px";
      } else {
        subMenu.style.maxHeight = "400px";
      }
    }

    // el_html.addEventListener("click", function () {
    //   if (is_profil_terbuka) {
    //     alert();
    //     subMenu.style.maxHeight = "0px";
    //     is_profil_terbuka = false;
    //   }
    // });

    $("#manajemen-li").click(function() {
      $("#manajemen").toggleClass("active2");
    });

    // function toggleSideBar() {
    //   sideBar.style.width = "40px";
    // }

    // function toggleSideBar() {
    //   if (x.matches) {
    //     if (sideBar.style.left === "-220px") {
    //       alert("True");
    //       sideBar.style.left == "0px";
    //     } else if (sideBar.style.left == "0px") {
    //       sideBar.style.left == "-220px";
    //     }
    //   }
    // console.log(sideBar.style.left);
    // }

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("active");
    });

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("activeWeb");
    });

    const tdk_ada = document.querySelectorAll(".tdk-ada");

    for (i = 0; i <= tdk_ada.length - 1; i++) {
      tdk_ada[i].addEventListener("click", function() {
        document.location.href = "TidakAda.php";
      });
    }


    const back_beranda = document.querySelector(".button1")

    back_beranda.addEventListener("click", function() {
      document.location.href = "dashboard.php";
    })

    // alert("Apakah bisa ");
  </script>
</body>

</html>