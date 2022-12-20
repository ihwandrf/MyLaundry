<?php
session_start();
require_once "Config/Database.php";
$conn = getConnection();

if ($_SESSION['login'] != true) {
  header("Location: login.php");
  exit();
}
$sql = "SELECT id_karyawan, karyawan.nama, karyawan.no_telepon 'no-telp', email FROM karyawan JOIN role ON(karyawan.role = role.id_role) WHERE role.id_role = 1;";
$hasil = $conn->query($sql);

$no = 1;


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
  <link rel="stylesheet" href="admin.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <title>List Administrator</title>
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
            <h2>Jennie Kim</h2>
          </div>
          <hr />
          <a href="#" class="sub-menu-link tdk-ada">
            <span class="material-symbols-outlined"> manage_accounts </span>
            <p>Edit Profile</p>
          </a>
          <a href="#" class="sub-menu-link tdk-ada">
            <span class="material-symbols-outlined"> settings </span>
            <p>Settings</p>
          </a>
          <a href="#" class="sub-menu-link tdk-ada">
            <span class="material-symbols-outlined"> contact_support </span>
            <p>Help & Support</p>
          </a>
          <a href="#" class="sub-menu-link tdk-ada">
            <span class="material-symbols-outlined"> logout </span>
            <p>Logout</p>
          </a>
        </div>
      </div>
    </div>
    <div class="transaksi-tambah">
      <h3 class="i-name">Administrator</h3>
      <button type="button" data-bs-toggle="modal" data-bs-target="#newAdminModal" class="btn btn-outline-primary active aksi-btn tambah-btn " <?php if (!$_SESSION['admin']) {
                                                                                                                                                  echo "disabled";
                                                                                                                                                } ?>>
        Tambah Admin
      </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newAdminModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form id="newAdminForm" method="post">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">ID</label>
                    <select class="form-select" name="id_karyawan" id="id_karyawan" disabled>
                      <?php $sqlSelectIdKaryawan = "SELECT MAX(id_karyawan) 'id_karyawan' FROM karyawan;";
                      $stateSelectIdKaryawan = $conn->query($sqlSelectIdKaryawan);
                      foreach ($stateSelectIdKaryawan as $row) {
                      ?>
                        <option value="<?= $row["id_karyawan"] + 1 ?>"><?= $row["id_karyawan"] + 1 ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Nama Karyawan</label>
                    <input name="nama_karyawan" id="nama_karyawan" type="text" class="form-control" placeholder="Nama Karyawan">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Konfirmasi Password</label>
                    <input class="form-control bi bi-eye-slash" type="password" name="konfirmasi_password" id="konfirmasi_password" placeholder="Konfirmasi Password">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Nomor Telepon</label>
                    <input class="form-control bi bi-eye-slash" type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon">
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark active aksi-btn" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success active aksi-btn">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="board">
      <p id="p-order">List Admin</p>

      <div class="show-search">
        <div class="show-entries">
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
      </div>
      <table width="100%">
        <thead>
          <tr>
            <td>No</td>
            <td>ID</td>
            <td>Nama</td>
            <td>Nomor Telepon</td>
            <td>Email</td>
            <td>Aksi</td>
            <!-- <td>Aksi</td> -->
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hasil as $row) { ?>
            <tr>
              <td><?php echo $no;
                  $no++; ?></td>
              <td><?php echo $row['id_karyawan'] ?></td>
              <td><?php echo $row['nama'] ?></td>
              <td><?php echo $row['no-telp'] ?></td>
              <td><?php echo $row['email'] ?></td>
              <td>
                <button type="button" id="<?= $row['id_karyawan'] ?>" class="btn btn-outline-primary active aksi-btn edit" <?php if (!$_SESSION['admin']) {
                                                                                                                              echo "disabled";
                                                                                                                            } else {
                                                                                                                              if ($_SESSION["id_karyawan"] != 1) {
                                                                                                                                if ($_SESSION["id_karyawan"] != $row['id_karyawan']) {
                                                                                                                                  echo "disabled";
                                                                                                                                }
                                                                                                                              }
                                                                                                                            }  ?>>
                  Edit
                </button>
                <button type="button" id="<?= $row['id_karyawan'] ?>" <?php if ($row['id_karyawan'] == 1) {
                                                                        echo "disabled";
                                                                      } ?> class="btn btn-outline-danger active aksi-btn font-kecil hapus" <?php if (!$_SESSION['admin']) {
                                                                                                                                              echo "disabled";
                                                                                                                                            } else {
                                                                                                                                              if ($_SESSION["id_karyawan"] != 1) {
                                                                                                                                                if ($_SESSION["id_karyawan"] != $row['id_karyawan']) {
                                                                                                                                                  echo "disabled";
                                                                                                                                                }
                                                                                                                                              }
                                                                                                                                            }  ?>>
                  Hapus
                </button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
        <tbody>
          <tr>
            <td class="people"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="display-admin"></div>
  </section>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>

  <!-- BS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script>
    // 
    $(document).ready(function() {
      // Edit
      $(document).on("click", ".edit", function() {
        const id = $(this).attr('id');
        console.log(id);
        $("#display-admin").html("");
        $.ajax({
          url: "displayEditAdmin.php",
          type: "POST",
          data: {
            id: id
          },
          cache: false,
          success: function(data) {
            $("#display-admin").html(data);
            $("#editAdminModal").modal("show");
          }
        })

      })

      // Hapus
      $(document).on("click", ".hapus", function() {
        const id = $(this).attr('id');
        Swal.fire({
          title: 'Apakah Anda yakin?',
          text: "Anda tidak akan bisa mengembalikan data ini!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "deleteAdmin.php",
              type: 'POST',
              data: {
                id: id
              },
              success: function(data) {
                Swal.fire(
                  'Data terhapus!',
                  'Data Admin berhasil dihapus.',
                  'success'
                ).then(() => {
                  window.location.reload();
                })
              }

            })
          }
        })
      })


      //tambah
      $("#newAdminForm").submit(function(e) {
        e.preventDefault();
        const nama_karyawan = $("#nama_karyawan").val();
        const email = $("#email").val();
        const no_telp = $("#no_telp").val();
        const password = $("#password").val();
        const konfirmasi_password = $("#konfirmasi_password").val();


        if (nama_karyawan == "" || email == "" || no_telp == "" || konfirmasi_password == "" || password == "") {
          Swal.fire(
            "Masukan Salah!",
            "Isian data belum lengkap!",
            "error"
          )
          // alert("COK")
        } else {
          if (password != konfirmasi_password) {
            Swal.fire(
              "Password salah!",
              "Password tidak sama, mohon cek kembali!",
              "error"
            )
          } else {


            Swal.fire({
              title: 'Apakah Anda Yakin?',
              text: "Anda akan menambahkan admin baru?",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, tambahkan!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: 'newAdmin.php',
                  type: 'POST',
                  data: $(this).serialize(),
                  cache: false,
                  success: function(data) {
                    Swal.fire(
                      "Berhasil!",
                      "Penambahan Admin baru berhasil!",
                      "success"
                    ).then(() => {
                      window.location.reload();
                    })
                  }
                })
              }
            })
          }

        }

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

    function pindahPage(namaPage) {
      window.location.href = namaPage;
    }
  </script>


</body>

</html>