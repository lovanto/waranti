<html>

<head>
  <title>Laporan Data Karyawan</title>
  <style type="text/css">
    #diprint2 {
      opacity: 0;
    }

    .minus {
      margin-top: -70px;
    }

    body {
        font-size: 14px;
      }

    @media print {
      #diprint {
        display: none;
      }

      #diprint2 {
        opacity: 1;
      }

      @page {
        size: landscape;
      }

      .minus {
        margin-top: 20px;
      }

      .minus2 {
        margin-bottom: -20px;
      }
    }
  </style>
</head>

<body style="overflow-y: auto;">
  <div class="row" id="diprint2">
    <div class="col-md-3" style="margin-left: 150px;">
      <img src="<?= base_url('assets/images/logo.png'); ?>" width="100px">
    </div>
    <div class="col-md-5" style="margin-left: 10px; float: right">
      <div style="font-size: 30px;">Laporan Karyawan</div>
      <div style="font-size: 20px; margin-left: 60px;">PT. ASTRA INTERNASIONAL TBK- DAIHATSU ASTRA BIZ CENTER BANDUNG</div>
      <!-- <div style="font-size: 20px;">Telp. (022)-7326134</div> -->
    </div>
  </div>
    <div class="minus" style="margin-left: 20px; margin-right: 20px; overflow: auto;">
    <br><br>
    <form action="<?php echo site_url('page/laporan_all_karyawan'); ?>" method="get">
      <input type="text" name="cari" class="form-control " id="diprint" placeholder="Nomor Sparepart atau Deskripsi" value="<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>" style="margin-bottom: 10px;">
      <div class="form-group">
      <button type="submit" class="btn btn-primary" id="diprint">Cari Data</button>
      <a href="<?php echo site_url('page/laporan_all_karyawan'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
      <button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info diprint">Cetak data</button>
    </form>
    <center>
      <br>
      <table border="1" class="table table-striped table-bordered minus" id="dataTable" width="100%">
        <tr>
          <th>No</th>
          <th>NPK</th>
          <th>Nama Karyawan</th>
          <th>Jenis Kelamin</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Nomor Telp.</th>
          <th>No. KTP</th>
          <!-- <th>Tanggal Masuk</th> -->
          <th>Status Karyawan</th>
          <th>QR Code</th>
        </tr>
        <?php
        if (count($karyawan) > 0) {
          $no = 1;
          foreach ($karyawan as $k) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k['npk']; ?></td>
              <td><?php echo $k['nama_karyawan']; ?></td>
              <td><?php echo $k['jk']; ?></td>
              <td><?php echo $k['tgl_lahir']; ?></td>
              <td><?php echo $k['alamat']; ?></td>
              <td><?php echo $k['no_telp']; ?></td>
              <td><?php echo $k['no_ktp']; ?></td>
              <!-- <td><?php echo $k['tgl_masuk']; ?></td> -->
              <td><?php echo $k['status_karyawan']; ?></td>
              <td width="100"><img style="width: 100px;" src="<?php echo base_url() . 'assets/images/' . $k['qr_code']; ?>"></td>
            </tr>
          <?php endforeach;
        } else { ?>
          <tr>
            <td colspan="5" align="center">Tidak Ada Data.</td>
          </tr>
        <?php } ?>
      </table>
    </center>
    <br />
    <?php
    echo $this->pagination->create_links();
    ?>
  </div>
  <div id="diprint2">
    <div class="col-md-11">
      <div style="font-size: 16px; float: right;">Bandung, <?= date('d-m-Y'); ?></div>
      <br><br><br><br><br>
      <div style="font-size: 16px; float: right;"><?= $this->session->userdata('nama_user') ?></div>
      <br><br>
    </div>
  </div>
</body>
</html>