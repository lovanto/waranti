<html>

<head>
    <title>Laporan Data Detail Sparepart</title>
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
            <div style="font-size: 30px;">Laporan Detail Sparepart</div>
            <div style="font-size: 20px; margin-left: 60px;">PT. Daihatsu</div>
            <!-- <div style="font-size: 20px;">Telp. (022)-7326134</div> -->
        </div>
    </div>
    <div class="minus" style="margin-left: 20px; margin-right: 20px; overflow: auto;">
        <br><br>
        <form action="<?php echo site_url('page_user/laporan_all_detail'); ?>" method="get">
            <input type="text" name="cari" class="form-control" id="diprint" placeholder="Tanggal Perbaikan" value="<?php echo (isset($_GET['cari'])) ? $_GET['cari'] : ''; ?>">
            <br><button type="submit" class="btn btn-primary" id="diprint">Cari Data</button>
      <a href="<?php echo site_url('page_user/laporan_all_detail'); ?>" class="btn btn-danger" id="diprint" style="text-decoration:none; color: black;">Reset</a>
            <button href="#" onclick="myFunction()" target="_blank" type="submit" id="diprint" class="btn btn-info diprint">Cetak data</button>
        </form>
        <center>
            <br>
            <table border="1" class="table table-striped table-bordered minus" id="dataTable" width="100%">
                <tr>
                    <th>No</th>
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
                </tr>
                <?php
                if (count($detail) > 0) {
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
                    <td><img style="width: 100px;" src="<?php echo base_url() . 'assets/images/' . $s['qr_code']; ?>">
                    </td>
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
    <div class="row" id="diprint2" style="padding-bottom: 20px;">
        <div class="col-md-11">
            <div style="font-size: 16px; float: right;">Bandung, <?= date('d-m-Y'); ?></div>
            <br><br><br><br><br>
            <div style="font-size: 16px; float: right;"><?= $this->session->userdata('nama_user') ?></div>
            <br><br>
        </div>
    </div>
</body>

</html>