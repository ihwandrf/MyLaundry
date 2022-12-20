<?php
session_start();
require_once "Config/Database.php";
require_once "Helper/functions.php";

if ($_SESSION['login'] != true) {
  header("Location: login.php");
  exit();
}

$conn = getConnection();
$sql = "SELECT * FROM paket_laundry;";
$hasil = $conn->query($sql);

$no = 1;


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
  <link rel="stylesheet" href="paket.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.css">
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <title>Lihat Paket Laundry</title>
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
      <h3 class="i-name">Paket Laundry</h3>
      <button type="button" data-bs-toggle="modal" data-bs-target="#newPaketModal" class="btn btn-outline-primary active aksi-btn tambah-btn aksi-btn">
        Tambah Paket
      </button>
    </div>


    <!-- Modal -->

    <div class="modal fade" id="newPaketModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <form id="newPaketForm" method="post">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">ID</label>
                    <select class="form-select" name="id_paket" id="id_paket">
                      <?php $sqlSelectIdPaket = "SELECT MAX(id_paket) 'id_paket' FROM paket_laundry;";
                      $stateSelectIdPaket = $conn->query($sqlSelectIdPaket);
                      foreach ($stateSelectIdPaket as $row) {
                      ?>
                        <option value="<?= $row["id_paket"] + 1 ?>"><?= $row["id_paket"] + 1 ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Nama Paket</label>
                    <input name="nama_paket" id="nama_paket" type="text" class="form-control" placeholder="Nama Paket">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="">Harga</label>
                    <input class="form-control" type="text" name="harga" id="harga" placeholder="Harga">
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
      <p id="p-order">List Paket Laundry</p>
      <div>

      </div>
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
            <!-- No == id -->
            <td>No</td>
            <td>ID Paket</td>
            <td>Nama</td>
            <td>Harga per kg</td>
            <td>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($hasil as $row) { ?>
            <tr>
              <td><?php echo $no;
                  $no++;
                  ?></td>
              <td><?= $row['id_paket'] ?></td>
              <td><?= $row['kategori'] ?></td>
              <td><?= rupiah($row['harga']) ?></td>
              <td>
                <button type="button" id="<?= $row['id_paket'] ?>" class="btn btn-outline-primary active aksi-btn edit">
                  Edit
                </button>
                <button type="button" id="<?= $row['id_paket'] ?>" class=" btn btn-outline-danger active aksi-btn font-kecil hapus">
                  Hapus
                </button>
              </td>
            </tr>
          <?php } ?>

          <td class="people"></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div id="display-paket"></div>
  </section>

  <!-- SWAL -->


  <script>
    $(document).ready(function() {
      // Edit
      $(document).on("click", ".edit", function() {
        const id = $(this).attr('id');
        console.log(id);
        $("#display-paket").html("");
        $.ajax({
          url: "displayEditPaket.php",
          type: "POST",
          data: {
            id: id
          },
          cache: false,
          success: function(data) {
            $("#display-paket").html(data);
            $("#editPaketModal").modal("show");
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
              url: "deletePaket.php",
              type: 'POST',
              data: {
                id: id
              },
              success: function(data) {
                Swal.fire(
                  'Paket terhapus!',
                  'Paket berhasil dihapus.',
                  'success'
                ).then(() => {
                  window.location.reload();
                })
              }

            })
          }
        })
      })


      // Tambah paket 
      $("#newPaketForm").submit(function(e) {
        e.preventDefault();
        const nama_paket = $("#nama_paket option:selected").val();
        const harga = $("#harga").val();
        const id_paket = $("#id_paket").val() + 1;


        if (nama_paket == "" || harga == "") {
          Swal.fire(
            "Masukan Salah!",
            "Isian data belum lengkap!",
            "error"
          )
          // alert("COK")
        } else {

          Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Anda akan menambahkan paket baru?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tambahkan!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: 'newPaket.php',
                type: 'POST',
                data: $(this).serialize(),
                cache: false,
                success: function(data) {
                  Swal.fire(
                    "Berhasil!",
                    "Penambahan transaksi baru berhasil!",
                    "success"
                  ).then(() => {
                    window.location.reload();
                  })
                }
              })
            }
          })

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
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.15/sweetalert2.min.js"></script>

  <!-- BS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>



</body>

</html>