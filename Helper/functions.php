<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp" . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function successLogin($nama)
{
    // echo "<script>
    // Swal.fire(
    //     'Login Berhasil!',
    //     'Selamat datang $nama !',
    //     'success'
    //   )
    // </script>";
    echo "<script>
        alert($nama);
        </script>";
}
