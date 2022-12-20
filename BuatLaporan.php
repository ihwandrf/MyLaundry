<?php
session_start();
require_once "Config/Database.php";
require_once "Helper/functions.php";

$conn = getConnection();

if ($_SESSION['login'] != true) {
  header("Location: login.php");
  exit();
}

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
  <link rel="stylesheet" href="buatlaporan.css" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <title>Buat Laporan</title>
</head>

<body>
  <section id="menu">
    <div class="logo">
      <img src="detergent.png" alt="" />
      <h2>MyLaundry</h2>
    </div>
    <div class="items">
      <li onclick="pindahPage('dashboard.php')">
        <span class="material-icons"> pie_chart </span>
        <a class="menu-text">Dashboard</a>
      </li>
      <li id="manajemen-li" onclick="dropManajemen()">
        <span class="material-symbols-outlined"> manage_accounts </span>
        <a class="menu-text">Manajemen User</a>
      </li>
      <div id="manajemen">
        <div onclick="pindahPage('LihatKaryawan.php')">
          <span></span>
          <a>Karyawan</a>
        </div>
        <div onclick="pindahPage('Admin.php')">
          <span></span>
          <a>Administrator</a>
        </div>
      </div>
      <li onclick="pindahPage('Transaksi.php')" id="transaksi-li">
        <span class="material-symbols-outlined"> payments </span>
        <a class="menu-text">Transaksi</a>
      </li>
      <li onclick="pindahPage('Paket.php')">
        <span class="material-symbols-outlined"> laundry </span>
        <a class="menu-text">Paket Laundry</a>
      </li>
      <li onclick="pindahPage('Customer.php')">
        <span class="material-symbols-outlined"> person </span>
        <a class="menu-text">Customer</a>
      </li>
      <li onclick="pindahPage('BuatLaporan.php')">
        <span class="material-symbols-outlined"> summarize </span>
        <a class="menu-text">Laporan</a>
      </li>
    </div>
  </section>

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

    <div class="i-name-p">
      <h3 class="i-name">Buat Laporan</h3>
      <p id="p-wajib">*Semua isian wajib diisi</p>
    </div>
    <!-- <div class="values">
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
        <div class="val-box">
          <i class="fa fa-users"></i>
          <div>
            <h3>8,267</h3>
            <span>New Users</span>
          </div>
        </div>
      </div> -->
    <div class="board">
      <table width="100%">
        <tr>
          <td><label for="">Judul Laporan</label></td>
          <td><input type="text" name="judul-laporan" id="" placeholder="Judul Laporan" required></td>
        </tr>
        <tr>
          <td><label for="">Deskripsi</label></td>
          <td><input type="text" name="deskripsi-laporan" id="deskripsi-laporan" placeholder="Deskripsi" required></td>
        </tr>
        <!-- <tr>
                <td><label for="">Telepon</label></td>
                <td><input type="text" name="nama-lengkap" id="" placeholder="Telepon" required></td>
            </tr> -->
        <tr>
          <td><label for="">Filter</label></td>
          <td>
            <div class="radio-label">
              <input id="radio-btn" type="radio" name="filter" required>
              <label for="">Semua</label>
              <input id="radio-btn-2" type="radio" name="filter" required>
              <label for="">Tanggal</label>
            </div>
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Mulai Tanggal</label>
          </td>
          <td>
            <input type="date" name="" id="">
          </td>
        </tr>
        <tr>
          <td>
            <label for="">Sampai Tanggal</label>
          </td>
          <td>
            <input type="date" name="" id="">
          </td>
        </tr>

        <!-- <tr>
                <td><label for="">Email</label></td>
                <td><input type="email" name="email" id="" placeholder="Email"></td>
            </tr> -->

        <tr>
          <td></td>
          <td>
            <button type="button" class="btn btn-outline-primary active font-kecil">Buat Laporan</button>
            <button type="button" class="btn btn-outline-danger active font-kecil">Batal</button>
          </td>
        </tr>

      </table>
      <!-- <div class="board-input">
            <label for="nama-lengkap">Nama Lengkap</label>
            <input type="Username">
        </div>
        <div class="board-input">
            <label for="username">Username</label>
            <input type="Username">
        </div>         -->
    </div>

    </div>
  </section>

  <!-- SWAL -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>

  <script>
    // JQUERY
    $(document).ready(function() {
      // Logout
      $("#logout").click(function() {
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda akan keluar dari halaman ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, keluar saja!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "Logout.php",
              type: "POST",
              success: function() {
                Swal.fire(
                  'Logout berhasil!',
                  'Anda akan keluar dari halaman karyawan.',
                  'success'
                ).then(() => {
                  window.location.href = "login.php";
                })
              }
            })
          }
        })
      })
    })


    let sideBar = document.getElementById("menu");
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

    $("#manajemen-li").click(function() {
      $("#manajemen").toggleClass("active2");
    });

    // Pindah Page
    function pindahPage(namaPage) {
      window.location.href = namaPage;
    }

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("active");
    });

    $("#slide-bar").click(function() {
      $("#menu").toggleClass("activeWeb");
    });

    // alert("Apakah bisa ");
  </script>
</body>

</html>