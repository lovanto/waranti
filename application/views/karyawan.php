<div class="flash-data1" data-flashdata="<?= $this->session->flashdata('flash_sukses'); ?>"></div>
<div class="flash-data2" data-flashdata="<?= $this->session->flashdata('flash_gagal'); ?>"></div>
<?php
$this->session->userdata('authenticated')
//$this->session->set_userdata($session);
?>
<div class="row" style="margin: 0.5rem;">
  <div class="col py-2">
    <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah data karyawan
    </button>
  </div>
</div>

<div class="row" style="margin: 1rem;">
  <div class="col">
    <div class="collapse multi-collapse" id="multiCollapseExample1">
      <div class="card">
        <div class="card-header bg-gray-500">Form Input karyawan</div>
        <div class="card-body">
          <form method="post" accept-charset="utf-8" enctype="multipart/form-data" action="<?= base_url('page/karyawan_tambah'); ?>">

            <div class="form-group">
              <label>NPK</label>
              <input type="text" class="form-control form-control-user" id="npk" name="npk" placeholder="Masukan Nomor Pokok karyawan" required>
              <label>Nama karyawan</label>
              <input type="text" class="form-control form-control-user" id="nama_karyawan" name="nama_karyawan" placeholder="Masukan Nama karyawan" required>
              <label>Jenis Kelamin</label>
              <select name="jk" class="form-control form-control-user" required>
                <option value="-">-pilihan-</option>
                <option value="laki-laki">laki-laki</option>
                <option value="perempuan">perempuan</option>
              </select>
              <label>Tanggal Lahir</label>
              <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir" placeholder="pilih tanggal lahir" required>
              <label>Alamat</label>
              <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat karyawan" required>
              <label>Nomor Kontak</label>
              <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Masukan Nomor telepon" required>
              <label>Nomor Identitas</label>
              <input type="text" class="form-control form-control-user" id="no_ktp" name="no_ktp" placeholder="Masukan Nomor Identitas" required>
              <label>Email</label>
              <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Alamat Email karyawan" required>
              <label>Tgl Masuk Kerja</label>
              <input type="date" class="form-control form-control-user" id="tgl_masuk" name="tgl_masuk" placeholder="Masukan tgl masuk" required>
              <label>Status karyawan</label>
              <select name="status_karyawan" class="form-control form-control-user" required>
                <option value="-">-pilihan-</option>
                <option value="Kontrak">kontrak</option>
                <option value="Tetap">Tetap</option>
              </select>
              <input type="hidden" class="form-control" id="user_create" name="user_create" value="<?= $this->session->userdata('nama_user'); ?>" required>
              <input name="create_date" type="hidden" id="create_date" value=" <?php echo date('Y-m-d'); ?> " readonly>
            </div>
            <div class="card-footer">
              <b><a href="<?= base_url('page/form?id=karyawan'); ?>">import data</a></b>
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
        <div class="card-header bg-gray-500">Data Tabel karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-info text-white">
                <tr class="text-center">
                  <th>No </th>
                  <th>NPK</th>
                  <th>Nama </th>
                  <th>Gender</th>
                  <th>Tanggal Lahir </th>
                  <th>Alamat </th>
                  <th>No Telp</th>
                  <th>No Ktp </th>
                  <th>Email </th>
                  <th>Tgl Masuk kerja</th>
                  <th>Status karyawan</th>
                  <th>QR CODE</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 0;
                foreach ($karyawan as $s) : $no++; ?>
                  <tr>
                    <td class="text-center text-middle"><?= $no; ?></td>
                    <td class="text-middle"><?= $s['npk']; ?></td> 
                    <td class="text-middle"><?= $s['nama_karyawan']; ?></td>
                    <td class="text-middle"><?= $s['jk']; ?></td>
                    <td class="text-middle"><?= $s['tgl_lahir']; ?></td>
                    <td class="text-middle"><?= $s['alamat']; ?></td>
                    <td class="text-middle"><?= $s['no_telp']; ?></td>
                    <td class="text-middle"><?= $s['no_ktp']; ?></td>
                    <td class="text-middle"><?= $s['email']; ?></td>
                    <td class="text-middle"><?= $s['tgl_masuk']; ?></td>
                    <td class="text-middle"><?= $s['status_karyawan']; ?></td>
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$s['qr_code'];?>"></td>
                    <td class="text-center text-middle"><a href="<?= base_url('page/karyawan_ubah') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit text-success"></i></a> | <a href="<?= base_url('page/karyawan_hapus') ?>/<?= $s['id']; ?>" class="tombol_hapus" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fas fa-trash text-danger"></i></a> | <a href="<?= base_url('page/laporan_karyawan') ?>/<?= $s['id']; ?>" data-toggle="tooltip" data-placement="top" title="Cetak"><i class="fas fa-print text-success"></i></a>
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
</div>