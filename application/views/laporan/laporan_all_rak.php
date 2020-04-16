<html>

<head>
  <title>Laporan Data Rak</title>
  <style type="text/css">
    #diprint2 {
      opacity: 0;
    }

    .minus {
      margin-top: -70px;
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

      body {
        font-size: 10.5px;
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
      <div style="font-size: 30px;">Laporan Rak</div>
      <div style="font-size: 20px; margin-left: 60px;">PT. Daihatsu</div>
      <!-- <div style="font-size: 20px;">Telp. (022)-7326134</div> -->
    </div>
  </div>
    <div class="minus" style="margin-left: 20px; margin-right: 20px; overflow: auto;">
    <br><br>
    <form action="<?php echo site_url('page/laporan_all_rak'); ?>" method="get">
      <input type="text" name="cari" class="form-control " id="diprint" placeholder="Nomor Rak atau Nama Rak" value="<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>" style="margin-bottom: 10px;">
      <div class="form-group">
      <button type="submit" class="btn btn-primary" id="diprint">Cari Data</button>
      <a href="<?php echo site_url('page/laporan_all_rak'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
      <button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info diprint">Cetak data</button>
    </form>
    <center>
      <br>
      <table border="1" class="table table-striped table-bordered minus" id="dataTable">
        <tr>
          <th>No</th>
          <th>Nomor Rak</th>
          <th>Nama Rak</th>
          <th>QR Code</th>
        </tr>
        <?php
        if (count($rak) > 0) {
          $no = 1;
          foreach ($rak as $k) : ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k['no_rak']; ?></td>
              <td><?php echo $k['nama_rak']; ?></td>
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
  <div class="row" id="diprint2">
    <div class="col-md-11">
      <div style="font-size: 16px; float: right;">Bandung, <?= date('d-m-Y'); ?></div>
      <br><br><br><br><br>
      <div style="font-size: 16px; float: right;"><?= $this->session->userdata('nama_user') ?></div>
      <br><br>
    </div>
  </div>
</body>
</html>