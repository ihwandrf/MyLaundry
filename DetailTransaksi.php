<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="detailtransaksi.css" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <title>Detail Transaksi</title>
  </head>
  <body>
    <section id="menu">
      <div class="logo">
        <img src="detergent.png" alt="" />
        <h2>MyLaundry</h2>
      </div>
      <div class="items">
        <li>
          <span class="material-icons"> pie_chart </span>
          <a href="#" class="menu-text">Dashboard</a>
        </li>
        <li id="manajemen-li" onclick="dropManajemen()">
          <span class="material-symbols-outlined"> manage_accounts </span>
          <a href="#" class="menu-text">Manajemen User</a>
        </li>
        <div id="manajemen">
          <div>
            <span></span>
            <a href="#">Karyawan</a>
          </div>
          <div>
            <span></span>
            <a href="#">Administrator</a>
          </div>
        </div>
        <li id="transaksi-li">
          <span class="material-symbols-outlined"> payments </span>
          <a href="#" class="menu-text">Transaksi</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> laundry </span>
          <a href="#" class="menu-text">Paket Laundry</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> person </span>
          <a href="#" class="menu-text">Customer</a>
        </li>
        <li>
          <span class="material-symbols-outlined"> summarize </span>
          <a href="#" class="menu-text">Laporan</a>
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
          <img src="/org1.jpeg" alt="" />
          <span class="material-symbols-outlined" onclick="toggleMenu()">
            expand_more
          </span>
        </div>
        <div class="sub-menu-wrap" id="subMenu">
          <div class="sub-menu">
            <div class="user-info">
              <img src="org1.jpeg" alt="" />
              <h2>Jennie Kim</h2>
            </div>
            <hr />
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> manage_accounts </span>
              <p>Edit Profile</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> settings </span>
              <p>Settings</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> contact_support </span>
              <p>Help & Support</p>
            </a>
            <a href="#" class="sub-menu-link">
              <span class="material-symbols-outlined"> logout </span>
              <p>Logout</p>
            </a>
          </div>
        </div>
      </div>

      <!-- <h3 class="i-name">Transaksi</h3> -->
      <div class="transaksi-tambah">
        <h3 class="i-name">Invoice Pesanan</h3>
        <!-- <button
          type="button"
          class="btn btn-outline-primary active aksi-btn tambah-btn aksi-btn"
        >
          Tambah Transaksi
        </button> -->
        <div class="no-order">
          <h3>No Order:</h3>
          <h3 class="i-name">6923x3</h3>
        </div>
      </div>

      <div class="board">
        <div class=""></div>
        <div>
          <!-- <button
            type="button"
            class="btn btn-outline-primary active aksi-btn tambah-btn"
          >
            Tambah Transaksi
          </button> -->
        </div>
        <!-- <div class="show-search">
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
        <table class="table-1" width="100%">
          <!-- <thead>
            <tr class="baris-invoice">
              <td colspan="3">Customer</td>
            </tr>
          </thead> -->
          <tbody>
            <tr>
              <td>Nama</td>
              <td>Nabil Najmudin</td>
            </tr>
            <tr>
              <td>No Telepon</td>
              <td>08888008880</td>
            </tr>
            <tr>
              <td>Alamat</td>
              <td>Kediri</td>
            </tr>
            <tr>
              <td>Order Masuk</td>
              <td>07-12-2022</td>
            </tr>
            <tr>
              <td>Diambil pada</td>
              <td>08-12-2022</td>
            </tr>
            <tr></tr>
            <tr>
              <td>Status Pembayaran</td>
              <td>
                <select name="status" id="input-status-pesanan">
                  <option value="diproses">Lunas</option>
                  <option value="selesai">Belum Bayar</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Status Pesanan</td>
              <td>
                <select name="status" id="input-status-pesanan">
                  <option value="diproses">Diproses</option>
                  <option value="selesai">Selesai</option>
                </select>
              </td>
            </tr>
            <tr>
              <td>Durasi Kerja</td>
              <td>1 Hari</td>
            </tr>
            <!-- <tr>
              <td>Jenis Paket</td>
              <td>Lengkap</td>
            </tr> -->
            <!-- <thead>
              <tr class="baris-order">
                <td colspan="3">Order</td>
              </tr>
            </thead> -->
            <!-- <thead>
              <tr class="baris-abu">
                <td>Berat (kg)</td>
                <td>Harga per kg</td>
                <td>Total Bayar</td>
              </tr>
            </thead> -->

            <!-- <tr>
              <td>1</td>
              <td>Nabil</td>
            </tr> -->
            <!-- <tr>
              <td>2 Kg</td>
              <td>Rp8.000</td>
              <td>Rp16.000</td>
            </tr>
            <tr>
              <td>1</td>
              <td>Nabil</td>
            </tr> -->
          </tbody>
          <!-- <tbody>
            <tr>
              <td class="people"></td>
            </tr>
          </tbody> -->
        </table>
        <table class="table-2" width="100%">
          <thead>
            <tr>
              <td>No</td>
              <td>Nama Pesanan</td>
              <td>Tgl Order</td>
              <td>Paket Laundry</td>
              <td>Berat</td>
              <td>Harga/kg</td>
              <td>Subtotal</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Laundry Baju Kuliah</td>
              <td>07/12/2022</td>
              <td>Lengkap</td>
              <td>4 kg</td>
              <td>Rp8.000</td>
              <td>Rp32.000</td>
            </tr>
            <tr>
              <td colspan="6">Total Pesanan</td>
              <td>Rp32.000</td>
            </tr>
          </tbody>
        </table>
        <div class="buat-invoice">
          <button
            type="button"
            class="btn btn-outline-primary active aksi-btn tambah-btn aksi-btn"
          >
            Simpan
          </button>
          <button
            type="button"
            class="btn btn-outline-secondary active aksi-btn tambah-btn aksi-btn"
          >
            Buat Invoice
          </button>
          <button
            type="button"
            class="btn btn-outline-danger active aksi-btn tambah-btn aksi-btn"
          >
            Batal
          </button>
        </div>
      </div>
    </section>
    <script>
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

      $("#manajemen-li").click(function () {
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

      $("#slide-bar").click(function () {
        $("#menu").toggleClass("active");
      });

      $("#slide-bar").click(function () {
        $("#menu").toggleClass("activeWeb");
      });

      // alert("Apakah bisa ");
    </script>
  </body>
</html>
