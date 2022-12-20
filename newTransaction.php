<?php
session_start();
require_once "Config/Database.php";
$conn = getConnection();

$nama_pesanan = $_POST["judul_pesanan"];
$id_nama = $_POST["id_nama"];
$id_nama_arr = explode(" - ", $id_nama);
$id = $id_nama_arr[0];
$nama = $id_nama_arr[1];
$status_bayar = $_POST["status_bayar"];
$status_pesanan = $_POST["status_pesanan"];
$jenis_paket = $_POST["jenis_paket"];
$berat = $_POST["berat"];
$tgl_masuk = date("Y-m-d", strtotime($_POST["tgl_masuk"]));
$tgl_keluar = date("Y-m-d", strtotime($_POST["tgl_keluar"]));


// $sql = "INSERT INTO pesanan(nama_pesanan,`tanggal_masuk_pesanan`,`tanggal_keluar_pesanan`,`status_pesanan`,`id_customer`,`berat_pesanan`,`jenis_paket`,`status_pembayaran`) VALUES($nama_pesanan, $tgl_masuk, $tgl_keluar, $status_pesanan, $id, $berat, $jenis_paket, $status_bayar);";

$sql = "INSERT INTO `pesanan` (`nama_pesanan`, `tanggal_masuk_pesanan`, `tanggal_keluar_pesanan`, `status_pesanan`, `id_customer`, `berat_pesanan`, `jenis_paket`, `status_pembayaran`) VALUES
('$nama_pesanan', '$tgl_masuk', '$tgl_keluar', '$status_pesanan', '$id', '$berat', '$jenis_paket', '$status_bayar');";

$conn->query($sql);
$conn->errorInfo();
