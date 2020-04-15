<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('flash_sukses'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('flash_gagal'); ?>"></div>
<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>
<div class="row" style="margin: 0.5rem;">
  <div class="col py-2">
    <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Detail Part
    </button>
  </div>
</div>

<div class="row" style="margin: 1rem;">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card">
        <div class="card-header bg-gray-500">Form Input Detail Part</div>
        <div class="card-body">
          <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?= base_url('page/detail_tambah'); ?>">

            <div class="form-group">
              <label>Nama Karyawan</label>
                 <?php
                  $a = mysqli_connect("localhost", "root", "", "waranti_db");
                  $result = mysqli_query($a, "select * from karyawan order by nama_karyawan asc");
                  $jsArray = "var Nama_prd1 = new Array();";
                  echo '<select name="nama_karyawan" onchange="changeValue(this.value)" class="form-control form-control-user">';
                  echo '<option>---Pilih nama_karyawan----</option>';
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['nama_karyawan'] . '">' . $row['nama_karyawan'] . '</option>';
                    $jsArray .= "Nama_prd1['" . $row['nama_karyawan'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                  }
                  echo '</select>';
                  ?>
              <label>Nopol</label>
                  <?php
                  $a = mysqli_connect("localhost", "root", "", "waranti_db");
                  $result = mysqli_query($a, "select * from kendaraan order by nopol asc");
                  $jsArray = "var Nama_prd1 = new Array();";
                  echo '<select name="nopol" onchange="changeValue(this.value)" class="form-control form-control-user">';
                  echo '<option>---Pilih nopol----</option>';
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['nopol'] . '">' . $row['nopol'] . '</option>';
                    $jsArray .= "Nama_prd1['" . $row['nopol'] . "'] = {name:'" . addslashes($row['model_kendaraan']) . "',desc:'" . addslashes($row['vin_rangka']) . "',des:'" . addslashes($row['kilometer']) . "'};";
                  }
                  echo '</select>';
                  ?>
               <script type="text/javascript">
                  <?php echo $jsArray; ?>

                  function changeValue(id) {
                    document.getElementById('model_kendaraan').value = Nama_prd1[id].name;
                    document.getElementById('vin_rangka').value = Nama_prd1[id].desc;
                    document.getElementById('kilometer').value = Nama_prd1[id].des;
                  };
                </script>
              <label>Model Kendaraan</label>
              <input type="text" class="form-control form-control-user" id="model_kendaraan" name="model_kendaraan" placeholder="Masukan model_kendaraan" required readonly>
              <label>VIN/ NO RANGKA</label>
              <input type="text" class="form-control form-control-user" id="vin_rangka" name="vin_rangka" placeholder="Masukan vin_rangka" required readonly>
              <label>Kilometer</label>
              <input type="text" class="form-control form-control-user" id="kilometer" name="kilometer" placeholder="Masukan kilometer detail" required readonly>
              <label>Tanggal Perbaikan</label>
                <input type="date" class="form-control form-control-user" id="tgl_perbaikan" name="tgl_perbaikan" placeholder="Masukan Tanggal Perbaikan" required>
              <label>Tanggal Penyerahan</label>
                <input type="date" class="form-control form-control-user" id="tgl_penyerahan" name="tgl_penyerahan" placeholder="Masukan Tanggal Penyerahan" required>
               <label>No Part</label>
                 <?php
                  $a = mysqli_connect("localhost", "root", "", "waranti_db");
                  $result = mysqli_query($a, "select * from sparepart order by no_part asc");
                  $jsArray = "var Nama_prd1 = new Array();";
                  echo '<select name="no_part" onchange="changeValue(this.value)" class="form-control form-control-user">';
                  echo '<option>---Pilih no_part----</option>';
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['no_part'] . '">' . $row['no_part'] . '</option>';
                    $jsArray .= "Nama_prd1['" . $row['no_part'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                  }
                  echo '</select>';
                  ?>
                <label>Barcode</label>
                <input type="text" class="form-control form-control-user" id="barcode" name="barcode" placeholder="Masukan Barcode" required>
                <label>LPD</label>
                <input type="text" class="form-control form-control-user" id="lpd" name="lpd" placeholder="Masukan LPD" required>
               <label>Nama Rak</label>
                 <?php
                  $a = mysqli_connect("localhost", "root", "", "waranti_db");
                  $result = mysqli_query($a, "select * from rak order by no_rak asc");
                  $jsArray = "var Nama_prd1 = new Array();";
                  echo '<select name="nama_rak" onchange="changeValue(this.value)" class="form-control form-control-user">';
                  echo '<option>---Pilih nama_rak----</option>';
                  while ($row = mysqli_fetch_array($result)) {
                    echo '<option value="' . $row['nama_rak'] . '">' . $row['nama_rak'] . '</option>';
                    $jsArray .= "Nama_prd1['" . $row['nama_rak'] . "'] = {name:'" . addslashes($row['tarif']) . "',desc:'" . addslashes($row['kategori']) . "'};";
                  }
                  echo '</select>';
                  ?>
              <input type="hidden" class="form-control" id="user_create" name="user_create" value="<?= $this->session->userdata('nama_user'); ?>" required>
              <input name="create_date" type="hidden" id="create_date" value=" <?php echo date('Y-m-d'); ?> " readonly>
            </div>
            <div class="card-footer">
              <b><a href="<?= base_url('page/form'); ?>">import data</a></b>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save">&nbsp;&nbsp;Simpan</i></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row" style="margin: 1rem;">
  <div class="col">
    <div class="collapse multi-collapse show" id="multiCollapseExample2">
      <div class="card shadow-lg">
        <div class="card-header bg-gray-500">Data Tabel detail</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-info text-white">
                <tr class="text-center">
                  <th>No </th>
                  <th>Nama Teknisi</th>
                  <th>Nopol </th>
                  <th>Model Kendaraan </th>
                  <th>VIN/ No Rangka</th>
                  <th>Kilometer</th>
                  <th>Tgl Perbaikan</th>
                  <th>Tgl Penyerahan</th>
                  <th>No Part</th>
                  <th>Barcode</th>
                  <th>LPD</th>
                  <th>Nama Rak</th>
                  <th>QR CODE</th>
                  <th>User Create</th>
                  <th>Create Date</th>
                  <th>User Update</th>
                  <th>Update Date</th>
                  <th>Aksi </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($detail as $s) : $no++; ?>
                  <tr>
                    <td class="text-center text-middle"><?= $no; ?></td>
                    <td class="text-middle"><?= $s['nama_karyawan']; ?></td>
                    <td class="text-middle"><?= $s['nopol']; ?></td>
                    <td class="text-middle"><?= $s['model_kendaraan']; ?></td>
                    <td class="text-middle"><?= $s['vin_rangka']; ?></td>
                    <td class="text-middle"><?= $s['kilometer']; ?></td>
                    <td class="text-middle"><?= $s['tgl_perbaikan']; ?></td>
                    <td class="text-middle"><?= $s['tgl_penyerahan']; ?></td>
                    <td class="text-middle"><?= $s['no_part']; ?></td>
                    <td class="text-middle"><?= $s['barcode']; ?></td>
                    <td class="text-middle"><?= $s['lpd']; ?></td>
                    <td class="text-middle"><?= $s['nama_rak']; ?></td> 
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$s['qr_code'];?>"></td>
                    <td class="text-middle"><?= $s['user_create']; ?></td>
                    <td class="text-middle"><?= $s['create_date']; ?></td>
                    <td class="text-middle"><?= $s['user_update']; ?></td>
                    <td class="text-middle"><?= $s['update_date']; ?></td>
                    <td class="text-center text-middle"><a href="<?= base_url('page/detail_ubah') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit text-success"></i></a> | <a href="<?= base_url('page/detail_hapus') ?>/<?= $s['id']; ?>" class="tombol_hapus" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a> | <a href="<?= base_url('page/laporan_detail') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print text-success"></i></a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>s