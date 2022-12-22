<?php
require_once "../Config/Database.php";
$conn = getConnection();

if(isset($POST['noresi'])){
  echo "$id";
  $id = $_POST['noresi'];

  $sql = "SELECT pesanan.id_pesanan 'id_pesanan', customer.nama 'nama', status_pesanan.nama 'status_pesanan' , status_pembayaran.nama_status 'status_bayar' FROM pesanan JOIN customer ON (pesanan.id_customer = customer.id_customer) JOIN status_pesanan 
  ON (pesanan.status_pesanan = status_pesanan.id_status_pesanan) JOIN status_pembayaran ON (pesanan.status_pembayaran = 
  status_pembayaran.id_pembayaran) WHERE id_pesanan = $id;";
  
  $hasil = $conn->query($sql);
  
  
  $no = 1;
  
  
}

?>



<section class="section section-lg" id="table-resi">
    <div class="container table-responsive">
      <table id="hasil" class="table" width="100%">
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
        <?php foreach ($hasil as $row) { ?>
          <tr style="background-color: #EEFCFF;">
            <td><?= $row['id_pesanan'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['status_pesanan'] ?></td>
            <td><?= $row['status_bayar'] ?></td>
            <td>
              <button type="button" class="btn active aksi-btn"><img class="img-fluid" src="src/img/invoice.png" alt="">
              </button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>