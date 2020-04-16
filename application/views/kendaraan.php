<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('flash_sukses'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('flash_gagal'); ?>"></div>
<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>
<div class="row" style="margin: 0.5rem;">
  <div class="col py-2">
    <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah kendaraan
    </button>
  </div>
</div>

<div class="row" style="margin: 1rem;">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card">
        <div class="card-header bg-gray-500">Form Input kendaraan</div>
        <div class="card-body">
          <form method="post" accept-charset="utf-8" enctype="multikendaraan/form-data" action="<?= base_url('page/kendaraan_tambah'); ?>">

            <div class="form-group">
              <label>Nopol</label>
              <input type="text" class="form-control form-control-user" id="nopol" name="nopol" placeholder="Masukan nopol" required>
              <label>Model</label>
              <input type="text" class="form-control form-control-user" id="model" name="model" placeholder="Masukan model" required>
              <label>Tipe Mesin</label>
              <input type="text" class="form-control form-control-user" id="tipe_mesin" name="tipe_mesin" placeholder="Masukan tipe_mesin" required>
              <label>Model Kendaraan</label>
              <input type="text" class="form-control form-control-user" id="model_kendaraan" name="model_kendaraan" placeholder="Masukan model_kendaraan" required>
              <label>VIN/ NO RANGKA</label>
              <input type="text" class="form-control form-control-user" id="vin_rangka" name="vin_rangka" placeholder="Masukan vin_rangka" required>
              <label>Kilometer</label>
              <input type="text" class="form-control form-control-user" id="kilometer" name="kilometer" placeholder="Masukan kilometer kendaraan" required>
              <input type="hidden" class="form-control" id="user_create" name="user_create" value="<?= $this->session->userdata('nama_user'); ?>" required>
              <input name="create_date" type="hidden" id="create_date" value=" <?php echo date('Y-m-d'); ?> " readonly>
            </div>
            <div class="card-footer">
              <b><a href="<?= base_url('page/form?id=kendaraan'); ?>">import data</a></b>
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
        <div class="card-header bg-gray-500">Data Tabel kendaraan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-info text-white">
                <tr class="text-center">
                  <th>No </th>
                  <th>Nopol </th>
                  <th>Model </th>
                  <th>Tipe Mesin</th>
                  <th>Model Kendaraan</th>
                  <th>VIN/ No Rangka</th>
                  <th>Kilometer</th>
                  <th>QR CODE</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($kendaraan as $s) : $no++; ?>
                  <tr>
                    <td class="text-center text-middle"><?= $no; ?></td>
                    <td class="text-middle"><?= $s['nopol']; ?></td>
                    <td class="text-middle"><?= $s['model']; ?></td>
                    <td class="text-middle"><?= $s['tipe_mesin']; ?></td>
                    <td class="text-middle"><?= $s['model_kendaraan']; ?></td>
                    <td class="text-middle"><?= $s['vin_rangka']; ?></td>
                    <td class="text-middle"><?= $s['kilometer']; ?></td>
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$s['qr_code'];?>"></td>
                    <td class="text-center text-middle"><a href="<?= base_url('page/kendaraan_ubah') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit text-success"></i></a> | <a href="<?= base_url('page/kendaraan_hapus') ?>/<?= $s['id']; ?>" class="tombol_hapus" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a> | <a href="<?= base_url('page/laporan_kendaraan') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print text-success"></i></a></td>
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
</div>